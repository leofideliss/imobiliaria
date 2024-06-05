@extends('admin.layouts.page')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">

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
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Buscar Avaliador">
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                            <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_new_user" class="btn btn-primary fw-bold fs-8 fs-lg-base">Adicionar Avaliador</a>
                            
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Product: activate to sort column ascending" style="width: 300.938px;">Nome</th>
                                    <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 300.844px;">E-mail</th>
                                    <th class=" min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 130.844px;">Status</th>
                                    <th class="text-center min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 133.312px;">Ações</th>
                                </tr>
                            </thead>
                            <!------ ITENS DA TABELA ------>
                            <tbody class="fw-semibold text-gray-600">

                                <!------ ATIVO ------>
                                <tr class="ativo">

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--end::Thumbnail-->
                                            <div class="">
                                                <!--begin::Title-->
                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">
                                                    Nome Admin
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <span class="fw-bold">nome_email@gmail.com</span>
                                    </td>                                
                                    <td class="pe-0" data-order="Ativo">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success">Ativo</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Ações
                                        <i class="fa-solid fa-chevron-down ms-1 seta_actions"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Tornar Avaliador de Imóvel</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Editar</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Excluir</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>

                                <!------ DESATIVADO  ------>
                                <tr class="desativado">

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--end::Thumbnail-->
                                            <div class="">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Nome Admin</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pe-0">
                                        <span class="fw-bold">nome_email@gmail.com</span>
                                    </td>                                
                                    <td class="pe-0" data-order="Desativado">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-danger">Desativado</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Ações
                                        <i class="fa-solid fa-chevron-down ms-1 seta_actions"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Tornar Avaliador de Imóvel</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Editar</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Excluir</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"><div class="dataTables_length" id="kt_ecommerce_products_table_length"><label><select name="kt_ecommerce_products_table_length" aria-controls="kt_ecommerce_products_table" class="form-select form-select-sm form-select-solid"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dataTables_paginate paging_simple_numbers" id="kt_ecommerce_products_table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_ecommerce_products_table_previous"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="kt_ecommerce_products_table_next"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="6" tabindex="0" class="page-link"><i class="next"></i></a></li></ul></div></div></div></div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->

               <!--*********** MODAL - BOTÃO ADICIONAR USUÁRIO **********--> 
               @include("admin.user.avaliador_imovel.add-avaliador-imovel")

            </div>
            <!--end::Content container-->
        </div> 

    </div>

</div>

@endsection