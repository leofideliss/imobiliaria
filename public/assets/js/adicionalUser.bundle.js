// (function () {
//     var menuCorretorHeader = document.getElementById('menuCorretor');

//     console.log('retorno do Menu Corretor:');
//     console.log(menuCorretor);


//     if(menuCorretorHeader != null){
//         window.addEventListener('scroll', function () {
//             if (window.scrollY > 0) 
//             {
//                 menuCorretorHeader.classList.add('bg-header');
//                 menuCorretorHeader.classList.remove('bg-transparente');
//             }
//             else{
//                 menuCorretorHeader.classList.remove('bg-header');
//                 menuCorretorHeader.classList.add('bg-transparente');
//             } 
//         });
//     }

// })();

function campoPreco() {
    var a = document.getElementById("finalidadeUtilizacao");

    var b = a.options[a.selectedIndex].value;
    
    if (b == "Venda") {
        campoPrecoVenda.style.display='flex';
        campoPrecoVenda.style.border = '';
    } 
    else{
        campoPrecoVenda.style.display='none';
    }

    if (b == "Aluguel") {
        campoPrecoAluguel.style.display='flex';
        campoPrecoAluguel.style.border = '';
    } 
    else{
        campoPrecoAluguel.style.display='none';
    }
}

function campoCondominio() {
    var a = document.getElementById("campoCondominio");

    var b = a.options[a.selectedIndex].value;
    
    if (b == "Sim") {
        campoValorCondominio.style.display='block';
    } 
    else{
        campoValorCondominio.style.display='none';
    }

}

/* MASCARA TELEFONE */
const handlePhone = (event) => {
let input = event.target
input.value = phoneMask(input.value)
}
  
const phoneMask = (value) => {
if (!value) return ""
value = value.replace(/\D/g,'')
value = value.replace(/(\d{2})(\d)/,"($1) $2")
value = value.replace(/(\d)(\d{4})$/,"$1-$2")
return value
}


/* MASCARA CPF */
const handleCpf = (event) => {
    let input = event.target
    input.value = cpfMask(input.value)
}
    
const cpfMask = (value) => {
    if (!value) return ""
    value=value.replace(/\D/g,"")
    value=value.replace(/(\d{3})(\d)/,"$1.$2")
    value=value.replace(/(\d{3})(\d)/,"$1.$2")
    value=value.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return value
}

/* MASCARA DATA DE NASCIMENTO */
const handleData = (event) => {
    let input = event.target
    input.value = dataMask(input.value)
}
    
const dataMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"$1/$2") 
    value = value.replace(/(\d{2})(\d)/,"$1/$2") 
    return value
}

/* MASCARA CEP */
const handleCep = (event) => {
    let input = event.target
    input.value = cepMask(input.value)
}
    
const cepMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/^(\d{5})(\d)/,"$1-$2")
    return value
}

/* MASCARA MOEDA */
const handleMoeda = (event) => {
    let input = event.target
    input.value = moedaMask(input.value)
}

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
    


function selectFinalidade() {
    var a = document.getElementById("finalidadeUtilizacao");

    var b = a.options[a.selectedIndex].value;

    if (b == "residencial") {
        esconderCategoria.style.display = 'flex';
    }
    else {
        esconderCategoria.style.display = 'none';
    }

    if (b == "comercial") {
        $('#categorySelect').val("").change()
        esconderCategoria.style.display = 'none';
    }
    else {
        esconderCategoria.style.display = 'flex';
    }
}

const moedaMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = (value/100).toFixed(2) + "";
    value = value.replace(".", ",");
    value = value.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
    value = value.replace(/(\d)(\d{3}),/g, "$1.$2,");
    return value
}

function abrirNav(){
    document.getElementById("menuOculto").classList.add('menuOcultoTamanho');
    // document.getElementById("contPrincipal").style.marginLeft="250px";
}

function fecharNav(){
    document.getElementById("menuOculto").classList.remove('menuOcultoTamanho');
    document.getElementById("contPrincipal").style.marginLeft="0";
}




