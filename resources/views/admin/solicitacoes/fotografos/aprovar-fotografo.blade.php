@extends('admin.layouts.page')

@section('content')

    <div class="app-toolbar pt-3 pt-lg-6">
        <div class="app-container container-xxl d-flex flex-stack">
            <div class="d-flex">

                <a class="nav-link d-flex align-items-center pb-5 botaoVoltarTopo" href="#">
                    
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
                    NOME DO FOTOGRAFO
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

                            <div class="order-sm-1 width-100-galery">
                                
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0 mb-5">
                                    Informações do Fotógrafo
                                </h1>

                                <div class="tamanhoFonte">Mídias:</div>
                                <div class="row py-5 justify-content-start">

                                    <div class="col-lg-2">
                                        <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{asset('assets/media/logos/casa1.jpg')}}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url({{asset('assets/media/logos/casa1.jpg')}})">
                                            </div>
                                            <!--end::Image-->
                                        
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{asset('assets/media/logos/casa1.jpg')}}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                style="background-image:url({{asset('assets/media/logos/casa1.jpg')}})">
                                            </div>
                                            <!--end::Image-->
                                        
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                    </div>

                                </div>
                                
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