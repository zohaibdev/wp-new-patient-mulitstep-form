<?php

require dirname(__FILE__) . '/patient/vendor/autoload.php';

if (!is_plugin_active('advanced-custom-fields/acf.php')) {
    add_action('admin_notices', 'custom_error_notice');
    function custom_error_notice()
    {
        echo '<div class="error"><p>Warning - "Advanced Custom Fields" plugin is required in patient registration form to use the registration related features.</p></div>';
    }
} else {
    require_once dirname(__FILE__) . '/patient/data-registration.php';
}

// Create Shortcode patient_form
// Shortcode: [patient_form]
function create_patientform_shortcode($atts)
{
    $atts = shortcode_atts(array(), $atts, 'patient_form');
    wp_enqueue_style( 'bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), time() );
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), time(), false);
    wp_enqueue_style('multistep-form', get_stylesheet_directory_uri() . '/patient/assets/css/form.css', array(), time());
    wp_enqueue_script('jquery-validate', get_stylesheet_directory_uri() . '/patient/assets/js/jquery.validate.min.js', array(), false, true);
    wp_enqueue_script('jquery-validate-additional-methods', get_stylesheet_directory_uri() . '/patient/assets/js/additional-methods.min.js', array(), false, true);
    wp_enqueue_script('multistep-form', get_stylesheet_directory_uri() . '/patient/assets/js/form.js', array(), false, true);

    wp_enqueue_style('signature', get_template_directory_uri() . '/patient/assets/css/jquery.signature.css', array(), time());
    wp_enqueue_script('signature', get_template_directory_uri() . '/patient/assets/js/jquery.signature.js', array(), time(), true);


    /* ob_start();
    $data = require __DIR__ . '/patient/form.php';
    $data = ob_get_clean();
    return $data; */

    get_template_part('patient/form');
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


function pdf_document_template($doc_name, $form_data, $file_1 = false, $file_2 = false, $image_upload)
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
    $files[] = pdf_document_template('healthcare_rights', $form_data, false, false, $image_upload);
    $files[] = pdf_document_template('consent_treatment', $form_data, false, false, $image_upload);
    $files[] = pdf_document_template('consent_telehealth', $form_data, false, false, $image_upload);
    $files[] = pdf_document_template('insurance_agreement', $form_data, false, false, $image_upload);
    $files[] = pdf_document_template('cancellation_policy', $form_data, false, false, $image_upload);


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
