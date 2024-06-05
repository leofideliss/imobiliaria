@extends('index')


@section('content')
    @php
        $caracteristicas = App\Http\Controllers\User\ListController::getCaractetisticasProperties();
        
        $tipoImoveis = App\Http\Controllers\User\ListController::getTiposImoveis();
    @endphp

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

                                            <input class="btn-check" type="radio" name="tipoImovel" value="vendaAluguel"
                                            id="vendaAluguel">
                                            <label class="btn btn-outline-secondary fw-normal botaoSelecionarOpcao" for="vendaAluguel">Venda e Aluguel</label>
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

    <div>
        <div class="map-popup invisible" id="mapGoogle">
            <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button"
                data-bs-toggle-class="invisible" data-bs-target="#map" id="removerGoogleMaps"
                ><i class="fi-x fs-xs"></i>
            </button>

            <div id="mapGoogleLocal" class="localMapGoogle">

            </div>
        </div>

        <section class="padding-header-top-infinity divBackgroundFiltros carrosselDesktop">
            <div class="divContainerFiltros">
                <div class="tns-carousel-wrapper tns-controls-outside tns-nav-outside widthCarrosselFiltros" id="carrosselHome">
                    <div class="tns-carousel-inner"
                        data-carousel-options='{"controls": true ,"nav": false, "responsive": {"631":{"items":2, "gutter": 10},"731":{"items":3, "gutter": 10},"831":{"items":4, "gutter": 10},"931":{"items":5, "gutter": 10},"1111":{"items":7, "gutter": 10}, "1251":{"items":8,"gutter": 10}}}'>


                        <!-- TODOS OS IMÓVEIS -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-info="todos" data-action="actionItens">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="25" height="25" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg" id="svgTodosImoveis" data-action="svgImoveisPintar">
                                    <path
                                        d="M33.8832 4.1165C33.2498 3.48317 32.4582 3.1665 31.6665 3.1665H15.8332C15.0415 3.1665 14.2498 3.48317 13.6165 4.1165C12.9832 4.74984 12.6665 5.5415 12.6665 6.33317V12.6665C12.1915 12.6665 11.8748 12.8248 11.5582 13.1415L3.6415 21.0582C3.32484 21.3748 3.1665 21.6915 3.1665 22.1665V33.2498C3.1665 34.0415 3.95817 34.8332 4.74984 34.8332H33.2498C34.0415 34.8332 34.8332 34.0415 34.8332 33.2498V6.33317C34.8332 5.5415 34.5165 4.74984 33.8832 4.1165ZM18.9998 31.6665H14.2498V26.9165C14.2498 26.1248 13.4582 25.3332 12.6665 25.3332C11.8748 25.3332 11.0832 26.1248 11.0832 26.9165V31.6665H6.33317V22.7998L12.6665 16.4665L18.9998 22.7998V31.6665ZM31.6665 31.6665H22.1665V22.1665C22.1665 21.6915 22.0082 21.3748 21.6915 21.0582L15.8332 15.1998V6.33317H31.6665V31.6665Z" />
                                    <path
                                        d="M22.1665 11.0832C22.1665 12.0332 21.3748 12.6665 20.5832 12.6665C19.7915 12.6665 18.9998 11.8748 18.9998 11.0832C18.9998 10.2915 19.7915 9.49984 20.5832 9.49984C21.3748 9.49984 22.1665 10.2915 22.1665 11.0832Z" />
                                    <path
                                        d="M28.4998 11.0832C28.4998 12.0332 27.7082 12.6665 26.9165 12.6665C26.1248 12.6665 25.3332 11.8748 25.3332 11.0832C25.3332 10.2915 26.1248 9.49984 26.9165 9.49984C27.7082 9.49984 28.4998 10.2915 28.4998 11.0832Z" />
                                    <path
                                        d="M28.4998 17.4165C28.4998 18.3665 27.7082 18.9998 26.9165 18.9998C26.1248 18.9998 25.3332 18.2082 25.3332 17.4165C25.3332 16.6248 26.1248 15.8332 26.9165 15.8332C27.7082 15.8332 28.4998 16.6248 28.4998 17.4165Z" />
                                    <path
                                        d="M28.4998 23.7498C28.4998 24.6998 27.7082 25.3332 26.9165 25.3332C26.1248 25.3332 25.3332 24.5415 25.3332 23.7498C25.3332 22.9582 26.1248 22.1665 26.9165 22.1665C27.7082 22.1665 28.4998 22.9582 28.4998 23.7498Z" />
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px" id="labelTodosImoveis" data-action="labelImoveisPintar">Todos
                                    Imóveis</span>
                            </a>
                        </div>

                        <!-- COMPRAR -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-info="venda" data-action="actionItens">
                            <a class="linkItemCarrossel" style="cursor: pointer">
                                <svg width="25" height="25" class="svgIcones" id="svgVenda" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Group">
                                        <path id="Vector"
                                            d="M38 0H0V22.6686H5.11048V27.779H15.3314V38H22.6685V27.779H32.8894V22.6686H38V0ZM7.33704 25.5525V22.6686H15.3314V25.5525H7.33704ZM17.558 35.7734V22.6686H20.4419V35.7734H17.558ZM30.663 25.5525H22.6686V22.6686H30.663V25.5525ZM35.7734 20.442H2.22656V2.22656H35.7734V20.442Z" />
                                        <path id="Vector_2" d="M22.9971 5.11035H27.7789V7.33691H22.9971V5.11035Z" />
                                        <path id="Vector_3" d="M22.9971 10.2207H30.334V12.4473H22.9971V10.2207Z" />
                                        <path id="Vector_4" d="M22.9971 15.3315H32.8893V17.5581H22.9971V15.3315Z" />
                                        <path id="Vector_5"
                                            d="M5.11081 11.2562V17.5578H17.5583V11.2562L18.051 11.5518L19.1966 9.64249L11.3346 4.92529L3.47266 9.64249L4.61822 11.5518L5.11081 11.2562ZM15.3318 9.92021V15.3313H12.4479V12.6117H10.2213V15.3313H7.33738V9.92021L11.3346 7.52191L15.3318 9.92021Z" />
                                    </g>
                                </svg>

                                <span style="margin-top: 10px" class="textoIconeCarrossel">Comprar</span>
                            </a>
                        </div>

                        <!-- ALUGUEL -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="alugar">
                            <a class="linkItemCarrossel">


                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#666276}</style><path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/></svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px;">Alugar</span>
                            </a>
                        </div>

                        <!-- CASA -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="casa">
                            <a class="linkItemCarrossel">

                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px">Casa</span>
                            </a>
                        </div>

                        <!-- APARTAMENTO -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="apartamento">
                            <a class="linkItemCarrossel">

                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#666276}</style><path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/></svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px">Apartamento</span>
                            </a>
                        </div>

                        <!-- MENOR M² -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="menorM2">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="25" height="25" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="minus/square">
                                        <path id="vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.5 7.91667C8.62555 7.91667 7.91667 8.62555 7.91667 9.5V28.5C7.91667 29.3745 8.62555 30.0833 9.5 30.0833H28.5C29.3744 30.0833 30.0833 29.3745 30.0833 28.5V9.5C30.0833 8.62555 29.3744 7.91667 28.5 7.91667H9.5ZM4.75 9.5C4.75 6.87665 6.87665 4.75 9.5 4.75H28.5C31.1233 4.75 33.25 6.87665 33.25 9.5V28.5C33.25 31.1234 31.1233 33.25 28.5 33.25H9.5C6.87665 33.25 4.75 31.1234 4.75 28.5V9.5ZM12.6667 19C12.6667 18.1256 13.3756 17.4167 14.25 17.4167H23.75C24.6245 17.4167 25.3333 18.1256 25.3333 19C25.3333 19.8745 24.6245 20.5834 23.75 20.5834H14.25C13.3756 20.5834 12.6667 19.8745 12.6667 19Z" />
                                    </g>
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px">Menor m²</span>
                            </a>
                        </div>

                        <!-- MAIOR M² -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="maiorM2">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="25" height="25" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="plus/square">
                                        <g id="vector">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.5 7.91667C8.62555 7.91667 7.91667 8.62555 7.91667 9.5V28.5C7.91667 29.3745 8.62555 30.0833 9.5 30.0833H28.5C29.3744 30.0833 30.0833 29.3745 30.0833 28.5V9.5C30.0833 8.62555 29.3744 7.91667 28.5 7.91667H9.5ZM4.75 9.5C4.75 6.87665 6.87665 4.75 9.5 4.75H28.5C31.1233 4.75 33.25 6.87665 33.25 9.5V28.5C33.25 31.1234 31.1233 33.25 28.5 33.25H9.5C6.87665 33.25 4.75 31.1234 4.75 28.5V9.5Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.6667 19C12.6667 18.1256 13.3756 17.4167 14.25 17.4167H23.75C24.6245 17.4167 25.3333 18.1256 25.3333 19C25.3333 19.8745 24.6245 20.5834 23.75 20.5834H14.25C13.3756 20.5834 12.6667 19.8745 12.6667 19Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M19 12.6667C19.8745 12.6667 20.5833 13.3756 20.5833 14.25V23.75C20.5833 24.6245 19.8745 25.3334 19 25.3334C18.1256 25.3334 17.4167 24.6245 17.4167 23.75V14.25C17.4167 13.3756 18.1256 12.6667 19 12.6667Z" />
                                        </g>
                                    </g>
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px">Maior m²</span>
                            </a>
                        </div>

                        <!-- MENOR PREÇO -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="menorPreco">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="25" height="25" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="arrow">
                                        <path id="vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.9998 6.33301C19.8743 6.33301 20.5832 7.04189 20.5832 7.91634V26.2606L27.3803 19.4639C27.9986 18.8455 29.0011 18.8456 29.6194 19.4639C30.2378 20.0823 30.2377 21.0848 29.6194 21.7031L20.1194 31.2026C19.5011 31.8209 18.4986 31.8209 17.8803 31.2026L8.38028 21.7031C7.76193 21.0848 7.76191 20.0823 8.38022 19.4639C8.99854 18.8456 10.001 18.8455 10.6194 19.4639L17.4165 26.2606V7.91634C17.4165 7.04189 18.1254 6.33301 18.9998 6.33301Z" />
                                    </g>
                                </svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px">Menor Preço</span>
                            </a>
                        </div>

                        <!-- MAIOR PREÇO -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="maiorPreco">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="25" height="25" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="arrow">
                                        <path id="vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.8803 6.79676C18.4986 6.17843 19.5011 6.17843 20.1194 6.79676L29.6194 16.2968C30.2378 16.9151 30.2378 17.9176 29.6194 18.5359C29.0011 19.1543 27.9986 19.1543 27.3803 18.5359L20.5832 11.7388V30.083C20.5832 30.9575 19.8743 31.6663 18.9998 31.6663C18.1254 31.6663 17.4165 30.9575 17.4165 30.083V11.7388L10.6194 18.5359C10.0011 19.1543 8.99858 19.1543 8.38025 18.5359C7.76192 17.9176 7.76192 16.9151 8.38025 16.2968L17.8803 6.79676Z" />
                                    </g>
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px">Maior Preço</span>
                            </a>
                        </div>

                    </div>
                </div>
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
        </section>   

        <section class="divBackgroundFiltros carrosselMobile">
            <div class="divContainerFiltros">
                <div class="tns-carousel-wrapper tns-controls-outside tns-nav-outside widthCarrosselMobileFiltros" id="carrosselHome">
                    <div class="tns-carousel-inner"
                        data-carousel-options='{"controls": false ,"nav": false, "responsive": {"240":{"items":2, "gutter": 10}, "340":{"items":3, "gutter": 10},"440":{"items":4, "gutter": 10}, "550":{"items":5, "gutter": 10}}}'>

                        <!-- TODOS OS IMÓVEIS -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-info="todos" data-action="actionItens">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="30" height="30" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg" id="svgTodosImoveis" data-action="svgImoveisPintar">
                                    <path
                                        d="M33.8832 4.1165C33.2498 3.48317 32.4582 3.1665 31.6665 3.1665H15.8332C15.0415 3.1665 14.2498 3.48317 13.6165 4.1165C12.9832 4.74984 12.6665 5.5415 12.6665 6.33317V12.6665C12.1915 12.6665 11.8748 12.8248 11.5582 13.1415L3.6415 21.0582C3.32484 21.3748 3.1665 21.6915 3.1665 22.1665V33.2498C3.1665 34.0415 3.95817 34.8332 4.74984 34.8332H33.2498C34.0415 34.8332 34.8332 34.0415 34.8332 33.2498V6.33317C34.8332 5.5415 34.5165 4.74984 33.8832 4.1165ZM18.9998 31.6665H14.2498V26.9165C14.2498 26.1248 13.4582 25.3332 12.6665 25.3332C11.8748 25.3332 11.0832 26.1248 11.0832 26.9165V31.6665H6.33317V22.7998L12.6665 16.4665L18.9998 22.7998V31.6665ZM31.6665 31.6665H22.1665V22.1665C22.1665 21.6915 22.0082 21.3748 21.6915 21.0582L15.8332 15.1998V6.33317H31.6665V31.6665Z" />
                                    <path
                                        d="M22.1665 11.0832C22.1665 12.0332 21.3748 12.6665 20.5832 12.6665C19.7915 12.6665 18.9998 11.8748 18.9998 11.0832C18.9998 10.2915 19.7915 9.49984 20.5832 9.49984C21.3748 9.49984 22.1665 10.2915 22.1665 11.0832Z" />
                                    <path
                                        d="M28.4998 11.0832C28.4998 12.0332 27.7082 12.6665 26.9165 12.6665C26.1248 12.6665 25.3332 11.8748 25.3332 11.0832C25.3332 10.2915 26.1248 9.49984 26.9165 9.49984C27.7082 9.49984 28.4998 10.2915 28.4998 11.0832Z" />
                                    <path
                                        d="M28.4998 17.4165C28.4998 18.3665 27.7082 18.9998 26.9165 18.9998C26.1248 18.9998 25.3332 18.2082 25.3332 17.4165C25.3332 16.6248 26.1248 15.8332 26.9165 15.8332C27.7082 15.8332 28.4998 16.6248 28.4998 17.4165Z" />
                                    <path
                                        d="M28.4998 23.7498C28.4998 24.6998 27.7082 25.3332 26.9165 25.3332C26.1248 25.3332 25.3332 24.5415 25.3332 23.7498C25.3332 22.9582 26.1248 22.1665 26.9165 22.1665C27.7082 22.1665 28.4998 22.9582 28.4998 23.7498Z" />
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px" id="labelTodosImoveis" data-action="labelImoveisPintar">Todos
                                    Imóveis</span>
                            </a>
                        </div>

                        <!-- COMPRAR -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-info="venda" data-action="actionItens">
                            <a class="linkItemCarrossel" style="cursor: pointer">
                                <svg width="30" height="30" class="svgIcones" id="svgVenda" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Group">
                                        <path id="Vector"
                                            d="M38 0H0V22.6686H5.11048V27.779H15.3314V38H22.6685V27.779H32.8894V22.6686H38V0ZM7.33704 25.5525V22.6686H15.3314V25.5525H7.33704ZM17.558 35.7734V22.6686H20.4419V35.7734H17.558ZM30.663 25.5525H22.6686V22.6686H30.663V25.5525ZM35.7734 20.442H2.22656V2.22656H35.7734V20.442Z" />
                                        <path id="Vector_2" d="M22.9971 5.11035H27.7789V7.33691H22.9971V5.11035Z" />
                                        <path id="Vector_3" d="M22.9971 10.2207H30.334V12.4473H22.9971V10.2207Z" />
                                        <path id="Vector_4" d="M22.9971 15.3315H32.8893V17.5581H22.9971V15.3315Z" />
                                        <path id="Vector_5"
                                            d="M5.11081 11.2562V17.5578H17.5583V11.2562L18.051 11.5518L19.1966 9.64249L11.3346 4.92529L3.47266 9.64249L4.61822 11.5518L5.11081 11.2562ZM15.3318 9.92021V15.3313H12.4479V12.6117H10.2213V15.3313H7.33738V9.92021L11.3346 7.52191L15.3318 9.92021Z" />
                                    </g>
                                </svg>

                                <span style="margin-top: 10px" class="textoIconeCarrossel">Comprar</span>
                            </a>
                        </div>

                        <!-- ALUGUEL -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="alugar">
                            <a class="linkItemCarrossel">


                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#666276}</style><path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/></svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px;">Alugar</span>
                            </a>
                        </div>

                        <!-- CASA -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="casa">
                            <a class="linkItemCarrossel">

                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px">Casa</span>
                            </a>
                        </div>

                        <!-- APARTAMENTO -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="apartamento">
                            <a class="linkItemCarrossel">

                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#666276}</style><path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/></svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px">Apartamento</span>
                            </a>
                        </div>


                        <!-- MENOR M² -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="menorM2">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="30" height="30" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="minus/square">
                                        <path id="vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.5 7.91667C8.62555 7.91667 7.91667 8.62555 7.91667 9.5V28.5C7.91667 29.3745 8.62555 30.0833 9.5 30.0833H28.5C29.3744 30.0833 30.0833 29.3745 30.0833 28.5V9.5C30.0833 8.62555 29.3744 7.91667 28.5 7.91667H9.5ZM4.75 9.5C4.75 6.87665 6.87665 4.75 9.5 4.75H28.5C31.1233 4.75 33.25 6.87665 33.25 9.5V28.5C33.25 31.1234 31.1233 33.25 28.5 33.25H9.5C6.87665 33.25 4.75 31.1234 4.75 28.5V9.5ZM12.6667 19C12.6667 18.1256 13.3756 17.4167 14.25 17.4167H23.75C24.6245 17.4167 25.3333 18.1256 25.3333 19C25.3333 19.8745 24.6245 20.5834 23.75 20.5834H14.25C13.3756 20.5834 12.6667 19.8745 12.6667 19Z" />
                                    </g>
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px">Menor m²</span>
                            </a>
                        </div>

                        <!-- MAIOR M² -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="maiorM2">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="30" height="30" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="plus/square">
                                        <g id="vector">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.5 7.91667C8.62555 7.91667 7.91667 8.62555 7.91667 9.5V28.5C7.91667 29.3745 8.62555 30.0833 9.5 30.0833H28.5C29.3744 30.0833 30.0833 29.3745 30.0833 28.5V9.5C30.0833 8.62555 29.3744 7.91667 28.5 7.91667H9.5ZM4.75 9.5C4.75 6.87665 6.87665 4.75 9.5 4.75H28.5C31.1233 4.75 33.25 6.87665 33.25 9.5V28.5C33.25 31.1234 31.1233 33.25 28.5 33.25H9.5C6.87665 33.25 4.75 31.1234 4.75 28.5V9.5Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.6667 19C12.6667 18.1256 13.3756 17.4167 14.25 17.4167H23.75C24.6245 17.4167 25.3333 18.1256 25.3333 19C25.3333 19.8745 24.6245 20.5834 23.75 20.5834H14.25C13.3756 20.5834 12.6667 19.8745 12.6667 19Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M19 12.6667C19.8745 12.6667 20.5833 13.3756 20.5833 14.25V23.75C20.5833 24.6245 19.8745 25.3334 19 25.3334C18.1256 25.3334 17.4167 24.6245 17.4167 23.75V14.25C17.4167 13.3756 18.1256 12.6667 19 12.6667Z" />
                                        </g>
                                    </g>
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px">Maior m²</span>
                            </a>
                        </div>

                        <!-- MENOR PREÇO -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="menorPreco">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="30" height="30" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="arrow">
                                        <path id="vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.9998 6.33301C19.8743 6.33301 20.5832 7.04189 20.5832 7.91634V26.2606L27.3803 19.4639C27.9986 18.8455 29.0011 18.8456 29.6194 19.4639C30.2378 20.0823 30.2377 21.0848 29.6194 21.7031L20.1194 31.2026C19.5011 31.8209 18.4986 31.8209 17.8803 31.2026L8.38028 21.7031C7.76193 21.0848 7.76191 20.0823 8.38022 19.4639C8.99854 18.8456 10.001 18.8455 10.6194 19.4639L17.4165 26.2606V7.91634C17.4165 7.04189 18.1254 6.33301 18.9998 6.33301Z" />
                                    </g>
                                </svg>
                                <span class="textoIconeCarrossel" style="margin-top: 10px">Menor Preço</span>
                            </a>
                        </div>

                        <!-- MAIOR PREÇO -->
                        <div class="pb-1 divCliqueIconeCarrossel" data-action="actionItens" data-info="maiorPreco">
                            <a class="linkItemCarrossel">
                                <svg class="svgIcones" width="30" height="30" viewBox="0 0 38 38"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="arrow">
                                        <path id="vector" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.8803 6.79676C18.4986 6.17843 19.5011 6.17843 20.1194 6.79676L29.6194 16.2968C30.2378 16.9151 30.2378 17.9176 29.6194 18.5359C29.0011 19.1543 27.9986 19.1543 27.3803 18.5359L20.5832 11.7388V30.083C20.5832 30.9575 19.8743 31.6663 18.9998 31.6663C18.1254 31.6663 17.4165 30.9575 17.4165 30.083V11.7388L10.6194 18.5359C10.0011 19.1543 8.99858 19.1543 8.38025 18.5359C7.76192 17.9176 7.76192 16.9151 8.38025 16.2968L17.8803 6.79676Z" />
                                    </g>
                                </svg>

                                <span class="textoIconeCarrossel" style="margin-top: 10px">Maior Preço</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div style="width: 10%;display: flex; justify-content:end;align-items: center;">

                    <button class="btn btn-primary mb-2 botaoMobileCarrossel" type="submit" data-bs-toggle="modal" href="#filtrosModal">
                        <i class="fi-filter-alt-horizontal me-2 iBotaoMobileCarrossel"></i>
                        <div class="infosQntFiltros displayNoneFiltro" id="botaoQtdFiltro">

                        </div>
                    </button>
                </div>
            </div>
        </section>   

        <div class="border-bottom-filtros">
        </div>

        @php
            $count = 0;
            
            foreach ($imoveis as $imovel) {
                $count++;
            }
            
        @endphp

        <div id="quantidadeImoveis" style="display:none">{{ $count }}</div>
        <span id="detail"></span>

        <div class="container col-lg-8 col-xl-9 position-relative overflow-hidden pb-5 divConteudoListaImoveis formatacao"
            id="conteudoListaImoveis" style="margin-bottom: 80px;">
            <button class="btn btn-outline-primary" id="botaoRemoverInputBusca"
                style="position: relative; height:34px;margin-bottom:20px !important;font-size: 13px;display:none;transition:5s">
                <i class="fi-x me-2" style="font-size: 10px;margin-top: 0.5px;"></i>
                Remover Busca
            </button>

            <div class="row g-4 carregar paddingListaImoveisHome">

            </div>

            <div class="ajax-load text-center carregandoScroll" id="loadingImoveisScroll">
                <p style="margin: 0px 20px 0px 0px">Carregando Imóveis</p>
                <div class="spinner-border" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>


    </div>

    <div class="mapaFooter">
        {{-- <button class="btn btn-outline-primary" type="submit" data-bs-target="#map"
            style="background-color:#ea1; color: white" id="addGoogleMaps">
            <i class="fi-map me-2"></i>
            Ver no mapa
        </button> --}}
        <button class="btn btn-primary" type="submit" data-bs-target="#map" id="addGoogleMaps"
        style="position: relative; height:37px;margin-bottom:0px !important;padding: 0px;
        width: 150px;">
            <i class="fi-map me-2" style="font-size: 15px;display: flex;margin-top: 1px;align-items: center;height: 100%;"></i>
            <span class="textoVerNoMapa">Ver no mapa</span>
        </button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerwithlabel/dist/index.min.js"></script>

    <script>
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

        function getAllPropertiesFiltersCarrossel(dados) {

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

        var map;
        var markersAjustadas = [];
        let autocomplete;

        var botaoRemoverInput = document.getElementById('botaoRemoverInputBusca');

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

        function onPlaceChanged() {
            var place = autocomplete.getPlace();
      
            var i = 0;
            var j = 0;
            var validou;
            var tipoBusca;


            //CAMPOS DA CIDADE
            var nomeCidade;
            var estadoCidade;

            //CAMPOS DA RUA
            var nomeRua;
            var bairroRua;
            var cidadeRua;
            var estadoRua;

            //CAMPOS DO BAIRRO
            var nomeBairro;
            var cidadeBairro;
            var estadoBairro;

            //CAMPOS ESTADO
            var nomeEstado;

            for (let chave in place) {

                if (j == 0 && chave == 'name') {
           
                    validou = false;
                } else if (j == 0 && chave == 'address_components') {
              
                    validou = true;
                }

                j++;

            }

            if (validou = true) {

                // removerFiltros();

                for (const component of place.address_components) {

                    const componentType = component.types[0];

                    if (i == 0 && componentType == 'locality') {

                        tipoBusca = 'cidade';
                    } else if (i == 0 && componentType == 'route') {

                        tipoBusca = 'rua';
                    } else if (i == 0 && componentType == 'sublocality_level_1') {

                        tipoBusca = 'bairro';
                    } else if (i == 0 && componentType == 'administrative_area_level_1') {

                        tipoBusca = 'estado';
                    }

                    i++;
                }

                if (tipoBusca == 'cidade') {
                    for (const component of place.address_components) {

                        const componentType = component.types[0];

                        if (componentType == 'locality') {
                            nomeCidade = component.long_name;
                        } else if (componentType == 'administrative_area_level_1') {
                            estadoCidade = component.long_name;
                        }

                    }


                    var inputCidade = document.getElementById('inputCidade');
                    inputCidade.value = nomeCidade;

                    var inputEstado = document.getElementById('inputEstado');
                    inputEstado.value = estadoCidade;

                    // getAllPropertiesFilters();
                    // contarPaginas();
                    // page = 1;
                    // carregarTabela(0);
                    // qtdFiltros();
                    // removerMarcadores();
                    // setMarkers(map);


                } else if (tipoBusca == 'rua') {
                    for (const component of place.address_components) {

                        const componentType = component.types[0];

                        if (componentType == 'route') {
                            nomeRua = component.long_name;
                        } else if (componentType == 'sublocality_level_1') {
                            bairroRua = component.long_name;
                        } else if (componentType == 'administrative_area_level_2') {
                            cidadeRua = component.long_name;
                        } else if (componentType == 'administrative_area_level_1') {
                            estadoRua = component.long_name;
                        }

                    }

       

                    var inputRua = document.getElementById('inputRua');
                    inputRua.value = nomeRua;

                    var inputCidade = document.getElementById('inputCidade');
                    inputCidade.value = cidadeRua;

                    var inputEstado = document.getElementById('inputEstado');
                    inputEstado.value = estadoRua;

                    var inputBairro = document.getElementById('inputBairro');
                    inputBairro.value = bairroRua;


                    // getAllPropertiesFilters();
                    // contarPaginas();
                    // page = 1;
                    // carregarTabela(0);
                    // qtdFiltros();
                    // removerMarcadores();
                    // setMarkers(map);


                } else if (tipoBusca == 'bairro') {
                    for (const component of place.address_components) {

                        const componentType = component.types[0];

                        if (componentType == 'sublocality_level_1') {
                            nomeBairro = component.long_name;
                        } else if (componentType == 'administrative_area_level_2') {
                            cidadeBairro = component.long_name;
                        } else if (componentType == 'administrative_area_level_1') {
                            estadoBairro = component.long_name;
                        }

                    }

          


                    var inputBairro = document.getElementById('inputBairro');
                    inputBairro.value = nomeBairro;

                    var inputCidade = document.getElementById('inputCidade');
                    inputCidade.value = cidadeBairro;

                    var inputEstado = document.getElementById('inputEstado');
                    inputEstado.value = estadoBairro;


                    // getAllPropertiesFilters();
                    // contarPaginas();
                    // page = 1;
                    // carregarTabela(0);
                    // qtdFiltros();
                    // removerMarcadores();
                    // setMarkers(map);


                } else if (tipoBusca == 'estado') {
                    for (const component of place.address_components) {

                        const componentType = component.types[0];

                        if (componentType == 'administrative_area_level_1') {
                            nomeEstado = component.long_name;
                        }

                    }

               

                    var inputEstado = document.getElementById('inputEstado');
                    inputEstado.value = nomeEstado;


                    // getAllPropertiesFilters();
                    // contarPaginas();
                    // page = 1;
                    // carregarTabela(0);
                    // qtdFiltros();
                    // removerMarcadores();
                    // setMarkers(map);


                }

                var pegoBotaoFiltro = document.getElementById('botaoFiltro');
                pegoBotaoFiltro.click();

                botaoRemoverInput.classList.add("addDisplayFlex");


            }

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
                        '<img src="' +  properties[i].photo + '" style="width: 100%;height: 200px;object-fit: cover;" >' +
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
                        '<img src="' + properties[i].photo + '" style="width: 100%;height: 200px;object-fit: cover;">' +
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
            contarPaginas();
            carregarTabela(0);
            qtdFiltros();
            // setMarkers(map);
         
            var elementosSvg = document.querySelectorAll('[data-action="svgImoveisPintar"]');

            elementosSvg.forEach(function(elemento) {
                elemento.classList.add("clicada");

            });

            var elementosSpan = document.querySelectorAll('[data-action="labelImoveisPintar"]');

            elementosSpan.forEach(function(elemento) {
                elemento.classList.add("corTextoClicada");

            });

        });

        $(window).on("load", function() {
            setMarkers(map);
        });

        var page = 1;
        var quantidadePag;

        function contarPaginas() {
            var count = parseInt(properties.length);

            quantidadePag = parseInt(count / 8);
            if (count % 8 != 0) {
                quantidadePag = quantidadePag + 1;
            }

        }

        //     var page = 1;
        //     var count = parseInt(document.getElementById("quantidadeImoveis").innerHTML);
        //     var countPage = count;

        //     var quantidadePag = parseInt(count/4);
        //     if(count%4 != 0)
        //     {
        //         quantidadePag = quantidadePag+1;
        //     }


        $(window).scroll(function() {
            if (page < quantidadePag) {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {


                    // if (page < quantidadePag) {
                    //     page++;
                    //     carregarTabelaScroll(page);

                    // }

                    page++;
                    carregarTabelaScroll(page);
                }
            }
        })

        $(document).on('click', '#botaoFiltro', function(e) {
            e.preventDefault();
            getAllPropertiesFilters();
            contarPaginas();
            page = 1;
            carregarTabela(0);
            qtdFiltros();
            removerMarcadores();
            setMarkers(map);

            // var elementoSvg = document.querySelector(".clicada");
            // var elementoLabel = document.querySelector(".corTextoClicada");

            // elementoSvg.classList.remove("clicada");
            // elementoLabel.classList.remove("corTextoClicada");

            var elementosSvg = document.querySelectorAll('[data-action="svgImoveisPintar"]');

            elementosSvg.forEach(function(elemento) {
                elemento.classList.remove("clicada");

            });

            var elementosSpan = document.querySelectorAll('[data-action="labelImoveisPintar"]');

            elementosSpan.forEach(function(elemento) {
                elemento.classList.remove("corTextoClicada");

            });

        });

        $(document).on('click', '#removerFiltro', function(e) {
            e.preventDefault();
            // getAllPropertiesFilters();
            getAllProperties();
            contarPaginas();
            page = 1;
            limparCampos();
            carregarTabela(0);
            qtdFiltros();
            removerMarcadores();
            setMarkers(map);
            botaoRemoverInput.classList.remove("addDisplayFlex");

            // var labelTodos = document.getElementById("labelTodosImoveis");
            // var svgTodos = document.getElementById("svgTodosImoveis");

            // labelTodos.classList.add("corTextoClicada");
            // svgTodos.classList.add("clicada");

            var elementosSvg = document.querySelectorAll('[data-action="svgImoveisPintar"]');

            elementosSvg.forEach(function(elemento) {
                elemento.classList.add("clicada");

            });

            var elementosSpan = document.querySelectorAll('[data-action="labelImoveisPintar"]');

            elementosSpan.forEach(function(elemento) {
                elemento.classList.add("corTextoClicada");

            });


            var inputBuscaGoogle = $("[data-action=inputGoogle]");
           

            inputBuscaGoogle.blur();
            setTimeout(function() {
                inputBuscaGoogle.val('')
            }, 10);

            inputBuscaGoogle.value = "";


        });

        $(document).on('click', '#botaoRemoverInputBusca', function(e) {
            e.preventDefault();
            getAllPropertiesFilters();
            contarPaginas();
            page = 1;
            limparCampos();
            carregarTabela(0);
            qtdFiltros();
            removerMarcadores();
            setMarkers(map);
            botaoRemoverInput.classList.remove("addDisplayFlex");

            // var labelTodos = document.getElementById("labelTodosImoveis");
            // var svgTodos = document.getElementById("svgTodosImoveis");

            // labelTodos.classList.add("corTextoClicada");
            // svgTodos.classList.add("clicada");

            var elementosSvg = document.querySelectorAll('[data-action="svgImoveisPintar"]');

            elementosSvg.forEach(function(elemento) {
                elemento.classList.add("clicada");

            });

            var elementosSpan = document.querySelectorAll('[data-action="labelImoveisPintar"]');

            elementosSpan.forEach(function(elemento) {
                elemento.classList.add("corTextoClicada");

            });

            var inputBuscaGoogle = $("[data-action=inputGoogle]");
   

            inputBuscaGoogle.blur();
            setTimeout(function() {
                inputBuscaGoogle.val('')
            }, 10);

            inputBuscaGoogle.value = "";
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
    
            $('.carregar').html('');
            for(var i=0;i<properties.length;i++)
            {
                $('.carregar').append(`

                    <div class="col-sm-6 col-xl-3 col-lg-4" aria-hidden="true" style="min-height: 446px;">
                        <div class="card shadow-sm card-hover border-0 h-100">
                            <div style="width:100%;height:200px;background-color:#ededed;border-top-left-radius:var(--fi-card-border-radius);border-top-right-radius:var(--fi-card-border-radius);"></div>
                            <div class="card-body pb-3" style="max-height: 190px">
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                                <p class="card-text placeholder-glow">
                                    <span class="placeholder col-7"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-4"></span>
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder col-8"></span>
                                </p>
                                <h5 class="card-title placeholder-glow">
                                    <span class="placeholder col-6"></span>
                                </h5>
                            </div>
                            <div class="d-flex justify-content-center card-text placeholder-glow pt-3 mx-3" style="border-top: var(--fi-card-border-width) solid var(--fi-card-border-color);">
                                <span class="placeholder col-7"></span>
                            </div>
                            
                        </div>
                    </div>

                `);
            }

            $('#page').val(pagina);
            var dados = $('#form').serialize();
            console.log(dados);
            $.ajax({
                url: "{{ route('contInfinito') }}",
                method: 'GET',
                async: true,
                data: dados,                
            }).done(function(data) {
                
                $('.carregar').html(data);

            });
        }

        var botaoSelecionado;
        var svgSelecionada;

        $("body").on('click', "[data-action='actionItens']", function(e) {
            e.preventDefault();
            let info = $(e.currentTarget).data('info');

            // var labelTodos = document.getElementById("labelTodosImoveis");
            // var svgTodos = document.getElementById("svgTodosImoveis");

            // labelTodos.classList.remove("corTextoClicada");
            // svgTodos.classList.remove("clicada");

            var elementosSvg = document.querySelectorAll('[data-action="svgImoveisPintar"]');

            elementosSvg.forEach(function(elemento) {
                elemento.classList.remove("clicada");

            });

            var elementosSpan = document.querySelectorAll('[data-action="labelImoveisPintar"]');

            elementosSpan.forEach(function(elemento) {
                elemento.classList.remove("corTextoClicada");

            });



            if (botaoSelecionado != null) {
                svgSelecionada = botaoSelecionado.find("a svg");
                svgSelecionada.removeClass("clicada");
                spanSelecionada = botaoSelecionado.find("a span");
                spanSelecionada.removeClass("corTextoClicada");
            }

            botaoSelecionado = $(e.currentTarget);
            svgSelecionada = $(e.currentTarget).find("a svg");
            spanSelecionada = $(e.currentTarget).find("a span");
            svgSelecionada.addClass("clicada");
            spanSelecionada.addClass("corTextoClicada");

            var inputVenda = document.getElementById("venda");
            inputVenda.checked = false;

            var inputAluguel = document.getElementById("aluguel");
            inputAluguel.checked = false;

            var inputMenorPreco = document.getElementById("menorPreco");
            inputMenorPreco.checked = false;

            var inputMaiorPreco = document.getElementById("maiorPreco");
            inputMaiorPreco.checked = false;

            var inputMenorM2 = document.getElementById("menorM2");
            inputMenorM2.checked = false;

            var inputMaiorM2 = document.getElementById("maiorM2");
            inputMaiorM2.checked = false;

            var carrosselCasa = document.getElementById("carrosselCasa");
            carrosselCasa.checked = false;

            var carrosselApartamento = document.getElementById("carrosselApartamento");
            carrosselApartamento.checked = false;


            // limparCampos();

            switch (info) {
                case 'venda':

                    inputVenda.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();

         

                    break;

                case 'alugar':
                    inputAluguel.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();
       
                    break;

                case 'casa':
                    carrosselCasa.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();
                    
                    break;

                case 'apartamento':
                    carrosselApartamento.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();
                   
                    break;

                case 'menorM2':
                    inputMenorM2.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();

                   
                    break;

                case 'maiorM2':
                    inputMaiorM2.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();
                   
                    break;

                case 'menorPreco':
                    inputMenorPreco.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();


                    break;

                case 'maiorPreco':
                    inputMaiorPreco.checked = true;
                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    carregarTabela(0);
                    qtdFiltros();


                    break;
                case 'todos':

                    getAllPropertiesFilters();
                    contarPaginas();
                    page = 1;
                    limparCampos();
                    carregarTabela(0);
                    qtdFiltros();

                    elementosSvg.forEach(function(elemento) {
                        elemento.classList.add("clicada");

                    });

                    elementosSpan.forEach(function(elemento) {
                        elemento.classList.add("corTextoClicada");

                    });

                    break;

                default:
                    break;
            }

            // botaoRemoverInput.classList.add("addDisplayFlex");
            removerMarcadores();
            setMarkers(map);
        })
        // $("[data-action='actionItens']").addEventListener('click', function(e) {
        //
        //     e.preventDefault(); // Impede o comportamento padrão do link

        // });

        function carregarTabelaCarrossel(dados) {
    
            $('.carregar').html('<div class="spinner-border m-5" role="status"><span class="sr-only"></span></div>');
            $.ajax({
                url: "{{ route('contInfinito') }}",
                method: 'GET',
                data: dados
            }).done(function(data) {
                $('.carregar').html(data);
            });
        }


        function carregarTabelaScroll(pagina) {
            $('#page').val(pagina);
            var dados = $('#form').serialize();
            var carregarScroll = document.getElementById("loadingImoveisScroll");
            
            $.ajax({
                url: "{{ route('contInfinito') }}",
                method: 'GET',
                data: dados,
                beforeSend: function() {
                    
                    // console.log(carregarScroll);

                    carregarScroll.classList.remove("carregandoScroll");
                    carregarScroll.classList.add("ajustesCarregamentoScroll");

                    // $(".ajax-load").show();
                    
                    
                }
            }).done(function(data) {

                // if (data.html == null) {


                //     $('.ajax-load').html("Sem mais imóveis");
                //     return;
                // }
                carregarScroll.classList.remove("ajustesCarregamentoScroll");
                carregarScroll.classList.add("carregandoScroll");
                // $('.ajax-load').hide();
                $('.carregar').append(data);
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
    
            var testeValor = $('#form').serialize();
      
            $.ajax({
                url: "{{ route('usuario.list') }}",
                method: 'GET',
                data: dadosRemover
            }).done(function(data) {
                $('.carregar').html(data);
            });
        }

        function limparCarrosselCores() {
            var elementoSvg = document.querySelector(".clicada");
            var elementoLabel = document.querySelector(".corTextoClicada");


            if (elementoSvg != null && elementoLabel != null) {
                elementoSvg.classList.remove("clicada");
                elementoLabel.classList.remove("corTextoClicada");

                var labelTodos = document.getElementById("labelTodosImoveis");
                var svgTodos = document.getElementById("svgTodosImoveis");

                labelTodos.classList.add("corTextoClicada");
                svgTodos.classList.add("clicada");
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

            limparCarrosselCores();
        }

        var botaoQtdFiltro = document.getElementById("botaoQtdFiltro");

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
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&callback=initMap&libraries=marker,places&v=beta"
        async defer></script>
@endsection
