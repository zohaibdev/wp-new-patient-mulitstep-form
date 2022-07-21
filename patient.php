<?php

require dirname(__FILE__) . '/patient/vendor/autoload.php';

// Create Shortcode patient_form
// Shortcode: [patient_form]
function create_patientform_shortcode($atts)
{
    $atts = shortcode_atts(array(), $atts, 'patient_form');
    wp_enqueue_style('multistep-form', get_stylesheet_directory_uri() . '/assets/css/form.css', array(), time());
    wp_enqueue_script('jquery-validate', get_stylesheet_directory_uri() . '/assets/js/jquery.validate.min.js', array(), false, true);
    wp_enqueue_script('jquery-validate-additional-methods', get_stylesheet_directory_uri() . '/assets/js/additional-methods.min.js', array(), false, true);

    wp_enqueue_script('multistep-form', get_stylesheet_directory_uri() . '/assets/js/form.js', array(), false, true);

    ob_start();
    $data = require __DIR__ . '/patient/form.php';
    $data = ob_get_clean();
    return $data;
}
add_shortcode('patient_form', 'create_patientform_shortcode');


function bind_data($form_data)
{
    $form_data = preg_replace('/(\w+):/i', '"\1":', $form_data);
    $form_data = json_decode(json_decode($form_data, true));
    $data = null;
    foreach ($form_data as $key => $value) {
        if ($value->name) {
            if ($value->name == 'care_levels') {
                $data[$value->name] = ($value->value) ? $data[$value->name] . $value->value . ' \ ' : 'N/A';
            } else {
                $data[$value->name] = ($value->value) ? $value->value : 'N/A';
            }
        }
    }
    $data = (object) $data;
    return $data;
}

function upload_file($file)
{
    if ($file) {
        $filename = $file['name'];
        $valid_extensions = array("jpg", "jpeg", "png");
        $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array(strtolower($imageFileType), $valid_extensions)) {
            require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
            require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
            require_once(ABSPATH . 'wp-admin' . '/includes/media.php');
            $uploaded_file = wp_upload_bits($filename, null, file_get_contents($file['tmp_name']));
            return $uploaded_file;
        } else {
            return false;
        }
    }
}

function add_patient($form_data, $card_front_img, $card_back_img)
{
    if ($form_data != null && $card_front_img != null && $card_back_img != null) {
        $patient_id = wp_insert_post(array(
            'post_title' => $form_data->fname . ' ' . $form_data->lname,
            'post_status' => 'publish',
            'post_type' => 'patient'
        ));

        if ($patient_id) {
            foreach ($form_data as $key => $value) {
                add_post_meta($patient_id, $key, $value);
            }
            add_post_meta($patient_id, 'card_front_image', $card_front_img);
            add_post_meta($patient_id, 'card_back_image', $card_back_img);
            return true;
        }
    } else {
        return false;
    }
}


function pdf_document_template($doc_name, $form_data, $file_1=false, $file_2=false, $image_upload)
{
    unset($mpdf); // this is the magic
    unset($pdf_doc_template); // this is the magic

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4'
    ]);

    $file =  __DIR__ . "/patient/data/$doc_name.pdf";

    ob_start();
    $pdf_doc_template = require __DIR__ . "/patient/template.php";
    $pdf_doc_template = ob_get_clean();

    $mpdf->WriteHTML($pdf_doc_template);
    $mpdf->Output($file, 'F');

    return $file;
}


function send_mail($form_data, $file_1, $file_2, $image_upload)
{
    $files = array();
    $files[] = pdf_document_template('basic_data', $form_data, $file_1, $file_2, $image_upload);
    $files[] = pdf_document_template('healthcare_rights', $form_data, false,false, $image_upload);
	$files[] = pdf_document_template('consent_treatment', $form_data, false,false, $image_upload);
	$files[] = pdf_document_template('consent_telehealth', $form_data, false,false, $image_upload);
	$files[] = pdf_document_template('insurance_agreement', $form_data, false, false, $image_upload);
	$files[] = pdf_document_template('cancellation_policy', $form_data, false,false, $image_upload);


    $to = get_field('form_submissions_email', 'option');
    $subject = get_bloginfo() . ' - ' . $form_data->fname . ' submitted patient registration form';
    $message = "Hello Admin, \n\n" . $form_data->fname . " submitted the patient registration form, all the detail are compiled in pdf kindly review it. \n\n" . "Thank you";
    $send =  wp_mail($to, $subject, $message, null, $files);

    return $send;
}





function patient_submit()
{

    $file_1 = upload_file($_FILES['file_1']);
    $file_2 = upload_file($_FILES['file_2']);
    sleep(4);

    $image_upload = upload_file($_FILES['file_3']);
    if ($_POST) {
        $form_data = (object) $_POST;
        $image_name = 'file3' . '.png';
        $image  = $form_data->file3;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $fileData = base64_decode($image);
        $image_upload = wp_upload_bits($image_name, null, $fileData);
    }
    sleep(1);


    $send = send_mail($form_data, $file_1, $file_2, $image_upload);
    $add_patient = add_patient($form_data, $file_1['url'], $file_2['url'], $image_upload['url']);

    if ($send && $add_patient) {
        echo json_encode(array('success' => true, 'msg' => site_url('thank-you')));
    } else {
        echo json_encode(array('success' => false, 'msg' => 'internal server error please contact us with at office@lgtcgroup.com'));
    }
    exit();
}
add_action('wp_ajax_nopriv_patient_submit', 'patient_submit');
add_action('wp_ajax_patient_submit', 'patient_submit');


// Register Custom Post Type Patient
function create_patient_cpt()
{

    $labels = array(
        'name' => _x('Patients', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Patient', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('Patients', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Patient', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('Patient Archives', 'textdomain'),
        'attributes' => __('Patient Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent Patient:', 'textdomain'),
        'all_items' => __('All Patients', 'textdomain'),
        'add_new_item' => __('Add New Patient', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New Patient', 'textdomain'),
        'edit_item' => __('Edit Patient', 'textdomain'),
        'update_item' => __('Update Patient', 'textdomain'),
        'view_item' => __('View Patient', 'textdomain'),
        'view_items' => __('View Patients', 'textdomain'),
        'search_items' => __('Search Patient', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into Patient', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Patient', 'textdomain'),
        'items_list' => __('Patients list', 'textdomain'),
        'items_list_navigation' => __('Patients list navigation', 'textdomain'),
        'filter_items_list' => __('Filter Patients list', 'textdomain'),
    );
    $args = array(
        'label' => __('Patient', 'textdomain'),
        'description' => __('', 'textdomain'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title'),
        'taxonomies' => array(),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'hierarchical' => false,
        'exclude_from_search' => true,
        'show_in_rest' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    );
    register_post_type('patient', $args);
}
add_action('init', 'create_patient_cpt', 0);


function wporg_add_custom_box()
{
    add_meta_box('wporg_box_id', 'Insurance Card Images', 'inc_card_box_html',  'patient');
}
add_action('add_meta_boxes', 'wporg_add_custom_box');


function inc_card_box_html($post)
{
    global $post;

    $front_img = get_post_meta($post->ID, 'card_front_image', true);
    $back_img = get_post_meta($post->ID, 'card_back_image', true);

?>
    <div class="inc-card-block">
        <div class="row" style="display: flex;">
            <div class="col" style="width: 50%; padding:.5rem">
                <label for="front_card">Front Image</label>
                <img src="<?php echo $front_img ?>" style="width: 100%;">
            </div>
            <div class="col" style="width: 50%; padding:.5rem">
                <label for="back_card">Back Image</label>
                <img src="<?php echo $back_img ?>" style="width: 100%;">
            </div>
        </div>
    </div>
<?php
}
