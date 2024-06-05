@extends('admin.layouts.page')

@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack"
            style="padding-left: 0px !important;margin-left: 15px !important;">
            @include('admin.layouts.components.title_bread')
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <div id="dashboardInicio">

        <div style="padding-left: 15px; padding-right: 15px"> 
            <form action="{{ route('admin.dashboard.index') }}" method="GET">
                <label for="start_date" class="fw-semibold fs-6 ">Data de Início:</label>
                <input type="date" style="padding: 5px;border: 1px solid #ccc;border-radius: 5px;outline: none;font-size: 14px;" id="start_date" name="start_date" value="{{ $start_date ?? '' }}">
        
                <label for="end_date" class="fw-semibold fs-6 ">- Data de Fim:</label>

                <input style="padding: 5px;border: 1px solid #ccc;border-radius: 5px;outline: none;font-size: 14px;" type="date" id="end_date" name="end_date" value="{{ $end_date ?? '' }}">
        
                <button type="submit" style="margin-left: 10px;padding: 5px 10px;border: none;border-radius: 10px;background-color: var(--kt-dark);;color: #fff;cursor: pointer;font-size: 14px;height: 30px;">Filtrar</button>
            </form>
        </div>

        @if(isset($error_message))
            <p style="padding-left: 15px; padding-right: 15px;color:red">{{ $error_message }}</p>
        @endif

        @if ($start_date && $end_date)
            <p style="padding-left: 15px; padding-right: 15px">Dados exibidos de {{ date('d/m/Y', strtotime($start_date)) }} até {{ date('d/m/Y', strtotime($end_date)) }}</p>
        @endif

        <div class="row fv-row" style="padding-left: 15px; padding-right: 15px">
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">

                            <i class="fa-solid fa-city" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $qtdCidades }}"
                            data-kt-countup-separator=".">0</div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Cidades Cadastradas</div>
                    <!--end::Label-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">

                            <i class="fa-solid fa-house" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $qtdImoveis }}"
                            data-kt-countup-separator=".">0</div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Imóveis Cadastrados</div>
                    <!--end::Label-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">

                            <i class="fa-solid fa-building-shield" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $qtdCondominios }}"
                            data-kt-countup-separator=".">0</div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Condomínios Cadastrados</div>
                    <!--end::Label-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">
                            <i class="fa-regular fa-eye" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $acessosPrincipal }}">0
                        </div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Quantidade de Visitas ao site</div>
                    <!--end::Label-->
                </div>
            </div>
        </div>

        <div class="row fv-row" style="padding-left: 15px; padding-right: 15px; margin-bottom:20px">
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">

                            <i class="fa-solid fa-user-pen" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $qtdAdmins }}"
                            data-kt-countup-separator=".">0</div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Admins cadastrados</div>
                    <!--end::Label-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">

                            <i class="fa-solid fa-users" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $qtdFuncionarios }}"
                            data-kt-countup-separator=".">0</div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Funcionários Cadastrados</div>
                    <!--end::Label-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">
                            <i class="fa-regular fa-user" style="color:black;font-size:1.5rem"></i>
                        </span>
                        <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $qtdUsuarios }}"
                            data-kt-countup-separator=".">0</div>
                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Usuários Cadastrados</div>
                    <!--end::Label-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                    <!--begin::Number-->
                    <div class="d-flex align-items-center">
                        <span class="svg-icon fs-3 text-success me-2">

                            <i class="fa-solid fa-magnifying-glass-plus" style="color:black;font-size:1.5rem"></i>
                        </span>
                        @if ($maiorAcesso != null)
                            <a class="fs-2 fw-bold"
                                href="{{ route('user.property.detalhe_imovel', ['id' => $maiorAcesso->id]) }}"
                                target="_blank">{{ $maiorAcesso->prop_code }}</a>
                        @endif

                    </div>
                    <!--end::Number-->

                    <!--begin::Label-->
                    <div class="fw-semibold fs-6 ">Imóvel mais visitado</div>
                    <!--end::Label-->
                </div>
            </div>
        </div>

        <div class="row fv-row" style="padding-left: 15px; padding-right: 15px">

            <div class="col-xxl-4 mb-5 mb-xl-10" >       
        
                <!--begin::List widget 8-->
                <div class="card card-flush h-lg-100">
    
                    <!--begin::Header-->
                    <div class="card-header pt-7 mb-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Usuários externos que mais cadastraram imóveis</span>
                            
                        </h3>
                        <!--end::Title-->
                
                    </div>
                    <!--end::Header-->
                
                    <!--begin::Body-->
                    <div class="card-body pt-0">   
                        <!--begin::Items-->
                        <div class="m-0">
    
                            @foreach ($customerRank as $cliente)
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
            
                                    <!--begin::Section-->
                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
    
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <span class="text-gray-800 fw-bold fs-6">{{ $cliente['nome_usuario'] }}</span>
                                            <!--end::Title-->
    
                                        </div>
                                        <!--end::Content-->   
                                        
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center"> 
                                            <!--begin::Number-->           
                                            <span class="text-gray-800 fw-bold fs-6 me-3 d-block">{{ $cliente['quantidade_propriedades'] }}</span> 
                                            <!--end::Number-->                        
                                                       
                                        </div>
                                        <!--end::Info--> 
                                    </div>
                                    <!--end::Section-->                                
                                </div>
                                <!--end::Item-->
                
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            @endforeach     
    
                            
                                          
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 8-->
                
            </div>
    
            <div class="col-xxl-4 mb-5 mb-xl-10" >       
            
                <!--begin::List widget 8-->
                <div class="card card-flush h-lg-100">
    
                    <!--begin::Header-->
                    <div class="card-header pt-7 mb-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Usuários internos que mais cadastraram imóveis</span>
                            
                        </h3>
                        <!--end::Title-->
                
                    </div>
                    <!--end::Header-->
                
                    <!--begin::Body-->
                    <div class="card-body pt-0">   
                        <!--begin::Items-->
                        <div class="m-0">
    
                            @foreach ($userInternoRank as $clienteInterno)
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
            
                                    <!--begin::Section-->
                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
    
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <span class="text-gray-800 fw-bold fs-6">{{ $clienteInterno['nome_usuario'] }}</span>
                                            <!--end::Title-->
    
                                        </div>
                                        <!--end::Content-->   
                                        
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center"> 
                                            <!--begin::Number-->           
                                            <span class="text-gray-800 fw-bold fs-6 me-3 d-block">{{ $clienteInterno['quantidade_propriedades'] }}</span> 
                                            <!--end::Number-->                        
                                                       
                                        </div>
                                        <!--end::Info--> 
                                    </div>
                                    <!--end::Section-->                                
                                </div>
                                <!--end::Item-->
                
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            @endforeach     
    
                            
                                          
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 8-->
                
            </div>

            <div class="col-xxl-4 mb-5 mb-xl-10" >       
            
                <!--begin::List widget 8-->
                <div class="card card-flush h-lg-100">
    
                    <!--begin::Header-->
                    <div class="card-header pt-7 mb-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Imóveis com mais acessos</span>
                            
                        </h3>
                        <!--end::Title-->
                
                    </div>
                    <!--end::Header-->
                
                    <!--begin::Body-->
                    <div class="card-body pt-0">   
                        <!--begin::Items-->
                        <div class="m-0">
    
                            @foreach ($propriedadesMaisAcessos as $propertyMais)
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
            
                                    <!--begin::Section-->
                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
    
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="{{ route('user.property.detalhe_imovel', ['id' => $propertyMais->id]) }}" target="_blank" class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $propertyMais->prop_code }}</a>
                                            <!--end::Title-->
    
                                        </div>
                                        <!--end::Content-->   
                                        
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center"> 
                                            <!--begin::Number-->           
                                            <span class="text-gray-800 fw-bold fs-6 me-3 d-block">{{ $propertyMais->qtd_access }}</span> 
                                            <!--end::Number-->                        
                                                       
                                        </div>
                                        <!--end::Info--> 
                                    </div>
                                    <!--end::Section-->                                
                                </div>
                                <!--end::Item-->
                
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            @endforeach     
    
                            
                                          
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 8-->
                
            </div>
        </div>

        <div class="row fv-row" style="padding-left: 15px; padding-right: 15px">

            <div class="col-xxl-4 mb-5 mb-xl-10" >       
        
                <!--begin::List widget 8-->
                <div class="card card-flush h-lg-100">
    
                    <!--begin::Header-->
                    <div class="card-header pt-7 mb-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Bairros com mais imóveis cadastrados</span>
                            
                        </h3>
                        <!--end::Title-->
                
                    </div>
                    <!--end::Header-->
                
                    <!--begin::Body-->
                    <div class="card-body pt-0">   
                        <!--begin::Items-->
                        <div class="m-0">
    
                            @foreach ($rankDistrict as $district => $quantidade)
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
            
                                    <!--begin::Section-->
                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
    
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <span class="text-gray-800 fw-bold fs-6">{{ $district }}</span>
                                            <!--end::Title-->
    
                                        </div>
                                        <!--end::Content-->   
                                        
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center"> 
                                            <!--begin::Number-->           
                                            <span class="text-gray-800 fw-bold fs-6 me-3 d-block">{{ $quantidade }}</span> 
                                            <!--end::Number-->                        
                                                       
                                        </div>
                                        <!--end::Info--> 
                                    </div>
                                    <!--end::Section-->                                
                                </div>
                                <!--end::Item-->
                
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            @endforeach     
    
                            
                                          
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 8-->
                
            </div>

            <div class="col-xxl-4 mb-5 mb-xl-10" >       
        
                <!--begin::List widget 8-->
                <div class="card card-flush h-lg-100">
    
                    <!--begin::Header-->
                    <div class="card-header pt-7 mb-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">Proprietários dos Imóveis</span>
                            
                        </h3>
                        <!--end::Title-->
                
                    </div>
                    <!--end::Header-->
                
                    <!--begin::Body-->
                    <div class="card-body pt-0">   
                        <!--begin::Items-->
                        <div class="m-0">
    
                            @foreach ($rankProprietarios as $propriedade => $quantid)
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
            
                                    <!--begin::Section-->
                                    <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
    
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <span class="text-gray-800 fw-bold fs-6">{{ $propriedade }}</span>
                                            <!--end::Title-->
    
                                        </div>
                                        <!--end::Content-->   
                                        
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center"> 
                                            <!--begin::Number-->           
                                            <span class="text-gray-800 fw-bold fs-6 me-3 d-block">{{ $quantid }}</span> 
                                            <!--end::Number-->                        
                                                       
                                        </div>
                                        <!--end::Info--> 
                                    </div>
                                    <!--end::Section-->                                
                                </div>
                                <!--end::Item-->
                
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            @endforeach     
    
                            
                                          
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 8-->
                
            </div>
        </div>

        <div class="row fv-row" style="padding-left: 15px; padding-right: 15px">
            <div class="col-md-12" style="margin-bottom: 30px">
                <div id="myPieChart" style="height: 350px; width:100%"></div>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <div id="myPieChart2" style="height: 350px; width:100%"></div>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <div id="myPieChart3" style="height: 350px; width:100%"></div>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <div id="myPieChart4" style="height: 350px; width:100%"></div>
            </div>
            <div class="col-md-12" style="margin-bottom: 30px">
                <div id="myPieChart5" style="height: 350px; width:100%"></div>
            </div>
        </div>



    </div>




    {{-- <div class="col-md-3">
        <h2 class="chart-heading">Tipos de imóveis</h2>
        <div class="div-chart">
            <div class="chart-container">
                <canvas id="myChart" class="my-chart"></canvas>
            </div>
    
            <div class="details">
                <ul>
                    <li>Porcentagem <span class="valor-details">10</span></li>
                    <li>Porcentagem <span class="valor-details">10</span></li>
                    <li>Porcentagem <span class="valor-details">10</span></li>
                    <li>Porcentagem <span class="valor-details">10</span></li>
                </ul>
            </div>
    
        </div>
    </div> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

@endsection
