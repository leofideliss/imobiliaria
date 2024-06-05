function showToastErrorMessageJSON(json) {
    let toShowMessage = json.message;
    if (typeof json.errors !== 'undefined') {
        toShowMessage += exctractErrorsMessages(json.errors);
    }
    toastr.error(toShowMessage);
}

function showToastSuccessMessageJSON(json) {
    let toShowMessage = json.message;
    toastr.success(toShowMessage);
}

function showToastInfoMessageJSON(json) {
    let toShowMessage = json.message;
    toastr.info(toShowMessage);
}

function exctractErrorsMessages(errors) {
    let message = "";
    for (let i in errors) {
        for (let j in errors[i]) {
            message += "<br> -" + errors[i][j];
        }
    }
    return message;
}

function SerializedDataToJson(form) {

    var formobj = {};
    $.each(form,
        function (i, v) {
            if (typeof formobj[v.name] === 'undefined')
                formobj[v.name] = v.value;
            else {
                if (typeof formobj[v.name] === 'string') {

                    formobj[v.name] = [formobj[v.name], v.value];
                } else {

                    formobj[v.name].push(v.value);
         

                }

            }
        });

    return formobj;
}

function getYoutubeId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}


function validationForm(){
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
}

