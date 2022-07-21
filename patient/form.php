<section class="form-section-pateint">
    <div class="loading_screen d-none">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="py-4 form-title-font">Registration Form</h1>

            <form id="patient-form" data-action="<?php echo admin_url('admin-ajax.php'); ?>">
                <div class="stepwizard col-md-offset-3">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step"> <span class="step">01</span> <span class="step">02</span> <span class="step">03</span> <span class="step">04</span> <span class="step">05</span> <span class="step">06</span> <span class="step">07</span> </div>
                    </div>
                </div>
                <div class="hide-for-form">
                    <div class="pt-4">
                        <div class="tab">
                            <h1 class="py-4">Demographic information</h1>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="field">
                                        <input type="text" placeholder="First Name*" name="fname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field">
                                        <input type="text" placeholder="Last Name*" name="lname">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <input type="text" placeholder="Street*" name="street">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <input type="text" placeholder="City*" name="city">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <input type="text" placeholder="State*" name="state">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <input type="text" placeholder="Zip Code*" name="zipcode">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field">
                                        <input type="email" placeholder="Email Address*" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field">
                                        <input type="tel" placeholder="Phone Number*" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field">
                                        <input type="text" onfocus="(this.type='date')" placeholder="Date Of Birth" name="dob" class="for-date-display">

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h3>What is your gender?</h3>
                                    <h4>Choose as many as you like</h4>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="gender" id="self_female" value="Female" />
                                            <label class="form-check-label" for="self_female">Female</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="gender" id="self_male" value="Male" />
                                            <label class="form-check-label" for="self_male">Male</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="gender" id="self_female" value="self_transgender" />
                                            <label class="form-check-label" for="self_transgender">Transgender</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="gender" id="self_intersex" value="Intersex" />
                                            <label class="form-check-label" for="self_intersex">Intersex</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="field">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="gender" id="self_none_binary" value="None-binar" />
                                            <label class="form-check-label" for="self_none_binary">None-Binary</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="gender" id="self_not_to_say" value="I prefer not to say" />
                                            <label class="form-check-label" for="self_not_to_say">I prefer not to say</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-3">
    <div class="form-check pt-4 px-0 d-flex  align-items-center">
        <h3 class="form-check-label m-0 for-check-padding" for="client_minor">Client is minor </h3>
        <input class="form-check-input m-0" type="checkbox" name="client_minor" />
    </div>
</div> -->
                            </div>
                        </div>
                        <div class="tab">
                            <h1 class="py-4">Parent/Guardian Information</h1>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="field">
                                        <input type="text" placeholder="First Name*" name="parent_fname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field">
                                        <input type="text" placeholder="Last Name*" name="parent_lname">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field">
                                        <input type="email" placeholder="Email Address*" name="parent_email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field">
                                        <input type="tel" placeholder="Phone Number" name="parent_phone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <h3>Relationship to patient </h3>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="field">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="relation" id="relation_father" value="Father" />
                                                        <label class="form-check-label" for="relation_father">Father</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="relation" id="relation_mother" value="Mother" />
                                                        <label class="form-check-label" for="relation_mother">Mother</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="relation" id="relation_legal_guardian" value="Legal guardian" />
                                                        <label class="form-check-label" for="relation_legal_guardian">Legal guardian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <h1 class="py-4">Emergency Contact</h1>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="field">
                                        <input type="text" placeholder="First Name*" name="ec_fname">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field">
                                        <input type="text" placeholder="Last Name*" name="ec_lname">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field">
                                        <input type="text" placeholder="Email Address*" name="ec_email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h3>Relationship</h3>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="field">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_spouse" value="Spouse" />
                                                            <label class="form-check-label" for="ec_spouse">Spouse</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_father" value="Father" />
                                                            <label class="form-check-label" for="ec_father">Father</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_mother" value="Mother" />
                                                            <label class="form-check-label" for="ec_mother">Mother</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_brother" value="Brother" />
                                                            <label class="form-check-label" for="ec_brother">Brother</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_sister" value="Sister" />
                                                            <label class="form-check-label" for="ec_sister">Sister</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_guardian" value="Guardian" />
                                                            <label class="form-check-label" for="ec_guardian">Guardian</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_child" value="Child" />
                                                            <label class="form-check-label" for="ec_child">Child</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_caregiver" value="Caregiver" />
                                                            <label class="form-check-label" for="ec_caregiver">Caregiver</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="ec_relation" id="ec_other" value="Other" />
                                                            <label class="form-check-label" for="ec_other">Other</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <h1 class="py-4">What service are you looking for? </h1>
                            <div class="field">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="field">
                                            <textarea class="form-control" name="textuse" rows="3"></textarea>
                                        </div>
                                    </div>


                                    <!-- <div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_1" value="Medication management" />
        <label class="form-check-label" for="care_level_1">Medication management</label>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_2" value="Mental health intensive outpatient program" />
        <label class="form-check-label" for="care_level_2">Mental health intensive outpatient program</label>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_3" value="Eating disorder partial hospitalization program" />
        <label class="form-check-label" for="care_level_3">Eating disorder partial hospitalization program</label>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_4" value="Group therapy" />
        <label class="form-check-label" for="care_level_4">Group therapy</label>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_5" value="Eating disorder intensive outpatient program" />
        <label class="form-check-label" for="care_level_5">Eating disorder intensive outpatient program</label>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_6" value="Transcranial magnetic stimulation (TMS)" />
        <label class="form-check-label" for="care_level_6">Transcranial magnetic stimulation (TMS)</label>
    </div>
</div>
<div class="col-lg-4">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="care_levels" id="care_level_7" value="Psychotherapy" />
        <label class="form-check-label" for="care_level_7">Psychotherapy</label>
    </div>
</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <h1 class="py-4">Have you been hospitalized within<br> the last 60 days? </h1>
                            <div class="col-lg-4">
                                <div class="field">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="past_hospitalized" id="past_hospitalized_yes" value="Yes" onchange="valueChanged(true)" />
                                                <label class="form-check-label" for="past_hospitalized_yes">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="past_hospitalized" id="past_hospitalized_mo" value="No" onchange="valueChanged(false)" />
                                                <label class="form-check-label" for="past_hospitalized_mo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 answer-show">
                                    <div class="field">
                                        <input type="text" placeholder="Which Hospital*" name="hos_name" />
                                    </div>
                                </div>
                                <div class="col-lg-6 answer-show">
                                    <div class="field">
                                        <input type="text" placeholder="Date of discharge*" name="hos_dod" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="tab">
    <h1 class="py-4">Insurance information </h1>
    <h3 class="sep-class-form">Policy Holder Name</h3>
    <div class="row">
        <div class="col-lg-6">
            <div class="field">
                <input type="text" placeholder="First Name*" name="insurance_policy_fname" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="field">
                <input type="text" placeholder="Last Name*" name="insurance_policy_lname" />
            </div>
        </div>
    </div>
    <h3 class="sep-class-form">Policy Holder DOB</h3>
    <div class="row">
        <div class="col-lg-4">
            <div class="field">
                <input type="text" placeholder="Day*" name="insurance_policy_day" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="field">
                <input type="text" placeholder="Month*" name="insurance_policy_month" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="field">
                <input type="text" placeholder="Year*" name="insurance_policy_year" />
            </div>
        </div>
    </div>
</div> -->
                        <div class="tab">
                            <h1 class="py-4">Scan Insurance Card </h1>
                            <div class="field mb-4 index-file-border">
                                <label for="file1">Front of Insurance Card</label>
                                <input type="file" name="file1" id="file1" />
                                <h3 class="sep-class-form-formates">PNG and JPG Formats Allowed.</h3>
                            </div>
                            <div class="field mb-4 index-file-border">
                                <label for="file2">Back of Insurance Card</label>
                                <input type="file" name="file2" id="file2" />
                                <h3 class="sep-class-form-formates">PNG and JPG Formats Allowed.</h3>
                            </div>
                        </div>
                        <div class="tab last-step-check">
                            <h1 class="py-4">Documents for Signature </h1>
                            <div class="row">
                                <div class="col-lg-12 terms-field">
                                    <div class="const-ploicy check-box-container">
                                        <label class="form-check-label" for="consent">Healthcare Rights</label>
                                        <input type="checkbox" disabled class="const-class" name="consent" id="consent" disabled />
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 terms-field">
                                    <div class="assignment-ploicy check-box-container">
                                        <label class="form-check-label" for="assignment">Consent for Services using Telehealth</label>
                                        <input type="checkbox" class="assignment-class" name="assignment" id="assignment" disabled />
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 terms-field">
                                    <div class="financial-policy check-box-container">
                                        <label class="form-check-label" for="financial">Consent for treatment</label>
                                        <input type="checkbox" class="financial-class" name="financial" id="financial" disabled />
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 terms-field">
                                    <div class="card-ploicy check-box-container">
                                        <label class="form-check-label" for="card_ploicy">Insurance Agreement</label>
                                        <input type="checkbox" class="card-class" name="card" id="card_ploicy" disabled />
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 terms-field">
                                    <div class="hipa-ploicy check-box-container">
                                        <label class="form-check-label" for="hipa">Cancellation Policy</label>
                                        <input type="checkbox" class="hipa-class" name="hipa" id="hipa" disabled />
                                        <span class="checkmark"></span>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12 terms-field">
									<div class="office-ploicy check-box-container">
										<label class="form-check-label" for="office">Consent for Release of Information</label>
										<input type="radio" class="office-class" name="office" id="office" disabled />
										<span class="checkmark"></span>
									</div>
								</div> -->
                            </div>

                            <div class="col-lg-12 terms-field">
                                <br />
                                <p><small>I acknowledge I have read and understood the content of the forms.</small></p>
                                <h3 class="d-none mess-alert">Signature Save</h3>
                                <canvas id="colors_sketch" name="canvas3" class="canvas-css" width="500" height="200"></canvas>
                                <br />
                                <br />
                                <input type="button" id="myClearButton" value="Clear">
                                <input type="button" id="btnSave" value="Confirm Signature" />
                                <hr />
                                <!-- <img id= "imgCapture" name="file3" alt = "" style = "display:none;border:1px solid #ccc" /> -->
                                <input type="hidden" name="file3" id="imgCapture">
                            </div>
                        </div>
                        <div class="msg d-none">
                            <div class="alert alert-dark" role="alert"></div>
                        </div>
                    </div>
                    <div class="actions d-flex justify-content-end pt-3">
                        <button type="button" class="previous">Back</button>
                        <button type="button" class="next">Next</button>
                        <button type="button" class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Financial Policy -->
        <div class="row financial-policy_show py-5">
            <h1>Consent for treatment </h1>
            <div class="modal-conetent">
                <p>Thank you for choosing LGTC Group. We want you to know what to expect as you participate in treatment at our clinics. Our outpatient clinic offers comprehensive mental health services that include pharmacological and therapeutic interventions. We also offer Intensive Outpatient Program (IOP), Partial Hospitalization Program (PHP) and Transcranial Magnetic Stimulation (TMS).</p>
                <p>Your provider may prescribe medication for the treatment of your condition. This is something that you and your provider will discuss and decide together. For treatment to be effective, medications must be taken as prescribed. With any medication, there are always risks of side effects that you and your provider will discuss. Results cannot be guaranteed for everyone, however with patients in continued care, excellent results are often achieved.</p>
                <p>Psychotherapy is integrated into all mental health services at LGTC Group. Most likely, your treatment will involve discussion of personal issues. At times these may feel somewhat uncomfortable to discuss. Therapeutic relationships take time to develop just like any other relationship. You may be evaluated and / or treated by multiple providers. We may also collaborate with your primary care provider. Often, it is important to see your provider several times before a treatment plan could be developed and adopted.</p>
                <p>All of your treatment at our clinics is kept confidential. No information will be released without your written consent, unless your clinician feels you are a danger to yourself or others. Releasing information to any agency or individual will require a signed release of information.</p>
                <p>It is very important to understand that our clinics may not have the appropriate level of care required for your condition. A decision to render care is made by a licensed clinician at his/her professional discretion. If the level of care offered at our clinic is inadequate to effectively treat your condition, a provider will discuss your options with you.</p>
            </div>
            <div class="col-lg-12 d-flex justify-content-between pt-5">
                <label class="check-box-container">I Agree and Accept
                    <input type="checkbox" class="fin_pol_check"> <span class="checkmark"></span> </label>
                <button type="button" class="financial-close">CLOSE</button>
            </div>
        </div>
        <!-- Assignment of Benefits -->
        <div class="row assignment-policy-show py-5">
            <h1>Consent for Services using Telehealth</h1>
            <div class="modal-conetent">
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
            <div class="col-lg-12 d-flex justify-content-between pt-5">
                <label class="check-box-container">I Agree and Accept
                    <input type="checkbox" class="assignment_pol_check"> <span class="checkmark"></span></label>
                <button type="button" class="assignment-close">CLOSE</button>
            </div>
        </div>
        <!-- Office Policies and Procedures -->
        <div class="row office-policy-show py-5">
            <h1>Consent for Release of Information</h1>
            <div class="modal-conetent">
                <p>At LGTC Group, we understand the importance of collaboration with other members in your treatment team. We therefore ask that you take a minute to provide us with their contact information.</p>
                <p>Only the patient who has consented for care (including minors 13 years of age and older can authorize for release of records. I understand that those records may contain information relating to psychiatric/mental health, HIV/AIDS, sexually transmitted diseases, and/or drug/alcohol abuse. I give my specific authorization for these records to be released. I understand that authorizing the disclosure of this health information is voluntary I do not need to sign this form in order to assure treatment or payment. I understand that I can cancel this authorization at any time by writing to LGTC Group, S. Bascom Ave., Suite 110, Campbell, CA 95008. I understand that once the information has been released according to the terms of this authorization that the information cannot be recalled. I understand that any disclosure of information carries with it the potential for further release or distribution by the recipient that may not be protected by federal confidentiality rules. I may cancel this authorization at any time, except to the extent that action has a read been taken. To revoke Authorization to Release Patient Health Information, I must do so in writing. Unless I cancel earlier, this authorization will expire when treatment with LGTC Group has ended or one year after date of last visit. Further, I understand that a copy of this document may be faxed or mailed to the below providers.</p>
                <p>Primary Care Provider, Psychiatrist, Psychotherapist</p>
            </div>
            <div class="col-lg-12 d-flex justify-content-between pt-5">
                <label class="check-box-container">I Agree and Accept
                    <input type="checkbox" class="office_pol_check"> <span class="checkmark"></span> </label>
                <button type="button" class="office-close">CLOSE</button>
            </div>
        </div>
        <div class="row const-policy-show py-5">
            <h1>Healthcare Rights</h1>
            <div class="modal-conetent">
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
            <div class="col-lg-12 d-flex justify-content-between pt-5">
                <label class="check-box-container">I Agree and Accept
                    <input type="checkbox" class="const_pol_check"> <span class="checkmark"></span> </label>
                <button type="button" class="const-close">CLOSE</button>
            </div>
        </div>
        <div class="row card-policy-show py-5">
            <h1>Insurance Agreement</h1>
            <div class="modal-conetent">
                <p>LGTC Group is a participating provider with most insurance plans. Each insurance plan has different benefits for you as well as different financial obligations. Not all insurance policies cover all services. It is ultimately your responsibility to check with your insurance company to determine covered benefits. You are financially responsible for any outstanding balance on your account.</p>
                <p>PLEASE REMEMBER: The agreement of the insurance carrier to pay for health care is a contract between you and the insurance company. Any questions or complaints regarding coverage should be directed to your insurance company.</p>
                <p>Confirmation of benefits does not guarantee coverage. Our office will bill the insurance company and invoice you for the difference.</p>
            </div>
            <div class="col-lg-12 d-flex justify-content-between pt-5">
                <label class="check-box-container">I Agree and Accept
                    <input type="checkbox" class="card_pol_check"> <span class="checkmark"></span> </label>
                <button type="button" class="card-close">CLOSE</button>
            </div>
        </div>
        <div class="row hipa-policy-show py-5">
            <h1>Cancellation Policy</h1>
            <div class="modal-conetent">
                <p>LGTC Group requires 2 business days’ notice before an appointment for cancellation. Business days are counted as Monday – Friday, 9.00 am to 6.00 pm, and do not include holidays.</p>
                <p>Cancellations received after this cut-off time will be considered late cancellations and will result in a late-cancellations fee of up to $150. Missed appointments are also counted as late cancellation and will result in a late-cancellations fee of up to $150.</p>
                <p>We send appointment reminder emails and text messages to help make sure that you never miss an appointment.</p>
            </div>
            <div class="col-lg-12 d-flex justify-content-between pt-5">
                <label class="check-box-container">I Agree and Accept
                    <input type="checkbox" class="hipa_pol_check"> <span class="checkmark"></span> </label>
                <button type="button" class="hipa-close">CLOSE</button>
            </div>
        </div>
    </div>
</section>