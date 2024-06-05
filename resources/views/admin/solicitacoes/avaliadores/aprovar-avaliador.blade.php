@extends('admin.layouts.page')

@section('content')

    <div class="app-toolbar pt-3 pt-lg-6">
        <div class="app-container container-xxl d-flex flex-stack">
            <div class="d-flex">

                <a class="nav-link d-flex align-items-center pb-5" href="#">
                    
                    <i class="fa-solid fa-chevron-left me-2 tamanhoIconeTopo"></i>
                    <span class="textoVoltarTopo">Voltar</span>
                </a>
            </div>
        </div>
    </div>

    <!---- TOOLBAR ---->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    NOME DO AVALIADOR
                </h1>
                <!--end::Title-->

                <div class="text-muted text-hover-primary">EMAIL</div>
    
                <div class="text-muted text-hover-primary">Código da solicitação:
                    #SL03234
                </div>
            

            </div>
        </div>
        <!--end::Toolbar container-->
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card shadow-sm p-md-2 mx-n4 mx-md-0">
                
                <div class="card card-flush">

                    <div class="card-body">

                        <div class="d-sm-flex justify-content-between align-items-start pb-4">

                            <div class="order-sm-1">
                                
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Informações do Avaliador de Imóveis
                                </h1>

                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            CRECI:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap mt-3" id="tiposUsuarios_list">
                                                {{-- INSERT BY AJAX --}}
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">
                                            CNAI:
                                        </td>
                                        <td class="text-gray-800 min-w-200px">
                                            <div class="d-flex flex-wrap mt-3" id="tiposUsuarios_list">
                                                {{-- INSERT BY AJAX --}}
                                            </div>
                                        </td>
                                    </tr>
                                        
                                </table>

                            </div>

                        </div>

                        <!--begin::BOTÕES-->
                        <div class="row py-5 justify-content-end">
                            <div class="d-flex justify-content-end col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <!--begin::Button-->
                                    <button type="reset" data-kt-properties-type="cancel"
                                        class="btn btn-bg-danger me-3">
                                        <span class="colorTextBranco">Reprovar</span>
                                    </button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" data-kt-properties-type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Aprovar</span>
                                    </button>
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

@endsection