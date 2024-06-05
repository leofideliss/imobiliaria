@extends('index')

@section('content')

      <!-- Breadcrumb-->
      <div class="container mt-5 mb-md-4 pt-5">
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Política de Privacidade</li>
          </ol>
        </nav>
      </div>
     
      <!-- TITULO -->


      <!-- CONTEUDO -->
      <section class="container mb-md-5 mb-4 pb-lg-5">

        <h1 class="h2 mb-4">Política de Privacidade</h1>

        <p>Esta Política de Privacidade descreve como as informações pessoais são coletadas, usadas e protegidas em nosso site.</p>

        <div class="row">

          <!-- Content-->
          <div class="mt-4">
            
            <div class="pb-md-2">
              <h3 class="h5">Informações Coletadas</h3>
              <p>Coletamos informações pessoais fornecidas voluntariamente pelos usuários, como nome e endereço de e-mail, quando eles preenchem formulários em nosso site.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">Uso das Informações</h3>
                <p>As informações pessoais coletadas são usadas apenas para os fins para os quais foram fornecidas, como responder a consultas ou fornecer serviços solicitados.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">Proteção de Dados</h3>
                <p>Tomamos medidas razoáveis para proteger as informações pessoais contra acesso não autorizado ou divulgação.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">Cookies e Tecnologias Semelhantes</h3>
                <p>Podemos usar cookies e tecnologias semelhantes para melhorar a experiência do usuário e coletar informações sobre o uso do nosso site.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">Divulgação a Terceiros</h3>
                <p>Não compartilhamos informações pessoais com terceiros, exceto quando necessário para fornecer serviços solicitados pelo usuário.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">Alterações nesta Política</h3>
                <p>Esta Política de Privacidade pode ser atualizada periodicamente. Quaisquer alterações significativas serão comunicadas aos usuários.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">Contato</h3>
                <p>Se você tiver dúvidas sobre esta Política de Privacidade, entre em contato conosco através dos dados de contato fornecidos no site.</p>
            </div>
          </div>

        </div>
      </section>



@endsection