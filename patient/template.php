<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <title>Patient Data</title>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif !important;
        letter-spacing: 1px;
        color: #000;
    }

    p,
    ol {
        font-size: 12px;
        line-height: 16px;
        `
    }

    h1 {
        text-align: center;
    }

    ul li,
    ol li {
        font-size: 12px;
        line-height: 16px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        text-align: left;
    }

    table th,
    table td {
        border: 1px solid #000;
        text-align: left;
        padding: 10px;
    }


    .center {
        text-align: center;
    }

    .bold {
        font-weight: bold;
    }

    .sub-heading {
        font-size: 16px;
    }

    .small-text,
    .small-list li {
        font-size: 10px;
        line-height: 14px;
    }

    .mt {
        margin-top: 40px;
    }

    .mb {
        margin-top: 20px;
    }

    .xs-mt {
        margin: 30px 0;
    }

    .agreement-block {
        border: 1px solid #000;
        padding: 15px;
        margin: 20px 0;
    }

    h3 {
        font-size: 16px;
    }

    .date-block {
        font-size: 12px;
    }

    .agreement-block h4 {
        margin: 0;
    }

    .for-sign-date-css {
        width: 25% !important;
        text-align: left;
    }
</style>

<body>

    <?php if ($doc_name == "basic_data") : ?>
        <h1><strong>LGTC Patient Detail</strong></h1>

        <h2 class="sub-heading mt">Basic Information</h2>
        <table>
            <tr>
                <th>First Name</th>
                <td><?php echo $form_data->fname ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $form_data->lname ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $form_data->email ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $form_data->gender ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $form_data->phone ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo $form_data->dob ?></td>
            </tr>
            <tr>
                <th>Street</th>
                <td><?php echo $form_data->street ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php echo $form_data->state ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $form_data->city ?></td>
            </tr>
            <tr>
                <th>Zipcode</th>
                <td><?php echo $form_data->zipcode ?></td>
            </tr>
        </table>

        <h2 class="sub-heading mt">Parent/Guardian Information</h2>
        <table>
            <tr>
                <th>First Name</th>
                <td><?php echo $form_data->parent_fname ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $form_data->parent_lname ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $form_data->parent_email ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $form_data->parent_phone ?></td>
            </tr>
            <tr>
                <th>Relation</th>
                <td><?php echo $form_data->relation ?></td>
            </tr>
        </table>

        <h2 class="sub-heading mt">Emergency Contact</h2>
        <table>
            <tr>
                <th>First Name</th>
                <td><?php echo $form_data->ec_fname ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $form_data->ec_lname ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $form_data->ec_email ?></td>
            </tr>
            <tr>
                <th>Relation</th>
                <td><?php echo $form_data->ec_relation ?></td>
            </tr>
        </table>

        <h2 class="sub-heading mt">What level of care are you looking for?</h2>
        <table>
            <tr>
                <td><?php echo $form_data->textuse ?></td>
            </tr>
        </table>

        <h2 class="sub-heading mt">Hospitalized within the last 60 days?</h2>
        <table>
            <tr>
                <th>Hospitalized</th>
                <td><?php echo $form_data->past_hospitalized ?></td>
            </tr>
            <tr>
                <th>Date of discharge</th>
                <td><?php echo $form_data->hos_dod ?></td>
            </tr>
            <tr>
                <th>Hospital Name</th>
                <td><?php echo $form_data->hos_name ?></td>
            </tr>
        </table>

        <h2 class="sub-heading mt">Insurance Card</h2>
        <table>
            <tr>
                <td style="width: 50%;">
                    <img src="<?php echo $file_1['file'] ?>" alt="">
                </td>
                <td style="width: 50%;">
                    <img src="<?php echo $file_2['file'] ?>" alt="">
                </td>
            </tr>
        </table>

    <?php elseif ($doc_name == "healthcare_rights") : ?>
        <div class="agreement-block">
            <h4>I Agree and Accept: Healthcare Rights</h4>
            <div class="content">
                <p>Authorization for Use or Disclosure of Protected Health Information</p>
                <p>Required by the Health Insurance Portability and Accountability (HIPAA) Act 45 G 5 R Parts 160 and161</p>
                <ol>
                    <li>I authorize LGTC Group to use certain forms of convenient, but non-encrypted, data transmission services and platform to transmit or receive my protected health information when using any web-based forms that are on the LGTC website or linked to the LGTC website (the "web-based Forms"). The intended recipients that I am authorizing to access my protected health information through these web-based Forms include any LGTC employee, practitioner or contractor who may need access to this information for treatment, coordination of care, payment, billing. or administrative purposes. These web-based Forms are convenient, but because they may not at all times he encrypted, I understand that my protected health information could be intercepted by someone other than the intended LGTC recipients if I consent to the use of these web-based forms by my signature below.</li>
                    <li>This authorization for release of information covers the period of healthcare from all past, present, and future periods.</li>
                    <li>I authorize the release of my complete health record and any related information I may provide to LGTC through these web-based forms (including records, if such exist, relating to mental healthcare, communicable diseases, HIV or AIDS, and treatment of alcohol or drug abuse).</li>
                    <li>This medical information may be used for treatment, coordination of care, payment, billing, administrative, or any other purposes as I may direct.</li>
                    <li>This authorization shall be in full force and effect until six months from the date l terminate my agreement to use LGTC services, at which time this authorization expires.</li>
                    <li>I understand that I have the right to revoke this authorization, in writing, at any time. I understand that a revocation is not effective to the extent that any person or entity has already acted in reliance on my authorization.</li>
                    <li>I understand that my treatment, payment, enrollment, or eligibility for benefits will not be conditioned on whether I sign this authorization.</li>
                    <li>l understand that information used or disclosed pursuant to this authorization may be disclosed by any recipients and may no longer be protected by federal or state law.</li>
                </ol>
            </div>
        </div>
    <?php elseif ($doc_name == "consent_telehealth") : ?>
        <div class="agreement-block">
            <h4>I Agree and Accept: Consent for Services using Telehealth</h4>
            <div class="content">
                <p>LGTC Group uses an online communications platform called Zoom to allow providers to deliver mental healthcare using audio, video, or data communications. Zoom has high standards to provide a secure and encrypted platform and does not record any communications between yourself and your provider whether audio or video. Telehealth involves the communication of medical/mental health information, both orally and visually, to providers located in and outside of California. The same limits and laws that were reviewed when you signed consent for treatment that include statements of intent for harm to yourself, others or abuse of children apply in TeleHealth.</p>
                <p>Although electronic means for appointments is increasingly common, there are potential risks to using an online counselling platform:</p>
                <ol>
                    <li>Internet services may malfunction or there may be technological challenges.</li>
                    <li>Though every effort is made to ensure confidentiality, the limitations and risks in teleconferencing include public discovery, possibility of hackers, household noise or interruptions and other potential risks outside of our control.</li>
                    <li>Even with best practices using TeleHealth, any information transmitted via the internet may not be 100% secure.</li>
                </ol>
                <p>You will receive an email notification that will provide you with access information to enter your providers virtual waiting room. If during the session, your provider sends documents for you to complete, you will be asked to send them back through email, not through the Zoom platform.</p>
                <p>Crises will be managed using emergency contact numbers and/or emergency services.</p>
            </div>
        </div>
    <?php elseif ($doc_name == "consent_treatment") : ?>
        <div class="agreement-block">
            <h4>I Agree and Accept: Consent for treatment</h4>
            <div class="content">
                <p>Thank you for choosing LGTC Group. We want you to know what to expect as you participate in treatment at our clinics. Our outpatient clinic offers comprehensive mental health services that include pharmacological and therapeutic interventions. We also offer Intensive Outpatient Program (IOP), Partial Hospitalization Program (PHP) and Transcranial Magnetic Stimulation (TMS).</p>
                <p>Your provider may prescribe medication for the treatment of your condition. This is something that you and your provider will discuss and decide together. For treatment to be effective, medications must be taken as prescribed. With any medication, there are always risks of side effects that you and your provider will discuss. Results cannot be guaranteed for everyone, however with patients in continued care, excellent results are often achieved.</p>
                <p>Psychotherapy is integrated into all mental health services at LGTC Group. Most likely, your treatment will involve discussion of personal issues. At times these may feel somewhat uncomfortable to discuss. Therapeutic relationships take time to develop just like any other relationship. You may be evaluated and / or treated by multiple providers. We may also collaborate with your primary care provider. Often, it is important to see your provider several times before a treatment plan could be developed and adopted.</p>
                <p>All of your treatment at our clinics is kept confidential. No information will be released without your written consent, unless your clinician feels you are a danger to yourself or others. Releasing information to any agency or individual will require a signed release of information.</p>
                <p>It is very important to understand that our clinics may not have the appropriate level of care required for your condition. A decision to render care is made by a licensed clinician at his/her professional discretion. If the level of care offered at our clinic is inadequate to effectively treat your condition, a provider will discuss your options with you.</p>
            </div>
        </div>
    <?php elseif ($doc_name == "insurance_agreement") : ?>
        <div class="agreement-block">
            <h4>I Agree and Accept: Insurance Agreement</h4>
            <div class="content">
                <p>LGTC Group is a participating provider with most insurance plans. Each insurance plan has different benefits for you as well as different financial obligations. Not all insurance policies cover all services. It is ultimately your responsibility to check with your insurance company to determine covered benefits. You are financially responsible for any outstanding balance on your account.</p>
                <p>PLEASE REMEMBER: The agreement of the insurance carrier to pay for health care is a contract between you and the insurance company. Any questions or complaints regarding coverage should be directed to your insurance company.</p>
                <p>Confirmation of benefits does not guarantee coverage. Our office will bill the insurance company and invoice you for the difference.</p>
            </div>
        </div>
    <?php elseif ($doc_name == "cancellation_policy") : ?>
        <div class="agreement-block">
            <h4>I Agree and Accept: Cancellation Policy</h4>
            <div class="content">
                <p>LGTC Group requires 2 business days’ notice before an appointment for cancellation. Business days are counted as Monday – Friday, 9.00 am to 6.00 pm, and do not include holidays.</p>
                <p>Cancellations received after this cut-off time will be considered late cancellations and will result in a late-cancellations fee of up to $150. Missed appointments are also counted as late cancellation and will result in a late-cancellations fee of up to $150.</p>
                <p>We send appointment reminder emails and text messages to help make sure that you never miss an appointment.</p>
            </div>
        </div>
    <?php endif ?>

    <?php if ($doc_name != "basic_data") : ?>
        <h2 class="sub-heading mt">I acknowledge I have read and understood the content of the forms.</h2>
        <h2 class="sub-heading">Signature:</h2>

        <div class="for-sign-date-css">
            <table>
                <tr>
                    <td style="max-width: 160px !important;">
                        <img src="<?php echo $image_upload['file'] ?>" alt="">
                    </td>
                </tr>
            </table>
        </div>

        <h3><?php echo $form_data->fname ?>&nbsp;<?php echo $form_data->lname ?></h3>
        <h3 class="date-block"><?php echo $today = date("Y.m.d, g:i a"); ?></h3>
    <?php endif ?>

</body>
</html>