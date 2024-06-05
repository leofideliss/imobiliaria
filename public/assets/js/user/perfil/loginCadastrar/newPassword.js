let form = $("#form_customer_new_password")
let campos = document.querySelectorAll(".required")
let spans = document.querySelectorAll(".invalid-feedback-custom")
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;


function setError(index, wrongCredentials = false) {
    $(form).addClass('invalid-form')
    if (wrongCredentials)
        spans[index].style.display = 'block';
    else {
        campos[index].style.border = '2px solid #e63636';
        spans[index].style.display = 'block';
    }
}

function removeError(index) {
    $(form).removeClass('invalid-form')
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

function mainPasswordValidate() {
    if (campos[0].value.length < 8) {
        setError(0);
    } else {
        removeError(0);
        comparePassword();
    }
}

function comparePassword() {
    if (campos[0].value == campos[1].value && campos[1].value.length >= 8) {
        removeError(1);
    } else {
        setError(1);
    }
}

function authenticate() {

    let submitButton = $("#submit_customer_new_password")

    submitButton[0].addEventListener('click', function (e) {
        e.preventDefault();

        if (!$(form).hasClass('invalid-form'))
            $.ajax({
                url: $(form).data("request"),
                type: "post",
                data: {
                    "token_id": $("input[name=token_sv]").val(),
                    "password": $("input[name=nova_senha]").val(),
                    "repeat_password": $("input[name=repita_novaSenha]").val(),
                    "_token": $("input[name=csrf_token]").val()
                },
                dataType: 'json',
                success: function (d) {
                    let data = d
                    Toastify({
                        text: data.message,
                        className: "success",
                        style: {
                            background: "green",
                        }
                    }).showToast();

                    setTimeout(function () {
                        location.href = d.redirect;
                    }, 2000);


                },
                error: function (d) {
                    let data = d.responseJSON;
                    Toastify({
                        text: data.message,
                        className: "error",
                        style: {
                            background: "red",
                        }
                    }).showToast();
                    console.log(data)

                }
            });
    })

}

$(document).ready(
    authenticate(),
)