"use strict";

// Class definition
var KTMarca = function () {
    // Elements
    var form;
    var closeButton
    var submitButton

    const urlBase = window.location.protocol + "//" + window.location.host;

    // Handle form
    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

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
            //variables
            let dataSerialized = $(form).serializeArray();
            let data = SerializedDataToJson(dataSerialized);
            var formData = new FormData();

            let image = $('#imagem_marca')[0];
            formData.append('image', image.files[0]);
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
                url: `${urlBase}/settings/marcaDagua`,
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



        });
    }

    var cancelForm = function () {
        closeButton.addEventListener('click', function (e) {
            e.preventDefault()
            window.history.go(-1)
        })
    }

    var previewImg = function () {

        if ($("#image_data").val() != "") {
            $('#previewImg').attr('src', `${urlBase}/marca_dagua/${$("#image_data").val()}`)
            $("#previewImg").show()

        }

        $("#imagem_marca")[0].addEventListener("change", function (e) {

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

    // Public functions
    return {
        // Initialization
        init: function () {

            form = document.querySelector('#kt_settings_imagens_form');
            if (!form)
                return
            closeButton = document.querySelector('[data-kt_settings_marca-type="cancel"]')
            submitButton = document.querySelector('[data-kt_settings_marca-type="submit"]')
            handleForm()
            cancelForm()
            previewImg()

        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTMarca.init();
});
