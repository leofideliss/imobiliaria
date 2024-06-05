@if(isset($properties) && $properties->count() > 0)  
    <div class="rowImovelPaginacao gy-md-5 gy-4">
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

            <div class="divCardImovelPaginacao itemHomeInfinito" id="item-prop" style="margin-bottom: 20px">
                {{-- <div class="card shadow-sm card-hover border-0 h-100"> --}}
                <div class="border-0 h-100">
                    <div class="tns-carousel-wrapper card-img-top card-img-hover" style="border-radius: 5%;">
                        <a class="img-overlay"
                            href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}"></a>
                        <div class="position-absolute start-0 top-0 pt-3 ps-3">
                            @if($imoveis->category == 'Venda')
                                <span class="d-table badge background-venda mb-1">{{ $imoveis->category }}</span>
                            @else
                                <span class="d-table badge background-aluguel mb-1">{{ $imoveis->category }}</span>
                            @endif
                        </div>
                        {{-- <div class="content-overlay end-0 top-0 pt-3 pe-3">
                            <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Adicionar aos favoritos"><i class="fi-heart"></i></button>
                        </div> --}}
                        @if($imoveis->id_youtube != 'https://www.youtube.com/embed/error' && $imoveis->id_youtube != 'https://www.youtube.com/embed/undefined' && $imoveis->id_youtube != null)
                            <div class="position-absolute end-0 top-0 pt-3 pe-3">
                                <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle botaoVideoItem"
                                    type="button" data-bs-toggle="tooltip" style="" data-bs-placement="left"
                                    title="Possui Vídeo">
                                    <i class="fi-play" style="margin-left: 3px;color: #EEAA11"></i>
                                </button>
                            </div>
                        @endif
                        
                        @if($quantidadeImagens>1)
                        <div id="{{$imoveis->prop_code}}" class="carousel slide" style="height:218px">
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
                    <div class="card-body position-relative" style="padding-top: 10px">
                        <div style="display: flex;align-items:center;justify-content: space-between;margin-bottom: 5px">         
                            <a class="nav-link"
                            href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">           
                                <h4 class="fs-xs fw-normal text-uppercase text-primary" style="margin: 0px;font-weight: 800 !important;">
                                    @foreach ($typePropertie as $item)
                                        {{ $item->name }}
                                    @endforeach
                                </h4>
                            </a>
                        </div>

                        {{-- <h3 class="h6 mb-2 fs-base text-capitalize"><a class="nav-link"
                                href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">{{ $imoveis->title }}</a></h3> --}}
                        <div class="fw-bold" style="font-size:20px;color:black;margin-bottom:5px">
                            {{-- <i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i> --}}
                            <a class="nav-link"
                            href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">
                                @if ($imoveis->category == 'Venda')
                                    R$ {{ $numeroVendaFormatado }}
                                @else
                                    R$ {{ $numeroAluguelformatado }}
                                    <span class="textoMesAluguel">/mês</span>
                                @endif
                            </a>
                        </div>
                        <p class="fs-sm text-muted" style="margin-bottom: 0px;margin-bottom:5px">
                            <a class="nav-link" style="font-size: 12px;color: black;"
                                href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">
                            {{ $imoveis->street }}&nbsp;- {{$imoveis->district}} - {{$cidadeImovel->citie}}/{{ $imoveis->state }}
                            </a>
                        </p>

                    </div>
                    <div class="d-flex card-footer remover-padding-card" style="flex-flow: wrap;">
                        <div class=" d-flex align-items-center" style="margin-bottom:5px;flex-wrap: wrap;">
                            <span class="fs-sm destaqueCaracteristicaImovel">
                                {{ $imoveis->prop_size }} m²
                                {{-- <i class="fi-checkbox ms-1 mt-n1 fs-lg text-muted"></i></span> --}}
                                <span class="editar-dados-imovel">área</span>
                            </span>
                            <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                {{ $imoveis->bedroom }}

                                <span class="editar-dados-imovel">quarto</span>
                            </span>
                            <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                {{ $imoveis->bathrooms }}

                                <span class="editar-dados-imovel">banheiro</span>
                            </span>
                            <span class="d-inline-block fs-sm destaqueCaracteristicaImovel">
                                {{ $imoveis->garage }}

                                <span class="editar-dados-imovel">vaga</span>
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
    </div>
@else
    <div>
        Nenhum imóvel encontrado
    </div>
@endif

<nav class="pb-md-4 pt-4 mt-2">
    {{ $properties->links('user.layout.components.pagination') }}
</nav>


