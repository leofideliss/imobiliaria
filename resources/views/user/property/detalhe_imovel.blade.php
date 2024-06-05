@extends('index')

@section('content')

    <!-- MODAL PROCURA IMÓVEIS -->
    <div class="modal fade" id="procuraImovel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <form action="" id="form-procuraImovel">
                        <div class="row mx-0 align-items-center">

                            <div class="col-md-6 border-end-md p-4 p-sm-5 heightDivsContato">
                                <span class="textoContatoMensagem espacamentoHeaderContato marginBottomContato">
                                    Preencha o formulário e receba ofertas de imóveis exclusivas
                                </span>
                                <div class="divsPrimeiroCampoMensagem">
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="input-sm">
                                            Preço máximo do imóvel desejado
                                        </label>
                                        <input class="form-control form-control-sm" id="input-sm" name="precoMaximo"
                                            type="text" placeholder="Preço máximo do imóvel">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="select-sm">Deseja comprar ou alugar?</label>
                                        <select class="form-select form-select-sm" id="select-sm" name="comprarAlugar">
                                            <option>Selecione uma opção</option>
                                            <option>Comprar</option>
                                            <option>Alugar</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="select-sm">Quantidade de Quartos</label>
                                        <select class="form-select form-select-sm" id="select-sm" name="qantQuartos">
                                            <option>Selecione uma opção</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5+</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="select-sm">Estado desejado</label>
                                        <select class="form-select form-select-sm" id="select-sm" name="estado">
                                            <option>Selecione uma opção</option>
                                            <option>Option item 1</option>
                                            <option>Option item 2</option>
                                            <option>Option item 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="select-sm">Munícipio desejado</label>
                                        <select class="form-select form-select-sm" id="select-sm" name="munícipio">
                                            <option>Selecione uma opção</option>
                                            <option>Option item 1</option>
                                            <option>Option item 2</option>
                                            <option>Option item 3</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label class="form-label fs-sm" for="select-sm">Bairros desejados</label>
                                        <select class="form-select form-select-sm" id="select-sm" name="bairros">
                                            <option>Selecione uma opção</option>
                                            <option>Option item 1</option>
                                            <option>Option item 2</option>
                                            <option>Option item 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5 heightDivsContato">
                                <div class="espacamentoHeaderContato marginBottomContato containerTopoContato">
                                    <i class="fa-solid fa-triangle-exclamation fa-xl"></i>
                                    <span class="textoInfoContato">
                                        Receba recomendações direto no seu WhatsApp e E-mail. Enviamos fotos, principais
                                        informações e link para o anúncio completo, caso queria ver todos os dados ou
                                        agendar uma visita.
                                    </span>
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="input-sm">
                                            Nome Completo
                                        </label>
                                        <input class="form-control form-control-sm" id="input-sm" type="text"
                                            name="nome" placeholder="Digite um Nome">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="input-sm">
                                            Celular/WhatsApp
                                        </label>
                                        <input class="form-control form-control-sm" id="input-sm" name="celular"
                                            type="text" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm" for="input-sm">
                                            E-mail
                                        </label>
                                        <input class="form-control form-control-sm" id="input-sm" name="email"
                                            type="text" placeholder="Digite seu e-mail">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fs-sm">Outras preferências</label>
                                        <textarea class="form-control form-control-sm textAreaMensagemContato" id="textarea-input" rows="5"
                                            name="preferencias"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm buttonFinalizarCadastro w-100"
                                    type="submit">Finalizar Cadastro</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @foreach ($properties as $imoveis)
        @php
            $imgs = App\Http\Controllers\User\ListController::getImagesPropertie($imoveis->id);

            $dadosCondominio = App\Http\Controllers\User\ListController::getDadosCondominio($imoveis->condominio_id);

            $cidadeImovel = App\Http\Controllers\User\ListController::getCitie($imoveis->city_id);
            
            $resultadoSemelhantes = App\Http\Controllers\User\ListController::getImoveisSemelhantes($imoveis);
              
            $quantidadeImagem = count($imgs);
            
            $extraImagens = $quantidadeImagem - 5;
            
            $caracteristicas = App\Http\Controllers\User\ListController::getCaractetisticasPropertie($imoveis->id);

            if($imoveis->condominio_id != null)
            {
                $caracteristicasCondominio = App\Http\Controllers\User\ListController::getCaracteristicasCondominio($imoveis->condominio_id);

                $imgsCondominio = App\Http\Controllers\User\ListController::getImagesCondominio($imoveis->condominio_id);

                $quantidadeImgsCondominio = count($imgsCondominio);
            }
                
            
            $localizacoes = App\Http\Controllers\User\ListController::getLocations($imoveis->id);
            
            $qtdMercado = 0;
            $qtdRestaurante = 0;
            $qtdEscola = 0;

            $quantidadeImoveisSemelhantes = count($resultadoSemelhantes);
            
            foreach ($localizacoes as $location) {
                if ($location->type == 'Super Mercado') {
                    $qtdMercado++;
                }
            
                if ($location->type == 'Restaurante') {
                    $qtdRestaurante++;
                }
            
                if ($location->type == 'Escola') {
                    $qtdEscola++;
                }
            }

            if ($imoveis->iptu_price != null) {
                $numeroIPTUFormatado = number_format($imoveis->iptu_price, 2, ',', '.');
            }
            
            $caracteresDescricao = strlen($imoveis->description);
            echo $caracteresDescricao;


            if ($imoveis->category == 'Venda'){
                $precoFormatadoInput = App\Http\Controllers\User\ListController::formatarPrecoImovel($imoveis->prop_price);

                $precoEntradaInput = App\Http\Controllers\User\ListController::formatarPrecoEntrada($imoveis->prop_price);
            }

            $descricSemFormato1 = nl2br($imoveis->description );

            $textoSemParenteses = preg_replace('/\([^)]+\)/', '', $imoveis->title);

            $valorM2 = $imoveis->prop_price / intval($imoveis->prop_size);
            $valorM2Aluguel = $imoveis->prop_rent / intval($imoveis->prop_size);
            
            $configuracoesGerais = App\Http\Controllers\User\ListController::buscarDescricaoGeral();

        @endphp

        @if ($imoveis->category == 'Venda')
        <!-- MODAL CALCULADORA -->
        <div class="modal fade" id="calculadoraModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 1300px;">
                <div class="modal-content">
                    <div class="modal-body px-0 py-2 py-sm-0">
                        <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                            data-bs-dismiss="modal"></button>
                        <div class="row mx-0 ajustesCalculadora">
                            <div class="p-4 p-sm-5 formularioFinanciamento">
                                <h2 class="h3">
                                    Simule o financiamento do Imóvel
                                </h2>
                                <p class="mb-4 pb-lg-3 fs-lg">Preencha o formulário para ver a simulação de seu financiamento.
                                </p>
                                <form id="formFinanciamento">

                                    <div class="mb-4">
                                        <label for="preco-imovel" class="textoValorImovel">
                                            Preço do Imóvel*
                                        </label>
                                        <div class="input-field-financiamento">
                                            @if ($imoveis->category == 'Venda')
                                                <input type="text" id="preco-imovel" value="{{$precoFormatadoInput}}" onkeyup="handleMoeda(event)" maxlength="14" class="form-control" disabled>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-4 camposDuplosForm">
                                        <div style="width: 48%" class="formularioCampoMobile">
                                            <label for="entrada-imovel" class="textoValorImovel">
                                                Entrada*
                                            </label>
                                            <div class="input-field-financiamento" style="margin-top: 19px;">
                                                <input type="text" id="entrada-imovel" value="{{$precoEntradaInput}}" onkeyup="handleMoeda(event)" maxlength="14" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div style="width: 48%" class="formularioCampoMobile">
                                            <label for="porcentagem-imovel" class="textoValorImovel">
                                                Porcentagem do Total*
                                            </label>
                                            <div class="input-field-financiamento">
                                                {{-- <input type="number" id="porcentagem-imovel" min="20" max="90"
                                                    class="form-control" required> --}}
                                                <span class="campoResultadoRange" id="rangeValue">55 %</span>
                                                <input type="range" class="form-range" id="rangeInput" min="20" max="90" value="55">

                                            </div>
                                        </div>
                                    </div>
                                    <span></span>

                                    <div class="mb-4 camposDuplosForm">
                                        <div style="width: 48%" class="formularioCampoMobile">
                                            <label for="taxaJuros-imovel" class="textoValorImovel">
                                                Taxa de Juros Anual*
                                            </label>
                                            <div class="input-field-financiamento" style="margin-top: 19px;">
                                                <input type="text" value="12% ao Ano" class="form-control" disabled>
                                                {{-- <input type="number" id="taxaJuros-imovel" class="form-control" required> --}}
                                            </div>
                                        </div>
                                        <div style="width: 48%" class="formularioCampoMobile">
                                            <label for="prazo-imovel" class="textoValorImovel">
                                                Prazo (ano)*
                                            </label>
                                            <div class="input-field-financiamento">
                                                {{-- <input type="number" id="porcentagem-imovel" min="20" max="90"
                                                    class="form-control" required> --}}
                                                <span class="campoResultadoRange" id="rangeValueAnos">18 anos</span>
                                                <input type="range" class="form-range" id="rangeInputAnos" min="1" max="35" value="18">

                                            </div>
                                        </div>

                                    </div>

                                    {{-- <button id="calcularFinanciamento" class="btn btn-lg btn-primary d-block w-100"
                                        type="submit">
                                        Calcular financiamento
                                    </button> --}}

                                </form>
                            </div>
                            <div class="resultadoFinanciamento pt-2 pb-4 pb-sm-5 pt-md-5" style="padding-right: 3rem">
                                <div id="resuladoFinanciamento" class="boxResultadoFinanciamento"
                                    style="margin-bottom: 20px">
                                    <div id="valorFinanciamento" class="hiddenResultadoFinanciamento">
                                        <div style="display: flex; flex-direction:column">
                                            <span class="textoSecundarioFinanciamento">Maior parcela</span>
                                            <span id="valueMaior" class="textoFinanciamentoValor"></span>
                                            <span class="textoMenorFinanciamento">Simulação da primeira parcela</span>
                                        </div>

                                        <div style="display: flex; flex-direction:column">
                                            <span class="textoSecundarioFinanciamento">Menor parcela</span>
                                            <span id="valueMenor" class="textoFinanciamentoValor"></span>
                                            <span class="textoMenorFinanciamento">Simulação da última parcela</span>
                                        </div>



                                        <span id="valorPorcentagemCalculo" class="textoObservacaoFinanciamento"></span>


                                    </div>
                                </div>
                                <div style="display: flex;align-items: center;">
                                    <i class="fa-solid fa-triangle-exclamation fa-xl"
                                        style="margin-right: 10px;color:#fcb926"></i>
                                    <span class="textoInfoContato">
                                        A parcela não pode comprometer mais do que 30% da sua renda mensal.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- <!-- Review modal-->
            <div class="modal fade" id="modal-review" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block position-relative border-0 pb-0 px-sm-5 px-4">
                    <h3 class="modal-title mt-4 text-center">Leave a review</h3>
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 px-4">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                        <label class="form-label" for="review-name">Name <span class='text-danger'>*</span></label>
                        <input class="form-control" type="text" id="review-name" placeholder="Your name" required>
                        <div class="invalid-feedback">Please let us know your name.</div>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="review-email">Email <span class='text-danger'>*</span></label>
                        <input class="form-control" type="email" id="review-email" placeholder="Your email address" required>
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="review-rating">Rating <span class='text-danger'>*</span></label>
                        <select class="form-control form-select" id="review-rating" required>
                            <option value="" selected disabled hidden>Choose rating</option>
                            <option value="5 stars">5 stars</option>
                            <option value="4 stars">4 stars</option>
                            <option value="3 stars">3 stars</option>
                            <option value="2 stars">2 stars</option>
                            <option value="1 star">1 star</option>
                        </select>
                        <div class="invalid-feedback">Please rate the property.</div>
                        </div>
                        <div class="mb-4">
                        <label class="form-label" for="review-text">Review <span class='text-danger'>*</span></label>
                        <textarea class="form-control" id="review-text" rows="5" placeholder="Your review message" required></textarea>
                        <div class="invalid-feedback">Please write your review.</div>
                        </div>
                        <button class="btn btn-primary d-block w-100 mb-4" type="submit">Submit a review</button>
                    </form>
                    </div>
                </div>
                </div>
            </div> --}}

        <!-- Page header-->
        <section class="container pt-4 mt-5 paddingAjustesMobile-20">
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home5') }}">Home</a></li>
                    @if ($imoveis->category == 'VendaAluguel')
                    <li class="breadcrumb-item">
                        <a href="{{ route('home5') }}">Imóvel para Venda e Aluguel</a>
                    </li>
                    @else
                    <li class="breadcrumb-item">
                        <a href="{{ route('home5') }}">Imóvel para {{ $imoveis->category }}</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $textoSemParenteses }}</li>
                </ol>
            </nav>
            <h1 class="h2 mb-2" >{{ $textoSemParenteses }}</h1>
            <p class="mb-2 pb-1 fs-lg texto-iniciais-maiusculas">{{ $imoveis->street }} -
                {{ $imoveis->district }}, {{ $cidadeImovel->citie }}/{{ $imoveis->state }}</p>
            <!-- Features + Sharing-->
            <div class="d-flex justify-content-between align-items-center">
                <ul class="d-flex mb-4 list-unstyled">
                    @if(isset($imoveis->bedroom) && $imoveis->bedroom > 0)
                    <li class="me-3 pe-3 border-end"><b class="me-1">{{ $imoveis->bedroom }}</b><i
                            class="fi-bed mt-n1 lead align-middle text-muted"></i></li>
                    @endif

                    @if(isset($imoveis->bathrooms) && $imoveis->bathrooms > 0)
                    <li class="me-3 pe-3 border-end"><b class="me-1">{{ $imoveis->bathrooms }}</b><i
                            class="fi-bath mt-n1 lead align-middle text-muted"></i></li>
                    @endif

                    @if(isset($imoveis->garage) && $imoveis->garage > 0)
                    <li class="me-3 pe-3 border-end"><b class="me-1">{{ $imoveis->garage }}</b><i
                            class="fi-car mt-n1 lead align-middle text-muted"></i></li>
                    @endif

                    <li><b>{{ $imoveis->prop_size }}</b> m²</li>
                    
                </ul>
                {{-- <div class="text-nowrap">
                    <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2"
                        type="button" data-bs-toggle="tooltip" title="Adicionar aos favoritos"><i
                            class="fi-heart"></i></button>

                </div> --}}
            </div>
        </section>

        <!-- GALERIA DE FOTOS - DESKTOP -->
        <section class="container overflow-auto mb-4 pb-3 galeriaWeb" data-simplebar>
            <div class="row g-2 g-md-3 gallery" data-thumbnails="true" style="min-width: 30rem;">

                @if ($quantidadeImagem > 1)
                    <div class="col-6">
                        <a class="gallery-item rounded rounded-md-3 coverImg"
                            href="{{ asset(str_replace('public', 'storage', $imgs[0]->pathname)) }}" data-sub-html="">
                            <img src="{{ asset(str_replace('public', 'storage', $imgs[0]->pathname)) }}" alt="" srcset="">

                        </a>
                    </div>
                @else
                    <div class="col-6">
                        <a class="gallery-item rounded rounded-md-3 coverImg"
                            href="{{ asset(str_replace('public', 'storage', $imgs[0]->pathname)) }}" data-sub-html="">
                            <img src="{{ asset(str_replace('public', 'storage', $imgs[0]->pathname)) }}" alt="" srcset="">
                        </a>
                    </div>
                @endif

                @if ($quantidadeImagem == 2 || $quantidadeImagem == 3 || $quantidadeImagem > 3)
                    <div class="col-3">

                        <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3 coverImgMenores"
                            href="{{ asset(str_replace('public', 'storage', $imgs[1]->pathname)) }}" data-sub-html="">
                            <img src="{{ asset(str_replace('public', 'storage', $imgs[1]->pathname)) }}" alt=""
                                srcset="">
                        </a>

                        @if ($quantidadeImagem > 2)
                            <a class="gallery-item rounded rounded-md-3 coverImgMenores"
                                href="{{ asset(str_replace('public', 'storage', $imgs[2]->pathname)) }}"
                                data-sub-html="">
                                <img src="{{ asset(str_replace('public', 'storage', $imgs[2]->pathname)) }}"
                                    alt="" srcset="">
                            </a>
                            @else
                                @if($imoveis->condominio_id != null)
                                    <a class="gallery-item rounded rounded-md-3 coverImgMenores"
                                    href="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}"
                                    data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                @endif
                        
                        @endif
                    </div>
                @endif

                @if ($quantidadeImagem > 3)
                    <div class="col-3">

                        <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3 coverImgMenores"
                            href="{{ asset(str_replace('public', 'storage', $imgs[3]->pathname)) }}" data-sub-html="">
                            <img src="{{ asset(str_replace('public', 'storage', $imgs[3]->pathname)) }}" alt=""
                                srcset="">
                        </a>

                        @if ($quantidadeImagem > 4)
                            <a class="gallery-item more-item rounded rounded-md-3 coverImgMenores"
                                href="{{ asset(str_replace('public', 'storage', $imgs[4]->pathname)) }}"
                                data-sub-html="">
                                <img src="{{ asset(str_replace('public', 'storage', $imgs[4]->pathname)) }}"
                                    alt="" srcset="">
                                @if ($extraImagens > 1)
                                    <span class="gallery-item-caption fs-base">+{{ $extraImagens }}
                                        <span class='d-none d-md-inline'>fotos</span>
                                    </span>
                                @else
                                    <span class="gallery-item-caption fs-base">+{{ $extraImagens }}
                                        <span class='d-none d-md-inline'>foto</span>
                                    </span>
                                @endif
                            </a>
                            @else
                                @if($imoveis->condominio_id != null)
                                    <a class="gallery-item rounded rounded-md-3 coverImgMenores"
                                    href="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}"
                                    data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                @endif
                        @endif

                        @for ($i = 5; $i < $quantidadeImagem; $i++)
                            <div class="col-3 carroselImagens" style="display: none">
                                <a class="gallery-item rounded-1 rounded-md-2"
                                    href="{{ asset(str_replace('public', 'storage', $imgs[$i]->pathname)) }}"
                                    data-sub-html="">
                                    <img src="{{ asset(str_replace('public', 'storage', $imgs[$i]->pathname)) }}"
                                        alt="" srcset="">

                                </a>
                            </div>
                        @endfor

                         
                    </div>
                
                    {{-- <div class="col-12">
                        <div class="row g-2 g-md-3">

                            @if ($quantidadeImagem > 3)
                                <div class="col-2 carroselImagens">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgs[3]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgs[3]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                </div>
                            @endif

                            @if ($quantidadeImagem > 4)
                                <div class="col-2 carroselImagens">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgs[4]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgs[4]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                </div>
                            @endif

                            @if ($quantidadeImagem > 5)
                                <div class="col-2 carroselImagens">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgs[5]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgs[5]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                </div>
                            @endif

                            @if ($quantidadeImagem > 6)
                                <div class="col-2 carroselImagens">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgs[6]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgs[6]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                </div>
                            @endif

                            @if ($quantidadeImagem > 7)
                                <div class="col-2 carroselImagens">
                                    <a class="gallery-item more-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgs[7]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgs[7]->pathname)) }}"
                                            alt="" srcset="">
                                        @if ($extraImagens > 1)
                                            <span class="gallery-item-caption fs-base">+{{ $extraImagens }}
                                                <span class='d-none d-md-inline'>fotos</span>
                                            </span>
                                        @else
                                            <span class="gallery-item-caption fs-base">+{{ $extraImagens }}
                                                <span class='d-none d-md-inline'>foto</span>
                                            </span>
                                        @endif
                                    </a>
                                </div>
                            @endif

                            @for ($i = 8; $i < $quantidadeImagem; $i++)
                                <div class="col-2 carroselImagens" style="display: none">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgs[$i]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgs[$i]->pathname)) }}"
                                            alt="" srcset="">
                                    </a>
                                </div>
                            @endfor


                        </div>
                    </div> --}}
                @endif

                @if($imoveis->condominio_id != null)

                    @if($quantidadeImagem == 1)
                        <div class="col-3">
                            <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}" data-sub-html="">
                                <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}"
                                    alt="" srcset="">

                            </a>

                            @if($quantidadeImgsCondominio == 2 || $quantidadeImgsCondominio > 2)
                                <a class="gallery-item rounded rounded-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[1]->pathname)) }}" data-sub-html="">
                                    <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[1]->pathname)) }}"
                                        alt="" srcset="">

                                </a>
                            @endif
                        </div>

                        @if($quantidadeImgsCondominio == 3 || $quantidadeImgsCondominio > 3)
                            <div class="col-3">
                                <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[2]->pathname)) }}" data-sub-html="">
                                    <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[2]->pathname)) }}"
                                        alt="" srcset="">

                                </a>

                                @if($quantidadeImgsCondominio == 4 || $quantidadeImgsCondominio > 4)
                                    <a class="gallery-item rounded rounded-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[3]->pathname)) }}" data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[3]->pathname)) }}"
                                            alt="" srcset="">

                                    </a>
                                @endif
                            </div>
                        @endif

                        @if($quantidadeImgsCondominio > 4)
                            @for ($i = 4; $i < $quantidadeImgsCondominio; $i++)
                                <div class="col-3 carroselImagens" style="display: none">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                            alt="" srcset="">

                                    </a>
                                </div>
                            @endfor
                        @endif

                    @endif
                    
                    @if($quantidadeImagem == 2)
                        @if($quantidadeImgsCondominio == 2 || $quantidadeImgsCondominio > 2)
                            <div class="col-3">
                                <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[1]->pathname)) }}" data-sub-html="">
                                    <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[1]->pathname)) }}"
                                        alt="" srcset="">

                                </a>

                                @if($quantidadeImgsCondominio == 3 || $quantidadeImgsCondominio > 3)
                                    <a class="gallery-item rounded rounded-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[2]->pathname)) }}" data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[2]->pathname)) }}"
                                            alt="" srcset="">
                                        @if ($extraImagens > 1)
                                            <span class="gallery-item-caption fs-base">+{{ $extraImagens }}
                                                <span class='d-none d-md-inline'>fotos</span>
                                            </span>
                                        @else
                                            <span class="gallery-item-caption fs-base">+{{ $extraImagens }}
                                                <span class='d-none d-md-inline'>foto</span>
                                            </span>
                                        @endif
                                    </a>
                                @endif
                            </div>
                        @endif

                        @if($quantidadeImgsCondominio > 3)
                            @for ($i = 3; $i < $quantidadeImgsCondominio; $i++)
                                <div class="col-3 carroselImagens" style="display: none">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                            alt="" srcset="">

                                    </a>
                                </div>
                            @endfor
                        @endif

                    @endif

                    @if($quantidadeImagem == 3)

                        <div class="col-3">
                            <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}" data-sub-html="">
                                <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[0]->pathname)) }}"
                                    alt="" srcset="">

                            </a>

                            @if($quantidadeImgsCondominio == 2 || $quantidadeImgsCondominio > 2)
                                <a class="gallery-item rounded rounded-md-3 coverImgMenores" href="{{ asset(str_replace('public', 'storage', $imgsCondominio[1]->pathname)) }}" data-sub-html="">
                                    <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[1]->pathname)) }}"
                                        alt="" srcset="">

                                </a>
                            @endif
                        </div>

                        @if($quantidadeImgsCondominio > 2)
                            @for ($i = 2; $i < $quantidadeImgsCondominio; $i++)
                                <div class="col-3 carroselImagens" style="display: none">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                            alt="" srcset="">

                                    </a>
                                </div>
                            @endfor
                        @endif

                    @endif

                    @if($quantidadeImagem == 4)
                        @if($quantidadeImgsCondominio > 1)
                            @for ($i = 1; $i < $quantidadeImgsCondominio; $i++)
                                <div class="col-3 carroselImagens" style="display: none">
                                    <a class="gallery-item rounded-1 rounded-md-2"
                                        href="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                        data-sub-html="">
                                        <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                            alt="" srcset="">

                                    </a>
                                </div>
                            @endfor
                        @endif
                    @endif

                    @if($quantidadeImagem == 5)
                        @for ($i = 0; $i < $quantidadeImgsCondominio; $i++)
                            <div class="col-3 carroselImagens" style="display: none">
                                <a class="gallery-item rounded-1 rounded-md-2"
                                    href="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                    data-sub-html="">
                                    <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio[$i]->pathname)) }}"
                                        alt="" srcset="">

                                </a>
                            </div>
                        @endfor
                     @endif


                @endif    
            </div>
        </section>

        <!-- GALERIA DE FOTOS - mobile -->
        <section class="container overflow-auto pb-3 galeriaMobile paddingAjustesMobile-20" data-simplebar>
            <div class="tns-carousel-wrapper gallery tns-controls-static tns-nav-outside">
                <div class="tns-carousel-inner"
                    data-carousel-options='{"loop": false,"responsive": {"0":{"items":1, "gutter": 16}}}'>

                    @foreach ($imgs as $img)
                        <div>
                            <a href="{{ asset(str_replace('public', 'storage', $img->pathname)) }}" class="gallery-item coverImg"
                                data-sub-html='Imagem do Imóvel'>
                                <img src="{{ asset(str_replace('public', 'storage', $img->pathname)) }}"
                                    alt="Imagem do Imóvel">
                            </a>
                        </div>
                    @endforeach

                    @if($imoveis->condominio_id != null)
                        @foreach ($imgsCondominio as $imgsCondominio)
                            
                            <div>
                                <a href="{{ asset(str_replace('public', 'storage', $imgsCondominio->pathname)) }}" class="gallery-item coverImg"
                                    data-sub-html='Imagem do Condominio'>
                                    <img src="{{ asset(str_replace('public', 'storage', $imgsCondominio->pathname)) }}"
                                        alt="Imagem do Condominio">
                                </a>
                            </div>
                        @endforeach
                    @endif
                    <!-- Item -->


                    <!-- Add as many gallery items wrapped in divs as you need -->
                </div>
            </div>
        </section>

        <!-- CONTEÚDO-->
        <section class="container mb-5 pb-1 ">
            <div class="row">
                <div class="col-md-8 mb-md-0 mb-4 divConteudo paddingItensDetalhes">

                    <div class="border-bottom mb-4">
                        <!-- PREÇO VENDA-->
                        @if ($imoveis->category == 'Venda')
                            <h2 class="h3 textoPrecoVenda" style="margin-bottom: 15px !important;">
                                R$ @money($imoveis->prop_price)
                            </h2>
                            <span id="precoVendaImovel" style="display: none">{{ $imoveis->prop_price }}</span>
                        @endif

                        <!-- PREÇO ALUGUEL-->
                        @if ($imoveis->category == 'Aluguel')
                            <h2 class="h3 textoPrecoVenda" style="margin-bottom: 15px !important;">
                                R$ @money($imoveis->prop_rent)<span
                                    class="d-inline-block ms-1 fs-base fw-normal text-body">/mês</span>
                            </h2>
                        @endif

                        <!-- PREÇO ALUGUEL-->
                        @if ($imoveis->category == 'VendaAluguel')
                            <div style="display: flex;">
                                <h2 class="h3 textoPrecoVenda" style="margin-bottom: 15px !important;">
                                    R$ @money($imoveis->prop_price)
                                </h2>
                                <h2 class="h3 textoPrecoVenda" style="margin-bottom: 15px !important;margin-right:15px;margin-left:15px">
                                    -
                                </h2>
                                <span id="precoVendaImovel" style="display: none">{{ $imoveis->prop_price }}</span>
                                <h2 class="h3 textoPrecoVenda" style="margin-bottom: 15px !important;">
                                    R$ @money($imoveis->prop_rent)<span class="d-inline-block ms-1 fs-base fw-normal text-body">/mês</span>
                                </h2>
                            </div>

                        @endif

                        <ul class="list-unstyled mb-4">
                            <li class="col d-flex justify-content-between liDetalhes">
                                <div class="divLiDetalhes">

                                    @if ($imoveis->category == 'Venda' || $imoveis->category == 'VendaAluguel')
                                        <b>Valor do m²: </b>R$@money($valorM2) por m²
                                    @endif

                                    @if ($imoveis->category == 'Aluguel')
                                        <b>Valor do m²: </b>R$@money($valorM2Aluguel) por m²
                                    @endif

                                </div>
                                <div class="formatacao-icones divLiDetalhes">
                                    <b>Compartilhar: &nbsp;</b>
                                    <div>
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2 botao-whats"
                                            href="https://api.whatsapp.com/send?text=https://.com/detalhes-imovel/{{ $imoveis->id }}">
                                            <i class="fi-whatsapp cor-icone-compartilhar"></i>
                                        </a>
                                        <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2 botao-face"
                                            href="https://www.facebook.com/sharer/sharer.php?u=https://.com/detalhes-imovel/{{ $imoveis->id }}">
                                            <i class="fi-facebook cor-icone-compartilhar"></i>
                                        </a>
                                    </div>

                                </div>
                            </li>
                            <!-- SE TIVER ALUGUEL -->
                            <li class="col d-flex justify-content-between liDetalhes">

                                @if ($imoveis->condominium_price != 0)
                                    <div class="divLiDetalhes">
                                        <b>Condomínio: </b>R$ @money($imoveis->condominium_price)
                                    </div>
                                @endif

                                @if ($imoveis->condominium_price == 0)
                                    <div class="divLiDetalhes">
                                        <b>Condomínio: </b>Não possui
                                    </div>
                                @endif
                                {{-- <div><b>Condomínio: </b>R$ @money($imoveis->condominium_price)</div> --}}
                                <div class="divLiDetalhes">
                                    <b>Código do Imóvel: </b>{{ $imoveis->prop_code }}
                                </div>
                            </li>
                        </ul>


                    </div>

                    {{-- <!-- DESCRIÇÃO -->
                        <div class="mb-4 pb-md-3">
                            <h3 class="h4">Sobre o Imóvel</h3>
                            <p class="mb-1">{{$imoveis->description}}.</p>
                            <div class="collapse" id="seeMoreOverview">
                                <p class="mb-1">Asperiores eos molestias, aspernatur assumenda vel corporis ex, magni excepturi totam exercitationem quia inventore quod amet labore impedit quae distinctio? Officiis blanditiis consequatur alias, atque, sed est incidunt accusamus repudiandae tempora repellendus obcaecati delectus ducimus inventore tempore harum numquam autem eligendi culpa.</p>
                            </div>
                            <a class="collapse-label collapsed" href="#seeMoreOverview" data-bs-toggle="collapse" data-bs-label-collapsed="Ver mais" data-bs-label-expanded="Mostrar menos" role="button" aria-expanded="false" aria-controls="seeMoreOverview"></a>
                        </div> --}}

                    <div id="descricaoSemFormato" style="display: none">{{ $imoveis->description }}</div>
                    

                    {{-- @if ($caracteresDescricao > 1000)
                        <!-- DESCRIÇÃO -->
                        <div class="mb-4 pb-md-3 cardDescricao">
                            <div class="conteudoDescricao">
                                <h3 class="h4">Sobre o Imóvel</h3>
                                <p class="mb-1" id="descricaoReformulada">

                                </p>

                                @foreach($configuracoesGerais as $configuracoesGerais)
                                    <p>
                                        {{$configuracoesGerais->descricao}}
                                    </p>
                                @endforeach

                            </div>
                            <a id="ler-maisDescricao" class="collapse-label collapsed" style="text-decoration: none">Mostrar Mais</a>
                        </div>
                    @else
                        <!-- DESCRIÇÃO -->
                        <div class="mb-4 pb-md-3 cardDescricao">
                            <div class="conteudoDescricaoPadrao">
                                <h3 class="h4">Sobre o Imóvel</h3>
                                <p class="mb-1 " id="descricaoReformulada">

                                </p>
                                @foreach($configuracoesGerais as $configuracoesGerais)
                                    <p>
                                        {{$configuracoesGerais->descricao}}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    @endif --}}

                    @if ($caracteresDescricao > 1000)
                        <div class="mb-4 pb-md-3 cardDescricao">
                            <div class="conteudoDescricao">
                                <h3 class="h4">Sobre o Imóvel</h3>

                                <p class="mb-1 ajusteDescricao" id="reduzirDescricao">
                                    {!! $descricSemFormato1 !!}
                                </p>

                                @foreach($configuracoesGerais as $configuracoesGerais)
                                    <br>
                                    <p id="descricaoGeralAjuste">
                                        {{$configuracoesGerais->descricao}}
                                    </p>
                                @endforeach

                            </div>

                            <a id="mostrarMaisBtn" onclick="toggleTexto()" class="collapse-label collapsed" style="text-decoration: none">Mostrar Mais</a>
                            
                            {{-- <button id="mostrarMaisBtn" onclick="toggleTexto()">Mostrar Mais</button> --}}
                        </div>
                    @else
                        <div class="mb-4 pb-md-3 cardDescricao">
                            <div class="conteudoDescricao">
                                <h3 class="h4">Sobre o Imóvel</h3>
                                <p class="mb-1 textoPequenoDescr">
                                    {!! $descricSemFormato1 !!}
                                </p>

                                @foreach($configuracoesGerais as $configuracoesGerais)
                                    <br>
                                    <p>
                                        {{$configuracoesGerais->descricao}}
                                    </p>
                                @endforeach

                            </div>

                        </div>
                    @endif

                    <!-- DETALHES DO IMÓVEL-->
                    <div class="mb-4 pb-md-3">
                        <h3 class="h4">Detalhes do Imóvel</h3>
                        <ul class="list-unstyled gridDetalhesImovel gy-1 mb-1 text-nowrap margin-top-icones">
                            <li class="col margin-bottom-detalhes ajusteIconesDetalhes">
                                <div class="margin-bottom-9px" style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" height="25" width="25" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32C14.3 32 0 46.3 0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7 14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H64V352zM320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32h64v64c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H320zM448 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32V352z"/></svg>
                                    <div class="textoDuploDetalhes">
                                        <span>Área</span>
                                        <span class="textoMenorDetalhes">Área útil</span>
                                    </div>
                                </div>
                                <b class="cor-preta-icone">{{ $imoveis->prop_size }} m²</b>
                            </li>

                            @if(isset($imoveis->bedroom) && $imoveis->bedroom > 0)
                            <li class="col margin-bottom-detalhes ajusteIconesDetalhes">
                                <div class="margin-bottom-9px" style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" height="25" width="25" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                                    {{-- <i class="fi-bed mt-n1 me-2 fs-lg align-middle tamanho-icone" style="margin-top: 2px !important"></i> --}}
                                    <div class="textoDuploDetalhes">
                                        <span>Total de Quartos</span>
                                        <span class="textoMenorDetalhes">Inclui suítes</span>
                                    </div>
                                    
                                </div>
                                @if ($imoveis->bedroom == '1')
                                    <b class="cor-preta-icone">{{ $imoveis->bedroom }} Quarto</b>
                                @else
                                    <b class="cor-preta-icone">{{ $imoveis->bedroom }} Quartos</b>
                                @endif
                            </li>
                            @endif

                            @if(isset($imoveis->suites) && $imoveis->suites > 0)
                            <li class="col margin-bottom-detalhes ajusteIconesDetalhes">
                                <div class="margin-bottom-9px" style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" height="25" width="25" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z"/></svg>
                                    <div class="textoDuploDetalhes">
                                        <span>Suítes</span>
                                        <span class="textoMenorDetalhes">Quartos com banheiro</span>
                                    </div>
                                </div>
                                @if ($imoveis->suites == '1')
                                    <b class="cor-preta-icone">{{ $imoveis->suites }} Suíte</b>
                                @else
                                    <b class="cor-preta-icone">{{ $imoveis->suites }} Suítes</b>
                                @endif
                            </li>
                            @endif

                            @if(isset($imoveis->bathrooms) && $imoveis->bathrooms > 0)
                            <li class="col margin-bottom-detalhes ajusteIconesDetalhes">
                                <div class="margin-bottom-9px" style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="25" height="25" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 131.9C64 112.1 80.1 96 99.9 96c9.5 0 18.6 3.8 25.4 10.5l16.2 16.2c-21 38.9-17.4 87.5 10.9 123L151 247c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0L345 121c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-1.3 1.3c-35.5-28.3-84.2-31.9-123-10.9L170.5 61.3C151.8 42.5 126.4 32 99.9 32C44.7 32 0 76.7 0 131.9V448c0 17.7 14.3 32 32 32s32-14.3 32-32V131.9zM256 352a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-128a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm32-32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                                    <div class="textoDuploDetalhes">
                                        <span>Banheiros</span>
                                        <span class="textoMenorDetalhes">Inclui suítes</span>
                                    </div>
                                </div>
                                @if ($imoveis->bathrooms == '1')
                                    <b class="cor-preta-icone">{{ $imoveis->bathrooms }} Banheiro</b>
                                @else
                                    <b class="cor-preta-icone">{{ $imoveis->bathrooms }} Banheiros</b>
                                @endif
                            </li>
                            @endif

                            @if(isset($imoveis->garage) && $imoveis->garage > 0)
                            <li class="col margin-bottom-detalhes ajusteIconesDetalhes">
                                <div class="margin-bottom-9px" style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="25" height="25" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                                    <div class="textoDuploDetalhes">
                                        <span>Vagas de Garagem</span>
                                        
                                    </div>
                                </div>
                                @if ($imoveis->garage == '1')
                                    <b class="cor-preta-icone">{{ $imoveis->garage }} Vaga</b>
                                @else
                                    <b class="cor-preta-icone">{{ $imoveis->garage }} Vagas</b>
                                @endif
                            </li>
                            @endif

                            @if(isset($imoveis->iptu_price))
                            <li class="col ajusteIconesDetalhes">
                                <div class="margin-bottom-9px" style="display: flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2 ajusteTamanhoSvg" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 112.5V422.3c0 18 10.1 35 27 41.3c87 32.5 174 10.3 261-11.9c79.8-20.3 159.6-40.7 239.3-18.9c23 6.3 48.7-9.5 48.7-33.4V89.7c0-18-10.1-35-27-41.3C462 15.9 375 38.1 288 60.3C208.2 80.6 128.4 100.9 48.7 79.1C25.6 72.8 0 88.6 0 112.5zM128 416H64V352c35.3 0 64 28.7 64 64zM64 224V160h64c0 35.3-28.7 64-64 64zM448 352c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM252 208c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z"/></svg>
                                    <div class="textoDuploDetalhes">
                                        <span>IPTU Anual</span>
                                        <span class="textoMenorDetalhes">IPTU do último ano</span>
                                    </div>
                                </div>

                                <b class="cor-preta-icone">R$ @money($imoveis->iptu_price)</b>
                            </li>
                            @endif
                        </ul>
                    </div>

                    @if(count($caracteristicas) > 0)
                        <!-- DIFERENCIAIS -->
                        <div class="mb-4 pb-md-3">
                            <h3 class="h4">Diferenciais</h3>

                            <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1 ">

                                @if(count($caracteristicas)>=1)
                                    <li class="col">
                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[0]->name }}
                                    </li>
                                @endif

                                @if(count($caracteristicas)>=2)
                                    <li class="col">
                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[1]->name }}
                                    </li>

                                    @if(count($caracteristicas)>=3)
                                        <li class="col">
                                            <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[2]->name }}
                                        </li>

                                        @if(count($caracteristicas)>=4)
                                            <li class="col">
                                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[3]->name }}
                                            </li>
                                            @if(count($caracteristicas)>=5)
                                                <li class="col">
                                                    <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[4]->name }}
                                                </li>
                                                @if(count($caracteristicas)>=6)
                                                    <li class="col">
                                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[5]->name }}
                                                    </li>
                                                    @if(count($caracteristicas)>=7)
                                                        <li class="col">
                                                            <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[6]->name }}
                                                        </li>
                                                        @if(count($caracteristicas)>=8)
                                                            <li class="col">
                                                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[7]->name }}
                                                            </li>
                                                            @if(count($caracteristicas)>=9)
                                                                <li class="col">
                                                                    <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[8]->name }}
                                                                </li>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif

                                        @endif
                                    @endif
                                @endif

                                {{-- @foreach ($caracteristicas as $item)
                                    <li class="col"><i
                                            class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $item->name }}</li>
                                @endforeach --}}

                            </ul>

                            <!-- Se tiver mais de 9 no banco mostrar o resto aqui -->
                            @if (count($caracteristicas) > 9)
                                <div class="divCaracteristicas localizarCaracteristicas" id="divCaracteristicas">
                                    <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1 ">                            
                                        @for ($i = 9; $i < count($caracteristicas); $i++) 
                                            <li class="col">
                                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[$i]->name}}
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                                <a id="ler-maisCaracteristicas" class="collapse-label collapsed" style="text-decoration: none;cursor: pointer;">Mostrar Mais</a>
                                {{-- <a class="collapse-label collapsed" href="#seeMoreAmenities" data-bs-toggle="collapse"
                                    data-bs-label-collapsed="Ver Mais" data-bs-label-expanded="Mostrar menos" role="button"
                                    aria-expanded="false" aria-controls="seeMoreAmenities"></a> --}}
                            @endif
                        </div>
                    @endif

                    @if($imoveis->condominio_id != null && count($caracteristicasCondominio) > 0)
                        <!-- CARACTERÍSTICAS DO CONDOMÍNIO -->
                        <div class="mb-4 pb-md-3">
                            <h3 class="h4">Características do condomínio</h3>

                            <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1">

                                @if(count($caracteristicasCondominio)>=1)
                                    <li class="col">
                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[0]->name }}
                                    </li>
                                @endif

                                @if(count($caracteristicasCondominio)>=2)
                                    <li class="col">
                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[1]->name }}
                                    </li>

                                    @if(count($caracteristicasCondominio)>=3)
                                        <li class="col">
                                            <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[2]->name }}
                                        </li>

                                        @if(count($caracteristicasCondominio)>=4)
                                            <li class="col">
                                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[3]->name }}
                                            </li>
                                            @if(count($caracteristicasCondominio)>=5)
                                                <li class="col">
                                                    <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[4]->name }}
                                                </li>
                                                @if(count($caracteristicasCondominio)>=6)
                                                    <li class="col">
                                                        <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[5]->name }}
                                                    </li>
                                                    @if(count($caracteristicasCondominio)>=7)
                                                        <li class="col">
                                                            <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[6]->name }}
                                                        </li>
                                                        @if(count($caracteristicasCondominio)>=8)
                                                            <li class="col">
                                                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[7]->name }}
                                                            </li>
                                                            @if(count($caracteristicasCondominio)>=9)
                                                                <li class="col">
                                                                    <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[8]->name }}
                                                                </li>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif

                                        @endif
                                    @endif
                                @endif

                                {{-- @foreach ($caracteristicas as $item)
                                    <li class="col"><i
                                            class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $item->name }}</li>
                                @endforeach --}}

                            </ul>

                            <!-- Se tiver mais de 9 no banco mostrar o resto aqui -->
                            @if (count($caracteristicasCondominio) > 9)
                                <div class="divCaracteristicas localizarCaracteristicasCond" id="divCaracteristicas">
                                    <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1">                            
                                        @for ($i = 9; $i < count($caracteristicasCondominio); $i++) 
                                            <li class="col">
                                                <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicasCondominio[$i]->name}}
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                                <a id="ler-maisCaracteristicasCond" class="collapse-label collapsed" style="text-decoration: none;cursor: pointer;">Mostrar Mais</a>
                                {{-- <a class="collapse-label collapsed" href="#seeMoreAmenities" data-bs-toggle="collapse"
                                    data-bs-label-collapsed="Ver Mais" data-bs-label-expanded="Mostrar menos" role="button"
                                    aria-expanded="false" aria-controls="seeMoreAmenities"></a> --}}
                            @endif
                        </div>
                    @endif

                    <!-- PROXIMO AO IMÓVEL -->
                    {{-- <div class="mb-4 pb-md-3">

                        <h3 class="h4">Próximo ao Imóvel</h3>

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"  data-action="ulDetalhesImovel">
                            <li class="nav-item" role="presentation" style="margin-right: 30px">
                              <button class="nav-link active" id="pills-mercados-tab" data-bs-toggle="pill" data-bs-target="#pills-mercados" type="button" role="tab" aria-controls="pills-mercados" aria-selected="true">Mercados</button>
                            </li>
                            <li class="nav-item" role="presentation" style="margin-right: 30px">
                              <button class="nav-link" id="pills-escolas-tab" data-bs-toggle="pill" data-bs-target="#pills-escolas" type="button" role="tab" aria-controls="pills-escolas" aria-selected="false">Escolas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-academias-tab" data-bs-toggle="pill" data-bs-target="#pills-academias" type="button" role="tab" aria-controls="pills-academias" aria-selected="false">Academias</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-mercados" role="tabpanel" aria-labelledby="pills-mercados-tab">
                                @if ($qtdMercado > 0)
                                    <div class="mb-4">
                                        
                                        @foreach ($localizacoes as $location)
                                            @if ($location->type == 'Super Mercado')
                                                <li class="col d-flex justify-content-between" style="margin-bottom:10px">
                                                    <div>{{ substr($location->name, 0, 35) }}</div>
                                                    <div>{{ $location->dist }}</div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="pills-escolas" role="tabpanel" aria-labelledby="pills-escolas-tab">
                                @if ($qtdEscola > 0)
                                    <div class="mb-4">
                                        
                                        @foreach ($localizacoes as $location)
                                            @if ($location->type == 'Escola')
                                                <li class="col d-flex justify-content-between" style="margin-bottom:10px">
                                                    <div>{{ substr($location->name, 0, 35) }}</div>
                                                    <div>{{ $location->dist }}</div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                            <div class="tab-pane fade" id="pills-academias" role="tabpanel" aria-labelledby="pills-academias-tab">
                                @if ($qtdRestaurante > 0)
                                    <div class="">
                                        
                                        @foreach ($localizacoes as $location)
                                            @if ($location->type == 'Restaurante')
                                                <li class="col d-flex justify-content-between" style="margin-bottom:10px">
                                                    <div>{{ substr($location->name, 0, 35) }}</div>
                                                    <div>{{ $location->dist }}</div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div> --}}

                    @if ($imoveis->url_video != '')
                        <!-- VÍDEO DO IMÓVEL -->
                        <div class="mb-4 pb-md-3">
                            <h3 class="h4">Vídeo do Imóvel</h3>
                            <iframe src="{{ $imoveis->id_youtube }}" class="tamanhoVideo"></iframe>

                            {{-- <div class="position-relative tamanhoVideo">
                                    <a class="btn btn-icon btn-light-primary text-primary rounded-circle position-absolute start-50 top-50 translate-middle zindex-5" href="https://www.youtube.com/watch?v=7PIji8OubXU" data-bs-toggle="lightbox" data-video="true" style="width: 4.5rem; height: 4.5rem;" data-lg-id="040aa035-77ab-4eff-b273-93cbebdd7a3d">
                                    <i class="fi-play-filled fs-sm"></i>
                                    </a>
                                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark rounded-3 opacity-40 zindex-1"></span>
                                    <img class="rounded-3" src="{{asset("assets/img/job-board/blog/15.jpg")}}" alt="Video cover">
                                </div> --}}
                        </div>
                    @endif

                    @if ($imoveis->category == 'Venda')
                        <!-- VALOR DO FINANCIAMENTO -->
                        <div class="container mb-4 px-0 ">
                            <div class="rounded-3 container-financiamento padding-top-bottom-32px px-sm-5 px-4">
                                <div>
                                    <h2>Simule o Financiamento do Imóvel</h2>
                                    <p class="mb-4 pb-2 font-caixa-descricao" id="textoFormFinanciamento"></p>
                                    <p class="margin-bottom-10px" style="font-size: 11px;">Simulação feita com taxa de
                                        juros anual de 12%. Taxas e condições podem variar para cada caso.</p>
                                    <button
                                        class="btn btn-lg btn-branco-borda d-block w-100 formatar-texto-caixa-imovel padding-button-caixa"
                                        style="max-width:268px" type="submit" href="#calculadoraModal"
                                        data-bs-toggle="modal">Simular um Financiamento</button>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>

                <!-- Sidebar-->
                <aside class="col-lg-4 col-md-5 ms-lg-auto pb-1 divSideBar paddingAjustesMobile-20">
                    <!-- Contact card-->
                    @php
                        $dados = App\Http\Controllers\User\DadosUserController::getDados();
                    @endphp
    
                    @if(isset($dados) && $dados->count() > 0)
                        @foreach ($dados as $dado)
            
                            @php
                                
                                $minhaString = $dado->whatsapp;

                                $stringTelefone = $dado->phone;
        
                                // Remove '(' e ')' da string
                                $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);

                                $telefoneSemCaractere = str_replace(array('(', ')', ' ', '-'), '', $stringTelefone);
        
                            @endphp

                        <div class="card shadow-sm mb-4">
                            <div class="card-body" style="padding: 0px !important;">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h5 class="mb-4" style="font-size: 25px;text-align:center;background-color:#eeaa11;color:white;width:100%;border-radius: 7px 7px 0px 0px ;padding: 10px 0px 10px 0px">Entre em Contato</h5>
                                </div>

                                <div style="padding: 0px 20px 25px 20px;">
                                    <p style="margin-bottom: 20px !important;font-size: 15px !important;text-align: center;color:black !important">Para saber mais detalhes sobre este imóvel, fale conosco por um dos canais disponíveis.</p>
   
                                    <p class="border-bottom" style="text-align: center;padding-bottom:20px;margin-top:10px;font-size:18px;" onmouseover="this.style.color='#eeaa11'" onmouseout="this.style.color='black'">
                                        <a class="nav-link fw-normal p-0" href="tel:{{$semCaracteres}}">
                                            <i class="fi-phone mt-n1 me-2 align-middle"></i>
                                            {{$dado->whatsapp}}
                                        </a>
                                    </p>
    
                                    <div class="divRedesHome" style="justify-content: center;margin-top:25px">
                                        <div class="">
                                            @if(isset($semCaracteres))
                                                <a class="btn btn-icon btn-light-primary btn-xs me-2" style="font-size: 17px;padding: 20px;background-color:#eeaa11" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}&text=Olá, gostaria de mais informações sobre o imóvel {{ $textoSemParenteses }} - ({{ $imoveis->prop_code }})." target="_blank">
                                                    <i class="fi-whatsapp" style="color:white"></i>
                                                </a>
                                            @endif
    
                                            @if(isset($dado->facebook))
                                                <a class="btn btn-icon btn-light-primary btn-xs me-2" style="font-size: 17px;padding: 20px;background-color:#eeaa11" href="{{$dado->facebook}}" target="_blank">
                                                    <i class="fi-facebook" style="color:white"></i>
                                                    
                                                </a>
                                            @endif
    
                                            @if(isset($dado->instagram))
                                                <a class="btn btn-icon btn-light-primary btn-xs me-2" style="font-size: 17px;padding: 20px;background-color:#eeaa11" href="{{$dado->instagram}}" target="_blank">
                                                    <i class="fi-instagram" style="color:white"></i>
                                                </a>
                                            @endif
                                        </div>  
                                    </div>
                                </div>




                                {{-- <!-- Contact form-->
                                <form class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Nome Completo*" required>
                                        <div class="invalid-feedback">Digite seu nome</div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="email" placeholder="E-mail*" required>
                                        <div class="invalid-feedback">Digite um e-mail</div>
                                    </div>
                                    <input class="form-control mb-3" type="tel" placeholder="Telefone">
                                    <textarea class="form-control mb-3" rows="3" placeholder="Mensagem" style="resize: none;"></textarea>
                                    <button class="btn btn-lg btn-primary d-block w-100" type="submit">FALAR COM A IMOBILIÁRIA</button>
                                </form> --}}
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <!-- Location (Map)-->
                    <div class="pt-2">
                        <div class="position-relative mb-2">
                            <script>
                                function initMap() {

                                    var macc = {
                                        lat: {{ $imoveis->lat }},
                                        lng: {{ $imoveis->lng }}
                                    };

                                    var map = new google.maps.Map(

                                        document.getElementById('mapDetalhes'), {
                                            zoom: 15,
                                            streetViewControl: false,
                                            center: macc
                                        }
                                    );

                                    // var marker = new google.maps.Marker({
                                    //     position: macc,
                                    //     map: map
                                    // });

                                    var marker = new google.maps.Circle({
                                        strokeColor: "#fcb926",
                                        strokeOpacity: 0.8,
                                        strokeWeight: 2,
                                        fillColor: "#fcb926",
                                        fillOpacity: 0.35,
                                        center: macc,
                                        map: map,
                                        radius: 300,
                                    });

                                }
                            </script>
                            <div id="mapDetalhes"></div>
                            <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&callback=initMap"></script>
                        </div>
                        <p class="mb-0 fs-sm text-center texto-iniciais-maiusculas">
                            {{ $imoveis->street }} - {{ $imoveis->district }}</p>
                    </div>

                </aside>

            </div>
        </section>

        @if($quantidadeImoveisSemelhantes > 0)
        <!-- Imóveis Semelhantes-->
        <section class="container mb-5 pb-2 pb-lg-4 paddingAjustesMobile-20">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="h3 mb-0">Imóveis Semelhantes</h2><a class="btn btn-link fw-normal p-0"
                    href="{{ route('home5') }}">Ver Todos<i class="fi-arrow-long-right ms-2"></i></a>
            </div>
            <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
                <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4"
                    data-carousel-options='{"controls": true ,"nav": false,"loop": false ,"items": 4, "responsive": {"0":{"items":1, "gutter": 10},"500":{"items":2, "gutter": 10},"768":{"items":3, "gutter": 10},"992":{"items":4, "gutter": 10}}}'>


                    @foreach ($resultadoSemelhantes as $imovel)
                        @php
                            
                            $imgs = App\Http\Controllers\User\ListController::getImagesPropertie($imovel->id);

                            
                            
                            if ($imovel->prop_price != null) {
                                $numeroVendaFormatado = number_format($imovel->prop_price, 2, ',', '.');
                            }
                            
                            $qtdImgsSemelhants = count($imgs);

                            $textoSemParentesesSemelhante = preg_replace('/\([^)]+\)/', '', $imovel->title);

                            if ($imovel->prop_rent != null) {
                                $numeroAluguelformatado = number_format($imovel->prop_rent, 2, ',', '.');
                            }
                            
                            $typePropertie = App\Http\Controllers\User\ListController::getTypePropertie($imovel->type_prop_id);
                            
                        @endphp

                        <div class="col">
                            <div class="card shadow-sm card-hover border-0 h-100">
                                <div class="card-img-top card-img-hover">
                                    <a class="img-overlay" href="#"></a>
                                    <div class="position-absolute start-0 top-0 pt-3 ps-3">
                                        @if($imoveis->category == 'Venda')
                                            <span class="d-table badge background-venda mb-1">{{ $imoveis->category }}</span>
                                        @else
                                            <span class="d-table badge background-aluguel mb-1">{{ $imoveis->category }}</span>
                                        @endif
                                    </div>
                                    @if($qtdImgsSemelhants > 1)
                                    <div id="{{ $imovel->prop_code }}" class="carousel slide" style="height:200px">
                                        <div class="carousel-inner" style="height: 100%">
                                            @foreach ($imgs as $item)
                                                @if ($loop->first)
                                                    <div class="carousel-item active imagemHomeCarrossel">
                                                        <img class="d-block w-100"
                                                            src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                                            alt="">
                                                    </div>
                                                @else
                                                    <div class="carousel-item imagemHomeCarrossel">
                                                        <img class="d-block w-100"
                                                            src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#{{ $imovel->prop_code }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon ajuste-next-anterior" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#{{ $imovel->prop_code }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon ajuste-next" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    @else
                                    <div id="{{ $imovel->prop_code }}" class="carousel slide" style="height:200px">
                                        <div class="carousel-inner" style="height: 100%">
                                            @foreach ($imgs as $item)
                                                @if ($loop->first)
                                                    <div class="carousel-item active imagemHomeCarrossel">
                                                        <img class="d-block w-100"
                                                            src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                                            alt="">
                                                    </div>
                                                @else
                                                    <div class="carousel-item imagemHomeCarrossel">
                                                        <img class="d-block w-100"
                                                            src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="card-body position-relative pb-3">
                                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">
                                        @foreach ($typePropertie as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </h4>
                                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link"
                                            href="#">{{ $textoSemParentesesSemelhante }}</a></h3>
                                    <p class="mb-2 fs-sm text-muted">
                                        {{ $imovel->street }}&nbsp;- {{ $imovel->district }} -
                                        {{ $imovel->city_name }}/{{ $imovel->state }}</p>
                                    </p>
                                    <div class="fw-bold" style="font-size:20px">
                                        @if ($imovel->prop_price != null)
                                            R$ {{ $numeroVendaFormatado }}
                                        @else
                                            R$ {{ $numeroAluguelformatado }}
                                            <span class="textoMesAluguel">/ mês</span>
                                        @endif
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                                    <div class=" d-flex align-items-center justify-content-center text-nowrap"
                                        style="margin-bottom:5px">
                                        <span class="fs-sm" style="display: flex; align-items: center;">
                                            {{ $imovel->prop_size }} m²

                                            <img src="{{ asset('assets/img/icons/bed.svg') }}" width="16"
                                                height="18" alt="area imovel" style="margin-left: 4px">
                                        </span>
                                        <span class="d-inline-block padding-icon-card fs-sm">
                                            {{ $imovel->bedroom }}

                                            <i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i>
                                        </span>
                                        <span class="d-inline-block padding-icon-card fs-sm">
                                            {{ $imovel->bathrooms }}

                                            <i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i>
                                        </span>
                                        <span class="d-inline-block padding-icon-card fs-sm">
                                            {{ $imovel->garage }}

                                            <i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        @endif

        <!-- Mobile app CTA-->
        <section class="container pb-3 pb-sm-4 pb-md-5 paddingAjustesMobile-20 removerPaddingBottomMobile">
            <div class="row align-items-center pb-5">
                <div class="col-md-5 col-lg-6"><img class="d-block mx-auto"
                        src={{ asset('assets/img/suaempresa/imovel-cel.png') }} width="460" alt="Mobile App"></div>
                <div class="col-md-7 col-lg-6 col-xl-5 offset-xl-1 text-center text-md-start mb-4 mb-md-0">
                    <h2 class="mb-4 textoProcuraImoveis">Nós procuramos o imóvel perfeito para você!</h2>
                    <p class="fs-lg opacity-70 mb-md-5">Conte o que você está procurando e enviaremos as opções ideais para
                        o seu perfil via e-mail e WhatsApp.</p>
                  
                        
                    <button class="btn btn-lg btn-primary d-block w-100">
                        <a data-bs-toggle="modal" class="botaoReceberImoveis">
                            Receber Imóveis
                        </a>

                    </button>
                </div>
            </div>
        </section>

        <script>
            const rangeInput = document.getElementById('rangeInput');
            const rangeValue = document.getElementById('rangeValue');

            var atualizarCampoEntrada = document.getElementById('entrada-imovel');

            function formatarNumeroBrasileiro(numero) {
                var numeroFormatado = new Intl.NumberFormat('pt-BR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(numero);

                return numeroFormatado;
            }

            
            rangeInput.addEventListener('input', function() {
                rangeValue.textContent = rangeInput.value + ' %';

                var inputEntradaForm = document.getElementById('entrada-imovel');

                var precoImovelSemFormatar = document.getElementById('preco-imovel').value;

                let precoFormatado = precoImovelSemFormatar.replace(/,/g, "").replace(/\./g, "");
                let primeiraParte = precoFormatado.slice(0, -2);
                let duasUltimasLetras = precoFormatado.slice(-2);
                let resultado = primeiraParte + '.' + duasUltimasLetras;
                let resultadoConvertido = Number(resultado);


                var porcentagemConvertida = rangeInput.value / 100;

                var valorFinalConta = porcentagemConvertida * resultadoConvertido;
                
                valorFinalConta = parseFloat(valorFinalConta);

                valorFinalConta = formatarNumeroBrasileiro(valorFinalConta);

                // valorFinalConta = valorFinalConta.toLocaleString('pt-BR', { minimumFractionDigits: 2 } );

                inputEntradaForm.value = valorFinalConta;
            });

            const rangeInputAnos = document.getElementById('rangeInputAnos');
            const rangeValueAnos = document.getElementById('rangeValueAnos');

            rangeInputAnos.addEventListener('input', function() {
                if(rangeInputAnos.value > 1){
                    rangeValueAnos.textContent = rangeInputAnos.value + ' anos';
                }
                else{
                    rangeValueAnos.textContent = rangeInputAnos.value + ' ano';
                }


            });

            const formFinanciamento = document.getElementById('formFinanciamento');



            

            var descricSemFormato = document.getElementById('descricaoSemFormato');

            var descricSemFormato = descricSemFormato.textContent.replace(/\n/g, '<br>');

            console.log('Descrição ' + descricSemFormato);

            var descricResposta = document.getElementById('descricaoReformulada');

            descricResposta.innerHTML = descricSemFormato;
            


            function calcularFinanciamentoSAC(valorPrincipal, taxaJurosAnual, prazoEmMeses) {
                const taxaJurosMensal = taxaJurosAnual / 12 / 100;
                const amortizacaoMensal = valorPrincipal / prazoEmMeses;
                let saldoDevedor = valorPrincipal;
                const parcelas = [];

                for (let i = 1; i <= prazoEmMeses; i++) {
                    const jurosMensais = saldoDevedor * taxaJurosMensal;
                    const prestacaoMensal = amortizacaoMensal + jurosMensais;
                    saldoDevedor -= amortizacaoMensal;

                    parcelas.push({
                        mes: i,
                        amortizacao: amortizacaoMensal.toFixed(2),
                        juros: jurosMensais.toFixed(2),
                        prestacao: prestacaoMensal.toFixed(2),
                        saldoDevedor: saldoDevedor.toFixed(2),
                    });
                }

                return parcelas;
            }


            var precoVenda = document.getElementById('precoVendaImovel');
            var precoVendaConteudo = precoVenda.textContent;
            precoVendaConteudo = Number(precoVendaConteudo);

            let porcentagemValorFormulario = precoVendaConteudo * 0.20;
            let valorFormulario = precoVendaConteudo - porcentagemValorFormulario;

            let resultadoFormulario = calcularFinanciamentoSAC(valorFormulario, 12, 360);

            resultadoMaior = Number(resultadoFormulario[0].prestacao);
            resultadoMenor = Number(resultadoFormulario[359].prestacao)

            resultadoMenor = resultadoMenor.toLocaleString('pt-BR');
            resultadoMaior = resultadoMaior.toLocaleString('pt-BR');

            var textoFormFinanc = document.getElementById('textoFormFinanciamento');
            textoFormFinanc.textContent = "Financiando este imóvel com 20% de entrada em 30 anos, a parcela maior sai por R$ " +
                resultadoMaior + " e a menor por R$ " + resultadoMenor;

            formFinanciamento.addEventListener('input', function(event) {
                event.preventDefault();

                const precoImovel = document.getElementById('preco-imovel').value;
                const entrada = document.getElementById('entrada-imovel').value;
                // const taxa = document.getElementById('taxaJuros-imovel').value;
                const prazo = document.getElementById('rangeInputAnos').value;

                let precoFormatado = precoImovel.replace(/,/g, "").replace(/\./g, "");
                let primeiraParte = precoFormatado.slice(0, -2);
                let duasUltimasLetras = precoFormatado.slice(-2);
                let resultado = primeiraParte + '.' + duasUltimasLetras;
                let resultadoConvertido = Number(resultado);

                let precoFormatadoEntrada = entrada.replace(/,/g, "").replace(/\./g, "");
                let primeiraParteEntrada = precoFormatadoEntrada.slice(0, -2);
                let duasUltimasLetrasEntrada = precoFormatadoEntrada.slice(-2);
                let resultadoEntrada = primeiraParteEntrada + '.' + duasUltimasLetrasEntrada;
                let resultadoConvertidoEntrada = Number(resultadoEntrada);

                const prazoEmMeses = prazo * 12;
                let valorPreco = resultadoConvertido - resultadoConvertidoEntrada;

                const parcelas = calcularFinanciamentoSAC(valorPreco, 12, prazoEmMeses);

                const valorMaior = document.getElementById('valueMaior');
                const valorMenor = document.getElementById('valueMenor');

                let stringParcelaMaior = Number(parcelas[0].prestacao);
                let numeroBrasileiroMaior = stringParcelaMaior.toLocaleString('pt-BR');

                let stringTeste = parcelas[prazoEmMeses - 1].prestacao;
                let stringParcelaMenor = Number(stringTeste);
                let numeroBrasileiroMenor = stringParcelaMenor.toLocaleString('pt-BR');

                valorMaior.textContent = "R$ " + numeroBrasileiroMaior;
                valorMenor.textContent = "R$ " + numeroBrasileiroMenor;

                document.getElementById('valorFinanciamento').classList.remove('hiddenResultadoFinanciamento');
                document.getElementById('valorFinanciamento').classList.add('formatacaoResultadoSimulacao');

                const elementoPorcentagem = document.getElementById('valorPorcentagemCalculo');

                elementoPorcentagem.textContent = "Simulação feita com taxa de juros de 12% Anual. Taxas e condições podem variar para cada caso";

            });

            const inputEntrada = document.getElementById('entrada-imovel');
            const inputPorcentagem = document.getElementById('porcentagem-imovel');


            inputPorcentagem.addEventListener('input', function() {

                let preco = document.getElementById('preco-imovel').value;

                let precoFormatado = preco.replace(/,/g, "").replace(/\./g, "");
                let primeiraParte = precoFormatado.slice(0, -2);
                let duasUltimasLetras = precoFormatado.slice(-2);
                let resultado = primeiraParte + '.' + duasUltimasLetras;
                let resultadoConvertido = Number(resultado);

                let porcentagem = inputPorcentagem.value / 100;

                if (resultadoConvertido != "") {

                    let entradaValor = resultadoConvertido * porcentagem;

                    let entradaValorString = entradaValor.toString();

                    entradaValorString = entradaValorString + "00";

                    entradaValorString = entradaValorString.replace(/\D/g, '')
                    entradaValorString = (entradaValorString / 100).toFixed(2) + "";
                    entradaValorString = entradaValorString.replace(".", ",");
                    entradaValorString = entradaValorString.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
                    entradaValorString = entradaValorString.replace(/(\d)(\d{3}),/g, "$1.$2,");

                    inputEntrada.value = entradaValorString;
                }

            });

            inputEntrada.addEventListener('input', function() {

                let preco = document.getElementById('preco-imovel').value;

                let precoFormatado = preco.replace(/,/g, "").replace(/\./g, "");
                let primeiraParte = precoFormatado.slice(0, -2);
                let duasUltimasLetras = precoFormatado.slice(-2);
                let resultado = primeiraParte + '.' + duasUltimasLetras;
                let resultadoConvertido = Number(resultado);

                let valorEntrada = inputEntrada.value;

                let precoFormatadoEntrada = valorEntrada.replace(/,/g, "").replace(/\./g, "");
                let primeiraParteEntrada = precoFormatadoEntrada.slice(0, -2);
                let duasUltimasLetrasEntrada = precoFormatadoEntrada.slice(-2);
                let resultadoEntrada = primeiraParteEntrada + '.' + duasUltimasLetrasEntrada;
                let resultadoConvertidoEntrada = Number(resultadoEntrada);

                if (resultadoConvertido != "") {
                    inputPorcentagem.value = (resultadoConvertidoEntrada * 100) / resultadoConvertido;
                }

            });



            var buttonLerMais = document.getElementById('ler-maisDescricao');

            if (buttonLerMais){
                buttonLerMais.addEventListener('click', function() {
                    var cardDescricao = document.querySelector('.cardDescricao');

                    if (cardDescricao.classList.contains('active')) {

                        cardDescricao.classList.remove('active');

                        buttonLerMais.textContent = "Mostrar mais";
                    } else {
                        cardDescricao.classList.add('active');

                        buttonLerMais.textContent = "Mostrar menos";
                    }
                });
            }    

            function toggleTexto() {
                
                var textoDiv = document.getElementById('reduzirDescricao');

                var textoGeral = document.getElementById('descricaoGeralAjuste');

                var btn = document.getElementById("mostrarMaisBtn");

                if (textoDiv.style.height === '100%') {
                    textoDiv.style.height = '320px'; // Ou qualquer valor desejado
                    textoGeral.style.display = 'none';
                    btn.innerText = "Mostrar Mais";
                } else {
                    textoDiv.style.height = '100%';
                    textoGeral.style.display = 'block';
                    btn.innerText = "Mostrar Menos";
                }
            }

        </script>
    @endforeach

    <script>
        var buttonCaracteristicas = document.getElementById('ler-maisCaracteristicas');

        
        
        if(buttonCaracteristicas){
            buttonCaracteristicas.addEventListener('click', function() {
                var divCaracteristicas = document.querySelector('.localizarCaracteristicas');
                
                if (divCaracteristicas.classList.contains('divCaracteristicas')) {

                    divCaracteristicas.classList.remove('divCaracteristicas');
                    divCaracteristicas.classList.add('divCaracteristicasBlock');

                    buttonCaracteristicas.textContent = "Mostrar menos";
                } else {

                    divCaracteristicas.classList.remove('divCaracteristicasBlock');
                    divCaracteristicas.classList.add('divCaracteristicas');

                    buttonCaracteristicas.textContent = "Mostrar mais";
                }
            });
        }

        var buttonCaracteristicasCond = document.getElementById('ler-maisCaracteristicasCond');

        if(buttonCaracteristicasCond){
            buttonCaracteristicasCond.addEventListener('click', function() {
                var divCaracteristicas = document.querySelector('.localizarCaracteristicasCond');
                
                if (divCaracteristicas.classList.contains('divCaracteristicas')) {

                    divCaracteristicas.classList.remove('divCaracteristicas');
                    divCaracteristicas.classList.add('divCaracteristicasBlock');

                    buttonCaracteristicasCond.textContent = "Mostrar menos";
                } else {

                    divCaracteristicas.classList.remove('divCaracteristicasBlock');
                    divCaracteristicas.classList.add('divCaracteristicas');

                    buttonCaracteristicasCond.textContent = "Mostrar mais";
                }
            });
        }

    </script>

@endsection
