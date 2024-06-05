PostEditor = null



Inputmask({
    "mask": "(99) 99999-9999"
}).mask(".kt_inputmask_phone");

Inputmask({
    "mask": "(99) 9999-9999"
}).mask(".kt_inputmask_phonefixo");

Inputmask({
    "mask": "99999-999"
}).mask(".kt_inputmask_cep");

Inputmask({
    mask: ["(99) 9999-9999", "(99) 99999-9999"],
    keepStatic: true
}).mask(".kt_inputmask_phoneDuplo");

Inputmask({
    "mask": "999.999.999-99"
}).mask(".kt_inputmask_cpf");

Inputmask("999,99 %", {
    "numericInput": true
}).mask(".kt_inputmask_comissao");

Inputmask("R$ 999.999.999,99", {
    "numericInput": true
}).mask(".kt_inputmask_reais");

const urlBase = window.location.protocol + "//" + window.location.host;

function myFunction() {
    var x = document.getElementById("mySelect");

    var z = x.options[x.selectedIndex].value;

    if (z == 1) {
        hiddenDiv2.style.display = 'flex';
        hiddenDiv3.style.display = 'flex';
    }
    else {
        $('input[name="condominium_price"]').val("")

        $("#condominio_selected").text("")
        $("#condominio_selected").attr('data-cond-id', "")
        $("#removeCondominioSelected").addClass("d-none")

        // $('input[name="CEP"]').val("")
        // $('input[name="street"]').val("")
        // $('input[name="district"]').val("")
        // $('input[name="city_id"]').val("")
        // $('input[name="state"]').val("")
        // $('input[name="complement"]').val("")
        // $('input[name="number"]').val("")

        hiddenDiv2.style.display = 'none';
        hiddenDiv3.style.display = 'none';
    }

}

// function pegarTextoSelect() {

//     var selectTipo = document.getElementById("type_prop_id");

//     var opcaoSelecionada = selectTipo.options[selectTipo.selectedIndex];
//     var textoSelecionado = opcaoSelecionada.textContent;

//     if (textoSelecionado == 'Apartamento') {
//         hiddenDiv4.style.display = 'flex';

//     }
//     else {
//         hiddenDiv4.style.display = 'none';

//     }

// }

function myCategory() {
    var a = document.getElementById("mySelectCategory");

    var b = a.options[a.selectedIndex].value;

    // if (b == "Venda") {
    //     hiddenPrecoVenda.style.display = 'flex';
    //     arquivoPdf.style.display = 'flex';
    // }
    // else {
    //     hiddenPrecoVenda.style.display = 'none';
    //     arquivoPdf.style.display = 'none';
    // }

    // if (b == "Aluguel") {
    //     hiddenPrecoAlug.style.display = 'flex';
    // }
    // else {
    //     hiddenPrecoAlug.style.display = 'none';
    // }

    // if (b == "VendaAluguel") {
    //     hiddenPrecoAlug.style.display = 'flex';
    //     hiddenPrecoVenda.style.display = 'flex';
    // }
    // else {
    //     hiddenPrecoAlug.style.display = 'none';
    //     hiddenPrecoVenda.style.display = 'none';
    // }

    if (b == "Venda") {
        hiddenPrecoVenda.style.display = 'flex';
        hiddenPrecoAlug.style.display = 'none';
        arquivoPdf.style.display = 'flex';
    }
    else if (b == "Aluguel") {
        hiddenPrecoAlug.style.display = 'flex';
        hiddenPrecoVenda.style.display = 'none';
        arquivoPdf.style.display = 'none';
    } else {
        hiddenPrecoVenda.style.display = 'flex';
        hiddenPrecoAlug.style.display = 'flex';
        arquivoPdf.style.display = 'none';
    }

}

function myFinalidade() {
    var a = document.getElementById("finalidadeUtilizacao");

    var b = a.options[a.selectedIndex].value;

    if (b == "residencial") {
        hiddenCategoria.style.display = 'flex';
    }
    else {
        hiddenCategoria.style.display = 'none';
    }

    if (b == "comercial") {
        hiddenCategoria.style.display = 'none';
    }
    else {
        hiddenCategoria.style.display = 'flex';
    }

}

function myStatusImovel() {
    var c = document.getElementById("statusImovel");

    var d = c.options[c.selectedIndex].value;

    if (d == "lancamento" || d == "construcao") {
        hiddenInicioObra.style.display = 'flex';

    }
    else {
        hiddenInicioObra.style.display = 'none';

    }

    if (d == "prontoMorar") {
        $("#dateInicioObra").val("")
        hiddenTempoConstrucao.style.display = 'flex';
    }
    else {

        hiddenTempoConstrucao.style.display = 'none';
    }
}


// var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
//     url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
//     paramName: "file", // The name that will be used to transfer the file
//     maxFiles: 10,
//     maxFilesize: 10, // MB
//     addRemoveLinks: true,
//     accept: function(file, done) {
//         if (file.name == "wow.jpg") {
//             done("Naha, you don't.");
//         } else {
//             done();
//         }
//     }
// });

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    $('input[name="street"]').val("")
    $('input[name="district"]').val("")
    $('input[name="city_id"]').val("")
    $('input[name="state"]').val("")
    $('input[name="complement"]').val("")
    $('input[name="number"]').val("")
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
            //Atualiza os campos com os valores.
            $('input[name="street"]').val(conteudo.logradouro);
            $('input[name="district"]').val(conteudo.bairro);
            $('input[name="city_id"]').val(conteudo.localidade);
            $('#city_id').attr('data-citie', response.city.id)
            $('input[name="state"]').val(conteudo.uf);
            $('input[name="complement"]').val("");
            $('input[name="number"]').val("");
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
            $('input[name="street"]').val("...")
            $('input[name="district"]').val("...")
            $('input[name="city_id"]').val("...")
            $('input[name="state"]').val("...")
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



String.prototype.reverse = function () {
    return this.split('').reverse().join('');
};

function mascaraMoeda(campo, evento) {
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor = campo.value.replace(/[^\d]+/gi, '').reverse();
    var resultado = "";
    var mascara = "###.###.###.###,##".reverse();
    for (var x = 0, y = 0; x < mascara.length && y < valor.length;) {
        if (mascara.charAt(x) != '#') {
            resultado += mascara.charAt(x);
            x++;
        } else {
            resultado += valor.charAt(y);
            y++;
            x++;
        }
    }
    campo.value = "R$" + resultado.reverse();
}

function mascaraComissao(campo, evento) {
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor = campo.value.replace(/[^\d]+/gi, '').reverse();
    var resultado = "";
    var mascara = "###,##".reverse();
    for (var x = 0, y = 0; x < mascara.length && y < valor.length;) {
        if (mascara.charAt(x) != '#') {
            resultado += mascara.charAt(x);
            x++;
        } else {
            resultado += valor.charAt(y);
            y++;
            x++;
        }
    }
    campo.value = resultado.reverse();
}


if ($("#kt_docs_ckeditor_classic").length != 0)
{
    ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_classic'))
    .then(editor => {
        PostEditor = editor
    })
    .catch(error => {
        console.error(error);
    });
}
 

