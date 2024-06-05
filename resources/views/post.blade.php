@extends('index')

@section('content')

      {{-- <!-- Property categories-->
      <section class="container padding-header-top mb-5">
        <div class="row row-cols-lg-6 row-cols-sm-3 row-cols-2 g-3 g-xl-4">
          <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="real-estate-catalog-rent.html">
              <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-real-estate-house"></i></div>
              <h3 class="icon-box-title fs-base mb-0">Houses</h3></a></div>
          <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="real-estate-catalog-sale.html">
              <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-apartment"></i></div>
              <h3 class="icon-box-title fs-base mb-0">Apartments</h3></a></div>
          <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="real-estate-catalog-rent.html">
              <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-shop"></i></div>
              <h3 class="icon-box-title fs-base mb-0">Commercial</h3></a></div>
          <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="real-estate-catalog-sale.html">
              <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-rent"></i></div>
              <h3 class="icon-box-title fs-base mb-0">Daily rental</h3></a></div>
          <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="real-estate-catalog-rent.html">
              <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-house-chosen"></i></div>
              <h3 class="icon-box-title fs-base mb-0">New buildings</h3></a></div>
          <div class="col">
            <div class="dropdown h-100"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover text-center" href="#" data-bs-toggle="dropdown">
                <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="fi-dots-horisontal"></i></div>
                <h3 class="icon-box-title fs-base mb-0">More</h3></a>
              <div class="dropdown-menu dropdown-menu-end my-1"><a class="dropdown-item fw-bold" href="real-estate-catalog-sale.html"><i class="fi-single-bed fs-base opacity-60 me-2"></i>Room</a><a class="dropdown-item fw-bold" href="real-estate-catalog-rent.html"><i class="fi-computer fs-base opacity-60 me-2"></i>Office</a><a class="dropdown-item fw-bold" href="real-estate-catalog-sale.html"><i class="fi-real-estate-buy fs-base opacity-60 me-2"></i>Land</a><a class="dropdown-item fw-bold" href="real-estate-catalog-rent.html"><i class="fi-parking fs-base opacity-60 me-2"></i>Parking lot</a></div>
            </div>
          </div>
        </div>
      </section> --}}
    {{-- <section class="container padding-header-top mb-5">
        <div class="tns-carousel-wrapper tns-controls-outside tns-nav-outside">
            <div class="tns-carousel-inner" data-carousel-options='{"items": 3, "nav": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"gutter": 24}}}'>
                <div style="width: 116px; height: 50px; margin-right:50px; margin-left:50px;background-color:brown"></div>
                <div style="width: 116px; height: 50px; margin-right:50px; margin-left:50px;background-color:brown"></div>
                <div style="width: 116px; height: 50px; margin-right:50px; margin-left:50px; background-color:brown"></div>
                <div style="width: 116px; height: 50px; margin-right:50px; margin-left:50px;background-color:brown"></div>
                <div style="width: 116px; height: 50px; margin-right:50px; margin-left:50px;background-color:brown"></div>
            </div>
        </div>
    </section>  --}}
    
    
    {{-- <section class="container padding-header-top mb-5">
        <div class="tns-carousel-wrapper tns-controls-outside tns-nav-outside home">
            <div class="tns-carousel-inner" data-carousel-options='{"items": 12, "nav": false, "responsive": {"1100":{"gutter": 5}}}'>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div >
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div >
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>

                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div >
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div >
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px;">
                        <img
                        class="d-block" src={{asset("assets/img/carrossel/pin.svg")}} alt="Nome da empresa">
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>


                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px; background-color:brown">
                        <i class="fi-search iconeCarrossel"></i>
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div >
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px; background-color:brown">
                        <i class="fi-search iconeCarrossel"></i>
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px; background-color:brown">
                        <i class="fi-search iconeCarrossel"></i>
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div >
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px; background-color:brown">
                        <i class="fi-search iconeCarrossel"></i>
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
                <div>
                    <div class="alinhamentoItensInternoCarrossel" style="height: 70px; background-color:brown">
                        <i class="fi-search iconeCarrossel"></i>
                        <span class="textoItemCarrossel">
                            Município
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}

    {{-- <div class="pb-1">
        <a class="swap-image" href="job-board-employer-single.html">
            <img class="swap-to" src="assets/img/job-board/company/cocacola.svg" width="196" alt="Coca Cola">
            <img class="swap-from" src="assets/img/job-board/company/cocacola-g.svg" width="196" alt="Coca Cola">
        </a>
    </div> --}}

    <section class="container padding-header-top mb-5" style="display:flex">
        <div class="tns-carousel-wrapper tns-controls-outside tns-nav-outside" style="width: 80%">
            <div class="tns-carousel-inner" data-carousel-options='{"controls": false ,"nav": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":3, "gutter": 20}, "1100":{"items":8,"gutter": 10}}}'>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Comprar</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Alugar</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Casa</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Apartamento</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Menor Preço</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Maior Preço</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Comprar</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Comprar</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Comprar</span>
                    </a>
                </div>
                <div class="pb-1" style="display: flex; align-itens:center;justify-content:center">
                    <a class="" href="job-board-employer-single.html" style="display: flex;flex-direction: column; align-items:center;justify-content:center">
                        <img class="" src="assets/img/icons/bed.svg" width="24" alt="Coca Cola">
                        <span style="margin-top: 10px">Comprar</span>
                    </a>
                </div>


            </div>
        </div>
        <div style="width: 20%;display: flex; justify-content:end">
            <a class="btn btn-primary btn-lg rounded-pill ms-sm-auto" href="job-board-post-resume-1.html">Todos os filtros<i class="fi-chevron-right fs-sm ms-2"></i></a>
        </div>
    </section>

    <section class="container">
    
                {{-- <!-- Catalog grid-->
                <div class="row g-4 py-4">


                    @foreach ($properties as $imoveis)
                        @php
                            $imgs = App\Http\Controllers\User\ListController::getImagesPropertie($imoveis->id);
                            
                            if ($imoveis->prop_price != null) {
                                $numeroVendaFormatado = number_format($imoveis->prop_price, 2, ',', '.');
                            }
                            
                            if ($imoveis->prop_rent != null) {
                                $numeroAluguelformatado = number_format($imoveis->prop_rent, 2, ',', '.');
                            }
                            
                            $typePropertie = App\Http\Controllers\User\ListController::getTypePropertie($imoveis->type_prop_id);
                        @endphp

                        <div class="col-sm-6 col-xl-3" id="item-prop">
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
                                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link"
                                            href="real-estate-single-v1.html">{{ $imoveis->title }}</a></h3>
                                    <p class="mb-2 fs-sm text-muted">
                                        {{ $imoveis->street }}
                                        Rua Inácio Albino Neto - Gramame - João Pessoa/PB</p>
                                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>

                                        @if ($imoveis->prop_price != null)
                                            R$ {{ $numeroVendaFormatado }}
                                        @else
                                            {{ $numeroAluguelformatado }}
                                        @endif

                                    </div>
                                </div>
                                <div class="d-flex justify-content-between card-footer mx-3 pt-3 remover-padding-card">
                                    <div class=" d-flex align-items-center justify-content-center text-nowrap">
                                        <span class="d-inline-block fs-sm">
                                            {{ $imoveis->prop_size }}
                                            <img src="assets/img/icons/bed.svg" width="24" alt="area imovel">
                                        </span>
                                        <span class="d-inline-block padding-icon-card fs-sm">
                                            {{ $imoveis->bedroom }}
                                            <i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span>
                                        <span class="d-inline-block padding-icon-card fs-sm">
                                            {{ $imoveis->bathrooms }}
                                            <i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span>
                                        <span class="d-inline-block padding-icon-card fs-sm">
                                            {{ $imoveis->garage }}
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

                </div>
                <!-- Pagination-->
                <nav class="border-top pb-md-4 pt-4 mt-2">

                    {{ $properties->links('user.layout.components.pagination') }}

                </nav> --}}
            @php
                $count = 0;
                
                foreach ($imoveis as $imovel) {
                    $count++;
                }

            @endphp

        <div class="row">
            <div id="quantidadeImoveis" style="display:none">{{$count}}</div>
            <div class="row" id="post-data" style="margin-bottom:30px">
                @include('data')
            </div>
        </div>        

    </section>

    <div class="ajax-load text-center" style="display: none">
        <p>Carregando</p>
    </div>

    <script> 
        function loadMoreData(page){
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function()
                    {
                        $(".ajax-load").show();
                    }
                })
            .done(function(data){
                if(data.html == " "){
                    $('.ajax-load').html("Sem mais imóveis");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError){
                alert("Servidor não está respondendo");
            });
        }

        var page = 1;
        var count = parseInt(document.getElementById("quantidadeImoveis").innerHTML);
        var countPage = count;

        var quantidadePag = parseInt(count/4);
        if(count%4 != 0)
        {
            quantidadePag = quantidadePag+1;
        }
        console.log(quantidadePag);

        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                page++;
                console.log(page);
                if(page <= quantidadePag){
                loadMoreData(page);
                }
            
            }
        })
    
        


    </script>



@endsection
