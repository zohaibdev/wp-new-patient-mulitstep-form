let bind_data = [];

(function ($) {
    $.fn.multiStepForm = function (args) {

        function GetAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        if (args === null || typeof args !== 'object' || $.isArray(args))
            throw " : Called with Invalid argument";
        var form = this;
        var tabs = form.find('.tab');
        var steps = form.find('.step');
        steps.each(function (i, e) {
            $(e).on('click', function (ev) { });
        });
        form.navigateTo = function (i) {
            /*index*/
            /*Mark the current section with the class 'current'*/
            tabs.removeClass('current').eq(i).addClass('current');
            // Show only the navigation buttons that make sense for the current section:
            form.find('.previous').toggle(i > 0);
            atTheEnd = i >= tabs.length - 1;
            form.find('.next').toggle(!atTheEnd);
            // console.log('atTheEnd='+atTheEnd);
            form.find('.submit').toggle(atTheEnd);
            fixStepIndicator(curIndex());
            return form;
        }

        function curIndex() {
            /*Return the current index by looking at which section has the class 'current'*/
            return tabs.index(tabs.filter('.current'));
        }

        function fixStepIndicator(n) {
            steps.each(function (i, e) {
                //i == n ? $(e).addClass('active').before('span').addClass('checked') : $(e).removeClass('active')
                if (i == n) {
                    var before_step = n - 1;
                    $('.stepwizard-step span').eq(before_step).addClass('checked')
                    $(e).addClass('active').removeClass('checked')
                } else {
                    $(e).removeClass('active')
                    $('.stepwizard-step span').last().removeClass('checked')

                }
            });
        }
        /* Previous button is easy, just go back */
        form.find('.previous').click(function () {
            //form.navigateTo(curIndex() - 1);
            var dob = $('input[name=dob]').val().trim();
            if (curIndex() === 2 && GetAge(dob) > 17) {
                form.navigateTo(curIndex() - 1);
                form.navigateTo(curIndex() - 1);
            } else {
                form.navigateTo(curIndex() - 1);
            }
        });

        /* Next button goes forward iff current block validates */
        form.find('.next').click(function () {
            if ('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)) {
                if (!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)) {
                    form.validate(args.validations);
                    if (form.valid() == true) {


                        var dob = $('input[name=dob]').val().trim();
                        if (curIndex() === 0 && GetAge(dob) > 17) {
                            form.navigateTo(curIndex() + 1);
                            form.navigateTo(curIndex() + 1);
                        } else {
                            form.navigateTo(curIndex() + 1);
                        }
                        return true;
                    }
                    return false;
                }
            }
            console.log(curIndex())

            var dob = $('input[name=dob]').val().trim();
            if (curIndex() === 0 && GetAge(dob) > 17) {
                form.navigateTo(curIndex() + 1);
                form.navigateTo(curIndex() + 1);
            } else {
                form.navigateTo(curIndex() + 1);
            }
        });

        const get_form_data = () => {
            var Data = new FormData();
            var feilds = $('#patient-form :input').serializeArray();
            $.each(feilds, function (index, value) {
                if (value.name == 'care_levels') {
                    var care_levels = $('input[name="care_levels"]:checked')
                    var care_levels_value = '';
                    $.each(care_levels, function (i, v) {
                        care_levels_value += $(this).val() + ' / '
                    });
                    care_levels_value = care_levels_value.substring(0, care_levels_value.length - 2)
                    Data.append(value.name, care_levels_value);
                } else {
                    Data.append(value.name, value.value);
                }
            });

            Data.append("file_1", $('#file1')[0].files[0]);
            Data.append("file_2", $('#file2')[0].files[0]);
            return Data;
        }

        form.find('.submit').on('click', function (e) {
            if (typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
                args.beforeSubmit(form, this);
            var last_step_check = $('.last-step-check input[type=checkbox]')
            var error = false;
            $.each(last_step_check, function (indexInArray, valueOfElement) {
                if ($(this).is(":checked") == false) {
                    error = true;
                }
            })
            //if ($('#imgCapture[document_type]').val().length != 0){}


            if (!error) {
                $('.loading_screen').removeClass('d-none')
                $('.msg').addClass('d-none')

                $.ajax({
                    type: "post",
                    url: $('#patient-form').data('action') + '?action=patient_submit',
                    data: get_form_data(),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    async: false,
                    success: function (response) {
                        if (response.success) {
                            $('.loading_screen').addClass('d-none')
                            window.location = response.msg;
                        } else {
                            var n_msg = '<div class="alert alert-dark" role="alert">' + response.msg + '</div>'
                            $('.msg').html(n_msg).removeClass('d-none')
                        }
                    }
                });
            } else {
                var n_msg = '<div class="alert alert-dark" role="alert">Please firstly accept all terms and conditions</div>'
                $('.msg').html(n_msg).removeClass('d-none')
            }

            return form;
        });
        /*By default navigate to the tab 0, if it is being set using defaultStep property*/
        typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

        form.noValidate = function () {

        }
        return form;
    };

    $(document).ready(function () {
        // $.validator.addMethod('date', function(value, element, param) {
        //    return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
        // }, 'Please enter a valid date!');
        $.validator.addMethod('month', function (value, element, param) {
            return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
        }, 'Please enter a valid month!');
        $.validator.addMethod('year', function (value, element, param) {
            return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
        }, 'Please enter a valid year not less than 1900!');
        $.validator.addMethod('username', function (value, element, param) {
            var nameRegex = /^[a-zA-Z0-9]+$/;
            return value.match(nameRegex);
        }, 'Only a-z, A-Z, 0-9 characters are allowed');

        var val = {
            // Specify validation rules
            rules: {
                fname: "required",
                lname: {
                    required: true,
                },
                fname: "required",
                lname: {
                    required: true,
                },
                street: {
                    required: true,
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                dob: {
                    required: true,
                },
                zipcode: {
                    required: true,
                    digits: true
                },
                email: {
                    required: true,
                    email: true
                },
                ec_fname: "required",
                ec_email: {
                    required: true,
                    email: true
                },
                ec_lname: {
                    required: true,
                },
                ec_relation: {
                    required: true,
                },
                parent_fname: "required",
                parent_lname: {
                    required: true,
                },
                parent_phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 16,
                    digits: true
                },
                parent_email: {
                    required: true,
                },
                relation: {
                    required: true,
                },
                care_levels: {
                    required: true,
                },
                past_hospitalized: {
                    required: true,
                },
                hos_dod: {
                    required: true,
                },
                hos_name: {
                    required: true,
                },
                insurance_policy_fname: {
                    required: true,
                },
                insurance_policy_lname: {
                    required: true,
                },
                insurance_policy_day: {
                    date: true,
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                insurance_policy_month: {
                    required: true,
                    month: true,
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                insurance_policy_year: {
                    year: true,
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    digits: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 16,
                    digits: true
                },
                file1: {
                    required: true,
                    extension: "jpg|png|jpeg",
                    //filesize: 1048576,
                    // _filesize: 1,
                },
                file2: {
                    required: true,
                    extension: "jpg|png|jpeg",
                    //filesize: 1048576,
                    // _filesize: 1,
                },

                date: {
                    date: true,
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                month: {
                    month: true,
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                year: {
                    year: true,
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                    digits: true
                },
                username: {
                    username: true,
                    required: true,
                    minlength: 4,
                    maxlength: 16,
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16,
                },
                textuse: {
                    required: true,
                    minlength: 8,
                    maxlength: 200,
                },

                gender: {
                    required: true
                },
                consent: {
                    required: true
                },
                office: {
                    required: true
                },
                assignment: {
                    required: true
                },
                financial: {
                    required: true
                },
                card: {
                    required: true
                },

                hipa: {
                    required: true
                },
            },
            // Specify validation error messages
            messages: {
                fname: "First name is required",
                lname: {
                    required: "Last Name is required",
                },
                street: {
                    required: "Street is required",
                },
                city: {
                    required: "City is required",
                },
                state: {
                    required: "State is required",
                },
                zipcode: {
                    required: "Zipcode is requied",
                    digits: "Only numbers are allowed in this field"
                },
                email: {
                    required: "Email is required",
                    email: "Please enter a valid e-mail",
                },
                phone: {
                    required: "Phone number is requied",
                    minlength: "Please enter 10 digit mobile number",
                    maxlength: "Please enter 16 digit mobile number",
                    digits: "Only numbers are allowed in this field"
                },
                consent: {
                    required: "Requied",
                },
                parent_phone: {
                    required: "Phone number is requied",
                    minlength: "Please enter 10 digit mobile number",
                    maxlength: "Please enter 16 digit mobile number",
                    digits: "Only numbers are allowed in this field"
                },
                office: {
                    required: "Requied",
                },
                assignment: {
                    required: "Required",
                },
                financial: {
                    required: "Requied",
                },
                file1: {
                    required: "Requied",
                },
                file2: {
                    required: "Requied",
                },
                textuse: {
                    required: "Requied",
                },
                card: {
                    required: "Requied",
                },
                hipa: {
                    required: "Requied",
                },
                date: {
                    required: "Date is required",
                    minlength: "Date should be a 2 digit number, e.i., 01 or 20",
                    maxlength: "Date should be a 2 digit number, e.i., 01 or 20",
                    digits: "Date should be a number"
                },
                month: {
                    required: "Month is required",
                    minlength: "Month should be a 2 digit number, e.i., 01 or 12",
                    maxlength: "Month should be a 2 digit number, e.i., 01 or 12",
                    digits: "Only numbers are allowed in this field"
                },
                year: {
                    required: "Year is required",
                    minlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                    maxlength: "Year should be a 4 digit number, e.i., 2018 or 1990",
                    digits: "Only numbers are allowed in this field"
                },
                username: {
                    required: "Username is required",
                    minlength: "Username should be minimum 4 characters",
                    maxlength: "Username should be maximum 16 characters",
                },
                password: {
                    required: "Password is required",
                    minlength: "Password should be minimum 8 characters",
                    maxlength: "Password should be maximum 16 characters",
                }
            }
        }
        $("#patient-form").multiStepForm({
            // defaultStep:0,
            beforeSubmit: function (form, submit) {
                console.log("called before submiting the form");
                console.log(form);
                console.log(submit);
            },
            validations: val,
        }).navigateTo(0);
    });
    //jQuery.validator.addMethod("_filesize", function (value, element) {
    //      var size = parseFloat($(element)[0].files[0].size / (1024 * 1024)).toFixed(2);
    //      if (size < 1) {
    //           return true
    //      } else {
    //          return false
    //      }
    // }, "Maximum allowed file size is 1MB");
    var chk1 = $(".fin_pol_check");
    var chk2 = $(".financial-class");
    chk1.on('change', function () {
        chk2.prop('checked', this.checked);
    });
    $(document).ready(function () {
        $(".financial-policy").click(function () {
            $(".financial-policy_show").show();
            $(".hide-for-form").hide();
        });
        $(".financial-close").click(function () {
            $(".hide-for-form").show();
            $(".financial-policy_show").hide();
        });
    });

    var chk3 = $(".assignment_pol_check");
    var chk4 = $(".assignment-class");
    chk3.on('change', function () {
        chk4.prop('checked', this.checked);
    });
    $(document).ready(function () {
        $(".assignment-ploicy").click(function () {
            $(".assignment-policy-show").show();
            $(".hide-for-form").hide();
        });
        $(".assignment-close").click(function () {
            $(".hide-for-form").show();
            $(".assignment-policy-show").hide();
        });
    });

    var chk5 = $(".office_pol_check");
    var chk6 = $(".office-class");
    chk5.on('change', function () {
        chk6.prop('checked', this.checked);
    });
    $(document).ready(function () {
        $(".office-ploicy").click(function () {
            $(".office-policy-show").show();
            $(".hide-for-form").hide();
        });
        $(".office-close").click(function () {
            $(".hide-for-form").show();
            $(".office-policy-show").hide();
        });
    });

    var chk7 = $(".const_pol_check");
    var chk8 = $(".const-class");
    chk7.on('change', function () {
        chk8.prop('checked', this.checked);
    });
    $(document).ready(function () {
        $(".const-ploicy").click(function () {
            $(".const-policy-show").show();
            $(".hide-for-form").hide();
        });
        $(".const-close").click(function () {
            $(".hide-for-form").show();
            $(".const-policy-show").hide();
        });
    });

    var chk11 = $(".card_pol_check");
    var chk12 = $(".card-class");
    chk11.on('change', function () {
        chk12.prop('checked', this.checked);
    });
    $(document).ready(function () {
        $(".card-ploicy").click(function () {
            $(".card-policy-show").show();
            $(".hide-for-form").hide();
        });
        $(".card-close").click(function () {
            $(".hide-for-form").show();
            $(".card-policy-show").hide();
        });
    });


    var chk9 = $(".hipa_pol_check");
    var chk10 = $(".hipa-class");
    chk9.on('change', function () {
        chk10.prop('checked', this.checked);
    });
    $(document).ready(function () {
        $(".hipa-ploicy").click(function () {
            $(".hipa-policy-show").show();
            $(".hide-for-form").hide();
        });
        $(".hipa-close").click(function () {
            $(".hide-for-form").show();
            $(".hipa-policy-show").hide();
        });
    });

    $(function () {
        $('#colors_sketch').sketch();
        $(".tools a").eq(0).attr("style", "color:#000");
        $(".tools a").click(function () {
            $(".tools a").removeAttr("style");
            $(this).attr("style", "color:#000");
        });
        $("#btnSave").bind("click", function () {
            var base64 = $('#colors_sketch')[0].toDataURL();
            $("#imgCapture").attr("value", base64);
            $("#imgCapture").show();
            $(".mess-alert").removeClass("d-none")

        });
        $("#myClearButton").click(function () {
            var canvas = document.getElementById('colors_sketch');
            canvas.getContext('2d').clearRect(0, 0, 1920, 2000);
            $('#colors_sketch').sketch('actions', []);
            $(".mess-alert").addClass("d-none")
        });
    });

})(jQuery);

function valueChanged(check) {
    if (check == true) {
        jQuery(".answer-show").show();
    } else {
        jQuery(".answer-show").hide();
    }
}
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};