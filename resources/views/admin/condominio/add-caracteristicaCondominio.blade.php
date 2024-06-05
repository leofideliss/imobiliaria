    <!--begin::Modal - -->
    <div class="modal" id="kt_modal_new_caracteristicaImovel_condominio" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--INICIO FORMULARIO-->
                    <form id="kt_modal_new_caracteristicas_form_condominio" class="form" action="#" data-request="{{route('admin.register.caracteristicas_imovel.add-caracteristicaCondominio')}}">
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}"/>
              
                        <!--CABEÇALHO-->
                        <div class="mb-4 text-center p-6">
                            <!--TITULO-->
                            <h1>Inserir Característica do Condomínio</h1>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->

                        <!-- NOME CARACTERISTICA-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Característica do Condomínio</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nome Característica" name="caracteristicaImovel" />
                        </div>

                        <!--end::Input group-->

                        <!--begin::BOTÕES-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_caracteristicas_cancel_condominio" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" id="kt_modal_new_caracteristicas_submit_condominio" class="btn btn-primary"  data-bs-dismiss="modal">
                                <span class="indicator-label">Salvar</span>
                                <span class="indicator-progress">Salvando...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::BOTÕES-->

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