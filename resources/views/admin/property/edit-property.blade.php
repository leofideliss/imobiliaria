@extends('admin.layouts.page')

@section('content')
    @component('admin.property.gerenciarCondominios')
    @endcomponent
    <!---- TOOLBAR ---->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            @include('admin.layouts.components.title_bread')
        </div>
        <!--end::Toolbar container-->
    </div>



    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">

            @if ($propertie->is_from_xml == 1)
                <!--begin::Alert-->
                <div class="alert alert-danger d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <i class="bi bi-exclamation-octagon fs-2qx p-2 py-1 text-danger"></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-dark">Imóvel com origem de um XML</h4>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <span>O Arquivo deve ser alterado na origem, alterações feitas aqui não serão aplicadas!</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            @endif
            <!--end::Alert-->
            <!--begin::Card-->
            <div class="card card-flush">
                <div id="preload-edit" style="width: 100%;
    height: 100%;
    position: absolute;
    z-index: 1;
    background-color: #fff;"
                    class="align-items-center d-flex justify-content-center rounded flex-column">
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span>Carregando...</span>
                </div>
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin:::Tabs-->
                    <div class="stepper " id="stepper_edit_property">
                    
                        <ul
                            class="stepper-nav nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">

                            <!--begin:::Tab item-->
                            <li class="nav-item stepper-item current" data-kt-stepper-element="nav">
                                <span class="nav-link text-active-primary d-flex align-items-center pb-5 active"
                                    style="pointer-events: none" data-bs-toggle="tab" href="#kt_properties">
                                    <i class="fa-solid fa-house-lock fs-2 me-2"></i>
                                    Condomínio
                                    <span>
                            </li>
                            <!--end:::Tab item-->


                            <!--begin:::Tab item-->
                            <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                                <span class="nav-link text-active-primary d-flex align-items-center pb-5"
                                    data-bs-toggle="tab" style="pointer-events: none" href="#kt_vendor_info">
                                    <i class="fa-solid fa-circle-info fs-2 me-2"></i>
                                    Detalhes
                                    <span>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                                <span class="nav-link text-active-primary d-flex align-items-center pb-5"
                                    data-bs-toggle="tab" style="pointer-events: none" href="#kt_ecommerce_settings_store">
                                    <i class="fa-solid fa-location-dot fs-2 me-2"></i>
                                    Endereço
                                    <span>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                                <span class="nav-link text-active-primary d-flex align-items-center pb-5"
                                    data-bs-toggle="tab" style="pointer-events: none"
                                    href="#kt_ecommerce_settings_localization">
                                    <i class="fa-solid fa-list-check fs-2 me-2"></i>
                                    Características Imóveis
                                    <span>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                                <span class="nav-link text-active-primary d-flex align-items-center pb-5"
                                    data-bs-toggle="tab" style="pointer-events: none"
                                    href="#kt_ecommerce_settings_products">
                                    <i class="fa-solid fa-photo-film fs-2 me-2"></i>
                                    Mídias
                                    <span>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                                <span class="nav-link text-active-primary d-flex align-items-center pb-5"
                                    data-bs-toggle="tab" style="pointer-events: none"
                                    href="#kt_ecommerce_settings_customers">
                                    <i class="fa-solid fa-user fs-2 me-2"></i>
                                    Info Proprietário
                                    <span>
                            </li>
                            <!--end:::Tab item-->

                        </ul>


                        <form id="kt_properties_form_edit" class="form" action=""
                            data-request="{{ route('admin.property.photos') }}" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="propertie_id" value="{{ $propertie->id }}" />
                            <input type="hidden" name="is_xml" value="{{ $propertie->is_from_xml }}" />

                            <!--end:::Tabs-->
                            <!--begin:::Tab content-->
                            <div class="tab-content" id="myTabContent">

                                <!--begin:::TAB CONDOMINIOS-->
                                <div class="tab-pane flex-column current" data-kt-stepper-element="content"
                                    id="kt_properties" role="tabpanel">
                                    <!--begin::Form-->

                                    <!--begin:: TITULO -->
                                    <div class="row mb-7">
                                        <div class="col-md-9"
                                            style="display:flex;align-items:center;justify-content:center">
                                            <h2 style="margin:0px">Informações do Condomínio</h2>
                                        </div>
                                        <div class="col-md-3" style="display:flex;justify-content:end">
                                            <button class="btn btn-primary mb-2" id="openModalCondominio"
                                                style="position: relative; margin-bottom:0px !important;padding: 10px 10px;">
                                                <span
                                                    style="display: flex;align-items: center;font-size: 14px;height: 100%;">Add
                                                    Condomínio</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!--end:: TITULO -->

                                    <!--begin::TIPO DO IMÓVEL-->
                                    {{-- <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tipo do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Qual categoria o tipo do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" data-placeholder="Tipo do Imóvel"
                                                name="type_prop_id" onchange="pegarTextoSelect()" id="type_prop_id"
                                                value="{{ $propertie->type_prop_id ?? '' }}">
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    </div> --}}
                                    <!--end::TIPO DO IMÓVEL-->

                                    <!--begin::ANDAR DO APARTAMENTO-->
                                    {{-- <div class="row fv-row mb-7" id="hiddenDiv4" style="display:none">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Andar do Apartamento</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o número do andar do apartamento.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                name="andar_apartamento"
                                                value="{{ $propertie->andar_apartamento ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div> --}}
                                    <!--end::ANDAR DO APARTAMENTO-->

                                    <!--begin::POSSUI CONDOMINIO-->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Possui Condomínio?</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="O imóvel possui condomínio?.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" id="mySelect"
                                                onchange="myFunction()" data-placeholder="condominio" name="condominium"
                                                value="{{ $propertie->condominium ?? '' }}">
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <!--end::POSSUI CONDOMINIO-->

                                    <!-- begin::SELECIONE O CONDOMÍNIO -->
                                    <div class="row fv-row mb-7" id="hiddenDiv3" style="display:none">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Selecione um condomínio cadastrado</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Selecione um condomínio já cadastrado no sistema">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary mb-2" data-toggle="modal"
                                                data-target="#myModal" id="botaoModalCondominio"
                                                style="position: relative; margin-bottom:0px !important;padding: 10px 10px;">
                                                <span
                                                    style="display: flex;align-items: center;font-size: 14px;height: 100%;">Selecionar
                                                    Condomínio</span>
                                            </button>
                                        </div>
                                        <div class="align-self-center col-md-4 text-muted">
                                            <span id="condominio_selected"
                                                data-cond-id="{{ $condominio->id ?? '' }}">{{ $condominio->title ?? '' }}</span>
                                            <i class="fa-solid fa-xmark text-danger d-none" id="removeCondominioSelected"
                                                style="cursor: pointer;"></i>

                                        </div>
                                    </div>
                                    <!--end::SELECIONE O CONDOMÍNIO-->

                                    <!--begin::CONDOMINIO-->
                                    <div class="row fv-row mb-7" id="hiddenDiv2" style="display:none">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Valor Mensal do Condomínio</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o valor mensal do condomínio">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            {{-- <input class="form-control form-control-solid" id=""
                                                name="condominium_price" onKeyUp="mascaraMoeda(this, event)"
                                                placeholder="R$" value="{{ $propertie->condominium_price ?? '' }}"> --}}
                                            <input class="form-control form-control-solid" id=""
                                                name="condominium_price" onKeyUp="mascaraMoeda(this, event)"
                                                placeholder="R$" value="R$@money($propertie->condominium_price)">
                                        </div>

                                    </div>
                                    <!--end::CONDOMINIO-->

                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab CONDOMINIOS-->

                                <!--begin:::TAB DETALHES-->
                                <div class="tab-pane flex-column" data-kt-stepper-element="content" id="kt_vendor_info"
                                    role="tabpanel">
                                    <!--begin::Form-->

                                    <!--begin::TITULO-->
                                    <div class="row mb-7">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Detalhes do Imóvel</h2>
                                        </div>
                                    </div>
                                    <!--end::TITULO-->

                                    <!--begin::TIPO DO IMÓVEL-->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tipo do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Qual categoria o tipo do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid"
                                                data-placeholder="Tipo do Imóvel" name="type_prop_id" id="type_prop_id"
                                                value="{{ $propertie->type_prop_id ?? '' }}">
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::TIPO DO IMÓVEL-->

                                    <!--begin::FINALIDADE DE UTILIZAÇÃO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Finalidade de Utilização</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Qual a finalidade de utilização do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" onchange="myFinalidade()"
                                                value="{{ $propertie->finalidade ?? '' }}" data-placeholder="categoria"
                                                name="finalidadeUtilizacao" id="finalidadeUtilizacao">
                                                <option value="comercial">Comercial</option>
                                                <option value="residencial">Residencial</option>

                                            </select>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <!--end:: FINALIDADE DE UTILIZAÇÃO-->

                                    <!--begin::CATEGORIA-->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Categoria</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Qual categoria o imóvel se encaixa.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" id="mySelectCategory"
                                                onchange="myCategory()" data-placeholder="categoria" name="category"
                                                value="{{ $propertie->category ?? '' }}">
                                                <option value="">Selecionar</option>
                                                <option value="Venda">Venda</option>
                                                <option value="Aluguel">Aluguel</option>
                                                <option value="VendaAluguel" id="hiddenCategoria" style="display:none">
                                                    Venda e Aluguel</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <!--end::CATEGORIA-->

                                    <!-- begin::PREÇO DO IMÓVEL -->
                                    <div class="row fv-row mb-7" id="hiddenPrecoVenda">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Preço do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o valor do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" id=""
                                                name="prop_price" placeholder="R$" onKeyUp="mascaraMoeda(this, event)"
                                                value="R$@money($propertie->prop_price)">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::PREÇO DO IMÓVEL -->

                                    <!--begin::PREÇO ALUGUEL-->
                                    <div class="row fv-row mb-7" id="hiddenPrecoAlug" style="display:none">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Preço Aluguel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o valor do aluguel do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control form-control-solid " value="R$@money($propertie->prop_rent)"
                                                name="prop_rent" placeholder="R$" onKeyUp="mascaraMoeda(this, event)">
                                        </div>

                                    </div>
                                    <!--end::PREÇO ALUGUEL-->

                                    <!--begin::ARQUIVO PDF -->
                                    <div class="row fv-row mb-7" id="arquivoPdf">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Adicionar Arquivo PDF</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Selecione um Arquivo PDF que deseja vincular ao imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="dropzone" id="divDropzonePDF">
                                                <div class="dz-message needsclick">
                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span
                                                            class="path1"></span><span class="path2"></span></i>

                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte os arquivos aqui
                                                            ou
                                                            clique para carregar</h3>
                                                        <span class="fs-7 fw-semibold text-gray-400">Carregue seus
                                                            documentos</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end:: ARQUIVO PDF-->

                                    <!-- begin::IPTU -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Valor do IPTU Anual</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o valor do IPTU.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" id=""
                                                placeholder="R$" value="R$@money($propertie->iptu_price)"
                                                onKeyUp="mascaraMoeda(this, event)" name="iptu_price">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::IPTU -->

                                    <!-- begin::HONORARIO DE CORRETAGEM -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Honorário de Corretagem</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o valor do Honorário de Corretagem.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid kt_inputmask_comissao"
                                                id="" name="honorario_corretagem" placeholder="%"
                                                value="{{ $propertie->corretagem ?? 0 }}">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::HONORARIO DE CORRETAGEM -->

                                    <!--begin::STATUS DO IMÓVEL -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Status do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Qual o status do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" onchange="myStatusImovel()"
                                                id="statusImovel" name="statusImovel"
                                                value="{{ $propertie->status_imovel }}">
                                                <option value="lancamento">Lançamento</option>
                                                <option value="construcao">Em Construção</option>
                                                <option value="prontoMorar">Pronto para morar</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <!--end:: STATUS DO IMÓVEL-->

                                    <!-- begin::DATA INÍCIO DA OBRA -->
                                    <div class="row fv-row mb-7" id="hiddenInicioObra">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Data de Início da Obra</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Selecione a data de início da obra">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" type="date"
                                                id="dateInicioObra" name="dateInicioObra"
                                                value="{{ $propertie->inicioObra ? $propertie->inicioObra->format('Y-m-d') : '' }}">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::DATA INÍCIO DA OBRA -->

                                    <!-- begin::DATA FIM DA OBRA -->
                                    <div class="row fv-row mb-7" id="hiddenFimObra">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Data de Entrega do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Selecione a data de entrega do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" type="date"
                                                id="dateFimObra" name="dateFimObra"
                                                value="{{ $propertie->fimObra ? $propertie->fimObra->format('Y-m-d') : '' }}">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::DATA FIM DA OBRA -->

                                    <!--begin::TEMPO DE CONSTRUÇÃO -->
                                    <div class="row fv-row mb-7" id="hiddenTempoConstrucao" style="display: none">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Tempo de Construção</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Qual o tempo de construção desse imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid"
                                                data-placeholder="Tempo de Construcao" name="tempoConstrucao"
                                                id="tempoConstrucao" value="{{ $propertie->tempoConstrução ?? '' }}">
                                                <option value="">Selecionar</option>
                                                <option value="Mais de 10 anos">Construído a mais de 10 anos</option>
                                                <option value="Menos de 5 anos">Construído a menos de 5 anos</option>

                                            </select>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <!--end:: TEMPO DE CONSTRUÇÃO-->

                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab DETALHES-->

                                <!--begin:::TAB ENDEREÇO -->
                                <div class="tab-pane flex-column" data-kt-stepper-element="content"
                                    id="kt_ecommerce_settings_store" role="tabpanel">
                                    <!--begin::Form-->


                                    <!--begin::TITULO-->
                                    <div class="row mb-7">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Endereço do Imóvel</h2>
                                        </div>
                                    </div>
                                    <!--end::TITULO-->

                                    <!-- begin::CEP -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">CEP</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o CEP do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid kt_inputmask_cep"
                                                name="CEP" value="{{ $propertie->CEP ?? '' }}"
                                                onblur="pesquisacep(this.value);" />

                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::CEP -->

                                    <!-- begin::RUA -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Rua</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o nome da rua do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="street"
                                                id="street" value="{{ $propertie->street ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::RUA-->

                                    <!--begin::NÚMERO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Número</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o número do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="number"
                                                id="number" value="{{ $propertie->number ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::NÚMERO -->

                                    <!--begin::BAIRRO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Bairro</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o bairro do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="district"
                                                id="district" value="{{ $propertie->district ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::BAIRRO -->

                                    <!--begin::CIDADE -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Cidade</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Escolha a cidade do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            @php
                                                $citie = App\Http\Controllers\Admin\RegisterController::getCitieById(
                                                    $propertie->city_id,
                                                );
                                            @endphp
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" data-placeholder="Cidade"
                                                name="city_id" id="city_id" data-citie="{{ $citie->id ?? '' }}"
                                                value="{{ $citie->citie ?? '' }}">

                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::CIDADE -->

                                    <!--begin::COMPLEMENTO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Complemento</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o complemento do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                name="complement" id="complement"
                                                value="{{ $propertie->complement ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::COMPLEMENTO -->

                                    <!--begin::ESTADO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Estado</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o estado que o imóvel se encontra.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" data-placeholder="Estado"
                                                name="state" id="state" value="{{ $propertie->state ?? '' }}">
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::ESTADO -->


                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab ENDEREÇO-->

                                <!--begin:::TAB CARACTERÍSTICAS-->
                                <div class="tab-pane flex-column" data-kt-stepper-element="content"
                                    id="kt_ecommerce_settings_localization" role="tabpanel">
                                    <!--begin::Form-->

                                    <!--begin::TITULO-->
                                    <div class="row mb-7">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Características do Imóvel</h2>
                                        </div>
                                    </div>
                                    <!--end::TITULO-->

                                    <!-- begin::TAMANHO DO IMÓVEL -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Tamanho do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o tamanho em m² do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                name="prop_size" value="{{ $propertie->prop_size ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::TAMANHO DO IMÓVEL -->

                                    <!-- begin::QUARTOS -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Quartos</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o número de quartos do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="bedroom"
                                                value="{{ $propertie->bedroom ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::QUARTOS-->

                                    <!-- begin::SUITES -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Suites</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o número de suites do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="suites"
                                                value="{{ $propertie->suites ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::SUITES-->

                                    <!--begin::BANHEIROS -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Banheiros</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o número de banheiros do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                name="bathrooms" value="{{ $propertie->bathrooms ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::BANHEIROS -->

                                    <!--begin::VAGAS DE GARAGEM -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Vagas de Garagem</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite a quantidade de vagas de garagem do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" name="garage"
                                                value="{{ $propertie->garage ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::VAGAS DE GARAGEM -->

                                    <!--begin::CARACTERISTICAS -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Características</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Escolha as características presentes no imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex flex-wrap mt-3" id="caracteristica_list">
                                                {{-- INSERT BY AJAX --}}
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::CARACTERISTICAS -->

                                    <!--begin::DESCRIÇÃO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span>Descrição</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite a descrição do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control form-control-solid" rows="3" id="description_html" name="description"
                                                placeholder="Descrição" style="height: 184px;">{{ $propertie->description ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!--end::DESCRIÇÃO -->

                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab CARACTERÍSTICAS-->

                                <!--begin:::TAB MÍDIAS-->
                                <div class="tab-pane flex-column" data-kt-stepper-element="content"
                                    id="kt_ecommerce_settings_products" role="tabpanel">
                                    <!--begin::Form-->

                                    <!--begin::TITULO-->
                                    <div class="row mb-7">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Mídias</h2>
                                        </div>
                                    </div>
                                    <!--end::TITULO-->

                                    <!-- begin::FOTOS DO IMÓVEL -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Fotos do imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Envie as fotos do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">

                                            {{-- <input class="form-control form-control-solid" type="file"
                                            name="prop_photos[]" multiple id="prop_photos"> --}}
                                            @if ($propertie->is_from_xml)
                                                <div id="imgs_xml">
                                                    {{-- insert by edit-property.js --}}
                                                </div>
                                            @else
                                                <div class="dropzone" id="divDropzone">
                                                    <div class="dz-message needsclick">
                                                        <i class="ki-duotone ki-file-up fs-3x text-primary"><span
                                                                class="path1"></span><span class="path2"></span></i>

                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte as imagens
                                                                aqui
                                                                ou
                                                                clique para carregar</h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">Max: 20
                                                                Fotos</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                            @endif


                                        </div>
                                    </div>
                                    <!--end::PREÇO DO IMÓVEL -->

                                    <!-- begin::VIDEO DO IMÓVEL -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Vídeo do imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Insira o link do youtube.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">

                                            {{-- <input class="form-control form-control-solid" type="file"
                                            name="prop_video[]" multiple id="prop_video"> --}}
                                            {{-- <div class="dropzone" id="divDropzoneVideo">
                                            <div class="dz-message needsclick">
                                                <i class="ki-duotone ki-file-up fs-3x text-primary"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte o video aqui ou
                                                        clique para carregar</h3>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div> --}}
                                            <input class="form-control form-control-solid" type="text" id="url_video"
                                                name="url_video" value="{{ $propertie->url_video ?? '' }}">

                                        </div>
                                    </div>
                                    <!--end::VIDEO DO IMÓVEL -->

                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab MÍDIAS-->

                                <!--begin:::TAB INFO PROPRIETARIO -->
                                <div class="tab-pane flex-column" data-kt-stepper-element="content"
                                    id="kt_ecommerce_settings_customers" role="tabpanel">
                                    <!--begin::Form-->

                                    <!--begin::TITULO-->
                                    <div class="row mb-7">
                                        <div class="col-md-9 offset-md-3">
                                            <h2>Informações do Proprietário do Imóvel</h2>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <div class="col-md-9 offset-md-3">
                                            <button class="btn btn-primary" id="openModalProprietario">Adicionar
                                                proprietario</button>
                                        </div>
                                    </div>
                                    <!--end::TITULO-->

                                    <!-- begin::NOME COMPLETO -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Nome Completo do Proprietário do Imóvel</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o nome completo do proprietário">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            {{-- <input type="text" class="form-control form-control-solid"
                                                name="name_vendor" value="{{ $propertie->name_vendor ?? '' }}" /> --}}
                                            <input type="hidden" name="vendor_selected"
                                                value="{{ $propertie->proprietario ?? '' }}">
                                            <select class="form-select" data-control="select2"
                                                data-placeholder="Selecionar" id="name_vendor" name="name_vendor">

                                            </select>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::NOME COMPLETO -->

                                    <!--begin::TELEFONE -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Telefone</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o telefone do proprietário do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text"
                                                class="form-control form-control-solid kt_inputmask_phone"
                                                name="phone_vendor" value="{{ $propertie->phone_vendor ?? '' }}"
                                                readonly="true" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::TELEFONE -->

                                    <!-- begin::CPF -->
                                    {{-- <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">CPF</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o cpf do proprietário do imóvel">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid kt_inputmask_cpf"
                                                name="cpf_vendor" value="{{ $propertie->cpf_vendor ?? '' }}" />
                                            <!--end::Input-->
                                        </div>
                                    </div> --}}
                                    <!--end::CPF-->

                                    <!--begin::Email -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="">Email</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Digite o email do proprietário do imóvel.">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <input type="text"
                                                class="form-control form-control-solid kt_inputmask_email"
                                                name="email_vendor" value="{{ $propertie->email_vendor ?? '' }}"
                                                readonly="true" />
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <!--end::Email -->

                                    <!--begin::OPÇÃO DE EXCLUSIVIDADE -->
                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                <span class="required">Opção de Exclusividade</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="O imóvel possui opção de exclusividade">
                                                    <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid" data-placeholder="categoria"
                                                name="opcaoExclusividade" id="opcaoExclusividade"
                                                value="{{ $propertie->exclusividade ?? '' }}">
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>

                                            </select>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <!--end:: OPÇÃO DE EXCLUSIVIDADE-->

                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab INFO PROPRIETARIO-->

                            </div>
                            <!--end:::Tab content-->
                            <!--begin::BOTÕES-->
                            <div class="row py-5 justify-content-end">
                                <div class="d-flex justify-content-end col-md-9 offset-md-3">
                                    <div class="d-flex">
                                        @if ($propertie->is_from_xml == 1)
                                            @if ($propertie->available == 1)
                                                <div>
                                                    <!--begin::Button-->
                                                    <button type="reset" data-kt-properties-type="cancel"
                                                        class="btn btn-light me-3"
                                                        data-kt-stepper-action="previous">Voltar</button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-properties-type="disable"
                                                        data-kt-stepper-action="submit" class="btn btn-primary">
                                                        <span class="indicator-label">Desabilitar imóvel</span>
                                                        <span class="indicator-progress">Desabilitando...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                    <button type="button" class="btn btn-primary"
                                                        data-kt-stepper-action="next">
                                                        Continue
                                                    </button>
                                                </div>
                                            @else
                                                <div>
                                                    <!--begin::Button-->
                                                    <button type="reset" data-kt-properties-type="cancel"
                                                        class="btn btn-light me-3"
                                                        data-kt-stepper-action="previous">Voltar</button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-properties-type="enable"
                                                        data-kt-stepper-action="submit" class="btn btn-primary">
                                                        <span class="indicator-label">Ativar imóvel</span>
                                                        <span class="indicator-progress">Ativando...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                    <button type="button" class="btn btn-primary"
                                                        data-kt-stepper-action="next">
                                                        Continue
                                                    </button>
                                                </div>
                                            @endif
                                        @else
                                            <div>
                                                <!--begin::Button-->
                                                <button type="reset" data-kt-properties-type="cancel"
                                                    class="btn btn-light me-3"
                                                    data-kt-stepper-action="previous">Voltar</button>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" data-kt-properties-type="submit"
                                                    class="btn btn-primary" data-kt-stepper-action="submit">
                                                    <span class="indicator-label">Salvar</span>
                                                    <span class="indicator-progress">Salvando...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                                <!--end::Button-->
                                                <button type="button" class="btn btn-primary"
                                                    data-kt-stepper-action="next">
                                                    Continue
                                                </button>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <!--end::BOTÕES-->
                        </form>
                    </div>
                </div>
                <!--end::Card body-->
                <div id="add_condominio_modal">
                    @include('admin.layouts.components.propriedades.modalCondominio')
                </div>
                <div id="add_proprietario_modal">
                    @include('admin.layouts.components.proprietarios.modalCreate')

                </div>
            </div>
            <!--end::Card-->

            <div class="modal fade" id="modal-edit-loading" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="modal-edit-loadingLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-edit-loadingLabel">Salvando imóvel</h5>

                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <span class="text-muted">Salvando imóvel</span>
                                </div>
                                <div class="col-6" id="check-imovel">
                                    <div class="spinner-border spinner-border-sm ml-auto text-warning" role="status"
                                        aria-hidden="true" id="spinner-imovel"></div>
                                    <div>
                                        <i class="fa-solid fa-check text-success" style="display: none;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <span class="text-muted">Buscando geolocalização</span>
                                </div>
                                <div class="col-6" id="check-geo">
                                    <div class="spinner-border spinner-border-sm ml-auto text-warning" role="status"
                                        aria-hidden="true" id="spinner-geo"></div>
                                    <div>
                                        <i class="fa-solid fa-check text-success" style="display: none;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <span class="text-muted">Buscando lugares próximos</span>
                                </div>
                                <div class="col-6" id="check-nearby">
                                    <div class="spinner-border spinner-border-sm ml-auto text-warning" role="status"
                                        aria-hidden="true" id="spinner-nearby"></div>
                                    <div>
                                        <i class="fa-solid fa-check text-success" style="display: none;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <span class="text-muted">Salvando imagens</span>
                                </div>
                                <div class="col-6" id="check-images">
                                    <div class="spinner-border spinner-border-sm ml-auto text-warning" role="status"
                                        aria-hidden="true" id="spinner-images"></div>
                                    <div>
                                        <i class="fa-solid fa-check text-success" style="display: none;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script>
                var proprietarios
            </script>
            <!--end::Content container-->
        </div>

        <!--end::Content-->
    @endsection
