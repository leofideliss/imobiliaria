    <!--begin::Modal - -->
    <div class="modal" id="kt_modal_new_xml" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-15 pb-15">

                    <!--INICIO FORMULARIO-->
                    <form id="kt_modal_new_xml_form" class="form" action="#">
                        <input type="hidden" name="" id="file_id">
                        <!--CABEÇALHO-->
                        <div class="mb-5 text-center ">
                            <!--TITULO-->
                            <h1>Gerar link XML</h1>
                        </div>
                        <!--end::Heading-->

                        <!--begin::PADRÃO DO XML-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <div class="col-md-12">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Padrão do XML</span>
                                </label>
                                <!--end::Label-->
                            </div>
                            <div class="col-md-12">
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" id="padrao_xml"
                                    data-placeholder="Padrão do XML" name="padrao_xml">
                                    <option value="ZapImoveis">Zap Imóveis</option>
                                </select>
                                <!--end::Input-->
                            </div>

                        </div>
                        <!--end::PADRÃO DO XML-->

                        <!-- NOME ARQUIVO XML-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nome do Arquivo XML</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Nome do Arquivo XML" name="nameXML" />
                        </div>

                        <div id="kt_ecommerce_edit_order_product_table_wrapper"
                            class="dataTables_wrapper dt-bootstrap4 no-footer mb-8">
                            <div class="table-responsive">
                                <div class="dataTables_scroll">
                                    <div class="dataTables_scrollHead"
                                        style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                        <div class="dataTables_scrollHeadInner"
                                            style="box-sizing: content-box; width: 100%; padding-right: 4px;">
                                            <table id="kt_datatable_example_1"
                                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                                style="margin-left: 0px; width: 100%;">
                                                <thead>
                                                    <tr
                                                        class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="w-10px pe-2">
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="all_props_xml" value="1" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-200px sorting" tabindex="0"
                                                            aria-controls="kt_ecommerce_edit_order_product_table"
                                                            rowspan="1" colspan="1"
                                                            style="width: 510.694px;color: black;
                                                            text-transform: capitalize;
                                                            font-size: 1.075rem !important;
                                                            font-weight: 500 !important;"
                                                            aria-label="Product: activate to sort column ascending">
                                                            Selecione os imóveis que deseja incluir no XML
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="dataTables_scrollBody"
                                        style="position: relative; overflow: auto; max-height: 400px; width: 100%;">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                            id="kt_table_xml_list" style="width: 100%;">
                                            <div class="d-flex justify-content-center" style="margin: 10px;">

                                                <div class="spinner-grow text-warning" role="status"
                                                    id="kt_table_xml_loading">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <tbody class="fw-semibold text-gray-600" id="kt_table_xml_list_tbody">





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
                            <button type="reset" id="kt_modal_comments_cancel" class="btn btn-light me-3"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" id="kt_modal_xml_selected_submit" class="btn btn-primary" disabled>
                                <span class="indicator-label">Gerar XML</span>
                                <span class="indicator-progress">Gerando XML...
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
