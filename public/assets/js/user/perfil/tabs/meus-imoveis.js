const urlBase = window.location.protocol + "//" + window.location.host;

function createLists() {
    $.ajax({
        url: `${urlBase}/getPropertiesUserTabs`,
        type: 'GET',
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
            let dados = e.responseJSON.dados
            let stringAwait = ''
            let stringXML = ''
            let stringPublicated = ''

            dados.forEach(element => {
                if (element.propertie.available == 0) {
                    stringAwait += `<div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
    <a class="card-img-top" href="real-estate-single-v1.html" style="background-image: url(${element.img});">
        <div class="position-absolute start-0 top-0 pt-3 ps-3">
            <span class="d-table badge bg-success">Aguardando</span>
        </div>
    </a>
    <div class="card-body position-relative pb-3">
        <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
            <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fi-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                <li>
                    <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>Editar</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>Deletar</button>
                </li>
            </ul>
        </div>
        <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">${element.propertie.category}<a href="${urlBase}/add-propriedade/${element.propertie.id}">Editar</a></h4>
       
        <p class="mb-2 fs-sm text-muted">${element.propertie.formated_address}</p>
        <div class="fw-bold">
            <i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>R$ ${element.propertie.price}
        </div>
        <div class="d-flex align-items-center justify-content-center justify-content-sm-start border-top pt-3 pb-2 mt-3 text-nowrap">
            <span class="d-inline-block me-4 fs-sm">
                1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i>
            </span>
            <span class="d-inline-block me-4 fs-sm">
                1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
            <span class="d-inline-block fs-sm">
                1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i>
            </span>
        </div>
    </div>
</div>`
                } else
                    if (element.propertie.available == 1) {
                        stringPublicated += `<div class="card card-hover card-horizontal border-0 shadow-sm mb-4">
    <a class="card-img-top" href="real-estate-single-v1.html" style="background-image: url(${element.img});">
        <div class="position-absolute start-0 top-0 pt-3 ps-3">
            <span class="d-table badge bg-success">Publicado</span>
        </div>
    </a>
    <div class="card-body position-relative pb-3">
        <div class="dropdown position-absolute zindex-5 top-0 end-0 mt-3 me-3">
            <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm" type="button" id="contextMenu1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fi-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu my-1" aria-labelledby="contextMenu1">
                <li>
                    <button class="dropdown-item" type="button"><i class="fi-edit opacity-60 me-2"></i>Editar</button>
                </li>
                <li>
                    <button class="dropdown-item" type="button"><i class="fi-trash opacity-60 me-2"></i>Deletar</button>
                </li>
            </ul>
        </div>
        <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">${element.propertie.category}</h4>
        <h3 class="h6 mb-2 fs-base">
            <a class="nav-link stretched-link" href="real-estate-single-v1.html">Casa no condomínio</a>
        </h3>
        <p class="mb-2 fs-sm text-muted">${element.propertie.formated_address}</p>
        <div class="fw-bold">
            <i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>R$ ${element.propertie.price}
        </div>
        <div class="d-flex align-items-center justify-content-center justify-content-sm-start border-top pt-3 pb-2 mt-3 text-nowrap">
            <span class="d-inline-block me-4 fs-sm">
                1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i>
            </span>
            <span class="d-inline-block me-4 fs-sm">
                1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
            <span class="d-inline-block fs-sm">
                1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i>
            </span>
        </div>
    </div>
</div>`
                    }

            });

            $('#pills-aguardandoAprovacao').html(stringAwait)
            $('#pills-publicados').html(stringPublicated)
        }
    })
}

function handleBtnEditar() {
  

}

$(document).ready(
    createLists(),
    handleBtnEditar()
)