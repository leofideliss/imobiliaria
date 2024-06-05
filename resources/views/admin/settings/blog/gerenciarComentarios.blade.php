    <!--begin::Modal - -->
    <div class="modal fade" id="kt_modal_new_comentario" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-15 pb-15">

                    <!--INICIO FORMULARIO-->
                    <form id="kt_modal_new_ticket_form" class="form" action="#">

                        <!--CABEÇALHO-->
                        <div class="mb-5 text-center ">
                            <!--TITULO-->
                            <h1>Selecione os comentários que deseja excluir</h1>
                        </div>
                        <!--end::Heading-->

                        <div id="kt_ecommerce_edit_order_product_table_wrapper"
                            class="dataTables_wrapper dt-bootstrap4 no-footer mb-8">
                            <div class="table-responsive">
                                <div class="dataTables_scroll">
                                    <div class="dataTables_scrollHead"
                                        style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                        <div class="dataTables_scrollHeadInner"
                                            style="box-sizing: content-box; width: 100%; padding-right: 4px;">
                                            <table
                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                style="margin-left: 0px; width: 100%;">
                                                <thead>
                                                    <tr
                                                        class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="w-25px pe-2 sorting_disabled" rowspan="1"
                                                            colspan="1" style="width: 24.9826px;" aria-label="">
                                                        </th>
                                                        <th class="min-w-200px sorting" tabindex="0"
                                                            aria-controls="kt_ecommerce_edit_order_product_table"
                                                            rowspan="1" colspan="1" style="width: 510.694px;"
                                                            aria-label="Product: activate to sort column ascending">
                                                            Lista de Comentários</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="dataTables_scrollBody"
                                        style="position: relative; overflow: auto; max-height: 400px; width: 100%;">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                            id="kt_table_delete_comments" style="width: 100%;">
                                            <tbody class="fw-semibold text-gray-600">
                                                {{-- <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" name="checkboxComentarioPost">
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                       
                                                            <div class="ms-5">
                                                                <!--begin::Title-->
                                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bold">Nome do Usuario</div>
                                                                <!--end::Title-->
                        
                                                                <!--begin::Price-->
                                                                <div class="fw-semibold fs-7">
                                                                    E-mail: 
                                                                    <span>
                                                                        email@gmail.com
                                                                    </span>
                                                                </div>
                                                                <!--end::Price-->
                        
                                                                <!--begin::SKU-->
                                                                <div class="text-muted fs-7">
                                                                    comentario, limitando a quantidade de caracteres pra algum valor.
                                                                </div>
                                                                <!--end::SKU-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> --}}
                                                <div class="d-flex justify-content-center" style="margin: 10px;">
                                           
                                                    <div class="spinner-grow text-warning" role="status"  id="loading_comments" style="display: none;">
                                                        <span class="sr-only">Loading...</span>
                                                      </div>
                                                </div>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input type="hidden" name="" id="post_id">
                            </div>
                            <div class="row">
                                <div
                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                </div>
                                <div
                                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                </div>
                            </div>
                        </div>

                        <!-- BOTÕES -->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_comments_cancel"
                                class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_modal_comments_submit" class="btn btn-primary">
                                <span class="indicator-label">Excluir</span>
                                <span class="indicator-progress">Excluindo...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - -->
