"use strict";

// Class definition
var KTModalAddAdmin = function () {
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
                    },
                    'CPF': {
                        validators: {
                            notEmpty: {
                                message: 'CPF é obrigatório'
                            },
                            id: {
                                enabled: true,
                                country: 'BR',
                                message: 'CPF inválido',
                            },
                        }
                    },
                    'email': {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'Email inválido',
                            },
                            notEmpty: {
                                message: 'Email é obrigatório'
                            }
                        }
                    },
                    'phone': {
                        validators: {
                            notEmpty: {
                                message: 'Telefone é obrigatório'
                            }
                        }
                    },
                    'status': {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Senha é obrigatória'
                            }
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'Confirmar a senha é obrigatório'
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
                            'user_id': $("input[name=user_id]").val(),
                            "name": $("input[name=name]").val(),
                            "CPF": $("input[name=CPF]").val(),
                            "email": $("input[name=email]").val(),
                            "phone": $("input[name=phone]").val(),
                            "status": $('#status').val(),
                            "password": $("input[name=password]").val(),
                            "_token": $("input[name=csrf_token]").val()
                        },
                        dataType: 'json',
                        success: function (d) {
                            showToastSuccessMessageJSON(d);
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;

                            $('#kt_modal_new_admin').modal('hide')
                            $('#kt_admin_table').DataTable().ajax.reload();
                            $("input[name=user_id]").val('')
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
            $('#kt_modal_new_admin').modal('hide')
            $("input[name=user_id]").val('')
        })
    }

    var handleOpenModal = function () {
        $('#kt_modal_new_admin').on('show.bs.modal', function (event) {
            if ($(event.relatedTarget).attr('data-user-id') == undefined) {
                $('#modal_title_admin').text('Inserir Administrador')
                $(submitButton).text('Cadastrar')
            }
            else {
                $('#modal_title_admin').text('Alterar Administrador')
                $(submitButton).text('Alterar')
            }
            $("input[name=name]").val('')
            $("input[name=CPF]").val('')
            $("input[name=email]").val('')
            $("input[name=phone]").val('')
            $("input[name=password]").val('')
        })
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_modal_new_admin_form');
            if (!form)
                return
            submitButton = document.querySelector('#kt_modal_new_admin_submit');
            closeButton = document.querySelector('#kt_modal_new_admin_cancel');

            handleForm();
            handleOpenModal();
            closeForm();


            $('[data-target="#kt_modal_new_admin"]')[0].addEventListener("click",function(e){
                $('#kt_modal_new_admin').modal('show')
            })
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalAddAdmin.init();
});
