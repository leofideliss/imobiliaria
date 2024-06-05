@extends('index')

@section('content')

    <!-- Page content-->
    <div class="container pt-4 pb-lg-4 mt-5 mb-sm-2">
        <!-- Breadcrumb-->
        <nav class="mb-4 pt-md-3" aria-label="Breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Minha Conta</li>
        </ol>
        </nav>
        <!-- Page content-->
        <div class="row">
        
            @include("user.perfil.user.menuLateral-perfil",['customer'=>$customer])            

            @yield("conteudoPerfil")

        </div>
    </div>

@endsection