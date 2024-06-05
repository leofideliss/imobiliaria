let form = document.querySelector("#form_update_info_customer")
let campos = document.querySelectorAll(".required")
let spans = document.querySelectorAll(".invalid-feedback-custom")
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
const nomeSobrenome = /[A-z][ ][A-z]/;

function updateProfile() {

    let submitButton = $("#btn_update_profile_customer")

    submitButton[0].addEventListener('click', function (e) {
        let dataSerialized = $(form).serializeArray();
        let data = SerializedDataToJson(dataSerialized);
        if (!$(form).hasClass('invalid-form'))
            $.ajax({
                url: $(form).data("request"),
                type: "post",
                data: {
                    "data": JSON.stringify(data),
                    "_token": $("input[name=csrf_token]").val(),
                    "customer_id": $("input[name=customer_id]").val()
                },
                dataType: 'json',
                beforeSend:function(){
                    $(submitButton).prop('disabled',true)
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
        else
        Toastify({
            text: 'Verifique o formulário',
            className: "error",
            style: {
                background: "red",
            }
        }).showToast();
    })

}

// form.addEventListener('submit', (e) => {

//     e.preventDefault()
//     // if (!$(form).hasClass('invalid-form'))
//     updateProfile()

// });

function validaCPF(cpf) {
    var Soma = 0
    var Resto

    var strCPF = String(cpf).replace(/[^\d]/g, '')

    if (strCPF.length !== 11)
        return false

    if ([
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999',
    ].indexOf(strCPF) !== -1)
        return false

    for (i = 1; i <= 9; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);

    Resto = (Soma * 10) % 11

    if ((Resto == 10) || (Resto == 11))
        Resto = 0

    if (Resto != parseInt(strCPF.substring(9, 10)))
        return false

    Soma = 0

    for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i)

    Resto = (Soma * 10) % 11

    if ((Resto == 10) || (Resto == 11))
        Resto = 0

    if (Resto != parseInt(strCPF.substring(10, 11)))
        return false

    return true
}

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

function nameValidate() {
    if (!nomeSobrenome.test(campos[0].value)) {
        setError(0);
    } else {
        removeError(0);
    }
}

function dateValidate() {
    if (new Date() > new Date(campos[1].value))
        removeError(1);
    else
        setError(1);
}

function cpfValidate() {
    if (!validaCPF(campos[2].value)) {
        setError(2);
    } else {
        removeError(2);
    }
}

function emailValidate() {
    if (!emailRegex.test(campos[3].value)) {
        setError(3);
    } else {
        removeError(3);
    }
}

$(document).ready(
    updateProfile(),
)
