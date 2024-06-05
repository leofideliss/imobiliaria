const urlBase = window.location.protocol + "//" + window.location.host;
var myDropzone
var uploadControl = 0
const allStates = {
    "UF": [
        { "nome": "Acre", "sigla": "AC" },
        { "nome": "Alagoas", "sigla": "AL" },
        { "nome": "Amapá", "sigla": "AP" },
        { "nome": "Amazonas", "sigla": "AM" },
        { "nome": "Bahia", "sigla": "BA" },
        { "nome": "Ceará", "sigla": "CE" },
        { "nome": "Distrito Federal", "sigla": "DF" },
        { "nome": "Espírito Santo", "sigla": "ES" },
        { "nome": "Goiás", "sigla": "GO" },
        { "nome": "Maranhão", "sigla": "MA" },
        { "nome": "Mato Grosso", "sigla": "MT" },
        { "nome": "Mato Grosso do Sul", "sigla": "MS" },
        { "nome": "Minas Gerais", "sigla": "MG" },
        { "nome": "Pará", "sigla": "PA" },
        { "nome": "Paraíba", "sigla": "PB" },
        { "nome": "Paraná", "sigla": "PR" },
        { "nome": "Pernambuco", "sigla": "PE" },
        { "nome": "Piauí", "sigla": "PI" },
        { "nome": "Rio de Janeiro", "sigla": "RJ" },
        { "nome": "Rio Grande do Norte", "sigla": "RN" },
        { "nome": "Rio Grande do Sul", "sigla": "RS" },
        { "nome": "Rondônia", "sigla": "RO" },
        { "nome": "Roraima", "sigla": "RR" },
        { "nome": "Santa Catarina", "sigla": "SC" },
        { "nome": "São Paulo", "sigla": "SP" },
        { "nome": "Sergipe", "sigla": "SE" },
        { "nome": "Tocantins", "sigla": "TO" }

    ]
}



function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('street').value = ("");
    document.getElementById('district').value = ("");
    document.getElementById('city_id').value = ("");
    document.getElementById('state').value = ("");
    document.getElementById('complement').value = ("");
    document.getElementById('number').value = ("");
    // document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        let response
        // busca de é uma cidade cadastrada no banco 
        $.ajax({
            url: `${urlBase}/register/getCitieByName`,
            dataType: 'json',
            type: 'GET',
            async: false,
            data: {
                'citie': conteudo.localidade
            },
            success: function (e) {
                response = e
            },
            error: function (e) {
                response = e

            }
        })
        if (response.success) {
            validaEstado()
            validaCidade()
            validaBairro()
            validaRua()
            validaNumber()
            //Atualiza os campos com os valores.
            document.getElementById('street').value = (conteudo.logradouro);
            document.getElementById('district').value = (conteudo.bairro);
            document.getElementById('city_id').value = (conteudo.localidade);
            $('#city_id').attr('data-citie', response.city.id)
            document.getElementById('state').value = (conteudo.uf);
            document.getElementById('complement').value = ("");
            document.getElementById('number').value = ("");
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-warning',
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire(
                'Cidade inválida!',
                'Não é permitido cadastrar imóveis desta cidade.',
                'error'
            )
            limpa_formulário_cep();

        }


    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('street').value = "...";
            document.getElementById('district').value = "...";
            document.getElementById('city_id').value = "...";
            document.getElementById('state').value = "...";
            // document.getElementById('ibge').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

var seedTypesProperty = function () {
    $.ajax({
        url: `${urlBase}/register/listTypeProperty`,
        type: "get",
        data: {
            "_token": $("input[name=csrf_token]").val()
        },
        dataType: 'json',
        success: function (d) {
            let selectType = $("#tipo_imovel");
            d.data.forEach(element => {
                selectType.append($("<option />").val(element.id).text(element.name));
            });
        },
        error: function (d) {
            console.log(d);
        },
        complete: function (e) {
            let value_select_category = $("#tipo_imovel").attr('value')
            $("#tipo_imovel").val(value_select_category).change()
        }
    });
}

var seedCaracteristicas = function () {
    let prop_id = $("input[name=prop_id]").val()
    let selecteds = null
    if (prop_id != "") {
        $.ajax({
            url: `${urlBase}/register/caracteristicas/listCaracteristicasJsonSelected/${prop_id}`,
            type: "get",
            dataType: 'json',
            async: false,
            success: function (d) {
                selecteds = d
            },
            error: function (d) {
                console.log(d);
            }

        });
    }


    $.ajax({
        url: `${urlBase}/register/caracteristicas/listCaracteristicasJson`,
        type: "get",
        data: {
            "_token": $("input[name=csrf_token]").val()
        },
        dataType: 'json',
        success: function (d) {
            let list_caracteristicas = $("#caracteristica_list")
            d.data.forEach((element, i) => {
                let html = `          <div class="form-check col-3 pb-4 responsividadeItemCaracteristica">`

                if (selecteds != null) {
                    if (selecteds.findIndex(({ id }) => id == element.id) != -1)
                        html += `<input class="form-check-input list_caract" type="checkbox" value="${element.id}"
                        id="caracteristicas${element.id}" name="list_caract" checked />`
                    else
                        html += `<input class="form-check-input list_caract" type="checkbox" value="${element.id}"
                        id="caracteristicas${element.id}" name="list_caract"  />`

                }
                else
                    html += `<input class="form-check-input list_caract" type="checkbox" value="${element.id}"
                    id="caracteristicas${element.id}" name="list_caract"  />`

                html += `
                    <label class="form-check-label" for="caracteristicas${element.id}" ">
                ${element.name}
                    </label>
                </div>`
                list_caracteristicas.append(html)
            });
        },
        error: function (d) {
            console.log(d);
        }
    });
}


let form = document.querySelector("#add_customer_propriedade")
let campos = document.querySelectorAll(".required")
let spans = document.querySelectorAll(".invalid-feedback-custom")
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
const nomeSobrenome = /[A-z][ ][A-z]/;
let btnSubmit = $('#btn_submit_form_customer_propriedade')


btnSubmit[0].addEventListener('click', (e) => {

    $(btnSubmit).prop('disabled', true);
    $(btnSubmit).text('Enviando dados...')
    if (form.checkValidity() == true && !$(form).hasClass("invalid-form")) {

        setTimeout(() => {
            $('#modalAwaitImages').modal('show')

            addImovel()

        }, 1000);
    } else {
        $(btnSubmit).prop('disabled', false);
        $(btnSubmit).text('Enviar')
    }
})

form.addEventListener('submit', (e) => {
});

function addImovel() {
    const apiGoogleGeo = "https://maps.googleapis.com/maps/api/geocode/json?"

    //variables
    let dataSerialized = $(form).serializeArray();
    let data = SerializedDataToJson(dataSerialized);
    console.log(data)
    let id_youtube
    if (data.video_midia != "")
        id_youtube = getYoutubeId(data.video_midia)
    let formated_address
    let lng
    let lat
    let place_id
    let address = `${$("input[name='city_id']").val()}%20${data.street}%20${data.number}`
    let property_id
    let prop_id = $("input[name=prop_id]").val()


    //get lng and lat
    $.ajax({
        type: 'POST',
        url: `${apiGoogleGeo}address=${address}&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0`,
        async: false,
        dataType: 'json',
        success: (data) => {
            console.log(data)
            formated_address = data.results[0].formatted_address
            lng = data.results[0].geometry.location.lng
            lat = data.results[0].geometry.location.lat
            place_id = data.results[0].place_id

        },
        error: (data) => { console.log(data) }
    })


    if (myDropzone.files.length == 0) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger',
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire(
            'Fotos do imóvel',
            'É necessário inserir pelo menos uma foto.',
            'error'
        )
        $(btnSubmit).prop('disabled', false);
        $(btnSubmit).text('Enviar')
        return
    }

    //get state name
    let indexState = allStates.UF.findIndex(({ sigla }) => sigla == $("#state").val())
    let state_name = allStates.UF[indexState]

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
        }
    });

    var formData = new FormData();

    formData.append('citie_id', $("#city_id").data('citie'));
    formData.append('lat', lat);
    formData.append('lng', lng);
    formData.append('formated_address', formated_address);
    formData.append('place_id', place_id);
    formData.append('description_html', $("#ap-description").val());
    formData.append('id_youtube', "https://www.youtube.com/embed/" + id_youtube);
    formData.append('prop_id', prop_id);

    //remove mask
    data.venda_aluguel = data.venda_aluguel.replace("R$", "")
    data.venda_aluguel = data.venda_aluguel.replaceAll(".", "")
    data.venda_aluguel = data.venda_aluguel.replace(",", ".")

    data.venda_preco = data.venda_preco.replace("R$", "")
    data.venda_preco = data.venda_preco.replaceAll(".", "")
    data.venda_preco = data.venda_preco.replace(",", ".")

    data.iptu_preco = data.iptu_preco.replace("R$", "")
    data.iptu_preco = data.iptu_preco.replaceAll(".", "")
    data.iptu_preco = data.iptu_preco.replace(",", ".")

    data.valorCondominio_preco = data.valorCondominio_preco.replace("R$", "")
    data.valorCondominio_preco = data.valorCondominio_preco.replaceAll(".", "")
    data.valorCondominio_preco = data.valorCondominio_preco.replace(",", ".")



    // add form inputs value in data variable
    formData.append('data', JSON.stringify(data));
    formData.append('state_name', state_name.nome);


    let notaComodidade = 2.5;
    let notaFotos;
    let notaDescricao;
    let notaVideo = 2.5;
    if (data.list_caract) {
        let tam = data.list_caract.length
        if (tam >= 0 && tam <= 3)
            notaComodidade = 2.5
        if (tam >= 4 && tam <= 5)
            notaComodidade = 5
        if (tam >= 6 && tam <= 7)
            notaComodidade = 7.5
        if (tam >= 8)
            notaComodidade = 10
    }
    if (myDropzone.files) {
        let tam = myDropzone.files.length
        if (tam >= 0 && tam <= 6)
            notaFotos = 2.5
        if (tam >= 7 && tam <= 9)
            notaFotos = 5
        if (tam >= 10 && tam <= 11)
            notaFotos = 7.5
        if (tam >= 12)
            notaFotos = 10
    }
    if (data.descricao_imovel) {
        let tam = data.descricao_imovel.length
        if (tam <= 60)
            notaDescricao = 2.5
        if (tam > 60 && tam <= 90)
            notaDescricao = 5
        if (tam > 90 && tam < 120)
            notaDescricao = 7.5
        if (tam >= 120)
            notaDescricao = 10
    }
    if (data.url_video != "")
        notaVideo = 10
    else
        notaVideo = 2.5


    formData.append('notaComodidade', notaComodidade);
    formData.append('notaFotos', notaFotos);
    formData.append('notaDescricao', notaDescricao);
    formData.append('notaVideo', notaVideo);

    // $('#modalAwaitImages').modal('show')


    $.ajax({
        type: 'POST',
        url: `${urlBase}/insert-propriedade`,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        async: false,
        success: (data) => {
            myDropzone.files.forEach(element => {
                myDropzone.enqueueFile(element)
            });

            property_id = data.prop_id
            myDropzone.options.url = `${urlBase}/property/uploadImg/${data.prop_code}/${data.prop_id}`
            myDropzone.processQueue();

        },
        error: function (data) {
            Swal.fire({
                text: data.responseJSON.message,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(() => {
                $(btnSubmit).prop('disabled', false);
                $(btnSubmit).text('Enviar')


                $('#modalAwaitImages').modal('hide')

            })



        },
        complete: function (data) {
            // busca lugares próximos
            // $.ajax({
            //     type: 'POST',
            //     url: `${urlBase}/property/nearbyPlaces`,
            //     async: false,
            //     dataType: 'json',
            //     data: {
            //         'lat': lat,
            //         'lng': lng,
            //         'property_id': property_id

            //     },

            //     success: (data) => {



            //     },
            //     error: (data) => { console.log(data) }
            // })

        }
    })



}

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

function setError(el, msg) {
    $(form).addClass('invalid-form')
    el.style.border = '2px solid #e63636';
    msg.style.display = 'block';
}

function removeError(el, msg) {
    $(form).removeClass('invalid-form')
    el.style.border = '';
    msg.style.display = 'none';
}

function cpfValidate() {
    let input = $('#prop_cpf')
    let msg = $('#prop_cpf_msg')
    if (!validaCPF(input[0].value)) {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validaCEP() {
    let input = $('#cep_imovel')
    let msg = $('#cep_imovel_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaEstado() {
    let input = $('#state')
    let msg = $('#state_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validateDescription() {
    let input = $('#ap-description')
    let msg = $('#ap-description_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validateIPTU() {
    let input = $('#campo-iptu')
    let msg = $('#campo-iptu_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaCidade() {
    let input = $('#city_id')
    let msg = $('#city_id_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaNumber() {
    let input = $('#number')
    let msg = $('#number_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaBairro() {
    let input = $('#district')
    let msg = $('#district_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaRua() {
    let input = $('#street')
    let msg = $('#street_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaTamanoImovel() {
    let input = $('#tam_imovel')
    let msg = $('#tam_imovel_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaQuartos() {
    let input = $('#quartos_imovel')
    let msg = $('#quartos_imovel_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validaBanheiros() {
    let input = $('#banheiros_imovel')
    let msg = $('#banheiros_imovel_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validaNome() {
    let input = $('#prop_name')
    let msg = $('#prop_name_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validaTelefone() {
    let input = $('#prop_phone')
    let msg = $('#prop_phone_msg')
    if ((input[0].value) == '') {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}
function validaEmail() {
    let input = $('#prop_email')
    let msg = $('#prop_email_msg')
    if (!emailRegex.test(input[0].value)) {
        setError(input[0], msg[0]);
    } else {
        removeError(input[0], msg[0]);
    }
}

function validaTipoVenda() {
    $('#categorySelect')[0].addEventListener('change', function (e) {
        removeError($('#preco_imovel')[0], $('#preco_imovel_msg')[0]);
        removeError($('#aluguel_imovel')[0], $('#aluguel_imovel_msg')[0]);
    })
}
function validaCondominio() {
    $('#campoCondominio')[0].addEventListener('change', function (e) {
        if ($(this).val() == 1) {
            $('#campoValorCondominio').show()
            $('#valorCondominio_preco').val(0)
            $("#valorCondominio_preco").prop('required', true);
        }
        else {
            $('#campoValorCondominio').hide()
            $("#valorCondominio_preco").prop('required', false);

        }

    })
}



function mySelect() {
    var a = document.getElementById("categorySelect");

    var b = a.options[a.selectedIndex].value;

    if (b == "Venda") {
        $('input[name="venda_preco"]').prop('required', true);
        $('input[name="venda_aluguel"]').prop('required', false);
        $('input[name="venda_aluguel"]').val("");

        campoPrecoVenda.style.display = 'flex';
        campoPrecoAluguel.style.display = 'none';
    }
    else if (b == "Aluguel") {
        $('input[name="venda_preco"]').prop('required', false);
        $('input[name="venda_aluguel"]').prop('required', true);
        $('input[name="venda_preco"]').val("");

        campoPrecoAluguel.style.display = 'flex';
        campoPrecoVenda.style.display = 'none';
    } else if (b == "VendaAluguel") {
        $('input[name="venda_preco"]').prop('required', true);
        $('input[name="venda_aluguel"]').prop('required', true);
        campoPrecoVenda.style.display = 'flex';
        campoPrecoAluguel.style.display = 'flex';
    }
}

function selectStatus() {
    var c = document.getElementById("statusImovel");

    var d = c.options[c.selectedIndex].value;

    if (d == "lancamento" || d == "construcao") {
        esconderInicioObra.style.display = 'flex';
        esconderEntrega.style.display = 'flex';
        esconderConstrucao.style.display = 'none';
    }
    else if (d == "prontoMorar") {
        $("#dateInicioObra").val("")

        esconderConstrucao.style.display = 'flex';
        esconderEntrega.style.display = 'flex';
        esconderInicioObra.style.display = 'none';
    }
    else {
        esconderInicioObra.style.display = 'none';
        esconderEntrega.style.display = 'none';
        esconderConstrucao.style.display = 'none';
    }

    // if (d == "prontoMorar") {
    //     esconderConstrucao.style.display = 'flex';
    //     esconderEntrega.style.display = 'flex';
    // }
    // else {
    //     esconderConstrucao.style.display = 'none';
    //     esconderEntrega.style.display = 'none';
    // }
}

function validaPrecoVenda() {
    if ($('#preco_imovel').is(":visible")) {
        let input = $('#preco_imovel')
        let msg = $('#preco_imovel_msg')
        if ((input[0].value) == '') {
            setError(input[0], msg[0]);
        } else {
            removeError(input[0], msg[0]);
        }
    }
}

function validaPrecoAluguel() {
    if ($('#aluguel_imovel').is(":visible")) {

        let input = $('#aluguel_imovel')
        let msg = $('#aluguel_imovel_msg')
        if ((input[0].value) == '') {
            setError(input[0], msg[0]);
        } else {
            removeError(input[0], msg[0]);
        }
    }
}

function validaPrecoCondominio() {
    if ($('#valorCondominio_preco').is(":visible")) {
        let input = $('#valorCondominio_preco')
        let msg = $('#valorCondominio_preco_msg')
        if ((input[0].value) == '') {
            setError(input[0], msg[0]);
        } else {
            removeError(input[0], msg[0]);
        }
    }
}


function createSortableImgs() {
    $(".dropzone").sortable({
        items: '.dz-preview',
        cursor: 'grab',
        opacity: 0.5,
        containment: '.dropzone',
        distance: 20,
        tolerance: 'pointer',
        stop: function () {
            let queue = myDropzone.getAcceptedFiles();
            let newQueue = [];
            $('div#divDropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                var name = el.innerHTML;
                queue.forEach(function (file) {
                    if (file.name === name) {
                        newQueue.push(file);
                    }
                });
            });
            myDropzone.files = newQueue
        }
    });
}

function toFile(src, fileName, mimeType) {
    return (fetch(src)
        .then(function (res) {
            return res.arrayBuffer();
        })
        .then(function (buf) {
            return new File([buf], fileName, { type: mimeType });
        })
    );
}

function handleImgs() {
    Dropzone.prototype.isFileExist = function (file) {
        var i;
        if (this.files.length > 0) {
            for (i = 0; i < this.files.length; i++) {
                if (this.files[i].name === file.name
                    && this.files[i].size === file.size
                    && this.files[i].lastModifiedDate.toString() === file.lastModifiedDate.toString()) {
                    return true;
                }
            }
        }
        return false;
    };

    Dropzone.prototype.addFile = function (file) {
        file.upload = {
            progress: 0,
            total: file.size,
            bytesSent: 0
        };
        if (this.options.preventDuplicates && this.isFileExist(file)) {
            alert(this.options.dictDuplicateFile);
            return;
        }
        this.files.push(file);
        file.status = Dropzone.ADDED;
        this.emit("addedfile", file);
        this._enqueueThumbnail(file);
        return this.accept(file, (function (_this) {
            return function (error) {
                if (error) {
                    file.accepted = false;
                    _this._errorProcessing([file], error);
                } else {
                    file.accepted = true;
                    if (_this.options.autoQueue) {
                        _this.enqueueFile(file);
                    }
                }
                return _this._updateMaxFilesReachedClass();
            };
        })(this));
    };

    let property_id = $("input[name=prop_id]").val()
    let imgs
    if (property_id != "") {
        $.ajax({
            url: `${urlBase}/api/property/getImgs/${property_id}`,
            type: 'get',
            dataType: 'json',
            async: false,
            success: function (data) {
                imgs = data.imgs

            },
            error: function (data) {

                console.log('error', data)
            }
        });
    }




    myDropzone = new Dropzone("div#divDropzone", {
        url: `${urlBase}/api/property/uploadImg`, // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 20,
        maxFilesize: 1500, // MB
        addRemoveLinks: true,
        autoProcessQueue: false,
        parallelUploads: 1,
        autoQueue: false,
        dictDuplicateFile: "Arquivos duplicatos !!",
        preventDuplicates: true,
        headers: {
            'X-CSRF-TOKEN': $("input[name=csrf_token]").val()
        },
        acceptedFiles: "image/jpeg,image/png,image/gif",
        accept: function (file, done) {
            file.previewElement.querySelector(".dz-progress").remove();

            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        },
        init: function () {
            let myDropzone = this;

            $.each(imgs, function (index, preFile) {
                var mockFile = toFile(preFile.pathname, preFile.filename);
                mockFile.then(function (file) {
                    file.status = Dropzone.ADDED
                    file.upload = { bytesSent: 0, filename: preFile.filename, progress: 0, total: 12345 };
                    file.accepted = true;
                    myDropzone.files.push(file);
                    myDropzone.displayExistingFile(file, preFile.pathname);
                });
            })

            this.on('success', function (file, done) {
                uploadControl = 1;
            });
            this.on('success',
                this.processQueue.bind(this)
            );

            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

                    if (uploadControl == 1)
                        location.href = `${urlBase}/meus-imoveis`

                }
            });
            this.on("queuecomplete", function (file) {
                // location.href = `${urlBase}/condominio`
                $('#modalAwaitImages').modal('hide')

            });
            this.on("maxfilesexceeded", function (file) {
                alert("Limite de arquivos atingido!");
                deleteExceed = 1
                this.removeFile(file);
            });
            this.on('error', function (file, response) {
                console.log(file)
                console.log(response)
            });
        },
        removedfile: function (file) {
            if (deleteExceed == 0)
                Swal.fire({
                    title: 'A foto será excluída do imóvel',
                    text: "Não é possível reverter está ação",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Não, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var fileName = file.name;
                        $.ajax({
                            type: 'DELETE',
                            url: `${urlBase}/property/deleteImg`,
                            data: {
                                'fileName': fileName,
                                'prop_id': property_id,
                                '_token': $("input[name=csrf_token]").val()
                            },
                            success: function (data) {
                                // console.log('success: ' + data);
                            }
                        });

                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

                    }
                })

            if (deleteExceed == 1) {
                var _ref;
                deleteExceed = 0
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

            }


        }
    });
}
Dropzone.autoDiscover = false;

const formatMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = (value / 100).toFixed(2) + "";
    value = value.replace(".", ",");
    value = value.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    value = value.replace(/(\d)(\d{3}),/g, "$1.$2,");
    return value
}

function editProperty() {
    let value_tempo_construcao = $("#tempoConstrucao").attr('value')
    $("#tempoConstrucao").val(value_tempo_construcao).change()

    let value_select_finalidade = $("#finalidadeUtilizacao").attr('value')
    $("#finalidadeUtilizacao").val(value_select_finalidade).change()

    let value_select_status = $("#statusImovel").attr('value')
    $("#statusImovel").val(value_select_status).change()

    let value_select_category = $("#categorySelect").attr('value')
    $("#categorySelect").val(value_select_category).change()

    let value_select_condominium = $("#campoCondominio").attr('value')
    $("#campoCondominio").val(value_select_condominium).change()
    if (value_select_condominium == 1) {
        $('#campoValorCondominio').show()
        // $('#valorCondominio_preco').val()
        $("#valorCondominio_preco").prop('required', true);
    }
    else {
        $('#campoValorCondominio').hide()
        $("#valorCondominio_preco").prop('required', false);

    }


    // handle mask
    $('#preco_imovel').val(formatMask($('#preco_imovel').val()))
    $('#aluguel_imovel').val(formatMask($('#aluguel_imovel').val()))
    $('#campo-iptu').val(formatMask($('#campo-iptu').val()))
    $('#valorCondominio_preco').val(formatMask($('#valorCondominio_preco').val()))

}


$(document).ready(
    seedTypesProperty(),
    seedCaracteristicas(),
    validaTipoVenda(),
    validaCondominio(),
    handleImgs(),
    createSortableImgs(),
    editProperty(),

)