@extends('user.perfil.user.geralPerfilUser')

@section('conteudoPerfil')

    <!-- CONTEUDO -->
    <div class="col-lg-8 col-md-7 mb-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="h2 mb-0">Meus XMLs enviados</h1>
            <a class="fw-bold text-decoration-none" href="{{route('user.perfil.user.addImovel-xml')}}" style="font-size: 14px">
                <i class="fi-plus mt-n1 me-2"></i>Adicionar um Imóvel XML
            </a>
        </div>
        <p class="pt-1 mb-4">Informações sobre todos os arquivos XML cadastrados.</p>

        <div class="lista-itensXml" id="lista-itensXml">


        </div>

    </div>
    <script src="{{ asset('assets/js/user/perfil/tabs/xml-list.js') }}"></script>
<script>
        
</script>
@endsection