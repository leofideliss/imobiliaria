"use strict";

// Class definition
var KTModalAddProp = function () {
    // Elements
    var form;
    var submitButton;
    var closeButton
    var validator;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Nome é obrigatório'
                            }
                        }
                    }

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
                }
            }
        );

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();
            console.log($(form).data("request"));

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    $.ajax({
                        url: $(form).data("request"),
                        type: "post",
                        data: {
                            "name": $("input[name=name]").val(),
                            "_token": $("input[name=csrf_token]").val()
                        },
                        dataType: 'json',
                        success: function (d) {
                            console.log(d);
                            showToastSuccessMessageJSON(d);
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                            $("input[name=name]").val('')

                            $('#kt_modal_new_property_type').modal('hide')
                            $('#kt_properties_table').DataTable().ajax.reload();


                        },
                        error: function (d) {
                            let data = d.responseJSON;
                            console.log(d);
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                            showToastErrorMessageJSON(data);
                        }
                    });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });
    }

    var closeForm = function () {
        closeButton.addEventListener('click', function (e) {
            e.preventDefault()
            $('#kt_modal_new_property_type').modal('hide')
        })
    }



    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_modal_new_property_form');
            if (!form)
                return
            submitButton = document.querySelector('#kt_modal_new_property_submit');
            closeButton = document.querySelector('#kt_modal_new_property_cancel');

            handleForm();
            closeForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalAddProp.init();
});
