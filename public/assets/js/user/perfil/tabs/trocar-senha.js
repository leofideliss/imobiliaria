function sendEmail(e) {
    const urlBase = window.location.protocol + "//" + window.location.host;
    let email = $("#email_customer").val()
    $.ajax({
        url: `${urlBase}/sendForgotPassword`,
        type: 'post',
        data: {
            "email": email,
            "_token": $("input[name=csrf_token]").val()

        },
        beforeSend: function (d) {
            $("#btn_send_email_forgot").prop("disabled", true)
        },
        success: function (d) {
            let data = d
            Toastify({
                text: data.message,
                className: "success",
                style: {
                    background: "green",
                }
            }).showToast();
        },
        error: function (d) {
            console.log('error', d)

            $("#btn_send_email_forgot").prop("disabled", false)


        }
    })
}

let form = document.querySelector("#form_user_new_password")
let campos = document.querySelectorAll(".required")
let spans = document.querySelectorAll(".invalid-feedback-custom")
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

function setError(index) {
    $(form).addClass('invalid-form')
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index) {
    $(form).removeClass('invalid-form')
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

function currentPasswordValidate() {
    if (campos[0].value.length < 8) {
        setError(0);
    } else {
        removeError(0);
    }
}
function mainPasswordValidate() {
    if (campos[1].value.length < 8) {
        setError(1);
    } else {
        removeError(1);
        comparePassword();
    }
}

function comparePassword() {
    if (campos[1].value == campos[2].value && campos[2].value.length >= 8) {
        removeError(2);
    } else {
        setError(2);
    }
}