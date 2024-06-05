@extends('index')

@section('content')

    @php

        $postsCarrossel = App\Http\Controllers\User\BlogController::getListPost();


        $categorias = App\Http\Controllers\User\BlogController::getTodasCategorias();

        $caracteristicas = App\Http\Controllers\User\ListController::getCaractetisticasProperties();
        
        $tipoImoveis = App\Http\Controllers\User\ListController::getTiposImoveis();

    @endphp

    <div class="removerPaddingBottomMobile" style="display: flex; padding-top: 75px; padding-right: 0px !important; padding-left: 0px !important; padding-bottom: 0px !important">
        <div class="divListaPaginacao">

            <div class="divCaminhoMapa mb-3" style="margin-top: 10px;">
                <!-- CAMINHO DA PAGINA -->
                <nav class=" pt-md-3 " aria-label="breadcrumb">
                    <ol class="breadcrumb" style="margin: 0px !important">
                        <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista Imóveis</li>
                    </ol>
                </nav>

                <div class="botaoMapaPaginacao">
                    <button class="btn btn-primary" type="submit" data-bs-target="#map" id="addGoogleMaps"
                    style="padding: 3px 5px;width: 150px;">
                        <i class="fi-map me-2" style="font-size: 15px;display: flex;margin-top: 1px;align-items: center;height: 100%;"></i>
                        <span class="textoVerNoMapa">Ver no mapa</span>
                    </button>
                </div>

            </div>

            
            <div class="mb-4" style="display:flex; justify-content: space-between;" >
                <h1 class="d-flex align-items-end justify-content-between" style="margin-bottom:0px !important">Nossos Imóveis</h1>

                <div style="width: 20%;display: flex; justify-content:end;align-items: center;">

                    <button class="btn btn-primary mb-2" type="submit" data-bs-toggle="modal" href="#filtrosModal"
                    style="position: relative; height:37px;margin-bottom:0px !important;padding: 0px;
                    width: 108px;">
                        <i class="fi-filter-alt-horizontal me-2" style="font-size: 15px;display: flex;margin-top: 1px;align-items: center;height: 100%;"></i>
                        <span style="display: flex;align-items: center;font-size: 14px;height: 100%;">Filtros</span>
                        <div class="infosQntFiltros displayNoneFiltro" id="botaoQtdFiltro">
    
                        </div>
                    </button>
                </div>
            </div>
            
            <!-- MODAL FILTROS -->
            <div class="modal fade" id="filtrosModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered p-2 mx-auto" style="max-width: 744px;padding: 20px !important;">
                    <div class="modal-content" style="max-height: calc(100vh - 20px);">
                        <div class="modal-body px-0 py-2 py-sm-0">
                            <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                                data-bs-dismiss="modal"></button>
                            <div class="h6 tituloTopoFiltro"
                                style="height: 30px; margin-bottom: 0px !important; border-radius: 0.75rem 0.75rem 0 0;">
                                Filtros
                            </div>
                            <form action="" method="" id="form" class="form">
                                <div class="row mx-0 align-items-center">

                                    <div class="col-md-12 p-4 p-sm-5 heightDivsFiltros"
                                        style="padding-top: 1.5rem !important; padding-bottom:1.5rem !important" id="overflowMenu">
                                        <div class="conteudoFiltrosModal">

                                            <input type="hidden" id="page" name="page" value="0">

                                            <input type="text" id="inputEstado" name="estado" style="display:none" />

                                            <input type="text" id="inputBairro" name="bairro" style="display:none" />

                                            <input type="text" id="inputRua" name="rua" style="display:none" />

                                            <input type="text" id="inputCidade" name="cidade" style="display:none" />

                                            <div class="itensConteudoFiltroModal" style="padding-bottom:3rem;display:none">
                                                <label class="d-block labelFiltroModal">Seu objetivo</label>
                                                <div class="btn-group btn-group-sm" role="group" style="height: 46px;">
                                                    <input class="btn-check" type="radio" name="ordenar" value="menorPreco"
                                                        id="menorPreco">
                                                    <label class="btn btn-outline-secondary fw-normal"
                                                        for="menorPreco">MenorPreco</label>
                                                    <input class="btn-check" type="radio" name="ordenar" value="maiorPreco"
                                                        id="maiorPreco">
                                                    <label class="btn btn-outline-secondary fw-normal"
                                                        for="maiorPreco">MaiorPreco</label>

                                                    <input class="btn-check" type="radio" name="ordenar" value="menorM2"
                                                        id="menorM2">
                                                    <label class="btn btn-outline-secondary fw-normal"
                                                        for="menorM2">MenorM2</label>

                                                    <input class="btn-check" type="radio" name="ordenar" value="maiorM2"
                                                    id="maiorM2">
                                                    <label class="btn btn-outline-secondary fw-normal"
                                                        for="maiorM2">MaiorM2</label>
                                                    

                                                    <input class="btn-check" type="radio" name="ordenar" value="carrosselCasa"
                                                    id="carrosselCasa">
                                                    <label class="btn btn-outline-secondary fw-normal"
                                                        for="carrosselCasa">carrosselCasa</label>
                                                    

                                                    <input class="btn-check" type="radio" name="ordenar" value="carrosselApartamento"
                                                    id="carrosselApartamento">
                                                    <label class="btn btn-outline-secondary fw-normal"
                                                        for="carrosselApartamento">carrosselApartamento</label>
                                                </div>
                                            </div>

                                            <div class="itensConteudoFiltroModal paddingPrimeiroItemFiltro" style="">
                                                <label class="d-block labelFiltroModal">Seu objetivo</label>
                                                <div class="btn-group btn-group-sm " role="group"
                                                    aria-label="Comprar ou Alugar" style="height: 46px;">
                                                    <input class="btn-check" type="radio" name="tipoImovel" value="venda"
                                                        id="venda">
                                                    <label class="btn btn-outline-secondary fw-normal botaoSelecionarOpcao"
                                                        for="venda">Comprar</label>
                                                    <input class="btn-check" type="radio" name="tipoImovel" value="aluguel"
                                                        id="aluguel">
                                                    <label class="btn btn-outline-secondary fw-normal botaoSelecionarOpcao" for="aluguel">Alugar</label>
                                                </div>
                                            </div>

                                            <div class="paddingCampoFiltro  itensConteudoFiltroModal">
                                                <label class="d-block labelFiltroModal">Valores do Imóvel</label>

                                                <div class="paddingInternoFiltro">
                                                    <label class="d-block labelInternoFiltro">Preço do Imóvel</label>
                                                    <div
                                                        class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch">
                                                        <div class="d-flex align-items-center flex-shrink-0" style="width:100%">

                                                            <input class="form-control inputAreaNumber" type="text" onkeyup="handleMoeda(event)"
                                                            name="minPreco" maxlength="14" placeholder="Mínimo">
                                                            <div class="mx-2">—</div>
                                                            <input class="form-control inputAreaNumber" type="text" onkeyup="handleMoeda(event)"
                                                            name="maxPreco" maxlength="14"
                                                            placeholder="Máximo">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="d-block labelInternoFiltro">Valor do Condomínio</label>
                                                    <div
                                                        class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch">
                                                        <div class="d-flex align-items-center flex-shrink-0">

                                                            <input class="form-control inputMaxCondominio" type="text" name="maxCondominio" onkeyup="handleMoeda(event)" placeholder="Máximo">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="paddingCampoFiltro itensConteudoFiltroModal">
                                                <label class="d-block labelFiltroModal">Tamanho do Imóvel</label>

                                                <div>
                                                    <label class="d-block labelInternoFiltro">Área do Imóvel</label>
                                                    <div
                                                        class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch">
                                                        <div class="d-flex align-items-center flex-shrink-0">

                                                            <input class="form-control inputAreaNumber" type="number"
                                                                name="minArea" min="20" max="3000" step="10"
                                                                placeholder="Mínimo">
                                                            <div class="mx-2">—</div>
                                                            <input class="form-control inputAreaNumber" type="number" name="maxArea" min="20" max="3000" step="10"
                                                            placeholder="Máximo">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="paddingCampoFiltro itensConteudoFiltroModal">
                                                <label class="d-block labelFiltroModal">Quartos e Banheiros</label>

                                                <div class="paddingInternoFiltro">
                                                    <label class="d-block labelInternoFiltro">Quartos</label>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="Quantidade de Quartos" style="height: 46px;">
                                                        <input class="btn-check" type="radio" name="quartos" value="1"
                                                            id="qtdQuartos1">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdQuartos1">+1</label>
                                                        <input class="btn-check" type="radio" name="quartos" value="2"
                                                            id="qtdQuartos2">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdQuartos2">+2</label>
                                                        <input class="btn-check" type="radio" name="quartos" value="3"
                                                            id="qtdQuartos3">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdQuartos3">+3</label>
                                                        <input class="btn-check" type="radio" name="quartos" value="4"
                                                            id="qtdQuartos4">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdQuartos4">+4</label>
                                                        <input class="btn-check" type="radio" name="quartos" value="5"
                                                            id="qtdQuartos5">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdQuartos5">+5</label>
                                                    </div>
                                                </div>

                                                <div class="paddingInternoFiltro">
                                                    <label class="d-block labelInternoFiltro">Banheiros</label>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="Quantidade de Banheiros" style="height: 46px;">
                                                        <input class="btn-check" type="radio" name="banheiros" value="1"
                                                            id="qtdBanheiros1">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdBanheiros1">+1</label>
                                                        <input class="btn-check" type="radio" name="banheiros" value="2"
                                                            id="qtdBanheiros2">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdBanheiros2">+2</label>
                                                        <input class="btn-check" type="radio" name="banheiros" value="3"
                                                            id="qtdBanheiros3">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdBanheiros3">+3</label>
                                                        <input class="btn-check" type="radio" name="banheiros" value="4"
                                                            id="qtdBanheiros4">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdBanheiros4">+4</label>
                                                        <input class="btn-check" type="radio" name="banheiros" value="5"
                                                            id="qtdBanheiros5">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdBanheiros5">+5</label>
                                                    </div>
                                                </div>


                                                <div>
                                                    <label class="d-block labelInternoFiltro">Suítes</label>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="Quantidade de Suítes" style="height: 46px;">
                                                        <input class="btn-check" type="radio" name="suites" value="0"
                                                            id="qtdSuites0">
                                                        <label class="btn btn-outline-secondary fw-normal" for="qtdSuites0">Sem
                                                            Suítes</label>
                                                        <input class="btn-check" type="radio" name="suites" value="1"
                                                            id="qtdSuites1">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdSuites1">+1</label>
                                                        <input class="btn-check" type="radio" name="suites" value="2"
                                                            id="qtdSuites2">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdSuites2">+2</label>
                                                        <input class="btn-check" type="radio" name="suites" value="3"
                                                            id="qtdSuites3">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdSuites3">+3</label>
                                                        <input class="btn-check" type="radio" name="suites" value="4"
                                                            id="qtdSuites4">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdSuites4">+4</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="paddingCampoFiltro itensConteudoFiltroModal">
                                                <label class="d-block labelFiltroModal">Vagas de Garagem</label>

                                                <div>
                                                    <label class="d-block labelInternoFiltro">Vagas de Garagem</label>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="Quantidade de Vagas de Garagem" style="height: 46px;">
                                                        <input class="btn-check" type="radio" name="vagas" value="0"
                                                            id="qtdVagas0">
                                                        <label class="btn btn-outline-secondary fw-normal" for="qtdVagas0">Sem
                                                            Vagas</label>
                                                        <input class="btn-check" type="radio" name="vagas" value="1"
                                                            id="qtdVagas1">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdVagas1">+1</label>
                                                        <input class="btn-check" type="radio" name="vagas" value="2"
                                                            id="qtdVagas2">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdVagas2">+2</label>
                                                        <input class="btn-check" type="radio" name="vagas" value="3"
                                                            id="qtdVagas3">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdVagas3">+3</label>
                                                        <input class="btn-check" type="radio" name="vagas" value="4"
                                                            id="qtdVagas4">
                                                        <label class="btn btn-outline-secondary fw-normal"
                                                            for="qtdVagas4">+4</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="paddingCampoFiltro itensConteudoFiltroModal">
                                                <label class="d-block labelFiltroModal">Caracteristicas</label>

                                                <div class="">

                                                    <div style="max-height: 250px">
                                                        <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="max-height: 250px; overflow: hidden scroll;">
                                                            <div class="gridFiltrosIcones">

                                                                @foreach ($caracteristicas as $caracteristica)
                                                                    <div class="" style="padding-bottom: 10px;">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="checkboxCaracteristica[]"
                                                                            value="{{ $caracteristica->id }}"
                                                                            id="caract{{ $caracteristica->id }}">
                                                                        <label class="form-check-label fs-sm"
                                                                            for="caract{{ $caracteristica->id }}">{{ $caracteristica->name }}</label>
                                                                    </div>
                                                                @endforeach



                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="paddingUltimoItemFiltro itensConteudoFiltroModal">
                                                <label class="d-block labelFiltroModal">Tipos de Imóvel</label>

                                                <div class="">

                                                    <div style="max-height: 250px">
                                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                            aria-label="scrollable content"
                                                            style="max-height: 250px; overflow: hidden scroll;">
                                                            <div class="gridFiltrosIcones">

                                                                @foreach ($tipoImoveis as $tipoImovel)
                                                                    <div class="" style="padding-bottom: 10px;">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="tipoImoveis[]" value="{{ $tipoImovel->id }}"
                                                                            id="imovel{{ $tipoImovel->id }}">
                                                                        <label class="form-check-label fs-sm"
                                                                            for="imovel{{ $tipoImovel->id }}">{{ $tipoImovel->name }}</label>
                                                                    </div>
                                                                @endforeach



                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                </div>


                            </form>
                            <div class="divBotaoFiltroModalInterno">
                                <button class="btn btn-outline-primary botaoRemoverFiltro" id="removerFiltro" type="submit" data-bs-dismiss="modal">
                                    <i class="fi-trash me-2"></i>
                                    Remover Filtros
                                </button>
                                <button class="btn btn-primary botaoBuscarImovel" id="botaoFiltro" type="submit" style=""
                                    data-bs-dismiss="modal">Buscar Imóveis</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BUSCA E FILTROS -->
    
            <!-- GRID PUBLICAÇÕES-->
            <div class=" carregar">
            </div>
    
        </div>

        <div class="esconderMapaMobile abrirMapaPadrao" id="mapGoogle">
            <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle esconderBotaoMapa" type="button" data-bs-toggle-class="invisible" data-bs-target="#map" id="removerGoogleMaps"
            ><i class="fi-x fs-xs"></i>
            </button>
            <div id="mapGoogleLocal" class="localMapGoogle">

            </div>
        </div>


    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerwithlabel/dist/index.min.js"></script>

    <script>

        //BUSCANDO TODAS PROPRIEDADES
        var properties;

        function getAllProperties() {
            $.ajax({
                url: "{{ route('admin.property.listAllProperties') }}",
                method: 'GET',
                async: false,
                dataType: "json",
            }).done(function(data) {
                properties = data.itens

            });
        }

        function getAllPropertiesFilters() {

            var dados = $('#form').serialize();

            $.ajax({
                url: "{{ route('property.listAllPropertiesJson') }}",
                method: 'GET',
                async: false,
                dataType: "json",
                data: dados,
                success: function(e) {
                    // properties = e.properties.data
        
                    properties = e.properties;
            
                },
                error: function(e) {
                    console.log('error', e)
                }
            })
        }

        //INFOS MAPA
        var map;
        var markersAjustadas = [];
        let autocomplete;

        function initMap() {
            map = new google.maps.Map(document.getElementById('mapGoogleLocal'), {
                center: {
                    lat: -7.166253,
                    lng: -34.838470
                },
                zoom: 13,
                streetViewControl: false,
                mapId: "4504f8b37365c3d0",
            });

            // autocomplete = new google.maps.places.Autocomplete(
            //     document.getElementById('autocomplete'),
            //     {
            //         types: ["geocode"],
            //         fields: ['formatted_address'],
            //         componentRestrictions: { country: "br" },

            // });

            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('autocomplete'), {

                    componentRestrictions: {
                        country: "br"
                    },
                    fields: ['address_components'],
                    types: ["geocode"],
                }
            );

            autocomplete.addListener('place_changed', onPlaceChanged);
        }

        var marcadores = [];

        function setMarkers(map) {
            const urlBase = window.location.protocol + "//" + window.location.host;

            for (let i = 0; i < properties.length; i++) {
                var latFloat = parseFloat(properties[i].lat);
                var lngFloat = parseFloat(properties[i].lng);
                let imgs
                // $.ajax({
                    // url: `${urlBase}/api/property/getImgs/${properties[i].id}`,
                //     type: 'get',
                //     dataType: 'json',
                //     success: function(data) {
                //         imgs = data.imgs
                //     },
                //     error: function(data) {

                //         console.log('error', data)
                //     }
                // });

                const priceTag = document.createElement("div");

                if (properties[i].category == "Venda") {

                    var valorVendaFloat = parseFloat(properties[i].prop_price);
                    var numeroFormatadoVenda = valorVendaFloat.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });

                    priceTag.textContent = numeroFormatadoVenda;

                    // var imagensPropertie = App\Http\Controllers\User\ListController::getImagesPropertie(properties[i].id);

                    var contentString =
                        '<div class="card border-0">' + 
                        '<a href="'+`${urlBase}/detalhes-imovel/${properties[i].id}` +'" class="d-block">' +
                        '<img src="' +  properties[i].photo + '" style="width: 100%;height: auto;" >' +
                        '</a>' +
                        '<div class="card-body position-relative pb-3">' +
                        '<h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">' + properties[i].type_property + '</h4>' +
                        '<h3 class="h6 mb-1 fs-sm">' +
                        '<a href="'+`${urlBase}/detalhes-imovel/${properties[i].id}` +'" class="nav-link stretched-link">' + properties[i].title +
                        '</a>' +
                        "</h3>" +
                        '<p class="mt-0 mb-2 fs-xs text-muted">' + properties[i].street + ' - ' + properties[i].district +
                        ' - ' + properties[i].city_name + '/' + properties[i].state + '</p>' +
                        '<div class="fs-sm fw-bold">' +
                        numeroFormatadoVenda +
                        "</div>" +
                        "</div>" +
                        '<div class="card-footer d-flex align-items-center justify-content-center mx-2 pt-2 text-nowrap">' +
                        '<span class="d-inline-block px-2 fs-sm">' +
                        properties[i].bedroom + '<i class="fi-bed ms-1 fs-base text-muted"></i>' +
                        "</span>" +
                        '<span class="d-inline-block px-2 fs-sm">' +
                        properties[i].bathrooms + '<i class="fi-bath ms-1 fs-base text-muted"></i>' +
                        "</span>" +
                        '<span class="d-inline-block px-2 fs-sm">' +
                        properties[i].garage + '<i class="fi-car ms-1 fs-base text-muted"></i>' +
                        "</span>" +
                        "</div>" +
                        "</div>";

                } else if (properties[i].category == "Aluguel") {
                    var valorAluguelFloat = parseFloat(properties[i].prop_rent);
                    var numeroFormatadoAluguel = valorAluguelFloat.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
            
                    priceTag.textContent = numeroFormatadoAluguel + " /mês"

                    var contentString =
                        '<div class="card border-0">' +
                        '<a href="'+`${urlBase}/detalhes-imovel/${properties[i].id}` +'" class="d-block">' +
                        '<img src="' + properties[i].photo + '" style="width: 100%;height: auto;">' +
                        '</a>' +
                        '<div class="card-body position-relative pb-3">' +
                        '<h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">' + properties[i].category + '</h4>' +
                        '<h3 class="h6 mb-1 fs-sm">' +
                        '<a href="'+`${urlBase}/detalhes-imovel/${properties[i].id}` +'" class="nav-link stretched-link">' + properties[i].title +
                        '</a>' +
                        "</h3>" +
                        '<p class="mt-0 mb-2 fs-xs text-muted">' + properties[i].street + ' - ' + properties[i].district +
                        ' - ' + properties[i].city_name + '/' + properties[i].state + '</p>' +
                        '<div class="fs-sm fw-bold">' +
                        numeroFormatadoAluguel + ' /mês' +
                        "</div>" +
                        "</div>" +
                        '<div class="card-footer d-flex align-items-center justify-content-center mx-2 pt-2 text-nowrap">' +
                        '<span class="d-inline-block px-2 fs-sm">' +
                        properties[i].bedroom + '<i class="fi-bed ms-1 fs-base text-muted"></i>' +
                        "</span>" +
                        '<span class="d-inline-block px-2 fs-sm">' +
                        properties[i].bathrooms + '<i class="fi-bath ms-1 fs-base text-muted"></i>' +
                        "</span>" +
                        '<span class="d-inline-block px-2 fs-sm">' +
                        properties[i].garage + '<i class="fi-car ms-1 fs-base text-muted"></i>' +
                        "</span>" +
                        "</div>" +
                        "</div>";
                }


                // const contentString =
                // '<div class="card border-0">'+
                //     '<a href="real-estate-single-v1.html" class="d-block">'+
                //         '<img src="../img/real-estate/catalog/13.jpg">'+
                //     "</a>"+
                //     '<div class="card-body position-relative pb-3">'+                        
                //         '<h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">' + properties[i].category + '</h4>'+
                //         '<h3 class="h6 mb-1 fs-sm">'+
                //             '<a href="real-estate-single-v1.html" class="nav-link stretched-link">'+ properties[i].title +'</a>'+
                //         "</h3>"+
                //         '<p class="mt-0 mb-2 fs-xs text-muted">'+ properties[i].street +' - '+ properties[i].district + ' - '+ properties[i].city_name + '/' + properties[i].state + '</p>'+
                //         '<div class="fs-sm fw-bold">'+
                //             'R$'+ priceTag.toString() +
                //         "</div>"+
                //     "</div>"+
                //     '<div class="card-footer d-flex align-items-center justify-content-center mx-2 pt-2 text-nowrap">'+
                //         '<span class="d-inline-block px-2 fs-sm">'+
                //             properties[i].bedroom +'<i class="fi-bed ms-1 fs-base text-muted"></i>'+
                //         "</span>"+
                //         '<span class="d-inline-block px-2 fs-sm">'+
                //             properties[i].bathrooms + '<i class="fi-bath ms-1 fs-base text-muted"></i>'+
                //         "</span>"+
                //         '<span class="d-inline-block px-2 fs-sm">'+
                //             properties[i].garage + '<i class="fi-car ms-1 fs-base text-muted"></i>'+
                //         "</span>"+
                //     "</div>"+
                // "</div>";



                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 280,
                    ariaLabel: "Teste",
                });

                priceTag.className = "price-tag";

                const marker = new google.maps.marker.AdvancedMarkerView({
                    position: new google.maps.LatLng(latFloat, lngFloat),
                    map: map,
                    content: priceTag,
                    collisionBehavior: google.maps.CollisionBehavior.OPTIONAL_AND_HIDES_LOWER_PRIORITY,
                });

                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                    });
                });

                markersAjustadas.push(marker);
            }
        }

        function removerMarcadores() {

            for (var j = 0; j < markersAjustadas.length; j++) {
                markersAjustadas[j].setMap(null);

            }

        }

        window.initMap = initMap;

        $(document).ready(function() {
            getAllProperties();
            carregarTabelaPost(0);
            qtdFiltros();
            setMarkers(map);
        });

        $(window).on("load", function() {
            setMarkers(map);
        });

        $(document).on('click', '#paginationLista a', function(e) {
            e.preventDefault();
            var pagina = $(this).attr('href').split('page=')[1];
            carregarTabelaPost(pagina);
        })

        // $(document).on('keyup submit', '#nome', function(e){
        //     e.preventDefault();
        //     carregarTabelaPost(0);
        // });

        // $(document).on('change', '#ordenar', function(e){
        //     e.preventDefault();
        //     carregarTabelaPost(0);
        // });

        // $(document).on('change', '#categories', function(e){
        //     e.preventDefault();
        //     carregarTabelaPost(0);
        // });

        function carregarTabelaPost(pagina) {
            $('.carregar').html('<div class="spinner-border m-5" role="status"><span class="sr-only"></span></div>');
            $('#page').val(pagina);
            var dados = $('#form').serialize();
            console.log(dados);
            $.ajax({
                url: "{{ route('user.imoveisPaginacao.postImovelPaginacao') }}",
                method: 'GET',
                data: dados
            }).done(function(data) {
                $('.carregar').html(data);
            });
        }
        
        $(document).on('click', '#botaoFiltro', function(e) {
            e.preventDefault();
            getAllPropertiesFilters();
            carregarTabelaPost(0);
            qtdFiltros();
            removerMarcadores();
            setMarkers(map);

        });

        
        $(document).on('click', '#removerFiltro', function(e) {
            e.preventDefault();
            getAllProperties();
            limparCampos();
            carregarTabelaPost(0);
            qtdFiltros();
            removerMarcadores();
            setMarkers(map);
            botaoRemoverInput.classList.remove("addDisplayFlex");
        });


        function qtdFiltros() {
            var formularioFiltro = document.getElementById("form");
            var elementosDoFormularioFiltro = formularioFiltro.elements;
            var qtdFiltrosSelect = 0;
            for (var i = 0; i < elementosDoFormularioFiltro.length; i++) {
                var elementoFiltro = elementosDoFormularioFiltro[i];

                if (elementoFiltro.type == "number" || elementoFiltro.type == "text" ) {
                    if (elementoFiltro.value != "") {
                        qtdFiltrosSelect++;
                    } // Limpar campos de texto
                } else if (elementoFiltro.type == "radio" || elementoFiltro.type == "checkbox") {
                    if (elementoFiltro.checked == true) {
                        qtdFiltrosSelect++;
                    } // Desmarcar botões de rádio e caixas de seleção
                }
            }


            if (qtdFiltrosSelect > 0) {
                botaoQtdFiltro.innerHTML = qtdFiltrosSelect;
                botaoQtdFiltro.classList.remove("displayNoneFiltro");
            } else {
                botaoQtdFiltro.classList.add("displayNoneFiltro");
            }
        }

        function limparCampos() {
            var formulario = document.getElementById("form");
            var elementosDoFormulario = formulario.elements;

            for (var i = 0; i < elementosDoFormulario.length; i++) {
                var elemento = elementosDoFormulario[i];

                if (elemento.type == "number" || elemento.type == "email" || elemento.type == "text") {
                    elemento.value = ""; // Limpar campos de texto
                } else if (elemento.type == "radio" || elemento.type == "checkbox") {
                    elemento.checked = false; // Desmarcar botões de rádio e caixas de seleção
                }
            }

        }

        var meuBotaoMaps = document.getElementById("addGoogleMaps");
        var mapaGoogle = document.getElementById("mapGoogle");
        var removerGoogle = document.getElementById("removerGoogleMaps");
        var bodyMaps = document.getElementById("bodyMaps");

        meuBotaoMaps.addEventListener("click", function() {
            mapaGoogle.classList.remove("esconderMapaMobile");
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth' // Isso adiciona uma animação suave à rolagem (opcional)
            });
            bodyMaps.classList.add("addOverflowHidden");
        });

        removerGoogle.addEventListener("click", function() {
            mapaGoogle.classList.add("esconderMapaMobile");
            bodyMaps.classList.remove("addOverflowHidden");
        });

    </script>

    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&callback=initMap&libraries=marker,places&v=beta"
    async defer></script>

@endsection