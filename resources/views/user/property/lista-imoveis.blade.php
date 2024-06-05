@extends('index')


@section('content')
    <!-- Page content-->
    <!-- Page container-->
    <div class="container-fluid mt-5 pt-5 p-0">
        <div class="row g-0 mt-n3">
            <!-- Filters sidebar (Offcanvas on mobile)-->
            <aside class="col-lg-4 col-xl-3 border-top-lg border-end-lg shadow-sm px-3 px-xl-4 px-xxl-5 pt-lg-2" id="filtros">
                <form action="{{route('user.property.lista-imoveis')}}" method="GET">

                    <div class="offcanvas-lg offcanvas-start" id="filters-sidebar">
                        <div class="offcanvas-header d-flex d-lg-none align-items-center">
                            <h2 class="h5 mb-0">Filters</h2>
                            <button class="btn-close" type="button" data-bs-dismiss="offcanvas"
                                data-bs-target="#filters-sidebar"></button>
                        </div>
                        <div class="offcanvas-header d-block border-bottom pt-0 pt-lg-4 px-lg-0">
                            <ul class="nav nav-tabs mb-0">
                                <li class="nav-item"><a class="nav-link active" href=""><i
                                            class="fi-rent fs-base me-2"></i>Venda</a></li>
                                <li class="nav-item"><a class="nav-link" href=""><i
                                            class="fi-home fs-base me-2"></i>Aluguel</a></li>
                            </ul>
                        </div>
                        <div class="offcanvas-body py-lg-4">
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Localização</h3>
                                <select class="form-select mb-2" name="estado">
                                    <option value="">Todos os estados</option>

                                    @foreach($estados as $estado)
                                        <option value="{{$estado->state}}">{{$estado->state}}</option>
                                    @endforeach

                                </select>
                                <select class="form-select">
                                    <option value="" selected disabled>Todos </option>
                                    <option value="Brooklyn">João Pessoa</option>
                                    <option value="Manhattan">Campina Grande</option>
                                    <option value="Staten Island">Santa Rita</option>
                                    <option value="The Bronx">Patos</option>
                                </select>
                            </div>

                            {{-- <div class="pb-4 mb-2">
                                <h3 class="h6">Localização</h3>
                                <select class="form-select mb-2" name="type_property">
                                    <option value="" >Escolha o tipo do Imóvel</option>

                                    @foreach($tipoImoveis as $tipoImovel)
                                        <option value="{{$tipoImovel->id}}">{{$tipoImovel->name}}</option>
                                    @endforeach
                                </select>
                                <select class="form-select">
                                    <option value="" selected disabled>Escolha a cidade</option>
                                    <option value="Brooklyn">João Pessoa</option>
                                    <option value="Manhattan">Campina Grande</option>
                                    <option value="Staten Island">Santa Rita</option>
                                    <option value="The Bronx">Patos</option>
                                </select>
                            </div> --}}

                            <div class="pb-4 mb-2">
                                <h3 class="h6">Tipo do imóvel</h3>
                                <div class="overflow-auto" data-simplebar data-simplebar-auto-hide="false">

                                    @foreach($tipoImoveis as $tipoImovel)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="{{$tipoImovel->id}}">
                                        <label class="form-check-label fs-sm" >{{$tipoImovel->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Preço do imóvel</h3>
                                <div class="range-slider" data-start-min="90000" data-start-max="500000" data-min="0"
                                    data-max="1000000" data-step="10000">
                                    <div class="range-slider-ui"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="w-50 pe-2">
                                            <div class="input-group"><span class="input-group-text fs-base">R$</span>
                                                <input class="form-control range-slider-value-min" type="text">
                                            </div>
                                        </div>
                                        <div class="text-muted">&mdash;</div>
                                        <div class="w-50 ps-2">
                                            <div class="input-group"><span class="input-group-text fs-base">R$</span>
                                                <input class="form-control range-slider-value-max" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 pt-1">Quartos e banheiros</h3>
                                <label class="d-block fs-sm mb-1">Quartos</label>
                                <select class="form-select mb-2" name="quantidadeQuarto">
                                    <option value="">Todos</option>
                                    <option value="1" {{$qtdQuarto == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$qtdQuarto == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$qtdQuarto == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$qtdQuarto == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$qtdQuarto == 5 ? 'selected' : ''}}>5+</option>
                                </select>

                                <label class="d-block fs-sm pt-2 my-1">Banheiros</label>
                                <select class="form-select mb-2" name="quantidadeBanheiros">
                                    <option value="">Todos</option>
                                    <option value="1" {{$qtdBanheiro == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$qtdBanheiro == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$qtdBanheiro == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$qtdBanheiro == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$qtdBanheiro == 5 ? 'selected' : ''}}>5+</option>
                                </select>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6 pt-1">Metros Quadrados</h3>
                                <div class="d-flex align-items-center">
                                    <input class="form-control w-100" type="number" min="10" max="500"
                                        step="10" placeholder="Min">
                                    <div class="mx-2">&mdash;</div>
                                    <input class="form-control w-100" type="number" min="20" max="500"
                                        step="10" placeholder="Máx">
                                </div>
                            </div>
                            <div class="pb-4 mb-2">
                                <h3 class="h6">Características</h3>
                                <div class="overflow-auto" data-simplebar data-simplebar-auto-hide="false"
                                    style="height: 11rem;">

                                    @foreach($caracteristicas as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="{{$item->id}}">
                                            <label class="form-check-label fs-sm" >{{$item->name}}</label>
                                        </div>
                                    @endforeach

                            </div>

                            <div class="border-top py-4 fixarDiv">
                                <button class="btn btn-outline-primary mb-2" type="submit">Buscar</button>
                                <a href="{{route('user.property.lista-imoveis')}}" class="btn btn-outline-primary">Remover Filtros</a>

                            </div>
                        </div>
                    </div>

                </form>
            </aside>
            <!-- Page content-->
            <div class="col-lg-8 col-xl-9 position-relative overflow-hidden pb-5 pt-4 px-3 px-xl-4 px-xxl-5 divConteudoListaImoveis" id="conteudoListaImoveis">

                <div class="filtroMobile">

                </div>

                <div>
                    <!-- Map popup-->
                    <div class="map-popup invisible" id="map">
                        <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button"
                            data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-x fs-xs"></i></button>
                            
                        <div class="interactive-map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" data-map-options-json="{{asset("storage/map.json")}}">
                            
                        </div>
                    </div>
                    <!-- Breadcrumb-->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3 pt-md-2">
                        <nav aria-label="Breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Imóveis à Venda</li>
                            </ol>
                        </nav>
                        <button class="btn btn-primary btn-sm" onClick="addClass('filtros', 'esconderFiltroLista')"> 
                            <i class="fi-filter-alt-horizontal me-2"></i>
                            Filtros
                        </button>
                    </div>
                    
                    <!-- Title-->
                    <div class="d-sm-flex align-items-center justify-content-between pb-3 pb-sm-4">
                        <h1 class="h2 mb-sm-0">Imóveis à Venda</h1><a class="d-inline-block fw-bold text-decoration-none py-1"
                            href="#" data-bs-toggle-class="invisible" data-bs-target="#map"><i
                                class="fi-map me-2"></i>Ver no Mapa</a>
                    </div>
                    <!-- Sorting-->
                    <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
                        <div class="d-flex align-items-center flex-shrink-0">
                            <label class="fs-sm me-2 pe-1 text-nowrap" for="sortby"><i
                                    class="fi-arrows-sort text-muted mt-n1 me-2"></i>Ordenar por:</label>
                            <select class="form-select form-select-sm" id="sortby">
                                <option>Mais novos</option>
                                <option>Mais baratos</option>
                                <option>Mais caros</option>
                            </select>
                        </div>
                    </div>
                    <!-- Catalog grid-->
                    <div class="row g-4 py-4">


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
                                
                                $typePropertie = App\Http\Controllers\User\ListController::getTypePropertie($imoveis->type_prop_id);
                            @endphp

                            <div class="col-sm-6 col-xl-4" id="item-prop">
                                <div class="card shadow-sm card-hover border-0 h-100">
                                    <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay"
                                            href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}"></a>
                                        <div class="position-absolute start-0 top-0 pt-3 ps-3"><span
                                                class="d-table badge background-amarelo-principal mb-1">{{ $imoveis->category }}</span>
                                        </div>
                                        <div class="content-overlay end-0 top-0 pt-3 pe-3">
                                            <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle"
                                                type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Adicionar aos favoritos"><i class="fi-heart"></i></button>
                                        </div>
                                        <div class="tns-carousel-inner">

                                            @foreach ($imgs as $item)
                                                <img src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                                    alt="">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="card-body position-relative pb-3">
                                        <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">
                                            @foreach ($typePropertie as $item)
                                                {{ $item->name }}
                                            @endforeach
                                        </h4>
                                        <h3 class="h6 mb-2 fs-base text-capitalize"><a class="nav-link stretched-link"
                                                href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}">{{ $imoveis->title }}</a></h3>
                                        <p class="mb-2 fs-sm text-muted">
                                            {{ $imoveis->street }}&nbsp;- {{$imoveis->district}} - {{$cidadeImovel->citie}}/{{ $imoveis->state }}</p>
                                        <div class="fw-bold" style="font-size:20px">
                                            {{-- <i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i> --}}

                                            @if ($imoveis->prop_price != null)
                                                R$ {{ $numeroVendaFormatado }}
                                            @else
                                                R$ {{ $numeroAluguelformatado }}
                                                <span class="textoMesAluguel">/ mês</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between card-footer mx-3 pt-3 remover-padding-card" style="flex-flow: wrap;">
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
                                        <div class="d-flex align-items-center justify-content-center text-nowrap">
                                            <a class="btn btn-icon botao-email-card btn-xs shadow-sm rounded-circle me-2"
                                                href="#"><i class="fi-mail"></i></a>
                                            <a class="btn btn-icon botao-whats-card btn-xs shadow-sm rounded-circle"
                                                href="#"><i class="fi-whatsapp"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Pagination-->
                    <nav class="border-top pb-md-4 pt-4 mt-2">

                        {{ $properties->links('user.layout.components.pagination') }}  
                        {{-- {{ $properties->links() }}   --}}
                        {{-- <ul class="pagination mb-1">
                            <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                            <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span
                                        class="visually-hidden">(current)</span></span></li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                            <li class="page-item d-none d-sm-block">...</li>
                            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">8</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i
                                        class="fi-chevron-right"></i></a></li>
                        </ul> --}}
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
@endsection
