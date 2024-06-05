@extends('index')

@section('content')

      <!-- Breadcrumb-->
      <div class="container mt-5 mb-md-4 pt-5 paddingAjustesMobile-30">
        <nav class="mb-3 pt-md-3 " aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home5')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dúvidas Frequentes</li>
          </ol>
        </nav>
      </div>

      <!-- BOTÃO BUSCA -->
      <section class="container mb-4 pb-lg-5 paddingAjustesMobile-30">
        <h1 class="mx-auto mb-4 pb-2 text-center textoMobile-35px" style="max-width: 856px;">Dúvidas Frequentes</h1>
      </section>

      <!-- CONTEUDO -->
      <section class="container mb-md-5 mb-4 pb-lg-5 paddingAjustesMobile-30 duvidasFrequentePaddingMobile ">
        <div class="row">
          <div class="nav flex-column nav-tabs col-xl-2 col-lg-3 removerPaddingFrequenteMobile" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" style="margin-bottom:1rem" id="v-pills-vender-tab" data-bs-toggle="pill" data-bs-target="#v-pills-vender" type="button" role="tab" aria-controls="v-pills-vender" aria-selected="true">Vender Imóvel</button>
            <button class="nav-link" style="margin-bottom:1rem" id="v-pills-alugar-tab" data-bs-toggle="pill" data-bs-target="#v-pills-alugar" type="button" role="tab" aria-controls="v-pills-alugar" aria-selected="false">Alugar Imóvel</button>
            <button class="nav-link" style="margin-bottom:1rem" id="v-pills-indicar-tab" data-bs-toggle="pill" data-bs-target="#v-pills-indicar" type="button" role="tab" aria-controls="v-pills-indicar" aria-selected="false">Indicar Imóvel</button>
            <button class="nav-link" style="margin-bottom:1rem" id="v-pills-corretores-tab" data-bs-toggle="pill" data-bs-target="#v-pills-corretores" type="button" role="tab" aria-controls="v-pills-corretores" aria-selected="false">Corretor</button>
            <button class="nav-link" style="margin-bottom:1rem" id="v-pills-fotografos-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fotografos" type="button" role="tab" aria-controls="v-pills-fotografos" aria-selected="false">Fotógrafo</button>
            <button class="nav-link" style="margin-bottom:1rem" id="v-pills-avaliador-tab" data-bs-toggle="pill" data-bs-target="#v-pills-avaliador" type="button" role="tab" aria-controls="v-pills-avaliador" aria-selected="false">Avaliador de Imóvel</button>
          </div>
          <div class="tab-content col-lg-9 offset-xl-1 col-lg-8" id="v-pills-tabContent">
            <div class="tab-pane fade show active " id="v-pills-vender" role="tabpanel" aria-labelledby="v-pills-vender-tab" tabindex="0">
              <h2 class="mb-md-4 mb-3 pb-md-2">Vender Imóvel</h2>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-alugar" role="tabpanel" aria-labelledby="v-pills-alugar-tab" tabindex="0">
              <h2 class="mb-md-4 mb-3 pb-md-2">Alugar Imóvel</h2>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>  
            </div>
            <div class="tab-pane fade" id="v-pills-indicar" role="tabpanel" aria-labelledby="v-pills-indicar-tab" tabindex="0">
              <h2 class="mb-md-4 mb-3 pb-md-2">Indicar Imóvel</h2>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>  
            </div>
            <div class="tab-pane fade" id="v-pills-corretores" role="tabpanel" aria-labelledby="v-pills-corretores-tab" tabindex="0">
              <h2 class="mb-md-4 mb-3 pb-md-2">Corretores</h2>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>  
            </div>
            <div class="tab-pane fade" id="v-pills-fotografos" role="tabpanel" aria-labelledby="v-pills-fotografos-tab" tabindex="0">
              <h2 class="mb-md-4 mb-3 pb-md-2">Fotógrafos</h2>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>  
            </div>
            <div class="tab-pane fade" id="v-pills-avaliador" role="tabpanel" aria-labelledby="v-pills-avaliador-tab" tabindex="0">
              <h2 class="mb-md-4 mb-3 pb-md-2">Avaliador de Imóvel</h2>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Amet posuere imperdiet placerat volutpat elit tellus lectus. Et sit massa volutpat id condimentum velit risus quam ut. Fames ut pulvinar ut ac sed elementum sed. Bibendum interdum ut sit ullamcorper arcu. Proin pharetra proin mi ultricies diam sit. Arcu faucibus ut adipiscing odio habitasse at ut amet maecenas. Suscipit eget mi felis eu mi scelerisque. Mattis condimentum ut eget eu, aliquam id blandit urna, mattis. Amet pharetra nibh tincidunt eu. Gravida pellentesque nisl mi in lectus. Sed sed diam facilisis et. Bibendum leo sit sagittis nunc, suspendisse venenatis. Aliquam eget morbi nibh nascetur diam urna, convallis.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>
              <div class="pb-md-2">
                  <h3 class="h5">Lorem ipsum dolor sit amet, consectetur mauris consectetur?</h3>
                  <p>Blandit adipiscing duis sit tellus rhoncus, amet, sit vitae gravida. Tincidunt placerat ultrices eu, senectus vitae accumsan massa in. Ultricies imperdiet duis feugiat lorem. Pretium turpis faucibus sit urna nisi lorem interdum. Diam semper et ac neque ac.</p>
              </div>  
            </div>
          </div>
        </div>
      </section>

      <!-- Contact us-->
      <section class="container mb-5 pb-lg-5 paddingAjustesMobile-30">
        <div class="row align-items-sm-center">
          <div class="col-sm-5"><img src="assets/img/real-estate/illustrations/support.svg" alt="Illustration"></div>
          <div class="col-md-6 offset-md-1 col-sm-7 text-sm-start text-center">
            <h2 class="mb-4 pb-md-3">Não encontrou o que procura?</h2>
            <a class="btn btn-lg btn-primary ajusteBotaoMobiles" href="{{route('user.contact.contact')}}">Entre em contato conosco</a>
          </div>
        </div>
      </section>


@endsection