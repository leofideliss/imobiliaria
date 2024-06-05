"use strict";

// Class definition
var KTCommisions = function () {
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
                    'comissao_corretor': {
                        validators: {
                            notEmpty: {
                                message: 'Comissão do corretor obrigatório'
                            }
                        }
                    },
                    'comissao_fotografo': {
                        validators: {
                            notEmpty: {
                                message: 'Comissão do fotografo obrigatório'
                            }
                        }
                    },
                    'comissao_avaliador': {
                        validators: {
                            notEmpty: {
                                message: 'Comissão do avaliador obrigatório'
                            }
                        }
                    },
                    'comissao_indicar_imovel': {
                        validators: {
                            notEmpty: {
                                message: 'Comissão do indicador obrigatório'
                            }
                        }
                    },
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


            data.comissao_corretor = data.comissao_corretor.replace(" %", "")
            data.comissao_corretor = data.comissao_corretor.replaceAll("_", "")
            data.comissao_corretor = data.comissao_corretor.replaceAll(".", "")
            data.comissao_corretor = data.comissao_corretor.replace(",", ".")

            data.comissao_fotografo = data.comissao_fotografo.replace("R$", "")
            data.comissao_fotografo = data.comissao_fotografo.replaceAll(".", "")
            data.comissao_fotografo = data.comissao_fotografo.replace(",", ".")
            
            data.comissao_avaliador = data.comissao_avaliador.replace("R$", "")
            data.comissao_avaliador = data.comissao_avaliador.replaceAll(".", "")
            data.comissao_avaliador = data.comissao_avaliador.replace(",", ".")

            data.comissao_indicar_imovel = data.comissao_indicar_imovel.replace("R$", "")
            data.comissao_indicar_imovel = data.comissao_indicar_imovel.replaceAll(".", "")
            data.comissao_indicar_imovel = data.comissao_indicar_imovel.replace(",", ".")

            formData.append('data', JSON.stringify(data));

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
                        url: `${urlBase}/settings/commission`,
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

            form = document.querySelector('#kt_settings_comissoes_store');
            if (!form)
                return
            closeButton = document.querySelector('[data-kt_settings_comissoes-type="cancel"]')
            submitButton = document.querySelector('[data-kt_settings_comissoes-type="submit"]')
            handleForm()
            cancelForm()
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCommisions.init();
});
