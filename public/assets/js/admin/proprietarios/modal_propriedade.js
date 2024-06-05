"use strict";

// Class definition
var KTModalAddProprietarioPropriedade = function () {
    // Elements
    var form;
    var submitButton;
    var closeButton
    var validator;
    var divParent
    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'nome': {
                        validators: {
                            notEmpty: {
                                message: 'Nome Completo do dono do imóvel é obrigatório'
                            }
                        }
                    },
                    'telefone': {
                        validators: {
                            notEmpty: {
                                message: 'telefone do dono do imóvel é obrigatório'
                            },
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'telefone do dono do imóvel é obrigatório'
                            },
                            emailAddress: {
                                message: 'Email inválido',
                            },
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


            let dataSerialized = $(form).serializeArray();
            let data = SerializedDataToJson(dataSerialized);



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

                            data,
                            "_token": $("input[name=csrf_token]").val(),
                            prop_id: $("input[name='prop_id']").val()
                        },
                        dataType: 'json',
                        success: function (d) {
                            showToastSuccessMessageJSON(d);
                            $(form)[0].reset()

                            $('#kt_proprietarios_list_table').DataTable().ajax.reload();

                            let select = $("#name_vendor")
                            let option = $('<option></option>');
                            option.attr('value', d.proprietario.id);
                            option.text(d.proprietario.nome);
                            select.append(option);
                            proprietarios.push(d.proprietario)
                        },
                        error: function (d) {
                            let data = d.responseJSON;
                            showToastErrorMessageJSON(data);
                        },
                        complete: function (e) {
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                            $("input[name='prop_id']").val('')
                            $('#kt_modal_new_proprietario').modal('hide')


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
            $('#kt_modal_new_proprietario').modal('hide')
        })
    }



    // Public functions
    return {
        // Initialization
        init: function () {
            divParent = document.querySelector('#add_proprietario_modal');
            if (!divParent)
                return
            form = document.querySelector('#formCreateProprietario');
            if (!form)
                return
            submitButton = document.querySelector('#kt_modal_new_proprietario_submit');
            closeButton = document.querySelector('#kt_modal_new_proprietario_cancel');

            handleForm();
            closeForm();

            $("#openModalProprietario")[0].addEventListener("click", function (e) {
                e.preventDefault()
                $("#kt_modal_new_proprietario").modal("show")

            })



        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalAddProprietarioPropriedade.init();
});
