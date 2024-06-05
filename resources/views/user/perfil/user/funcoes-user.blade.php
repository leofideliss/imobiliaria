@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')

    <!-- AVALIADOR DE IMOVEL -->
    <div class="modal fade" id="avaliador-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-12 div-tituloFormImoveis">
                            <h2>Tornar-se Avaliador de Imóvel</h2>
                            <div class="">Preencha o formulário e seu cadastro vai para análise.</div>
                        </div>
                        <form class="form-espacoImoveis">
                        
                            <div class="mb-3">
                                <label class="form-label" for="ap-title">
                                    CRECI <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" id="ap-title" placeholder="CRECI" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ap-title">
                                    CNAI <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" id="ap-title" placeholder="CNAI" value="" required>
                            </div>

                            <!-- BOTÃO -->
                            <section class="d-sm-flex justify-content-between pt-2">
                                <a class="btn btn-primary btn-lg d-block mb-2" href="#">Indicar Imóvel</a>
                            </section>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CORRETOR DE IMOVEL -->
    <div class="modal fade" id="corretor-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-12 div-tituloFormImoveis">
                            <h2>Tornar-se Corretor de Imóvel</h2>
                            <div class="">Preencha o formulário e seu cadastro vai para análise.</div>
                        </div>
                        <form class="form-espacoImoveis">
                        
                            <div class="mb-3">
                                <label class="form-label" for="ap-title">
                                    CRECI <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" id="ap-title" placeholder="CRECI" value="" required>
                            </div>

                            <!-- BOTÃO -->
                            <section class="d-sm-flex justify-content-between pt-2">
                                <a class="btn btn-primary btn-lg d-block mb-2" href="#">Solicitar Cadastro</a>
                            </section>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOTÓGRAFO DE IMOVEL -->
    <div class="modal fade" id="fotografo-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-body px-0 py-2 py-sm-0">
                    <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                        data-bs-dismiss="modal"></button>
                    <div class="row mx-0 align-items-center">
                        <div class="col-md-12 div-tituloFormImoveis">
                            <h2>Tornar-se Corretor de Imóvel</h2>
                            <div class="">Preencha o formulário e seu cadastro vai para análise.</div>
                        </div>
                        <form class="form-espacoImoveis">
                        
                            <div class="mb-3">
                                <label class="form-label" for="ap-title">
                                    Insira fotos e vídeos de seus trabalhos já realizados <span class="text-danger">*</span>
                                </label>
                                <input class="file-uploader file-uploader-grid" type="file" multiple data-max-files="4" data-max-file-size="2MB" accept="image/png, image/jpeg, video/mp4, video/mov" data-label-idle='<div class="btn btn-primary mb-3"><i class="fi-cloud-upload me-1"></i>Subir fotos / vídeos</div><div>ou arraste-as aqui</div>'>
                            </div>

                            <!-- BOTÃO -->
                            <section class="d-sm-flex justify-content-between pt-2">
                                <a class="btn btn-primary btn-lg d-block mb-2" href="#">Solicitar Cadastro</a>
                            </section>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content-->
    <div class="col-lg-8 col-md-7 mb-5">

        <h1 class="h2">Suas Funções</h1>
        <p class="pt-1 mb-4">Preencha o formulário para liberar a função desejada.</p>

        <div class="border rounded-3 p-3 mb-4" id="personal-info">
            
            <!------ *** CORRETOR *** -------->
            <div class="border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="pe-2">
                        <label class="form-label fw-bold">Corretor</label>
                        <div id="name-value">Não Cadastrado</div>
                    </div>
                    <div>
                        <a class="fw-bold text-decoration-none fontSize-funcoes" href="#corretor-modal"
                        data-bs-toggle="modal">
                            <i class="fi-plus mt-n1 me-2"></i>Tornar-se Corretor
                        </a>
                    </div>
                </div>
            </div>

            <!------ *** AVALIADOR DE IMÓVEL *** -------->
            <div class="border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="pe-2">
                        <label class="form-label fw-bold">Avaliador de Imóvel</label>
                        <div id="name-value">Aguardando aprovação no sistema</div>
                    </div>
                    <div>
                        <a class="fw-bold text-decoration-none fontSize-funcoes" href="#avaliador-modal"
                        data-bs-toggle="modal">
                            <i class="fi-plus mt-n1 me-2"></i>Tornar-se Avaliador de Imóvel
                        </a>
                    </div>
                </div>
            </div>

            <!------ *** FOTÓGRAFO *** -------->
            <div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="pe-2">
                        <label class="form-label fw-bold">Fotógrafo</label>
                        <div id="name-value">Aprovado</div>
                    </div>
                    <div>
                        <a class="fw-bold text-decoration-none fontSize-funcoes" href="#fotografo-modal"
                        data-bs-toggle="modal">
                            <i class="fi-plus mt-n1 me-2"></i>Tornar-se Fotógrafo
                        </a>
                    </div>
                </div>
            </div>

            
        </div>

    </div>

@endsection