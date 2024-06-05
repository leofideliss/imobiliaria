<!DOCTYPE html>
<html lang="pt-br">
<!-- Body-->
@include('user.layout._partials.head')

<body id="bodyMaps">
    <script>
        var googleClientID = "<?php echo env('GOOGLE_CLIENT_ID'); ?>"
    </script>
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>

    <!-- Page loading spinner-->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div><span>Carregando...</span>
        </div>
    </div>

    <main class="page-wrapper">
        @include('user.layout._partials.header')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

        @yield('content')

    </main>
    @include('user.layout._partials.footer')

    {{-- @if (Route::currentRouteName() === 'home5')
        
        <a class="btn-scroll-top ajusteBotaoIrTopo" href="#top" data-scroll>
            <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Ir ao Topo</span>
            <i class="btn-scroll-top-icon fi-chevron-up"></i>
        </a>
    @endif

    @if (Route::currentRouteName() != 'home5')
        
        <a class="btn-scroll-top" href="#top" data-scroll>
            <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Ir ao Topo</span>
            <i class="btn-scroll-top-icon fi-chevron-up"></i>
        </a>
    @endif --}}

    
      
    


    @include('user.layout._partials.javascript')

 
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/nouislider/dist/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>

    {{-- <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>


    {{-- @livewireScripts --}}

    <!-- Main theme script-->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('assets/js/user/atualizacao.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/adicionalUser.bundle.js') }}"></script> --}}

    <script src="{{ asset('assets/js/globalfunctions.js') }}"></script>

    <script src="{{ asset('assets/js/user/perfil/loginCadastrar/cadastrar.js') }}"></script>
    <script src="{{ asset('assets/js/user/blog/post/post.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery-bundle.min.css" integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/video/lg-video.min.js" integrity="sha512-mjdf6tU1Mksu9Hq2YXfbxdzzYHU7SJYmAsMnrhBf80SkHFvk6eHa2d79JM0q5w5ft5nQyBQ0EMB+XTmnvhcFgA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.js" integrity="sha512-oQqktP6RBI6qaV4u7oPL6a0hiej4YX2dWZM394UHJ8XxWzcRUNo3plCaBWKffn4UatHP2S4AdbGI+1rKseE0qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <!-- extensão javascript -->


</body>

</html>
