@extends('admin.layouts.page')

@section('content')
    <!---- TOOLBAR ---->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            @include('admin.layouts.components.title_bread')
        </div>
        <!--end::Toolbar container-->
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card shadow-sm p-md-2 mx-n4 mx-md-0">
                
                <div class="card card-flush">

                    <div class="card-body">

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

                        <div class="d-sm-flex justify-content-between align-items-start pb-4">

                            <div class="order-sm-1">
                                
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Informações Básicas
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Código do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->prop_code ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Título do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->title ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Tamanho do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->prop_size ?? ""}} m²
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Tipo do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$type->name ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Quartos:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->bedroom ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Suítes:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->suites ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Banheiros:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->bathrooms ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->     

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Vagas garagem:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->garage ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row--> 

                                    @if($propertie->status_imovel == 'lancamento')
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Status do Imóvel:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                Lançamento
                                            </div>
                                        </td>
                                    </tr>

                                    <!--end::Row-->      
                                    @else
                                        @if($propertie->status_imovel == 'construcao')
                                        
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Status do Imóvel:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    Em Construção
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->           
                                        @else  
                                            @if($propertie->status_imovel == 'prontoMorar')
                                                <!--begin::Row-->
                                                <tr>
                                                    <td class="text-gray-400">
                                                        Status do Imóvel:
                                                    </td>
                                                    <td class="text-gray-800 min-w-200px">
                                                        <div class="d-flex flex-wrap">
                                                            Pronto para Morar
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--end::Row-->     
                                            @endif
                                        @endif                        
                                    @endif

                                    @if($propertie->inicioObra)
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Data de Início de Obra:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    {{$formatted_inicioObra ?? ""}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                    @endif

                                    @if($propertie->fimObra)
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Data de Entrega do Imóvel:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    {{$formatted_inicioFimObra ?? ""}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                    @endif

                                    @if($propertie->tempoConstrução)
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Tempo de Construção:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    {{$propertie->tempoConstrução ?? ""}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->   
                                    @endif

                                </table>

                            </div>

                        </div>

                        <div class="border-top py-8">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Características do Imóvel
                                </h1>

                                @if(count($caracteristicas) > 0)
                                <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1 ">                            
                                    @for ($i = 0; $i < count($caracteristicas); $i++) 
                                        <li class="col">
                                            
                                            <i class="fa-regular fa-circle-check mt-n1 me-2 fs-lg align-middle"></i>{{ $caracteristicas[$i]->name}}
                                        </li>
                                    @endfor                        
                                </ul>
                                @endif

                            </div>
                        </div>

                        <div class="border-top py-8 d-sm-flex justify-content-between align-items-start pb-4">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Endereço do Imóvel
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            CEP:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->CEP ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Rua:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->street ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Número:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->number ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Bairro:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->district ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Cidade:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->city_name ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->             

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Estado:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->state ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->                                           
                                </table>

                            </div>
                        </div>

                        <div class="border-top py-8 d-sm-flex justify-content-between align-items-start pb-4">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Preço
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">


                                    @if($propertie->finalidade == 'comercial')
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Finalidade de Utilização:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    Comercial
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                    @endif

                                    @if($propertie->finalidade == 'residencial')
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Finalidade de Utilização:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    Comercial
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                    @endif

                                    @if($propertie->category == 'VendaAluguel')
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Categoria:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    Venda e Aluguel
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->

                                    @else
                                        @if($propertie->category == 'Venda')
                                            <!--begin::Row-->
                                            <tr>
                                                <td class="text-gray-400">
                                                    Categoria:
                                                </td>
                                                <td class="text-gray-800 min-w-200px">
                                                    <div class="d-flex flex-wrap">
                                                        Venda
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--end::Row-->
                                        @else
                                            @if($propertie->category == 'Aluguel')
                                                <!--begin::Row-->
                                                <tr>
                                                    <td class="text-gray-400">
                                                        Categoria:
                                                    </td>
                                                    <td class="text-gray-800 min-w-200px">
                                                        <div class="d-flex flex-wrap">
                                                            Aluguel
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--end::Row-->
                                            @endif
                                        @endif
                                    @endif

                                    @if($propertie->category == 'Venda' || $propertie->category == 'VendaAluguel')
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Preço de Venda:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    {{$formatted_priceVenda ?? ""}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                    @endif

                                    @if($propertie->category == 'Aluguel' || $propertie->category == 'VendaAluguel')
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Preço de Aluguel:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    {{$formatted_priceAluguel ?? ""}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->
                                    @endif

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Valor do IPTU Anual:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$formatted_priceIptu ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                        
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Possui Condomínio:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{ $propertie->condominium ? 'Sim' : 'Não' }}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    @if($propertie->condominium == 1)
                                        <!--begin::Row-->
                                        <tr>
                                            <td class="text-gray-400">
                                                Preço do Condomínio:
                                            </td>
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    {{$formatted_priceCondominium ?? ""}}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--end::Row-->         
                                    @endif    
                            
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Comissão:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->corretagem ?? ""}}%
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->   
                                </table>

                            </div>
                        </div>


                        <div class="border-top py-8 d-sm-flex justify-content-between align-items-start pb-4">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Mídia
                                </h1>

                                <div class="tns tns-default" style="direction: ltr">
                                    <!--begin::Slider-->
                                    <div
                                        id="tns-slider"
                                        data-tns="true"
                                        data-tns-loop="false"
                                        data-tns-swipe-angle="false"
                                        data-tns-speed="2000"
                                        data-tns-autoplay="true"
                                        data-tns-autoplay-timeout="18000"
                                        data-tns-controls="true"
                                        data-tns-nav="false"
                                        data-tns-items="3"
                                        data-tns-center="false"
                                        data-tns-dots="false"
                                        data-tns-prev-button="#kt_team_slider_prev1"
                                        data-tns-next-button="#kt_team_slider_next1">
                                        
                                        @foreach ($images as $item)
                                        <div id="{{ $item->prop_code }}" class="text-center px-5 py-5" style="height: 250px">
                                            <img src="{{ asset(str_replace('public', 'storage', $item->pathname)) }}" class="card-rounded mw-100" alt="Imagem do Imóvel" style="height:100%;object-fit: cover;">
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--end::Slider-->
                                
                                    <!--begin::Slider button-->
                                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
                                        <i class="fa-solid fa-circle-chevron-left"></i>
                                    </button>
                                    <!--end::Slider button-->
                                
                                    <!--begin::Slider button-->
                                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
                                        <i class="fa-solid fa-circle-chevron-right"></i>
                                    </button>
                                    <!--end::Slider button-->
                                </div>


                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Link do Vídeo do Youtube:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->url_video ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->
                                    
                                </table>

                            </div>
                        </div>

                        
                        <?php

                            $filesPDF = App\Http\Controllers\User\ListController::getPDFs($propertie->id);
                        ?>
                        
                        
                        <div class="border-top py-8 d-sm-flex justify-content-between align-items-start pb-4">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    PDFs
                                </h1>

                                <div style="display: flex;flex-wrap: wrap;">
                                    @foreach ($filesPDF as $arquivo)
                                        <a href="{{ $arquivo->public_path }}" style="width: 150px;height: 100%;margin-right:10px;margin-bottom:15px">
                                            <img class="d-block" style="margin-bottom: 5px"
                                            src={{ asset('assets/media/logos/pdf.png') }} width="150" height="100" alt="PDF">
                            
                                            {{ $arquivo->name }}
                                        </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        

                        <div class="border-top py-8 d-sm-flex justify-content-between align-items-start pb-4">
                            <div class="order-sm-1">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Informações do Proprietário
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Nome Completo:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->name_vendor ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->
                                    
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            E-mail:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->email_vendor ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Telefone:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap">
                                                {{$propertie->phone_vendor ?? ""}}
                                            </div>
                                        </td>
                                    </tr>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">
                                            Opção exclusividade:
                                        </td>
                                        @if($propertie->exclusividade == 1)
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    Sim
                                                </div>
                                            </td>
                                        @else
                                            <td class="text-gray-800 min-w-200px">
                                                <div class="d-flex flex-wrap">
                                                    Não
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                    <!--end::Row-->
                                </table>

                            </div>
                        </div>

                        <!--begin::BOTÕES-->
                        <div class="row py-5 justify-content-end">
                            <div class="d-flex justify-content-end col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <!--begin::Button-->
                                    <button type="reset" data-kt-properties-type="cancel"
                                        class="btn btn-light me-3">Voltar</button>
                                    <!--end::Button-->
                                </div>
                            </div>
                        </div>
                        <!--end::BOTÕES-->
                    </div>



                </div>
            </div>

        </div>
    </div>

    <script>
        // Função para ajustar o número de itens com base na largura da tela
        function ajustarItens() {
            var larguraTela = window.innerWidth;
            var numeroItens = (larguraTela < 650) ? 1 : 3; // Se a largura da tela for menor que 500px, definir como 1, caso contrário, definir como 3
            document.getElementById('tns-slider').setAttribute('data-tns-items', numeroItens);
        }
    
        // Chame a função inicialmente e sempre que a janela for redimensionada
        ajustarItens();
        window.addEventListener('resize', ajustarItens);
    </script>
@endsection