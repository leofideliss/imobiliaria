"use strict";

// Class definition
var KTGeneralSettings = function () {
    // Elements
    var form;
    var closeButton
    var submitButton
    var validator = []

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'whatsapp': {
                        validators: {
                            notEmpty: {
                                message: 'Whatsapp é obrigatório'
                            }
                        }
                    },
                    'description_geral': {
                        validators: {
                            notEmpty: {
                                message: 'Descrição é obrigatório'
                            }
                        }
                    },
                    // 'telefonefixo': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Telefone é obrigatório'
                    //         }
                    //     }
                    // },
                    // 'email': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Email é obrigatório'
                    //         },
                    //         emailAddress: {
                    //             message: 'Email inválido',
                    //         }

                    //     }
                    // },
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
            //variables
            let dataSerialized = $(form).serializeArray();
            let data = SerializedDataToJson(dataSerialized);

            var formData = new FormData();

            formData.append('data', JSON.stringify(data));
            formData.append('description_html',$("#description_html").val() );
          

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
                        }
                    });

                    $.ajax({
                        url: `${urlBase}/settings/general`,
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (e) {
                            console.log('success', e)
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;

                        },
                        error: function (e) {
                            console.log('error', e)

                        },
                    })

                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Algum campo não está preenchido , confira novamente",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });
    }

    var cancelForm = function () {
        closeButton.addEventListener('click', function (e) {
            e.preventDefault()
            window.history.go(-1)
        })
    }

    // Public functions
    return {
        // Initialization
        init: function () {

            form = document.querySelector('#kt_settings_general_form');
            if (!form)
                return
            closeButton = document.querySelector('[data-kt_settings_general-type="cancel"]')
            submitButton = document.querySelector('[data-kt_settings_general-type="submit"]')
            handleForm()
            cancelForm()
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTGeneralSettings.init();
});
