<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card body-->
            <div class="card-body">
                <div class="stepper" id="stepper_add_condominio">
                    <ul class=" stepper-nav nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">

                        <!--begin:::Tab item-->
                        <li class="nav-item stepper-item current" data-kt-stepper-element="nav">
                            <span class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab"
                                href="#kt_infosBasicas">
                                <i class="fa-solid fa-gears fs-2 me-2"></i>
                                Info Básica
                            </span>
                        </li>
                        <!--end:::Tab item-->
    
                        <!--begin:::Tab item-->
                        <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                            <span class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                                href="#kt_endereco">
                                <i class="fa-solid fa-location-dot fs-2 me-2"></i>
                                Endereço
                            </span>
                        </li>
                        <!--end:::Tab item-->
    
                        <!--begin:::Tab item-->
                        <li class="nav-item stepper-item" data-kt-stepper-element="nav">
                            <span class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab"
                                href="#kt_midias">
                                <i class="fa-solid fa-dollar-sign fs-2 me-2"></i>
                                Mídias
                            </span>
                        </li>
                        <!--end:::Tab item-->
    
                    </ul>
                    <form id="kt_condiminio_form" class="form" action=""
                        data-request-condominio="{{ route('admin.condominio.storeCondominio') }}" enctype="multipart/form-data">
    
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
    
                        <!--end:::Tabs-->
    
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
    
                            <!--begin:::TAB INFO BÁSICA-->
                            <div class="tab-pane flex-column current" id="kt_infosBasicas" role="tabpanel" data-kt-stepper-element="content">
                                <!--begin::Form-->
    
    
                                <!--begin:: TITULO -->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Informações Básicas</h2>
                                    </div>
                                </div>
                                <!--end:: TITULO -->
    
                                <!--begin::NOME DO CONDOMÍNIO-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Nome do Condomínio</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Digite o nome do condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="name_condominio"
                                            value="" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::NOME DO CONDOMÍNIO-->
    
                                <!--begin::CARACTERISTICAS DO CONDOMÍNIO -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="">Características do Condomínio</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Escolha as características presentes no condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex flex-wrap mt-3" id="caracteristicas_condominio"
                                            name="caracteristicas_condominio">
                                            {{-- INSERT BY AJAX --}}
                                        </div>
                                    </div>
    
                                </div>
                                <!--end::CARACTERISTICAS DO CONDOMÍNIO -->
    
    
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab INFO BASICA-->
    
    
                            <!--begin:::TAB ENDEREÇO -->
                            <div class="tab-pane flex-column " id="kt_endereco" role="tabpanel" data-kt-stepper-element="content">
                                <!--begin::Form-->
    
                                <!--begin::TITULO-->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Endereço do Condomínio</h2>
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
                                                title="Digite o CEP do condomínio">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid kt_inputmask_cep"
                                            name="cep_condominio" value="" onblur="pesquisacep(this.value);"
                                            id="condominio_CEP" />
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
                                                title="Digite o nome da rua do condomínio">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="street"
                                            id="street" value="" />
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
                                                title="Digite o número do condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="number"
                                            id="number" value="" />
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
                                                title="Digite o bairro do condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="district"
                                            id="district" value="" />
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
                                                title="Escolha a cidade do condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" data-placeholder="Cidade"
                                            name="city_id" id="city_id" data-citie="">
    
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
                                                title="Digite o complemento do condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="complement"
                                            id="complement" value="" />
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
                                                title="Digite o estado do condomínio.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" data-placeholder="Estado"
                                            name="state" id="state">
    
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::ESTADO -->
    
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab ENDEREÇO-->
    
    
                            <!--begin:::TAB FOTOS-->
                            <div class="tab-pane flex-column " id="kt_midias" role="tabpanel" data-kt-stepper-element="content">
                                <!--begin::Form-->
    
    
                                <!--begin::TITULO-->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Mídias</h2>
                                    </div>
                                </div>
                                <!--end::TITULO-->
    
                                <!-- begin::FOTOS DO CONDOMÍNIO -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Fotos do condominio</span>
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
                                        <div class="dropzone" id="divDropzoneCondominio">
                                            <div class="dz-message needsclick">
                                                <i class="ki-duotone ki-file-up fs-3x text-primary"><span
                                                        class="path1"></span><span class="path2"></span></i>
    
                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte as imagens aqui ou
                                                        clique para carregar</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Max: 10 Fotos</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
    
    
                                    </div>
                                </div>
                                <!--end::FOTOS DO CONDOMÍNIO -->
    
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="">Vídeo do condomínio</span>
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
                                                    <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>
                                    
                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Solte o video aqui ou clique para carregar</h3>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div> --}}
    
                                        <input class="form-control form-control-solid" type="text" id="url_video"
                                            name="url_video_condominio">
    
                                    </div>
                                </div>
    
    
                                <!--end::Form-->
                            </div>
                            <!--end:::Tab FOTOS-->
    
                        </div>
                        <!--end:::Tab content-->
    
                        <!--begin::BOTÕES-->
                        <div class="row py-5 justify-content-end">
                            <div class="d-flex justify-content-end col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <!--begin::Button-->
                                    <button type="reset" data-kt-properties-type="cancel"
                                        class="btn btn-light me-3" data-kt-stepper-action="previous">Voltar</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" data-kt-properties-type-condominio="submit" data-kt-stepper-action="submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">Salvar</span>
                                        <span class="indicator-progress">Salvando...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                    <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--end::BOTÕES-->
                    </form>
                </div>
                <!--begin:::Tabs-->
               
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->
</div>
