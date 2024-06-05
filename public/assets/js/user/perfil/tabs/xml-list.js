const urlBase = window.location.protocol + "//" + window.location.host;

function createListXML() {
    $.ajax({
        url: `${urlBase}/listXML`,
        type: 'GET',
        async: false,
        data: {
            "_token": $("input[name=csrf_token]").val()
        },
        success: function (d) {

        },
        error: function (d) {
            console.log('error', d)
        },
        complete: function (e) {
            let xmls = e.responseJSON.xml
            let divList = $("#lista-itensXml")
            if (xmls.length == 0)
                divList.append("<b> Nenhum XML Adicionado </b>")
            else
                xmls.forEach(element => {
                    divList.append(`
<div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
<div class="card-body position-relative pb-3">
    <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
        <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdownListXML" aria-expanded="false">
            <i class="fi-dots-vertical"></i>
        </button>
        <ul class="dropdown-menu my-1 resolverAberturaDropdown" aria-labelledby="contextMenu1">
            <li>
                <button class="dropdown-item" type="button" data-id="${element.id}" data-action="deleteXML">
                    <i class="fi-trash opacity-60 me-2"></i>Deletar
                </button>
            </li>

            <li>
                <button class="dropdown-item context-menu-action" type="button" data-id="${element.id}"  data-action="copyLink" data-name="${element.url_xml}">
                    <i class="fa-regular fa-copy opacity-60 me-2"></i>Copiar link do XML
                </button>
            </li>
        </ul>
    </div>
    
    <h3 class="h6 mb-2 fs-base">
        <a class="nav-link stretched-link" href="#">${element.name}</a>
    </h3>

    <p class="mb-2 fs-sm text-muted">Data: ${new Date(element.created_at).toLocaleDateString("pt-BR")}</p>

    <div class="d-flex justify-content-center justify-content-sm-start pt-3 pb-2 mt-3 text-nowrap" style="flex-direction: column;">
    <span class="d-inline-block text-truncate" style="max-width: 400px;">
    <p class="mb-2 fs-sm text-muted text-truncate">Link do Xml: ${element.url_xml}</p>
</span>
        <p class="mb-2 fs-sm text-muted">Quantidade de Imóveis Cadastrados: ${element.qtd_imoveis} imóveis</p>
    
    </div>
</div>
</div>`)
                });
        }
    })

}

function handleBtn() {
    $("body").on('click', '[data-bs-toggle="dropdownListXML"]', function (e) {
        let parentDrop = null
        let dropDownMenu = null
        e.preventDefault();
        parentDrop = $(e.currentTarget).parents(".dropdown")
        dropDownMenu = $(parentDrop).find(".dropdown-menu")
        if ($(dropDownMenu).hasClass("show"))
            $(dropDownMenu).removeClass("show")
        else
            $(dropDownMenu).addClass("show")

    })
}

function deleteXML() {
    let allButtons = document.querySelectorAll('[data-action="deleteXML"]')
    console.log(allButtons)
    allButtons.forEach(element => {
        let id = $(element).data("id")
        element.addEventListener("click", function (e) {
            $(element).text("Deletando...")
            $.ajax({
                url: `${urlBase}/deleteItemListXML/${id}`,
                type: 'delete',
                data: {
                    "_token": $("input[name=csrf_token]").val()
                },
                success: function (d) {
                    console.log('success', d)

                },
                error: function (d) {
                    console.log('error', d)
                },
                complete: function (e) {
                    location.href = e.responseJSON.redirect
                }
            })
        })
    });

}

document.addEventListener('DOMContentLoaded', function () {
    var dropdownActions = document.querySelectorAll('.context-menu-action');
    dropdownActions.forEach(function (action) {
        action.addEventListener('click', function () {
            var elementName = this.getAttribute('data-name');
            copyLink(elementName);
        });
    });
});

function copyLink(value) {
    navigator.clipboard.writeText(value)
    .then(function () {
        console.log('Valor copiado para a área de transferência:', value);

        var dropdownButton = document.getElementById('contextMenu1');
        
        // Se o botão for encontrado, acione o evento de clique para fechar o menu
        if (dropdownButton) {
            dropdownButton.click();
        }
    })
    .catch(function (err) {
        console.error('Erro ao copiar o valor:', err);
    });
}

$(document).ready(
    createListXML(),
    handleBtn(),
    deleteXML()
)
