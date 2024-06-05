@extends('index')

@section('content')

      <!-- Breadcrumb-->
      <div class="container mt-5 mb-md-4 pt-5">
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Termos de Uso</li>
          </ol>
        </nav>
      </div>
     
      <!-- TITULO -->


      <!-- CONTEUDO -->
      <section class="container mb-md-5 mb-4 pb-lg-5">

        <h1 class="h2 mb-4">Termos de Uso</h1>

        <p>Bem-vindo aos Termos de Uso da Nome da empresa.</p>

        <p>Ao acessar ou usar nosso site e qualquer serviço oferecido por nós (coletivamente, o "Serviço"), você concorda em obedecer a estes Termos de Uso. Por favor, leia atentamente antes de usar o Serviço.</p>

        <div class="row">

          <!-- Content-->
          <div class="mt-4">
            
            <div class="pb-md-2">
              <h3 class="h5">1. Uso do Serviço</h3>
              <p>1.1 O Serviço oferece uma plataforma online para listar, visualizar e entrar em contato com proprietários e agentes imobiliários para a compra ou venda de imóveis.</p>
              <p>1.2 Você concorda em usar o Serviço apenas para fins relacionados à busca, compra ou venda de imóveis e de acordo com estes Termos de Uso.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">2. Listagens de Imóveis</h3>
                <p>2.1 Todas as informações fornecidas nas listagens de imóveis são fornecidas pelos proprietários ou agentes imobiliários e são consideradas precisas, mas não garantidas.</p>
                <p>2.2 A Nome da empresa não assume nenhuma responsabilidade pela precisão ou integridade das informações fornecidas nas listagens de imóveis. Os usuários são incentivados a verificar todas as informações por conta própria.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">3. Transações</h3>
                <p>3.1 A Nome da empresa não participa de nenhuma transação entre compradores e vendedores de imóveis. Todas as transações são realizadas diretamente entre as partes interessadas.</p>
                <p>3.2 A Nome da empresa não é responsável por quaisquer disputas, perdas ou danos decorrentes de transações realizadas através do Serviço.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">4. Direitos Autorais</h3>
                <p>4.1 Todos os direitos autorais e outros direitos de propriedade intelectual relacionados ao conteúdo do Serviço são de propriedade exclusiva da Nome da empresa.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">5. Limitações de Responsabilidade</h3>
                <p>5.1 A Nome da empresa não será responsável por quaisquer danos diretos, indiretos, incidentais, especiais ou consequenciais decorrentes do uso ou incapacidade de usar o Serviço.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">6. Alterações nos Termos de Uso</h3>
                <p>6.1 Reservamos o direito de modificar estes Termos de Uso a qualquer momento. Se fizermos alterações, notificaremos você publicando a versão revisada dos Termos de Uso no site. O uso contínuo do Serviço após as alterações constitui sua aceitação dos novos Termos de Uso.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">7. Lei Aplicável</h3>
                <p>7.1 Estes Termos de Uso serão regidos e interpretados de acordo com as leis do Brasil, sem considerar as disposições de conflito de leis.</p>
            </div>
            <div class="pb-md-2">
                <h3 class="h5">8. Contato</h3>
                <p>8.1 Se você tiver alguma dúvida sobre estes Termos de Uso, entre em contato conosco através dos detalhes fornecidos no site.</p>
            </div>
          </div>

        </div>
      </section>

@endsection