let form = $("#form_customer_auth")
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

function emailValidate() {
    removeError(1)
    if (!emailRegex.test(campos[2].value)) {
        setError(2);
    } else {
        removeError(2);
    }
}

function emailValidateForgotPassword() {
    removeError(1)
    if (!emailRegex.test(campos[0].value)) {
        setError(0);
    } else {
        removeError(0);
    }
}

function mainPasswordValidate() {
    removeError(1)
    if (campos[3].value.length < 8) {
        setError(3);
    } else {
        removeError(3);
    }
}

function authenticate() {

    let submitButton = $("#submit_auth_customer")


    submitButton[0].addEventListener('click', function (e) {
        $(submitButton).prop("disabled", true)
        $(submitButton).text("Carregando...")
        e.preventDefault();
        $.ajax({
            url: $(form).data("request"),
            type: "post",
            data: {
                "email": $("input[name=email_login]").val(),
                "password": $("input[name=senha_login]").val(),
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
                if (data.invalid)
                    setError(1, true)
                $(submitButton).prop("disabled", false)
                $(submitButton).text("Entrar")

            }
        });
    })

}
function handleCredentialResponse(response) {
    const data = jwt_decode(response.credential)
    const urlBase = window.location.protocol + "//" + window.location.host;

    let btnSubmit = $('#submit_auth_customer')
    $(btnSubmit).text('Carregando...')
    $(btnSubmit).prop('disabled', true);

    $.ajax({
        url: `${urlBase}/authCustomerGoogle`,
        type: 'post',
        data: {
            "credentials": response.credential,
            "id": data.sub,
            "email": data.email,
            "name": data.name,
            "_token": $("input[name=csrf_token]").val()

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

            setTimeout(function () {
                location.href = d.redirect;
            }, 2000);


        },
        error: function (d) {
            console.log('error', d)



        }
    })
}

$(document).ready(function () {
    google.accounts.id.initialize({
        client_id: googleClientID,
        callback: handleCredentialResponse
    });
    google.accounts.id.renderButton(
        document.getElementById("buttonDiv"), {
        theme: "outline",
        size: "large"
    } // customization attributes
    );
    google.accounts.id.prompt(); // also display the One Tap dialog
})

function sendEmail(e) {
    const urlBase = window.location.protocol + "//" + window.location.host;
    if (emailRegex.test(campos[0].value)) {
        $.ajax({
            url: `${urlBase}/sendForgotPassword`,
            type: 'post',
            data: {
                "email": campos[0].value,
                "_token": $("input[name=csrf_token]").val()

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



            }
        })


    }


}

$(document).ready(
    authenticate(),
)