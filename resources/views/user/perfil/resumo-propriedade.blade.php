@extends('index')

@section('content')
    <div class="container div-flexBotaoVoltar mt-5 pt-5">
        <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" href="{{ route('user.perfil.user.imoveis-user') }}">
            <i class="fi-chevron-left fs-sm me-2"></i>Voltar
        </a>
        
    </div>

    <!-- Page container-->
    <div class="container div-flexResumo mb-md-4 pb-5">

        <!-- Page content-->
        <div class="col-lg-8">

            <!-- Título  -->
            <div class="mb-4">
                <h1 class="h2 text-center mb-3">Informações sobre o Imóvel</h1>
                <div class="text-center">{{ $propertie->title ?? '' }}</div>
            </div>

            <?php
                $priceVenda = $propertie->prop_price;
                $formatted_priceVenda = number_format($priceVenda, 2, ',', '.');

                $priceAluguel = $propertie->prop_rent;
                $formatted_priceAluguel = number_format($priceAluguel, 2, ',', '.');

                $priceIPTU = $propertie->iptu_price;
                $formatted_priceIptu = number_format($priceIPTU, 2, ',', '.');

                $priceCondominium = $propertie->condominium_price;
                $formatted_priceCondominium = number_format($priceCondominium, 2, ',', '.');

                $inicioObra = $propertie->inicioObra;
                $formatted_inicioObra = date("d/m/Y", strtotime($inicioObra));

                $inicioFimObra = $propertie->fimObra;
                $formatted_inicioFimObra = date("d/m/Y", strtotime($inicioFimObra));

                $caracteristicas = App\Http\Controllers\User\ListController::getCaractetisticasPropertie($propertie->id);
            ?>

            <div class="card shadow-sm p-md-2 mx-n4 mx-md-0">
                <div class="card-body p-4">
                    <div class="d-sm-flex justify-content-between align-items-start pb-4">
                        <div class="order-sm-1">
                            <h3 class="h4 mb-sm-4">Informações Gerais</h3>
                            <ul class="list-unstyled text-nav">
                                <li><span class='text-muted'>Código do Imóvel:</span> {{ $propertie->prop_code ?? '' }}</li>
                                <li><span class='text-muted'>Título do Imóvel:</span> {{ $propertie->title ?? '' }}</li>
                                <li><span class='text-muted'>Tamanho do Imóvel:</span> {{ $propertie->prop_size ?? '' }}
                                </li>
                                <li><span class='text-muted'>Tipo do Imóvel:</span> {{ $type->name ?? '' }}</li>
                                <li><span class='text-muted'>Quartos:</span> {{ $propertie->bedroom ?? '' }}</li>
                                <li><span class='text-muted'>Suítes:</span> {{ $propertie->suites ?? '' }}</li>
                                <li><span class='text-muted'>Banheiros:</span> {{ $propertie->bathrooms ?? '' }}</li>
                                <li><span class='text-muted'>Vagas garagem:</span> {{ $propertie->garage ?? '' }}</li>
                                @if($propertie->status_imovel == 'lancamento')
                                    <li><span class='text-muted'>Status do Imóvel:</span> Lançamento</li>
                                @else
                                    @if($propertie->status_imovel == 'construcao')
                                        <li><span class='text-muted'>Status do Imóvel:</span> Em Construção</li>
                                    @else
                                        @if($propertie->status_imovel == 'prontoMorar')
                                            <li><span class='text-muted'>Status do Imóvel:</span> Pronto para Morar</li>
                                        @endif
                                    @endif
                                @endif

                                @if($propertie->inicioObra)
                                    <li><span class='text-muted'>Data de Início de Obra:</span> {{ $formatted_inicioObra ?? '' }}</li>
                                @endif

                                @if($propertie->fimObra)
                                    <li><span class='text-muted'>Data de Entrega do Imóvel:</span> {{ $formatted_inicioFimObra ?? '' }}</li>
                                @endif

                                @if($propertie->tempoConstrução)
                                    <li><span class='text-muted'>Tempo de Construção:</span> {{ $propertie->tempoConstrução ?? '' }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="border-top py-4">
                        <h3 class="h4 mb-sm-4">Características do Imóvel</h3>

                        @if(count($caracteristicas) > 0)
                        <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1 ">                            
                            @for ($i = 0; $i < count($caracteristicas); $i++) 
                                <li class="col">
                                    <i class="fi-check-circle mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[$i]->name}}
                                </li>
                            @endfor                        
                        </ul>
                        @endif
                    </div>

                    <div class="border-top py-4">
                        <h3 class="h4 mb-sm-4">Endereço do Imóvel</h3>
                        <ul class="list-unstyled text-nav">
                            <li><span class='text-muted'>CEP:</span> {{ $propertie->CEP ?? '' }}</li>
                            <li><span class='text-muted'>Rua:</span> {{ $propertie->street ?? '' }}</li>
                            <li><span class='text-muted'>Número:</span> {{ $propertie->number ?? '' }}</li>
                            <li><span class='text-muted'>Bairro:</span> {{ $propertie->district ?? '' }}</li>
                            <li><span class='text-muted'>Cidade:</span> {{ $propertie->city_name ?? '' }}</li>
                            <li><span class='text-muted'>Estado:</span> {{ $propertie->state ?? '' }}</li>
                        </ul>
                    </div>

                    <div class="border-top py-4">
                        <h3 class="h4 mb-sm-4">Preço</h3>
                        <ul class="list-unstyled text-nav">

                            @if($propertie->finalidade == 'comercial')
                                <li><span class='text-muted'>Finalidade de Utilização:</span> Comercial</li>
                            @endif

                            @if($propertie->finalidade == 'residencial')
                                <li><span class='text-muted'>Finalidade de Utilização:</span> Residencial</li>
                            @endif

                            <li>
                                @if($propertie->category == 'VendaAluguel')
                                    <span class='text-muted'>Categoria:</span> Venda e Aluguel
                                @else
                                    @if($propertie->category == 'Venda')
                                        <span class='text-muted'>Categoria:</span> Venda
                                    @else
                                        @if($propertie->category == 'Aluguel')
                                            <span class='text-muted'>Categoria:</span> Aluguel
                                        @endif
                                    @endif
                                @endif
                            </li>

                            @if($propertie->category == 'Venda' || $propertie->category == 'VendaAluguel')
                                <li><span class='text-muted'>Preço de Venda:</span> {{ $formatted_priceVenda ?? '' }}</li>
                            @endif

                            @if($propertie->category == 'Aluguel' || $propertie->category == 'VendaAluguel')
                                <li><span class='text-muted'>Preço de Aluguel:</span> {{$formatted_priceAluguel }}</li>
                            @endif

                        
                            <li><span class='text-muted'>Valor do IPTU:</span> {{ $formatted_priceIptu }}</li>

                            <li><span class='text-muted'>Possui Condomínio:</span>
                                {{ $propertie->condominium ? 'Sim' : 'Não' }}</li>

                            @if($propertie->condominium == 1)
                                <li><span class='text-muted'>Preço do Condomínio:</span>
                                {{ $formatted_priceCondominium }}</li>
                            @endif

                        </ul>
                    </div>

                    <div class="border-top py-4">
                        <h3 class="h4 mb-sm-4">Mídia</h3>
                        <ul class="list-unstyled text-nav">
                            <li class="mb-3"><span class='text-muted'>Fotos:</span> </li>
                            <!-- Gallery inside carousel  -->
                            <div class="tns-carousel-wrapper tns-controls-static tns-nav-outside gallery mb-3"
                                data-video="false" data-thumbnails="true">
                                <div class="tns-carousel-inner"
                                    data-carousel-options='{"loop": false, "nav":false,"responsive": {"0":{"items":1, "gutter": 16},"576":{"items":2, "gutter": 20},"991":{"items":3, "gutter": 24}}}'>

                                    @foreach ($images as $item)
                                        <!-- Item -->
                                        <div id="{{ $item->prop_code }}" style="height: 250px">
                                            <a href="{{ asset(str_replace('public', 'storage', $item->pathname)) }}" class="gallery-item" style="height: 100%" data-sub-html='Imagem do Imóvel'>
                                                <img src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}" alt="Imagem do Imóvel" style="height: 100%;    object-fit: cover;">
                                            </a>
                                        </div>
                                    @endforeach
                                

                                </div>
                            </div>

                            <li><span class='text-muted'>Link do Vídeo do Youtube:</span> {{ $propertie->url_video ?? '' }} </li>
                        </ul>
                    </div>
                    
                    <div class="border-top py-4">
                        <h3 class="h4 mb-sm-4">Informações do Proprietário</h3>
                        <ul class="list-unstyled text-nav">
                            <li><span class='text-muted'>Nome Completo:</span> {{ $propertie->name_vendor ?? '' }}</li>
                            <li><span class='text-muted'>E-mail:</span> {{ $propertie->email_vendor ?? '' }}</li>
                            <li><span class='text-muted'>Telefone:</span> {{ $propertie->phone_vendor ?? '' }}</li>                           
                        </ul>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
