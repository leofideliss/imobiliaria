"use strict";

// Class definition
var KTModalAddEMployee = function () {
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
                    'name_funcionario': {
                        validators: {
                            notEmpty: {
                                message: 'Nome é obrigatório'
                            }
                        }
                    },
                    'CPF_funcionario': {
                        validators: {
                            notEmpty: {
                                message: 'CPF é obrigatório'
                            },
                            id: {
                                enabled: true,
                                country: 'BR',
                                message: 'CPF inválido',
                            }
                        }
                    },
                    'email_funcionario': {
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
                    'phone_funcionario': {
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
                    'cargo_funcionario': {
                        validators: {
                            notEmpty: {
                                message: 'Cargo é obrigatório'
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
                    console.log($('input[name=cargo_funcionario]').find(":selected").val())
                    $.ajax({
                        url: $(form).data("request"),
                        type: "post",
                        data: {
                            'user_id': $("input[name=user_id]").val(),
                            "name": $("input[name=name_funcionario]").val(),
                            "CPF": $("input[name=CPF_funcionario]").val(),
                            "email": $("input[name=email_funcionario]").val(),
                            "phone": $("input[name=phone_funcionario]").val(),
                            "status": $('#status').val(),
                            "password": $("input[name=password]").val(),
                            "type": $('#cargo_funcionario').find(":selected").val(),
                            "_token": $("input[name=csrf_token]").val()
                        },
                        dataType: 'json',
                        success: function (d) {
                            console.log(d);
                            showToastSuccessMessageJSON(d);
                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;

                            $('#kt_modal_new_funcionario').modal('hide')
                            $('#kt_admin_table_employee').DataTable().ajax.reload();
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
                        text: "Erro tente novamente",
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

    var closeForm = function () {
        closeButton.addEventListener('click', function (e) {
            e.preventDefault()
            $('#kt_modal_new_funcionario').modal('hide')
            $("input[name=user_id]").val('')
        })
    }

    var handleOpenModal = function () {
        $('#kt_modal_new_funcionario').on('show.bs.modal', function (event) {
            seedTypeEmployee();
        


            if ($(event.relatedTarget).attr('data-user-id') == undefined) {
                $('#modal_title_admin').text('Inserir Funcionário')
                $(submitButton).text('Cadastrar')
            }
            else {
                $('#modal_title_admin').text('Alterar Funcionário')
                $(submitButton).text('Alterar')
            }
            $("input[name=name_funcionario]").val('')
            $("input[name=CPF_funcionario]").val('')
            $("input[name=email_funcionario]").val('')
            $("input[name=phone_funcionario]").val('')
            $("input[name=cargo_funcionario]").val('recepcionista')
            $("input[name=password]").val('')
        })
    }

    var seedTypeEmployee = function () {
        $.ajax({
            url: `${urlBase}/user/listCargos`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let selectType = $("#cargo_funcionario");
                d.cargos.forEach(element => {
                    selectType.append($("<option />").val(element.id).text(element.name));
                });
            },
            error: function (d) {
                console.log(d);
            },
            complete: function (d) {
                let selected_cargo = $("#cargo_funcionario").attr('value')
                $("#cargo_funcionario").val(selected_cargo).change()
            }
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_modal_new_funcionario_form');
            if (!form)
                return
            submitButton = document.querySelector('#kt_modal_new_funcionario_submit');
            closeButton = document.querySelector('#kt_modal_new_funcionario_cancel');

            handleForm();
            handleOpenModal();
            closeForm();

            $('[data-target="#kt_modal_new_funcionario"]')[0].addEventListener("click",function(e){
                $('#kt_modal_new_funcionario').modal('show')
            })

            $('#kt_modal_new_funcionario').on('hidden.bs.modal', function (e) {
                let selectType = $("#cargo_funcionario");
                selectType.html("")
              })
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalAddEMployee.init();
});
