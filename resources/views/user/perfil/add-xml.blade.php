@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')

    <!-- Content-->
    <div class="col-lg-8 col-md-7 mb-5">
        <h1 class="h2" style="font-size: 1.8rem !important">Inserir imóveis via arquivo XML</h1>

        <div class="alert alert-info mb-4" role="alert">
            <div class="d-flex"><i class="fi-alert-circle me-2 me-sm-3"></i>
                <p class="fs-sm mb-1">
                    Insira o arquivo XML contendo os imóveis que deseja inserir no sistema. O arquivo deve ter o padrão ZAP.
                </p>
            </div>
        </div>


        <input class="file-uploader file-uploader-grid mb-4" type="file" multiple data-max-file-size="10MB" accept="document/xml" data-label-idle='<div class="btn btn-primary mb-3"><i class="fi-cloud-upload me-1"></i>Inserir arquivo XML</div><div>ou arraste-o aqui</div>'>

        <div class="d-flex align-items-center justify-content-between mt-4 pt-4 pb-1">
            <button class="btn btn-primary px-3 px-sm-4" type="button">Inserir imóveis</button>
        </div>
    </div>

@endsection