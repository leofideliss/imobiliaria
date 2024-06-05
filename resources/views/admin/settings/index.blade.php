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

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}"/>

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#kt_settings_general">
                                <i class="fa-solid fa-gears fs-2 me-2"></i>
                                Gerais
                            </a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_comissoes">
                                <i class="fa-solid fa-dollar-sign fs-2 me-2"></i>
                                Comissões
                            </a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_redesSociais">
                                <i class="fa-solid fa-globe fs-2 me-2"></i>
                                Redes Sociais
                            </a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_videos">
                                <i class="fa-solid fa-video fs-2 me-2"></i>
                                Vídeos
                            </a>
                        </li>
                        <!--end:::Tab item-->

                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_imagens">
                                <i class="fa-regular fa-image fs-2 me-2"></i>                               
                                Imagens
                            </a>
                        </li>
                        <!--end:::Tab item-->

                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_settings_general" role="tabpanel">
                            <!--begin::Form-->
                            <form id="kt_settings_general_form" class="form" action="#">

                                <!--begin:: TITULO -->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Configurações Gerais</h2>
                                    </div>
                                </div>
                                <!--end:: TITULO -->

                                <!--begin::WHATSAPP-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">WhatsApp</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o whatsapp da empresa.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid kt_inputmask_phoneDuplo" name="whatsapp" value="{{ $config->whatsapp ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::WHATSAPP-->

                                <!--begin::TELEFONE FIXO-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Telefone Fixo</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o telefone fixo da empresa.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                         <!--begin::Input-->
                                         <input type="text" class="form-control form-control-solid kt_inputmask_phonefixo" name="telefonefixo" value="{{ $config->phone ?? '' }}" />
                                         <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::TELEFONE FIXO-->

                                <!--begin::E-MAIL-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>E-mail</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o e-mail da empresa.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid kt_inputmask_email" placeholder="E-mail" name="email" value="{{ $config->email ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::E-MAIL-->

                                <!--begin::DESCRIÇÃO -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Descrição geral para todos imóveis</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Digite a descrição geral para todos imóveis.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control form-control-solid" rows="3" id="description_html" name="description_geral" placeholder="Descrição"
                                            style="height: 184px;">{{$config->descricao ?? ''}}</textarea>
                                    </div>
                                </div>
                                <!--end::DESCRIÇÃO -->

                                <!-- begin::BOTÕES -->
                                <div class="row py-5">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <!--begin::Button-->
                                            <button type="reset" data-kt_settings_general-type="cancel" class="btn btn-light me-3">Cancelar</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" data-kt_settings_general-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Salvar</span>
                                                <span class="indicator-progress">Salvando...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end::BOTÕES -->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_settings_comissoes" role="tabpanel">
                            <!--begin::Form-->
                            <form id="kt_settings_comissoes_store" class="form" action="#">

                                <!--begin::TITULO-->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Comissões</h2>
                                    </div>
                                </div>
                                <!--end::TITULO-->

                                <!-- begin::COMISSÃO CORRETOR -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Comissão Corretor</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o valor da % da comissão do corretor">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid kt_inputmask_comissao" name="comissao_corretor" value="{{ $config->realtor_com ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::COMISSÃO CORRETOR -->

                                <!-- begin::COMISSÃO FOTOGRAFO -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Comissão Fotógrafo</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o valor da % da comissão do fotógrafo">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" onKeyUp="mascaraMoeda(this, event)" placeholder="R$" name="comissao_fotografo" value="{{ $config->photo_com ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::COMISSÃO FOTOGRAFO-->

                                <!--begin::COMISSÃO AVALIADOR DE IMÓVEL -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Comissão avaliador de Imóvel</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o valor da % da comissão do avaliador de imóvel.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                        onKeyUp="mascaraMoeda(this, event)" placeholder="R$" name="comissao_avaliador" value="{{ $config->eval_com ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::COMISSÃO AVALIADOR DE IMÓVEL -->

                                <!--begin::COMISSÃO INDICAR IMOVEL -->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Comissão Indicar Imóvel</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o valor em R$ por indicar imóvel.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                        onKeyUp="mascaraMoeda(this, event)" placeholder="R$" name="comissao_indicar_imovel" value="{{ $config->indicate_com ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::COMISSÃO INDICAR IMOVEL -->

                                <!--begin::BOTÕES-->
                                <div class="row py-5">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <!--begin::Button-->
                                            <button type="reset" data-kt_settings_comissoes-type="cancel" class="btn btn-light me-3">Cancelar</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" data-kt_settings_comissoes-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Salvar</span>
                                                <span class="indicator-progress">Salvando...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::BOTÕES-->

                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end:::Tab pane-->

                        
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show" id="kt_settings_redesSociais" role="tabpanel">
                            <!--begin::Form-->
                            <form id="kt_settings_redesSociais_form" class="form" action="#">

                                <!--begin:: TITULO -->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Redes Sociais</h2>
                                    </div>
                                </div>
                                <!--end:: TITULO -->

                                <!--begin::FACEBOOK-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Facebook</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do Facebook da empresa.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="link_face" value="{{ $config->facebook ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::FACEBOOK-->

                                <!--begin::INSTAGRAM-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Instagram</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do instagram da empresa.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                         <!--begin::Input-->
                                         <input type="text" class="form-control form-control-solid" name="link_instagram" value="{{ $config->instagram ?? '' }}" />
                                         <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::INSTAGRAM-->


                                <!-- begin::BOTÕES -->
                                <div class="row py-5">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <!--begin::Button-->
                                            <button type="reset" 
                                            
                                            data-kt_settings_redesSociais-type="cancel" class="btn btn-light me-3">Cancelar</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" data-kt_settings_redesSociais-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Salvar</span>
                                                <span class="indicator-progress">Salvando...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end::BOTÕES -->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show" id="kt_settings_videos" role="tabpanel">
                            <!--begin::Form-->
                            <form id="kt_settings_videos_form" class="form" >

                                <!--begin:: TITULO -->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Vídeos</h2>
                                    </div>
                                </div>
                                <!--end:: TITULO -->

                                <!--begin::VENDER IMÓVEL-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Vídeo página "Vender Imóvel"</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do vídeo no youtube.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="link_vender" value="{{ $config->link_vender ?? '' }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::VENDER IMÓVEL-->

                                <!--begin::INDICAR IMÓVEL-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Vídeo página "Indicar Imóvel"</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do vídeo no youtube.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                         <!--begin::Input-->
                                         <input type="text" class="form-control form-control-solid" name="link_indicar" value="{{ $config->link_indicar ?? '' }}" />
                                         <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::INDICAR IMÓVEL-->

                                <!--begin::CORRETORES-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Vídeo página "Corretores"</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do vídeo no youtube.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                         <!--begin::Input-->
                                         <input type="text" class="form-control form-control-solid" name="link_corretores" value="{{ $config->link_corretores ?? '' }}" />
                                         <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::CORRETORES-->

                                <!--begin::FOTOGRAFOS-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Vídeo página "Fotógrafos"</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do vídeo no youtube.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                         <!--begin::Input-->
                                         <input type="text" class="form-control form-control-solid" name="link_fotografos" value="{{ $config->link_fotografos ?? '' }}" />
                                         <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::FOTOGRAFOS-->

                                <!--begin::AVALIADORES-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Vídeo página "Avaliadores"</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Digite o link do vídeo no youtube.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                         <!--begin::Input-->
                                         <input type="text" class="form-control form-control-solid" name="link_avaliadores" value="{{ $config->link_avaliadores ?? '' }}" />
                                         <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::AVALIADORES-->

                                <!-- begin::BOTÕES -->
                                <div class="row py-5">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <!--begin::Button-->
                                            <button type="reset" 
                                            
                                            data-kt_settings_videos-type="cancel" class="btn btn-light me-3">Cancelar</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" data-kt_settings_videos-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Salvar</span>
                                                <span class="indicator-progress">Salvando...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end::BOTÕES -->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end:::Tab pane-->

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show" id="kt_settings_imagens" role="tabpanel">
                            <!--begin::Form-->
                            <form id="kt_settings_imagens_form" class="form" action="#">

                                <!--begin:: TITULO -->
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Imagens</h2>
                                    </div>
                                </div>
                                <!--end:: TITULO -->

                                <!--begin::MARCA D' AGUA-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Imagem de Marca d' Água</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Insira a Imagem de Marca d' Agua.">
                                                <i class="fa-solid fa-circle-exclamation text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <div class="col-md-9">
                                        <!--begin::Input-->
                                        <input type="file" id="imagem_marca" name="imagem_marca">
                                        <!--end::Input-->
                                        <div class="fv-row">
                                            <img src="" alt="" name="" style="display: none;" id="previewImg"
                                                width="80" height="80" class="mb-3">
                                            <input type="hidden" name="image_data" id="image_data" value="{{$config->img_name ?? ''}}">
                                        </div>
                                    </div>
                                </div>
                                <!--begin::MARCA D' AGUA-->

                                <!-- begin::BOTÕES -->
                                <div class="row py-5">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <!--begin::Button-->
                                            <button type="reset" 
                                            
                                            data-kt_settings_marca-type="cancel" class="btn btn-light me-3">Cancelar</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" data-kt_settings_marca-type="submit" class="btn btn-primary">
                                                <span class="indicator-label">Salvar</span>
                                                <span class="indicator-progress">Salvando...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!-- end::BOTÕES -->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end:::Tab pane-->                        

                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

@endsection