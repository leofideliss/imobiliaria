    <!--begin::Modal - -->
    <div class="modal fade" id="kt_modal_new_post" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--INICIO FORMULARIO-->
                    <form id="kt_modal_new_post_form" class="form" action="#" data-request="">
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

                        <!--CABEÇALHO-->
                        <div class="mb-4 text-center p-6">
                            <!--TITULO-->
                            <h1>Inserir Post</h1>
                        </div>
                        <!--end::Heading-->

                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Título do Post</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Título Post"
                                name="name_post" id="name_post" />

                        </div>
                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tipo</span>
                            </label>
                            <!--end::Label-->
                           <select class="form-select" name="tipo_post" id="tipo_post">

                           </select>

                        </div>

                        <div class="d-flex flex-column mb-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Imagem Principal</span>
                            </label>
                            <!--end::Label-->
                            <input type="file" id="imagem_post" name="imagem_post">
                        </div>
                        <div class="fv-row">
                            <img src="" alt="" name="" style="display: none;" id="previewImg"
                                width="80" height="80" class="mb-3">
                            <input type="hidden" name="image_data" id="image_data">
                        </div>

                        <div class="fv-row">
                            <textarea name="textarea_post" id="kt_docs_ckeditor_classic"></textarea>
                        </div>


                        <!--begin::BOTÕES-->
                        <div class="text-center mt-8">
                            <button type="reset" id="kt_modal_new_post_cancel"
                                class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_modal_new_post_submit" class="btn btn-primary">
                                <span class="indicator-label">Salvar</span>
                                <span class="indicator-progress">Salvando...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::BOTÕES-->
                        <input type="hidden" name="" id="post_id">
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
