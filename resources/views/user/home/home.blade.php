@extends('index')

@section('content')

    <!-- FILTROS -->
    <section class="container mb-5 pb-2" style="margin-top:75px">
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside-flush mx-n2">
            <div class="tns-carousel-inner row gx-4 mx-0 py-md-4 py-3"
            data-carousel-options='{"items": 3, "nav": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":9, "gutter": 20}, "1100":{"gutter": 24}}}'
            
            >


                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>
                
                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>
                
                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>                
                
                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>
                
                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>

                
                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>

                                <!-- Item-->
                                <div class="col" >
                                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                                            <i class="fi-real-estate-house"></i>
                                        </div>
                                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                                    </a>
                                </div>

                                                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>

                                <!-- Item-->
                                <div class="col" >
                                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                                            <i class="fi-real-estate-house"></i>
                                        </div>
                                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                                    </a>
                                </div>

                                                <!-- Item-->
                <div class="col" >
                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                            <i class="fi-real-estate-house"></i>
                        </div>
                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                    </a>
                </div>


                                <!-- Item-->
                                <div class="col" >
                                    <a class="icon-box card card-body border-0 shadow-sm card-hover text-center" href="real-estate-catalog-rent.html">
                                        <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto">
                                            <i class="fi-real-estate-house"></i>
                                        </div>
                                        <h3 class="icon-box-title fs-base mb-0">Houses</h3>
                                    </a>
                                </div>

            </div>
        </div>
    </section>

    <section class="container">
    
        <div class="properties-container column g-4 py-4">

            @foreach ($properties as $imoveis)
    
                @php
                $imgs = App\Http\Controllers\User\ListController::getImagesPropertie($imoveis->id);
    
                if($imoveis->prop_price != null)
                $numeroVendaFormatado = number_format($imoveis->prop_price, 2, ',', '.');
        
                if($imoveis->prop_rent != null)
                $numeroAluguelformatado = number_format($imoveis->prop_rent, 2, ',', '.');
    
                $typePropertie = App\Http\Controllers\User\ListController::getTypePropertie($imoveis->type_prop_id);
                @endphp
    
                <div class="col-sm-6 col-xl-4" id="item-prop">
                    <div class="card shadow-sm card-hover border-0 h-100">
                        <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay"
                                href="real-estate-single-v1.html"></a>
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
                                    <img src="{{ asset(str_replace('public', 'storage', $item->pathname) )}}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body position-relative pb-3">
                            <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">                                      
                                @foreach ($typePropertie as $item)
                                    {{$item->name}}
                                @endforeach
                            </h4>
                            <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link"
                                    href="real-estate-single-v1.html">{{ $imoveis->title }}</a></h3>
                            <p class="mb-2 fs-sm text-muted">
                                {{ $imoveis->street }}  
                                Rua Inácio Albino Neto - Gramame - João Pessoa/PB</p>
                            <div class="fw-bold"><i
                                    class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>
    
                                    @if( $imoveis->prop_price != null)
                                       R$ {{ $numeroVendaFormatado}}                                     
                                    @else
                                        {{ $numeroAluguelformatado}}
                                    @endif
                                        
                                </div>
                        </div>
                        <div class="d-flex justify-content-between card-footer mx-3 pt-3 remover-padding-card">
                            <div class=" d-flex align-items-center justify-content-center text-nowrap">
                                <span class="d-inline-block fs-sm">
                                    {{$imoveis->prop_size}}
                                    <img src="assets/img/icons/bed.svg" width="24" alt="area imovel">
                                </span>
                                <span class="d-inline-block padding-icon-card fs-sm">
                                    {{$imoveis->bedroom}}
                                    <i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span>
                                <span class="d-inline-block padding-icon-card fs-sm">
                                    {{$imoveis->bathrooms}}
                                    <i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
                                <span class="d-inline-block padding-icon-card fs-sm">
                                    {{$imoveis->garage}}
                                    <i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-center text-nowrap">
                                <a class="btn btn-icon botao-email-card btn-xs shadow-sm rounded-circle me-2 mb-2"
                                    href="#"><i class="fi-mail"></i></a>
                                <a class="btn btn-icon botao-whats-card btn-xs shadow-sm rounded-circle mb-2"
                                    href="#"><i class="fi-whatsapp"></i></a>
                            </div>
                        </div>
    
                    </div>
                </div>
    
    
                
            @endforeach

            <div class="d-none">
                {{$properties->links()}}
            </div>
    
        </div>

    </section>

    <script>
        $(document).ready(function () {
            let nextPageUrl = "{{ $properties->nextPageUrl() }}";
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    if (nextPageUrl) {
                        loadMorePosts();
                    }
                }
            });
            function loadMorePosts() {
                $.ajax({
                    url: nextPageUrl,
                    type: 'get',
                    beforeSend: function () {
                        nextPageUrl = '';
                    },
                    success: function (data) {
                        nextPageUrl = data.nextPageUrl;
                        $('#properties-container').append(data.view);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error loading more posts:", error);
                    }
                });
            }
        });
    </script>

@endsection
