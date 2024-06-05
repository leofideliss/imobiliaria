"use strict";

// Class definition
var KTAddPost = function () {
    // Elements
    var form;
    var modal
    var closeButton
    var submitButton
    var validator = []
    var myDropzone

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name_post': {
                        validators: {
                            notEmpty: {
                                message: 'Título é obrigatório'
                            }
                        }
                    },
                    // 'imagem_post': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Imagem é obrigatório'
                    //         }
                    //     }
                    // },
                    // 'textarea_post': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Texto é obrigatório'
                    //         }
                    //     }
                    // }
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

            if (PostEditor.getData() == '') {
                Swal.fire({
                    text: "Contéudo do post está vazio",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                return
            }
            if ($("#previewImg").attr('src') == '' || $("#previewImg").attr('src') == undefined) {
                Swal.fire({
                    text: "Imagem está vazio",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
                return
            }

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    var formData = new FormData();
                    let image = $('#imagem_post')[0];

                    formData.append('image', image.files[0]);
                    formData.append('title', $("#name_post").val())
                    formData.append('post_id', $("#post_id").val())
                    formData.append('content_text', PostEditor.getData())
                    formData.append('only_text', $(PostEditor.getData()).text())
                    formData.append('type_post', $('#tipo_post').find(":selected").val())



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
                        url: `${urlBase}/posts/addPost`,
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (e) {

                            submitButton.removeAttribute('data-kt-indicator');
                            submitButton.disabled = false;
                            $('#kt_posts_table').DataTable().ajax.reload();

                            $(modal).modal('hide')
                            $('#imagem_post').val('')
                            $("#name_post").val('')
                            PostEditor.setData('')
                            $("#previewImg").hide()

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
            $('#imagem_post').val('')
            $("#name_post").val('')
            PostEditor.setData('')
            $(modal).modal('hide')
            $("#previewImg").hide()
            $("#post_id").val('')
        })
    }

    var previewImg = function () {

        $("#imagem_post")[0].addEventListener("change", function (e) {

            const reader = new FileReader()
            reader.addEventListener("load", function () {
                $('#previewImg').attr('src', reader.result)
                $("#previewImg").show()
                $("#image_data").val(reader.result)
            })

            reader.readAsDataURL(this.files[0])
            // e.target.value = ''
        });
    }

    var seedTypesPosts = function () {
        $.ajax({
            url: `${urlBase}/posts/getAllTypesPost`,
            type: "get",
            data: {
                "_token": $("input[name=csrf_token]").val()
            },
            dataType: 'json',
            success: function (d) {
                let selectType = $("#tipo_post");
                d.types.forEach(element => {
                    selectType.append($("<option />").val(element.id).text(element.name));
                });
            },
            error: function (d) {
                console.log(d);
            }
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {

            form = document.querySelector('#kt_modal_new_post_form');

            if (!form)
                return
            modal = document.querySelector('#kt_modal_new_post');
            closeButton = document.querySelector('#kt_modal_new_post_cancel')
            submitButton = document.querySelector('#kt_modal_new_post_submit')
            handleForm()
            cancelForm()
            previewImg()
            seedTypesPosts()


            $(modal).on('hide.bs.modal', function (event) {
                $("#post_id").val('')
            })

            $('[data-target="#kt_modal_new_post"]')[0].addEventListener("click",function(e){
                $('#kt_modal_new_post').modal('show')
            })
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAddPost.init();
});
