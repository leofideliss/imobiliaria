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
            
            $typePropertie = App\Http\Controllers\User\ListController::getTypePropertie($imoveis->type_prop_id);
        @endphp

        <div class="col-md-6 col-xl-3 col-lg-4" id="item-prop">
            <div class="card shadow-sm card-hover border-0 h-100">
                <div class="tns-carousel-wrapper card-img-top card-img-hover" style="height:200px">
                    <a class="img-overlay"
                        href="{{ route('user.property.detalhe_imovel', ['id' => $imoveis->id]) }}"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span
                            class="d-table badge background-amarelo-principal mb-1">{{ $imoveis->category }}</span>
                    </div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                        <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle"
                            type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Adicionar aos favoritos"><i class="fi-heart"></i></button>
                    </div>
                    
                    <div id="{{$imoveis->prop_code}}" class="carousel slide" style="height:200px">
                        <div class="carousel-inner">
                            @foreach ($imgs as $item)
                                @if($loop->first)
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                    alt="">
                                </div>
                                @else
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                    alt="">
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#{{$imoveis->prop_code}}" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#{{$imoveis->prop_code}}" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                    {{-- <div class="tns-carousel-inner" data-carousel-options='{"axis": "vertical", "nav": false}'> 
                      
                        @foreach ($imgs as $item)
                            <img src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}"
                                alt="">
                        @endforeach
                    </div>  --}}

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
    <div>
        Nenhum imóvel encontrado
    </div>
@endif

<nav class="pb-md-4 pt-4 mt-2">

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
