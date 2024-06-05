    <!--begin::Modal - -->
    <div class="modal fade" id="kt_modal_new_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">

                    <!--INICIO FORMULARIO-->
                    <form id="kt_modal_new_ticket_form" class="form" action="#">

                        <!--CABEÇALHO-->
                        <div class="mb-4 text-center p-6">
                            <!--TITULO-->
                            <h1>Inserir Usuário</h1>
                        </div>
                        <!--end::Heading-->

                        <!-- NOME COMPLETO -->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nome Completo</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Nome Completo" name="nome" />
                        </div>

                        <!-- EMAIL -->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">E-mail</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="E-mail" name="email" />
                        </div>

                        <!-- CPF -->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">CPF</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="CPF" name="cpf" />
                        </div>

                        <!-- TELEFONE -->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Telefone</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Telefone" id="kt_inputmask_phone" name="telefone" />
                        </div>

                        <!-- SITUAÇÃO -->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Situação</span>
                            </label>
                            <!--end::Label-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Situação" name="situacao">
                                <option value="0">Ativo</option>
                                <option value="1">Desativado</option>
                            </select>
                        </div>

                        <!-- SENHA -->
                        <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Senha" name="senha" autocomplete="off">
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="fa-regular fa-eye"></i>
                                        <i class="fa-regular fa-eye d-none"></i>
                                    </span>
                                </div>
                                <!--end::Input wrapper-->
                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Hint-->
                            <div class="text-muted">A senha deve possui no mínimo 8 caracteres, variedade de letras maiúsculas e minúsculas, números e caractere especial.</div>
                            <!--end::Hint-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!-- CONFIRMAR SENHA -->
                        <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                            <!--begin::Repeat Password-->
                            <input placeholder="Repita a Senha" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Repeat Password-->
                        <div class="fv-plugins-message-container invalid-feedback"><div data-field="confirm-password" data-validator="identical">A senha e sua confirmação não são as mesmas.</div></div></div>
              
                        <!-- BOTÕES -->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_ticket_cancel" class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
                                <span class="indicator-label">Cadastrar</span>
                                <span class="indicator-progress">Cadastrando...
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
