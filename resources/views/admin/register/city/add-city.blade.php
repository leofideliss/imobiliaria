    <!--begin::Modal - -->
    <div class="modal fade" id="kt_modal_new_city" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--INICIO FORMULARIO-->
                    <form id="kt_modal_new_city_form" class="form" action="#" data-request="{{route('admin.register.city.add-city')}}">
                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}"/>

                        <!--CABEÇALHO-->
                        <div class="mb-4 text-center p-6">
                            <!--TITULO-->
                            <h1>Inserir Cidade</h1>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->

                        <!-- NOME COMPLETO-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <select id="states" name="states" class="form-control">
                                <option value="">Selecione o estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                                <option value="EX">Estrangeiro</option>
                            </select>
                             <br />
                             <select id="cities" class="form-control">
                             </select>
                        </div>

                        <!--end::Input group-->

                        <!--begin::BOTÕES-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_city_cancel"
                                class="btn btn-light me-3">Cancelar</button>
                            <button type="submit" id="kt_modal_new_city_submit" class="btn btn-primary">
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
