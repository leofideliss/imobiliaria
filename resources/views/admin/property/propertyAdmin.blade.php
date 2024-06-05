@extends('admin.layouts.page')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

        <div class="d-flex flex-column flex-column-fluid">

            <!---- TOOLBAR ---->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    @include('admin.layouts.components.title_bread')
                </div>
                <!--end::Toolbar container-->
            </div>

            <!---- CONTEUDO ---->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Products-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">

                                    <i class="fa-solid fa-magnifying-glass fs-3 ms-4 position-absolute"></i>
                                    <input type="text" data-kt-properties-list-filter="search"
                                        class="form-control form-control-solid w-250px ps-12" placeholder="Buscar Imóvel">
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                               
                                <a href="{{ route('admin.property.index') }}"
                                    class="btn btn-primary fw-bold fs-8 fs-lg-base">Adicionar Imóvel</a>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div id="kt_properties_list_table_admin_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                        id="kt_properties_list_table_admin">
                                        <thead>
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-100px w-120px sorting" tabindex="0"
                                                    aria-controls="kt_properties_list_table_admin" rowspan="1" colspan="1"
                                                    aria-label="Product: activate to sort column ascending"
                                                    style="width: 300.938px;">Imagem</th>
                                                <th class="min-w-100px w-120px sorting" tabindex="0"
                                                    aria-controls="kt_properties_list_table_admin" rowspan="1" colspan="1"
                                                    aria-label="Product: activate to sort column ascending"
                                                    style="width: 300.938px;">Imóvel</th>
                                                <th class="min-w-100px sorting " tabindex="0"
                                                    aria-controls="kt_properties_list_table_admin" rowspan="1" colspan="1"
                                                    aria-label="Product: activate to sort column ascending">
                                                    Código</th>
                                                <th class="min-w-100px sorting " tabindex="0"
                                                    aria-controls="kt_properties_list_table_admin" rowspan="1" colspan="1"
                                                    aria-label="Product: activate to sort column ascending">
                                                    Categoria</th>
                                                <th class="min-w-100px sorting " tabindex="0"
                                                    aria-controls="kt_properties_list_table_admin" rowspan="1" colspan="1"
                                                    aria-label="Product: activate to sort column ascending">
                                                    Valor</th>
                                                <th class="min-w-100px sorting " tabindex="0"
                                                    aria-controls="kt_properties_list_table_admin" rowspan="1" colspan="1"
                                                    aria-label="Product: activate to sort column ascending">
                                                    Status</th>
                                                <th class="text-center min-w-70px sorting_disabled" rowspan="1"
                                                    colspan="1" aria-label="Actions" style="width: 133.312px;">Ações</th>
                                            </tr>
                                        </thead>
                                        <!------ ITENS DA TABELA ------>
                                        <tbody class="fw-semibold text-gray-600">
                                            {{-- insert by ajax --}}
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Products-->


                </div>
                <!--end::Content container-->
            </div>

        </div>

    </div>
@endsection