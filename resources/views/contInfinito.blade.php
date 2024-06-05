@if(isset($properties) && $properties->count() > 0)  
    @foreach ($properties as $imoveis)

        @php
            $imgs = App\Http\Controllers\User\ListController::getImagesPropertie($imoveis->id);

            $cidadeImovel = App\Http\Controllers\User\ListController::getCitie($imoveis->city_id);

            $numeroAluguelformatado = null;
            
            if ($imoveis->prop_price != null) {
                $numeroVendaFormatado = number_format($imoveis->prop_price, 2, ',', '.');
            }

            if ($imoveis->prop_rent != null) {
                $numeroAluguelformatado = number_format($imoveis->prop_rent, 2, ',', '.');
            }

            $textoSemParenteses = preg_replace('/\([^)]+\)/', '', $imoveis->title);

            $quantidadeImagens = count($imgs);

            $typePropertie = App\Http\Controllers\User\ListController::getTypePropertie($imoveis->type_prop_id);
        @endphp

        <div class="col-sm-6 col-xl-3 col-lg-4 itemHomeInfinito" id="item-prop" style="margin-bottom: 20px">
            <div class="card shadow-sm card-hover border-0 h-100">
                <div class="tns-carousel-wrapper card-img-top card-img-hover">
                    <a class="img-overlay"
                        href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3">
                        @if($imoveis->category == 'Venda')
                            <span class="d-table badge background-venda mb-1">{{ $imoveis->category }}</span>
                        @else
                            @if($imoveis->category == 'Aluguel')
                            <span class="d-table badge background-aluguel mb-1">{{ $imoveis->category }}</span>
                            @else
                            <span class="d-table badge background-Vendaaluguel mb-1">Venda e Aluguel</span>
                            @endif
                        @endif
                    </div>
                    {{-- <div class="content-overlay end-0 top-0 pt-3 pe-3">
                        <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle"
                            type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Adicionar aos favoritos"><i class="fi-play"></i></button>
                    </div> --}}
                    @if($imoveis->id_youtube != 'https://www.youtube.com/embed/error' && $imoveis->id_youtube != 'https://www.youtube.com/embed/undefined' && $imoveis->id_youtube != null)
                        <div class="position-absolute end-0 top-0 pt-3 pe-3">
                            <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle botaoVideoItem"
                                type="button" data-bs-toggle="tooltip" style="" data-bs-placement="left"
                                title="Possui Vídeo">
                                <i class="fi-play" style="margin-left: 3px;color: #EEAA11"></i></button>
                        </div>
                    @endif
                    
                    @if($quantidadeImagens>1)
                    <div id="{{$imoveis->prop_code}}" class="carousel slide" style="height:200px">
                        <div class="carousel-inner" style="height: 100%">
                            @foreach ($imgs as $item)
                                @if($loop->first)
                                <div class="carousel-item active imagemHomeCarrossel">
                                    <img class="d-block w-100" src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                    alt="">
                                </div>
                                @else
                                <div class="carousel-item imagemHomeCarrossel">
                                    <img class="d-block w-100" src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                    alt="">
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#{{$imoveis->prop_code}}" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon ajuste-next-anterior" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#{{$imoveis->prop_code}}" data-bs-slide="next">
                          <span class="carousel-control-next-icon ajuste-next" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    @else
                    <div id="{{$imoveis->prop_code}}" class="carousel slide" style="height:200px">
                        <div class="carousel-inner" style="height: 100%">
                            @foreach ($imgs as $item)
                                @if($loop->first)
                                <div class="carousel-item active imagemHomeCarrossel">
                                    <img class="d-block w-100" src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                    alt="">
                                </div>
                                @else
                                <div class="carousel-item imagemHomeCarrossel">
                                    <img class="d-block w-100" src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                    alt="">
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-body position-relative pb-3">
                    <div style="display: flex;align-items:center;justify-content: space-between;    margin-bottom: 10px;">         
                        <a class="nav-link"
                        href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">           
                            <h4 class="fs-xs fw-normal text-uppercase text-primary" style="margin: 0px">
                                @foreach ($typePropertie as $item)
                                    {{ $item->name }}
                                @endforeach
                            </h4>
                        </a>

                        @php
                            $dados = App\Http\Controllers\User\DadosUserController::getDados();
                        @endphp

                        @if(isset($dados) && $dados->count() > 0)
                            @foreach ($dados as $dado)

                            @php
                                
                                $minhaString = $dado->whatsapp;
  
                                // Remove '(' e ')' da string
                                $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);


        
                            @endphp

                            <div class="d-flex align-items-center justify-content-center text-nowrap">
                                
                                <a class="btn btn-icon botao-whats-card btn-xs shadow-sm rounded-circle"
                                    href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}&text=Olá, gostaria de mais informações sobre o imóvel {{ $textoSemParenteses }} - ({{ $imoveis->prop_code }})." target="_blank"><i class="fi-whatsapp"></i></a>
                            </div>

                            @endforeach
                        @endif

                    </div>

                    <h3 class="h6 mb-2 fs-base text-capitalize"><a class="nav-link"
                            href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">{{ $textoSemParenteses }}</a></h3>
                    <p class="mb-2 fs-sm text-muted">
                        <a class="nav-link"
                            href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">
                        {{ $imoveis->street }}&nbsp;- {{$imoveis->district}} - {{$cidadeImovel->citie}}/{{ $imoveis->state }}
                        </a>
                    </p>
                    <div class="fw-bold" style="font-size:20px">
                        {{-- <i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i> --}}
                        <a class="nav-link"
                        href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">
                            @if ($imoveis->category == 'Venda')
                                R$ {{ $numeroVendaFormatado }}
                            @else
                                @if($imoveis->category == 'Aluguel')
                                    R$ {{ $numeroAluguelformatado }}
                                    <span class="textoMesAluguel">/ mês</span>
                                @else
                                    <div style="display: flex;justify-content:space-between">
                                        <span style="font-size:15px">R$ {{ $numeroVendaFormatado }}</span>
                                        <span style="font-size:15px">R$ {{ $numeroAluguelformatado }} <span class="textoMesAluguel">/ mês</span></span>
                                    </div>

                                @endif
                            @endif
                        </a>
                    </div>
                </div>
                <div class="d-flex justify-content-center card-footer mx-3 pt-3 remover-padding-card" style="flex-flow: wrap;">
                    <div class=" d-flex align-items-center justify-content-center text-nowrap" style="margin-bottom:5px">
                        <span class="fs-sm" style="display: flex; align-items: center;">
                            {{ $imoveis->prop_size }} m²
                            {{-- <i class="fi-checkbox ms-1 mt-n1 fs-lg text-muted"></i></span> --}}
                            <img src="assets/img/icons/bed.svg" width="16" height="18" alt="area imovel" style="margin-left: 4px">
                        </span>
                        <span class="d-inline-block padding-icon-card fs-sm">
                            {{ $imoveis->bedroom }}

                            <i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i>
                        </span>
                        <span class="d-inline-block padding-icon-card fs-sm">
                            {{ $imoveis->bathrooms }}

                            <i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i>
                        </span>
                        <span class="d-inline-block padding-icon-card fs-sm">
                            {{ $imoveis->garage }}

                            <i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i>
                        </span>
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-center text-nowrap">
                        <a class="btn btn-icon botao-email-card btn-xs shadow-sm rounded-circle me-2"
                            href="#"><i class="fi-mail"></i></a>
                        <a class="btn btn-icon botao-whats-card btn-xs shadow-sm rounded-circle"
                            href="#"><i class="fi-whatsapp"></i></a>
                    </div> --}}
                </div>

            </div>
        </div>
    @endforeach
@else
    <h1 style="text-align:center;margin-bottom:50px;font-size: 20px;">
        Nenhum Imóvel disponível
    </h1>
@endif    