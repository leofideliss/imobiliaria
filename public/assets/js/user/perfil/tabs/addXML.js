const urlBase = window.location.protocol + "//" + window.location.host;
const form = $('#form_customer_send_XML')
let btnSubmit

function handleBtnSubmit() {
    btnSubmit = $(form).find('button');

    btnSubmit[0].addEventListener('click', function (e) {
        e.preventDefault()
        $(this).prop('disabled', true)
        $(this).text('Carregando...')
        sendXML()
    })
}

function sendXML() {
    $.ajax({
        url: `${urlBase}/addStringXML`,
        type: 'POST',
        data: {
            'url_xml': $('input[name=xmlImovel]').val(),
            'name': $('input[name=xmlName]').val(),
            "_token": $("input[name=csrf_token]").val()
        },
        success: function (d) {
            $(btnSubmit).prop('disabled', false)
            $(btnSubmit).text('Enviar')
        },
        error: function (d) {
            console.log('error', d)
        },
        complete: function (e) {
            location.href= `${urlBase}/lista-xmls`
        }
    })
}

$(document).ready(
    handleBtnSubmit()
    // sendXML(),
)