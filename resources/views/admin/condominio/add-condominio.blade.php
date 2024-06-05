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

<div id="add_condominio_page">

    @include('admin.layouts.components.condominios.cardCreate')
</div>

    {{-- <div class="modal fade" id="modal-edit-loading" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modal-edit-loadingLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-loadingLabel">Salvando condomínio</h5>

                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <span class="text-muted">Salvando condomínio</span>
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
                </div>

            </div>
        </div>
    </div> --}}
    <!--end::Content-->
    @include('admin.layouts.components.modalAwaitImages')
@endsection
