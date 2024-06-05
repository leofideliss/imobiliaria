@extends('index')

@section('content')

    <div class="container div-flexBotaoVoltar mt-5 pt-5">
        <a class="btn btn-outline-primary btn-lg rounded-pill mb-3 mb-sm-0" href="job-board-post-resume-2.html">
            <i class="fi-chevron-left fs-sm me-2"></i>Voltar
        </a>
        
    </div>

    <!-- Page container-->
    <div class="container div-flexResumo mb-md-4 py-5">
        
        <!-- Page content-->
        <div class="col-lg-8">

            <!-- FORMULARIO AVALIADOR DE IMÓVEL -->
            <section class="card card-body border-0 shadow-sm p-4 mb-4" id="basic-info">
                <h2 class="h4 mb-4">
                    Tornar-se Avaliador de Imóvel
                </h2>
                <div class="alert alert-info mb-4" role="alert">
                    <div class="d-flex"><i class="fi-alert-circle me-2 me-sm-3"></i>
                      <p class="fs-sm mb-1">Preencha o formulário e seu cadastro vai para análise.</p>
                    </div>
                </div>
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
            </section>

            <!-- BOTÃO -->
            <section class="d-sm-flex justify-content-between pt-2">
                <a class="btn btn-primary btn-lg d-block mb-2" href="real-estate-property-promotion.html">
                    Salvar
                </a>
            </section>
        </div>

    </div>

@endsection