@extends('index')


@section('content')
    <!-- MODAL FILTROS -->
    <div class="modal fade" id="filtrosModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 744px;">
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
                                style="padding-top: 1.5rem !important; padding-bottom:1.5rem !important">
                                <div class="conteudoFiltrosModal">

                                    <input type="hidden" id="page" name="page" value="0">

                                    <div class="itensConteudoFiltroModal" style="padding-bottom:3rem">
                                        <label class="d-block labelFiltroModal">Seu objetivo</label>
                                        <div class="btn-group btn-group-sm" role="group"
                                            aria-label="Choose number of bedrooms" style="height: 46px;">
                                            <input class="btn-check" type="radio" name="tipoImovel" value="venda"
                                                id="venda">
                                            <label class="btn btn-outline-secondary fw-normal"
                                                for="venda">Comprar</label>
                                            <input class="btn-check" type="radio" name="tipoImovel" value="aluguel"
                                                id="aluguel">
                                            <label class="btn btn-outline-secondary fw-normal" for="aluguel">Alugar</label>
                                        </div>
                                    </div>

                                    <div class="paddingCampoFiltro  itensConteudoFiltroModal">
                                        <label class="d-block labelFiltroModal">Valores do Imóvel</label>

                                        <div class="paddingInternoFiltro">
                                            <label class="d-block labelInternoFiltro">Preço do Imóvel</label>
                                            <div
                                                class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch">
                                                <div class="d-flex align-items-center flex-shrink-0">

                                                    <input class="form-control inputAreaNumber" type="number"
                                                        name="minArea" min="20" max="3000" step="10"
                                                        placeholder="Min">
                                                    <div class="mx-2">—</div>
                                                    <input class="form-control inputAreaNumber" type="number"
                                                        name="maxArea" min="20" max="3000" step="10"
                                                        placeholder="Máx">

                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="d-block labelInternoFiltro">Valor do Condomínio</label>
                                            <div
                                                class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch">
                                                <div class="d-flex align-items-center flex-shrink-0">

                                                    <input class="form-control" type="number" name="maxCondominio"
                                                        min="0" max="500000" step="100" placeholder="Máx">

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
                                                        placeholder="Min">
                                                    <div class="mx-2">—</div>
                                                    <input class="form-control inputAreaNumber" type="number"
                                                        name="maxArea" min="20" max="3000" step="10"
                                                        placeholder="Máx">

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

                                </div>

                            </div>


                        </div>


                    </form>
                    <div class="divBotaoFiltroModalInterno">
                        <button class="btn btn-outline-primary" style="margin-right:10px;height:60px;width:50%"
                            id="removerFiltro" type="submit" data-bs-dismiss="modal">
                            <i class="fi-trash me-2"></i>
                            Remover Filtros
                        </button>
                        <button class="btn btn-primary" id="botaoFiltro" type="submit" style="height:60px;width:50%"
                            data-bs-dismiss="modal">Buscar Imóveis</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL FILTROS -->

    {{-- <div>
        <form class="form" method="" id="form" style="margin-bottom: 60px; margin-top: 70px">

            <input type="hidden" id="page" name="page" value="0">

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="tipoImovel" value="venda"> Venda
                    </label>
                    <label>
                        <input type="radio" name="tipoImovel" value="aluguel"> Aluguel
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="quartos" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="3"> 4+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="3"> 5+
                    </label>                    
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="banheiros" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="4"> 4+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="5"> 5+
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="vagas" value="0"> Sem Vaga
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="4"> 4+
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="suites" value="0"> Sem suites
                    </label>
                    <label>
                        <input type="radio" name="suites" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="suites" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="suites" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="suites" value="4"> 4+
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    
                    <input type="number" name="minArea"> 
                    <input type="number" name="maxArea"> 

                </div>
            </div>

            <div>Condominio</div>
            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    
                    <input type="number" name="maxCondominio"> 

                </div>
            </div>
        </form>
        <div class="divBotaoFiltroModal">
            <button class="btn btn-outline-primary mb-2" id="botaoFiltro" type="submit" data-bs-dismiss="modal">Buscar</button>
        </div>
    </div>        --}}

    {{-- <!-- formulario do filtro -->
    <div style="margin-top:100px">
        <form class="form" method="" id="form" style="margin-bottom: 60px; margin-top: 70px">
            <div class="col-sm-4">
                <div class="form-group">
                    <label> Pesquise o Nome Aqui</label>
                    <input type="text" id="nome" name="nome" class="form-control">
                    <input type="hidden" id="page" name="page" value="0">
                </div>
            </div>
    
            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label class="fs-sm me-2 pe-1 text-nowrap" for="ordenar"><i
                            class="fi-arrows-sort text-muted mt-n1 me-2"></i>Ordenar por:</label>
                    <select class="form-select form-select-sm" id="ordenar" name="ordenar">
                        <option value="recentes">Mais recentes</option>
                        <option value="barato">Mais baratos</option>
                        <option value="caro">Mais caros</option>
                    </select>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="tipoImovel" value="venda"> Venda
                    </label>
                    <label>
                        <input type="radio" name="tipoImovel" value="aluguel"> Aluguel
                    </label>
                 
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="quartos" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="3"> 4+
                    </label>
                    <label>
                        <input type="radio" name="quartos" value="3"> 5+
                    </label>                    
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="banheiros" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="4"> 4+
                    </label>
                    <label>
                        <input type="radio" name="banheiros" value="5"> 5+
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="vagas" value="0"> Sem Vaga
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="vagas" value="4"> 4+
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    <label>
                        <input type="radio" name="suites" value="0"> Sem suites
                    </label>
                    <label>
                        <input type="radio" name="suites" value="1"> 1+
                    </label>
                    <label>
                        <input type="radio" name="suites" value="2"> 2+
                    </label>
                    <label>
                        <input type="radio" name="suites" value="3"> 3+
                    </label>
                    <label>
                        <input type="radio" name="suites" value="4"> 4+
                    </label>
                </div>
            </div>

            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    
                    <input type="number" name="minArea"> 
                    <input type="number" name="maxArea"> 

                </div>
            </div>

            <div>Condominio</div>
            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                <div class="d-flex align-items-center flex-shrink-0">
                    
                    <input type="number" name="maxCondominio"> 

                </div>
            </div>


            <input type="checkbox" name="venda" value="venda"> Venda
        </form> 
    
        <div class="divBotaoFiltroModal">
            <button class="btn btn-outline-primary mb-2" id="botaoFiltro" type="submit" data-bs-dismiss="modal">Buscar</button>
        </div>

    </div>  --}}

    {{-- <div style="margin-top:100px">
        <div class="divBotaoFiltroModal">
            <div class="divBotaoFiltroModal">
                <button class="btn btn-outline-primary mb-2" type="submit" data-bs-toggle="modal" href="#filtrosModal">Filtros</button>
            </div>
        </div>
    </div>  --}}

    <div>
        <div class="map-popup invisible" id="mapGoogle">
            <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button"
                data-bs-toggle-class="invisible" data-bs-target="#map" id="removerGoogleMaps"
                style="top: 0.75rem;
                right: 4rem;"><i class="fi-x fs-xs"></i></button>

            <div id="mapGoogleLocal" class="localMapGoogle">

            </div>
        </div>

        {{-- <section class="container padding-header-top mb-5" style="display:flex">
            <div class="tns-carousel-wrapper tns-controls-outside tns-nav-outside" style="width: 80%">
            </div>
            <div style="width: 20%;display: flex; justify-content:end">
                <button class="btn btn-primary mb-2" type="submit" data-bs-toggle="modal" href="#filtrosModal"
                    style="position: relative">
                    <i class="fi-filter-alt-horizontal me-2"></i>
                    Filtros
                    <div class="infosQntFiltros displayNoneFiltro" id="botaoQtdFiltro">

                    </div>
                </button>
            </div>
        </section> --}}

        <section class="container padding-header-top mb-5"
            style="display:flex;align-items: flex-end;
        justify-content: space-between;">

            <input id="autocomplete" style="padding: 7px 22px 7px 11px;border-radius: 8px;border: 1px solid var(--gray-500, #BBB7C5);background: var(--white, #FFF);" placeholder="Busque uma cidade ou estado" type="text" />

            <button class="btn btn-primary" type="submit" data-bs-toggle="modal" href="#filtrosModal"
                style="position: relative; height: 41px">
                <i class="fi-filter-alt-horizontal me-2"></i>
                Filtros
                <div class="infosQntFiltros displayNoneFiltro" id="botaoQtdFiltro">
                </div>
            </button>


        </section>

        <div class="container col-lg-8 col-xl-9 position-relative overflow-hidden pb-5 divConteudoListaImoveis formatacao"
            id="conteudoListaImoveis">
            <div class="row g-4 carregar">
  
            </div>

        </div>
    </div>



    <div class="mapaFooter">
        <button class="btn btn-outline-primary" type="submit" data-bs-target="#map"
            style="background-color:#ea1; color: white" id="addGoogleMaps">
            <i class="fi-map me-2"></i>
            Ver no mapa
        </button>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerwithlabel/dist/index.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script>
        var properties;

        function getAllProperties() {
            $.ajax({
                url: "{{ route('admin.property.listAllProperties') }}",
                method: 'GET',
                async: false,
                dataType: "json",
            }).done(function(data) {
                properties = data.itens;

            });
        }

        // var propertiesFiltros;

        // function getAllPropertiesFiltros() {
        //     $.ajax({
        //         url: "{{ route('admin.property.listPropertiesFiltros') }}",
        //         method: 'GET',
        //         async: false,
        //         dataType: "json",
        //     }).done(function(data) {
        //         propertiesFiltros = data.itens
        //         console.log('entrei filtros')
        //         console.log(propertiesFiltros)
        //         console.log(propertiesFiltros[0].lat)
        //     });
        // }

        function getAllPropertiesFilters() {

            var dados = $('#form').serialize();

            $.ajax({
                url: "{{ route('property.listAllPropertiesJson') }}",
                method: 'GET',
                async: false,
                dataType: "json",
                data: dados,
                success: function(e) {
                    //paginate
                    // properties = e.properties.data
                    properties = e.properties
                    console.log('aqui', properties)
                },
                error: function(e) {
                    console.log('error', e)
                }
            })
        }

        var map;
        var markersAjustadas = [];
        let autocomplete;

        function initMap() {
            map = new google.maps.Map(document.getElementById("mapGoogleLocal"), {
                center: {
                    lat: -7.166253,
                    lng: -34.838470
                },
                zoom: 8,
                mapId: "4504f8b37365c3d0",
            });

            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById('autocomplete'),
                {
                    types: ["geocode"],
                    fields: ['formatted_address'],
                    componentRestrictions: { country: "br" },

            });

            autocomplete.addListener('place_changed', onPlaceChanged);

        }

        // function initAutocomplete() {
        //     autocomplete = new.google.maps.places.Autocomplete(
        //         document.getElementById('autocomplete'),
        //         {
        //             componentRestrictions: { country: "br" },
        //             types: ['street_address'],
        //             fields: ["place_id"],

        //     });

        //     autocomplete.addListener('place_changed', onPlaceChanged);

        // }

        function onPlaceChanged() {

        }

        function setMarkers(map) {

            // const infoWindow = new google.maps.InfoWindow({
            //     content: "",
            //     disableAutoPan: true,
            // });


            for (let i = 0; i < properties.length; i++) {
                var latFloat = parseFloat(properties[i].lat);
                var lngFloat = parseFloat(properties[i].lng);

                const priceTag = document.createElement("div");

                if (properties[i].category == "Venda") {

                    var valorVendaFloat = parseFloat(properties[i].prop_price);
                    var numeroFormatadoVenda = valorVendaFloat.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    console.log(numeroFormatadoVenda);

                    priceTag.textContent = numeroFormatadoVenda;
                } else if (properties[i].category == "Aluguel") {
                    var valorAluguelFloat = parseFloat(properties[i].prop_rent);
                    var numeroFormatadoAluguel = valorAluguelFloat.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    console.log(numeroFormatadoAluguel);
                    priceTag.textContent = numeroFormatadoAluguel + " /mês"
                }

                priceTag.className = "price-tag";

                const marker = new google.maps.marker.AdvancedMarkerView({
                    position: new google.maps.LatLng(latFloat, lngFloat),
                    map: map,
                    content: priceTag,
                    collisionBehavior: google.maps.CollisionBehavior.OPTIONAL_AND_HIDES_LOWER_PRIORITY,
                });

                markersAjustadas.push(marker);
            }


            // for (let i = 0; i < properties.length; i++) {
            //     var latFloat = parseFloat(properties[i].lat);
            //     var lngFloat = parseFloat(properties[i].lng);

            //     const marker = new google.maps.Marker({
            //         position: new google.maps.LatLng(latFloat, lngFloat),
            //         map: map,
            //     });

            //     markersAjustadas.push(marker);
            // }

            // markers = properties.map((propertie, i) => {
            //     var latFloat = parseFloat(propertie.lat);
            //     var lngFloat = parseFloat(propertie.lng);

            //     const marker = new google.maps.Marker({
            //         position: new google.maps.LatLng(latFloat, lngFloat),
            //     });

            //     markersAjustadas.push(marker);

            //     marker.addListener("click", () => {
            //         infoWindow.setContent('TEste Imóvel');
            //         infoWindow.open(map, marker);
            //     });

            //     return marker;
            // });


            // // Add a marker clusterer to manage the markers.
            // const markerCluster = new markerClusterer.MarkerClusterer({
            //     map,
            //     markers
            // });
        }

        // function initMap() {
        //     map = new google.maps.Map(document.getElementById('mapGoogleLocal'), {
        //         center: {
        //             lat: -7.166253,
        //             lng: -34.838470
        //         },
        //         zoom: 8,
        //     });

        // }


        // var marcadores = [];

        // function setMarkers(map) {
        //     for (let i = 0; i < properties.length; i++) {
        //         const propertie = properties[i];
        //         var latFloat = parseFloat(propertie.lat);
        //         var lngFloat = parseFloat(propertie.lng);
        //         console.log(propertie.prop_value);
        //         if(propertie.category == "Venda"){
        //             var preco = propertie.prop_value;            
        //         } else{
        //             var preco = propertie.prop_value + " /mês";     
        //         }
        //         preco = preco.toString();
        //         console.log(preco);    

        //         marcadores[i] = new markerWithLabel.MarkerWithLabel({
        //             position: new google.maps.LatLng(latFloat, lngFloat),
        //             draggable: true,
        //             raiseOnDrag: true,
        //             map: map,
        //             labelContent: "<div class='arrow'></div><div class='inner'>R$ 500 mil</div>",
        //             labelAnchor: new google.maps.Point(0, 0),
        //             labelClass: "labels", // the CSS class for the label
        //             icon: "",
        //             isClicked: false
        //         });
        //     }

        // }


        function removerMarcadores() {


            console.log('TODAS MARCAÇÕES');
            console.log(markersAjustadas);
            for (var j = 0; j < markersAjustadas.length; j++) {
                markersAjustadas[j].setMap(null);
                console.log(markersAjustadas[j].setMap(null));
            }


        }

        // function removerMarcadores() {

        //     // console.log('markers:')
        //     // console.log(markersAjustadas);

        //     // for (var i = 0; i < markersAjustadas.length; i++) {
        //     //     markersAjustadas[i].setMap(null);

        //     // }
        // }

        window.initMap = initMap;


        $(document).ready(function() {
            getAllProperties();
            carregarTabela(0);
            qtdFiltros();
            setMarkers(map);
        });

        $(document).on('click', '#paginationLista a', function(e) {
            e.preventDefault();
            var pagina = $(this).attr('href').split('page=')[1];
            carregarTabela(pagina);
        })

        // $(document).on('keyup submit', '.form', function(e){
        //     e.preventDefault();
        //     carregarTabela(0);
        // });

        // $(document).on('change', '#ordenar', function(e){
        //     e.preventDefault();
        //     carregarTabela(0);
        // });

        $(document).on('click', '#botaoFiltro', function(e) {
            e.preventDefault();
            getAllPropertiesFilters();
            console.log(properties);
            carregarTabela(0);
            qtdFiltros();
            removerMarcadores();
            setMarkers(map);
        });

        $(document).on('click', '#removerFiltro', function(e) {
            e.preventDefault();
            limparCampos();
            carregarTabela(0);
            qtdFiltros();
            removerMarcadores();
            getAllPropertiesFilters();
            setMarkers(map);
        });

        var meuBotaoMaps = document.getElementById("addGoogleMaps");
        var mapaGoogle = document.getElementById("mapGoogle");
        var removerGoogle = document.getElementById("removerGoogleMaps");
        var bodyMaps = document.getElementById("bodyMaps");

        meuBotaoMaps.addEventListener("click", function() {
            mapaGoogle.classList.remove("invisible");
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth' // Isso adiciona uma animação suave à rolagem (opcional)
            });
            bodyMaps.classList.add("addOverflowHidden");
        });

        removerGoogle.addEventListener("click", function() {
            mapaGoogle.classList.add("invisible");
            bodyMaps.classList.remove("addOverflowHidden");
        });

        function carregarTabela(pagina) {
            $('.carregar').html('<div class="spinner-border m-5" role="status"><span class="sr-only"></span></div>');
            $('#page').val(pagina);
            var dados = $('#form').serialize();
            console.log(dados);
            $.ajax({
                url: "{{ route('usuario.list') }}",
                method: 'GET',
                data: dados
            }).done(function(data) {


                    $('.carregar').html(data);

                
            });
        }

        function removerFiltros(pagina) {
            $('.carregar').html('<div class="spinner-border m-5" role="status"><span class="sr-only"></span></div>');
            var dadosRemover = $('#form').serialize();
            for (let i = 0; i < dadosRemover.length; i++) {
                if (dadosRemover[i] == '=' && dadosRemover[i + 1] != '&') {
                    dadosRemover2 = dadosRemover.substring(i + 1);
                    posicEComercial = dadosRemover2.indexOf('&');
                    dadosRemover2 = dadosRemover2.substring(posicEComercial);

                    dadosRemover = dadosRemover.substring(0, i + 1) + dadosRemover2;

                }
            }
            posicEComercial = dadosRemover.indexOf('&');
            dadosRemover = dadosRemover.substring(0, posicEComercial - 1) + "0" + dadosRemover.substring(posicEComercial);

            $('#form') = dadosRemover;
            console.log("valor form:");
            var testeValor = $('#form').serialize();
            console.log(testeValor);
            $.ajax({
                url: "{{ route('usuario.list') }}",
                method: 'GET',
                data: dadosRemover
            }).done(function(data) {
                $('.carregar').html(data);
            });
        }


        function limparCampos() {
            var formulario = document.getElementById("form");
            var elementosDoFormulario = formulario.elements;

            for (var i = 0; i < elementosDoFormulario.length; i++) {
                var elemento = elementosDoFormulario[i];

                if (elemento.type == "number" || elemento.type == "email") {
                    elemento.value = ""; // Limpar campos de texto
                } else if (elemento.type == "radio" || elemento.type == "checkbox") {
                    elemento.checked = false; // Desmarcar botões de rádio e caixas de seleção
                }
            }
        }

        var botaoQtdFiltro = document.getElementById("botaoQtdFiltro");
        console.log(botaoQtdFiltro);

        function qtdFiltros() {
            var formularioFiltro = document.getElementById("form");
            var elementosDoFormularioFiltro = formularioFiltro.elements;
            var qtdFiltrosSelect = 0;
            for (var i = 0; i < elementosDoFormularioFiltro.length; i++) {
                var elementoFiltro = elementosDoFormularioFiltro[i];

                if (elementoFiltro.type == "number") {
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
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&callback=initMap&libraries=marker,places&v=beta"
        async defer></script>
@endsection
