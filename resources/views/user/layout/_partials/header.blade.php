          {{-- <!-- LOGIN -->
          <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
                  <div class="modal-content">
                      <div class="modal-body px-0 py-2 py-sm-0">
                          <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                              data-bs-dismiss="modal"></button>
                          <div class="row mx-0 align-items-center">
                              <div class="col-md-6 border-end-md p-4 p-sm-5">
                                  <h2 class="h3 mb-4 mb-sm-5">Olá<br>Bem-Vindo de Volta</h2><img
                                      class="d-block mx-auto" src="assets/img/signin-modal/signin.svg" width="344"
                                      alt="Illustartion">
                                  <div class="mt-4 mt-sm-5">Não possui conta? <a href="#signup-modal"
                                          data-bs-toggle="modal" data-bs-dismiss="modal">Crie sua conta</a></div>
                              </div>
                              <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                                <a
                                      class="btn btn-outline-info w-100 mb-3" href="#"><i
                                          class="fi-google fs-lg me-1"></i>Entrar com o Google</a><a
                                      class="btn btn-outline-info w-100 mb-3" href="#"><i
                                          class="fi-facebook fs-lg me-1"></i>Entrar com o Facebook</a>
                                  <div class="d-flex align-items-center py-3 mb-3">
                                      <hr class="w-100">
                                      <div class="px-3">Ou</div>
                                      <hr class="w-100">
                                  </div>
                                  <form class="needs-validation" novalidate>
                                      <div class="mb-4">
                                          <label class="form-label mb-2" for="signin-email">E-mail</label>
                                          <input class="form-control" type="email" id="signin-email"
                                              placeholder="Digite seu e-mail" required>
                                      </div>
                                      <div class="mb-4">
                                          <div class="d-flex align-items-center justify-content-between mb-2">
                                              <label class="form-label mb-0" for="signin-password">Senha</label><a
                                                  class="fs-sm" href="#">Esqueceu sua Senha?</a>
                                          </div>
                                          <div class="password-toggle">
                                              <input class="form-control" type="password" id="signin-password"
                                                  placeholder="Enter password" required>
                                              <label class="password-toggle-btn" aria-label="Show/hide password">
                                                  <input class="password-toggle-check" type="checkbox"><span
                                                      class="password-toggle-indicator"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <button class="btn btn-primary btn-lg w-100" type="submit">Entrar</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- CADASTRO-->
          <div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
                  <div class="modal-content">
                      <div class="modal-body px-0 py-2 py-sm-0">
                          <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                              data-bs-dismiss="modal"></button>
                          <div class="row mx-0 align-items-center">
                              <div class="col-md-6 border-end-md p-4 p-sm-5">
                                  <h2 class="h3 mb-4 mb-sm-5">Cadastre-se e<br>receba benefícios como:</h2>
                                  <ul class="list-unstyled mb-4 mb-sm-5">
                                      <li class="d-flex mb-2"><i
                                              class="fi-check-circle text-primary mt-1 me-2"></i><span>Compra de Imóveis</span></li>
                                      <li class="d-flex mb-2"><i
                                              class="fi-check-circle text-primary mt-1 me-2"></i><span>Venda de Imóveis</span></li>
                                      <li class="d-flex mb-0"><i
                                              class="fi-check-circle text-primary mt-1 me-2"></i><span>Indique imóveis</span></li>
                                  </ul><img class="d-block mx-auto" src="assets/img/signin-modal/signup.svg"
                                      width="344" alt="Illustartion">
                                  <div class="mt-sm-4 pt-md-3">Já possui uma conta? <a href="#signin-modal"
                                          data-bs-toggle="modal" data-bs-dismiss="modal">Logar</a></div>
                              </div>
                              <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a
                                      class="btn btn-outline-info w-100 mb-3" href="#"><i
                                          class="fi-google fs-lg me-1"></i>Entrar com o Google</a><a
                                      class="btn btn-outline-info w-100 mb-3" href="#"><i
                                          class="fi-facebook fs-lg me-1"></i>Entrar com o Facebook</a>
                                  <div class="d-flex align-items-center py-3 mb-3">
                                      <hr class="w-100">
                                      <div class="px-3">Ou</div>
                                      <hr class="w-100">
                                  </div>
                                  <form class="needs-validation" novalidate>
                                      <div class="mb-4">
                                          <label class="form-label" for="signup-name">Nome Completo</label>
                                          <input class="form-control" type="text" id="signup-name"
                                              placeholder="Digite seu nome completo" required>
                                      </div>
                                      <div class="mb-4">
                                          <label class="form-label" for="signup-email">E-mail</label>
                                          <input class="form-control" type="email" id="signup-email"
                                              placeholder="Digite seu e-mail" required>
                                      </div>
                                      <div class="mb-4">
                                          <label class="form-label" for="signup-password">Senha <span
                                                  class='fs-sm text-muted'>min. 8 charecteres</span></label>
                                          <div class="password-toggle">
                                              <input class="form-control" type="password" id="signup-password"
                                                  minlength="8" required>
                                              <label class="password-toggle-btn" aria-label="Show/hide password">
                                                  <input class="password-toggle-check" type="checkbox"><span
                                                      class="password-toggle-indicator"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="mb-4">
                                          <label class="form-label" for="signup-password-confirm">Confirmar a Senha</label>
                                          <div class="password-toggle">
                                              <input class="form-control" type="password"
                                                  id="signup-password-confirm" minlength="8" required>
                                              <label class="password-toggle-btn" aria-label="Show/hide password">
                                                  <input class="password-toggle-check" type="checkbox"><span
                                                      class="password-toggle-indicator"></span>
                                              </label>
                                          </div>
                                      </div>
                                      <div class="form-check mb-4">
                                          <input class="form-check-input" type="checkbox" id="agree-to-terms"
                                              required>
                                          <label class="form-check-label" for="agree-to-terms">Eu concordo com os <a href='#'>Termos de uso</a> e <a href='#'>Política de Privacidade</a></label>
                                      </div>
                                      <button class="btn btn-primary btn-lg w-100" type="submit">Cadastrar-se </button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> --}}

          {{-- <!-- CALCULADORA -->
          <div class="modal fade" id="cost-calculator" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header d-block position-relative border-0 px-sm-5 px-4">
                          <h3 class="h4 modal-title mt-4 text-center">Explore your property’s value</h3>
                          <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button"
                              data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body px-sm-5 px-4">
                          <form class="needs-validation" novalidate>
                              <div class="mb-3">
                                  <label class="form-label fw-bold mb-2" for="property-city">Property location</label>
                                  <select class="form-control form-select" id="property-city" required>
                                      <option value="" selected disabled hidden>Choose city</option>
                                      <option value="Chicago">Chicago</option>
                                      <option value="Dallas">Dallas</option>
                                      <option value="Los Angeles">Los Angeles</option>
                                      <option value="New York">New York</option>
                                      <option value="San Diego">San Diego</option>
                                  </select>
                                  <div class="invalid-feedback">Please choose the city.</div>
                              </div>
                              <div class="mb-3">
                                  <select class="form-control form-select" id="property-district" required>
                                      <option value="" selected disabled hidden>Choose district</option>
                                      <option value="Brooklyn">Brooklyn</option>
                                      <option value="Manhattan">Manhattan</option>
                                      <option value="Staten Island">Staten Island</option>
                                      <option value="The Bronx">The Bronx</option>
                                      <option value="Queens">Queens</option>
                                  </select>
                                  <div class="invalid-feedback">Please choose the district.</div>
                              </div>
                              <div class="pt-2 mb-3">
                                  <label class="form-label fw-bold mb-2" for="property-address">Address</label>
                                  <input class="form-control" type="text" id="property-address"
                                      placeholder="Enter your address" required>
                                  <div class="invalid-feedback">Please enter your property's address.</div>
                              </div>
                              <div class="pt-2 mb-3">
                                  <label class="form-label fw-bold mb-2">Number of rooms</label>
                                  <div class="btn-group" role="group" aria-label="Choose number of rooms">
                                      <input class="btn-check" type="radio" id="rooms-1" name="rooms">
                                      <label class="btn btn-outline-secondary" for="rooms-1">1</label>
                                      <input class="btn-check" type="radio" id="rooms-2" name="rooms">
                                      <label class="btn btn-outline-secondary" for="rooms-2">2</label>
                                      <input class="btn-check" type="radio" id="rooms-3" name="rooms">
                                      <label class="btn btn-outline-secondary" for="rooms-3">3</label>
                                      <input class="btn-check" type="radio" id="rooms-4" name="rooms">
                                      <label class="btn btn-outline-secondary" for="rooms-4">4</label>
                                      <input class="btn-check" type="radio" id="rooms-5" name="rooms">
                                      <label class="btn btn-outline-secondary" for="rooms-5">5+</label>
                                  </div>
                              </div>
                              <div class="pt-2 mb-4">
                                  <label class="form-label fw-bold mb-2" for="property-area">Total area, sq.m.</label>
                                  <input class="form-control" type="text" id="property-area"
                                      placeholder="Enter your area" required>
                                  <div class="invalid-feedback">Please enter your property's area.</div>
                              </div>
                              <button class="btn btn-primary d-block w-100 mb-4" type="submit"><i
                                      class="fi-calculator me-2"></i>Calculate</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div> --}}

        @if (Request::is(['entrar']) || Request::is(['redefinirSenha']))
            <!-- HEADER-->
            <header id="menuEntrarUsuario" class="navbar navbar-expand-lg bg-transparente fixed-top" data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170" alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif

                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['trabalhe-corretor']))
            <!-- HEADER-->
            <header id="menuCorretor" class="navbar navbar-expand-lg bg-transparente fixed-top " data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['trabalhe-avaliador']))
            <!-- HEADER-->
            <header id="menuAvaliador" class="navbar navbar-expand-lg bg-transparente fixed-top "
                data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['trabalhe-fotografo']))
            <!-- HEADER-->
            <header id="menuFotografo" class="navbar navbar-expand-lg bg-transparente fixed-top "
                data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['indique-imovel']))
            <!-- HEADER-->
            <header id="menuIndiqueImovel" class="navbar navbar-expand-lg bg-transparente fixed-top "
                data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu
                                imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['venda-imovel']))
            <!-- HEADER-->
            <header id="menuVendaImovel" class="navbar navbar-expand-lg bg-transparente fixed-top "
                data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu
                                imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['cadastro']))
            <!-- HEADER-->
            <header id="menuCadastroUsuario" class="navbar navbar-expand-lg bg-transparente fixed-top "
                data-scroll-header>
                <div class="container">

                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}"
                                class="nav-link">Imóveis</a>

                            <!-- VENDER SEU IMOVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu
                                imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe
                                    Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @elseif(Request::is(['404erro']) || Route::currentRouteName() === 'fallback.404')
            <!-- SEM HEADER -->
        @elseif(Route::currentRouteName() === 'home5')

            @php
                $dados = App\Http\Controllers\User\DadosUserController::getDados();
            @endphp

            @if(isset($dados) && $dados->count() > 0)
                @foreach ($dados as $dado)
    
                    @php
                        
                        $minhaString = $dado->whatsapp;

                        // Remove '(' e ')' da string
                        $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);

                    @endphp

                    <!-- HEADER -->
                    <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top ajusterHeaderInfinityScroll"
                        style="border-bottom: 1px solid var(--gray-400, #D5D2DC);max-height:75px" data-scroll-header>
                        <div class="container containerHeaderHome">
                            <aside id="menuOculto" class="menuOculto">
                                <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                                    style="font-size:30px">&times;</a>
                                <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                                    src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                                    alt="Nome da empresa">
                                <div style="height: 30px"></div>

                                {{-- @if (!Auth::guard('customer')->check())
                                        <a class="btn btn-sm text-primary d-lg-block order-lg-3"
                                        href="{{ route('user.perfil.loginCadastrar.entrar') }}" style="font-size: 0.9rem">
                                            <i class="fi-user me-2"></i>Entrar
                                        </a>
                                    @else
                                        <a class="btn btn-sm text-primary d-lg-block order-lg-3"
                                        href="{{ route('user.perfil.user.imoveis-user') }}" style="font-size: 0.9rem">
                                            Minha conta
                                        </a>
                                    @endif --}}
                                <div style="overflow-x:hidden;height: 100%;" id="overflowMenu">
                                    
                                    <div style="display: flex;justify-content: flex-end;">
                                        @if (!Auth::guard('customer')->check())
                                            <a href="{{ route('user.perfil.loginCadastrar.entrar') }}" style="padding: 20px 32px 20px 32px;display: flex;align-items: center;">
                                                <i class="fi-user me-2"></i>Entrar
                                            </a>
                                        @else
                                            <a href="{{ route('user.perfil.user.imoveis-user') }}" style="padding: 20px 32px 20px 32px;display: flex;align-items: center;">
                                                <i class="fi-user me-2"></i>Minha Conta
                                            </a>
                                        @endif
                                    </div>
                                    <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto" >
                                        <div class="divLinkTexto">
                                            <span>Imóveis</span>
                                            <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Venda seu Imóvel</span>
                                            <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Indique imóveis ou clientes</span>
                                            <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                        class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Seja nosso corretor</span>
                                            <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                        class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Seja nosso fotógrafo</span>
                                            <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                        class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Seja nosso avaliador de imóveis</span>
                                            <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Sobre a Nome da empresa</span>
                                            <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Contato</span>
                                            <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Blog</span>
                                            <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a>
    
                                    {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                        <div class="divLinkTexto">
                                            <span>Dúvidas Frequentes</span>
                                            <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                        </div>
                                        <div class="divIconeArrow">
                                            <i class="fi-chevron-right"></i>
                                        </div>
                                    </a> --}}
                                    <div style="height: 50px"></div>
                                </div>
    
                            </aside>
                            <section id="contPrincipal" class="ajusteHeaderHome"
                                style="display: flex;width: 100%;align-items: center;justify-content: space-between;">
                                <div style="display: flex;">
                                    <span class="iconeMenuHeaderMobile" onclick="abrirNav()">&#9776;</span>
                                    <a class="navbar-brand me-3 me-xl-4 imgHeaderInfinity" href="{{ route('home5') }}">
                                        <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                            width="170" alt="Nome da empresa">
                                    </a>
                                </div>
    
    
                                <input id="autocomplete" class="inputBuscaHeader" data-action="inputGoogle"
                                    placeholder="Busque uma cidade ou bairro ou estado" type="text" />
    
                                <div class="divRedesHome">
                                    <div class="">
                                        @if(isset($semCaracteres))
                                            <a class="btn btn-icon btn-light-primary btn-xs me-2" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}" target="_blank">
                                                <i class="fi-whatsapp"></i>
                                            </a>
                                        @endif

                                        @if(isset($dado->facebook))
                                            <a class="btn btn-icon btn-light-primary btn-xs me-2" href="{{$dado->facebook}}" target="_blank">
                                                <i class="fi-facebook"></i>
                                                
                                            </a>
                                        @endif

                                        @if(isset($dado->instagram))
                                            <a class="btn btn-icon btn-light-primary btn-xs me-2" href="{{$dado->instagram}}" target="_blank">
                                                <i class="fi-instagram"></i>
                                            </a>
                                        @endif
                                    </div>
                                    @if (!Auth::guard('customer')->check())
                                        <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3"
                                        href="{{ route('user.perfil.loginCadastrar.entrar') }}" style="font-size: 0.9rem">
                                            <i class="fi-user me-2"></i>Entrar
                                        </a>
                                    @else
                                        <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3"
                                        href="{{ route('user.perfil.user.imoveis-user') }}" style="font-size: 0.9rem">
                                            Minha conta
                                        </a>
                                    @endif
    
                                </div>
    
                            </section>
    
    
    
    
                        </div>
                    </header>
                @endforeach
            @else
                <!-- HEADER -->
                <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top ajusterHeaderInfinityScroll"
                    style="border-bottom: 1px solid var(--gray-400, #D5D2DC);max-height:75px" data-scroll-header>
                    <div class="container containerHeaderHome">
                        <aside id="menuOculto" class="menuOculto">
                            <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                                style="font-size:30px">&times;</a>
                            <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                                src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                                alt="Nome da empresa">
                            <div style="height: 30px"></div>
                            <div style="overflow-x:hidden;height: 100%;" id="overflowMenu">
                                <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Imóveis</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Vender seu Imóvel</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Indicar um Imóvel</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                    class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Trabalhe Conosco - Corretores</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                    class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Trabalhe Conosco - Fotógrafos</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                    class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Trabalhe Conosco - Avaliadores de Imóvel</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Quem Somos</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Contato</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Blog</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Dúvidas Frequentes</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>
                                <div style="height: 50px"></div>
                            </div>

                        </aside>
                        <section id="contPrincipal" class="ajusteHeaderHome"
                            style="display: flex;width: 100%;align-items: center;justify-content: space-between;">
                            <div style="display: flex;">
                                <span class="iconeMenuHeaderMobile" onclick="abrirNav()">&#9776;</span>
                                <a class="navbar-brand me-3 me-xl-4 imgHeaderInfinity" href="{{ route('home5') }}">
                                    <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                        width="170" alt="Nome da empresa">
                                </a>
                            </div>


                            <input id="autocomplete" class="inputBuscaHeader" data-action="inputGoogle"
                                placeholder="Busque uma cidade ou bairro ou estado" type="text" />

                            <div class="divRedesHome">
                                @if (!Auth::guard('customer')->check())
                                    <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3"
                                    href="{{ route('user.perfil.loginCadastrar.entrar') }}" style="font-size: 0.9rem">
                                        <i class="fi-user me-2"></i>Entrar
                                    </a>
                                @else
                                    <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3"
                                    href="{{ route('user.perfil.user.imoveis-user') }}" style="font-size: 0.9rem">
                                        Minha conta
                                    </a>
                                @endif

                            </div>

                        </section>




                    </div>
                </header>
            @endif

        @elseif(Request::is(['usuario.laravel']))

            @php
                $dados = App\Http\Controllers\User\DadosUserController::getDados();
            @endphp

            @foreach ($dados as $dado)

                @php
                
                    $minhaString = $dado->whatsapp;

                    // Remove '(' e ')' da string
                    $semCaracteres = str_replace(array('(', ')', ' ', '-'), '', $minhaString);

                @endphp
                <!-- HEADER -->
                <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top ajusterHeaderInfinityScroll"
                    style="border-bottom: 1px solid var(--gray-400, #D5D2DC);max-height:75px" data-scroll-header>
                    <div class="container containerHeaderHome">
                        <aside id="menuOculto" class="menuOculto">
                            <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                                style="font-size:30px">&times;</a>
                            <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                                src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                                alt="Nome da empresa">
                            <div style="height: 30px"></div>
                            <div style="overflow-x:hidden;height: 100%;" id="overflowMenu">
                                <a href="{{ route('user.imoveisPaginacao.imovelPaginacao') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Imóveis</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Venda seu Imóvel</span>
                                        <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Indique imóveis ou clientes</span>
                                        <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                    class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Seja nosso corretor</span>
                                        <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                    class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Seja nosso fotógrafo</span>
                                        <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                    class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Seja nosso avaliador de imóveis</span>
                                        <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Sobre a Nome da empresa</span>
                                        <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Contato</span>
                                        <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Blog</span>
                                        <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a>

                                {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                    <div class="divLinkTexto">
                                        <span>Dúvidas Frequentes</span>
                                        <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                    </div>
                                    <div class="divIconeArrow">
                                        <i class="fi-chevron-right"></i>
                                    </div>
                                </a> --}}
                                <div style="height: 50px"></div>
                            </div>

                        </aside>
                        <section id="contPrincipal" class="ajusteHeaderHome"
                            style="display: flex;width: 100%;align-items: center;justify-content: space-between;">
                            <div style="display: flex;">
                                <span class="iconeMenuHeaderMobile" onclick="abrirNav()">&#9776;</span>
                                <a class="navbar-brand me-3 me-xl-4 imgHeaderInfinity" href="{{ route('home5') }}">
                                    <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                        width="170" alt="Nome da empresa">
                                </a>
                            </div>


                            <input id="autocomplete" class="inputBuscaHeader" data-action="inputGoogle"
                                placeholder="Busque uma cidade ou bairro ou estado" type="text" />

                            <div class="divRedesHome">
                                <div class="">
                                    <a class="btn btn-icon btn-light-primary btn-xs me-2" href="https://web.whatsapp.com/send?phone=55{{$semCaracteres}}" target="_blank">
                                        <i class="fi-whatsapp"></i>
                                    </a>
                                    <a class="btn btn-icon btn-light-primary btn-xs me-2" href="{{$dado->facebook}}" target="_blank">
                                        <i class="fi-facebook"></i>
                                        
                                    </a>
                                    <a class="btn btn-icon btn-light-primary btn-xs me-2" href="{{$dado->instagram}}">
                                        <i class="fi-instagram"></i>
                                    </a>
                                </div>
                                    @if (!Auth::guard('customer')->check())
                                        <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3"
                                        href="{{ route('user.perfil.loginCadastrar.entrar') }}" style="font-size: 0.9rem">
                                            <i class="fi-user me-2"></i>Entrar
                                        </a>
                                    @else
                                        <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3"
                                        href="{{ route('user.perfil.user.imoveis-user') }}" style="font-size: 0.9rem">
                                            Minha conta
                                        </a>
                                    @endif

                            </div>

                        </section>




                    </div>
                </header>
            @endforeach
            {{-- <!-- HEADER -->
            <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom: 1px solid var(--gray-400, #D5D2DC);" data-scroll-header>
                <div class="container">
                    <a class="navbar-brand me-3 me-xl-4" href="#">
                        <img class="d-block" src={{asset("assets/img/logo/logo-project.png")}} width="170" alt="Nome da empresa">
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="{{route('user.perfil.loginCadastrar.entrar')}}"
                        ><i class="fi-user me-2"></i>Entrar
                    </a>
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{route('user.property.lista-imoveis')}}" class="nav-link">Imóveis</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{route('user.vendaIndique.venda')}}" class="nav-link">Vender seu imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{route('user.vendaIndique.indique')}}" class="nav-link">Indicar um Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" 
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Trabalhe Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.trabalhe-conosco.trabalhe-corretor')}}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.trabalhe-conosco.trabalhe-fotografo')}}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.trabalhe-conosco.trabalhe-avaliador')}}">Avaliadores de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.about.about')}}">Quem Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.contact.contact')}}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.blog.blog')}}">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('user.contact.duvidas-frequentes')}}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li>
                                </ul>
                            </li>
    
                        </ul>
                    </div>
                </div>
            </header> --}}
        @else
            <!-- HEADER-->
            <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-scroll-header>
                <div class="container">
                    <aside id="menuOculto" class="menuOculto">
                        <a href="javascript:void(0)" class="btnFechar" onclick="fecharNav()"
                            style="font-size:30px">&times;</a>
                        <img class="d-block" style="position:absolute;top: 30px;left: 32px;"
                            src={{ asset('assets/img/logo/logo-project.png') }} width="170"
                            alt="Nome da empresa">
                        <div style="height: 30px"></div>
                        <div style="overflow-x:hidden;height: 100%;">
                            <a href="{{ route('home5') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Imóveis</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.venda') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Venda seu Imóvel</span>
                                    <span class="subMenuLinkTexto">Cadastre seu imóvel</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.vendaIndique.indique') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Indique imóveis ou clientes</span>
                                    <span class="subMenuLinkTexto">Recompensaremos sua indicação</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso corretor</span>
                                    <span class="subMenuLinkTexto">Valorizamos sua expertise e comprometimento</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso fotógrafo</span>
                                    <span class="subMenuLinkTexto">Seu talento é essencial para nosso sucesso</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}"
                                class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Seja nosso avaliador de imóveis</span>
                                    <span class="subMenuLinkTexto">Contribua com sua expertise para avaliações precisas e confiáveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.about.about') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Sobre a Nome da empresa</span>
                                    <span class="subMenuLinkTexto">Conheça nossa Missão, Visão e Valores</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.contact.contact') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Contato</span>
                                    <span class="subMenuLinkTexto">Estamos disponíveis para lhe atender</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            <a href="{{ route('user.blog.blog') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Blog</span>
                                    <span class="subMenuLinkTexto">Principais notícias imobiliárias</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a>

                            {{-- <a href="{{ route('user.contact.duvidas-frequentes') }}" class="linkMenuOculto">
                                <div class="divLinkTexto">
                                    <span>Dúvidas Frequentes</span>
                                    <span class="subMenuLinkTexto">Conheça nossos imóveis disponíveis</span>
                                </div>
                                <div class="divIconeArrow">
                                    <i class="fi-chevron-right"></i>
                                </div>
                            </a> --}}
                            <div style="height: 50px"></div>
                        </div>

                    </aside>

                    <div style="display: flex;align-items: center;">
                        <span id="iconePontosMenu" style="font-size: 30px;cursor: pointer;display:none"
                            onclick="abrirNav()">&#9776;</span>
                        <a class="navbar-brand me-3 me-xl-4" href="{{ route('home5') }}">
                            <img class="d-block" src={{ asset('assets/img/logo/logo-project.png') }}
                                width="170" alt="Nome da empresa">
                        </a>
                    </div>
                        @if (!Auth::guard('customer')->check())
                            <a class="btn btn-sm text-primary order-lg-3"
                                href="{{ route('user.perfil.loginCadastrar.entrar') }}">
                                <i class="fi-user me-2"></i>Entrar
                            </a>
                        @else
                            <a class="btn btn-sm text-primary order-lg-3"
                            href="{{ route('user.perfil.user.imoveis-user') }}">
                                Minha Conta
                            </a>
                        @endif
                    <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                        <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">

                            <!-- IMÓVEIS -->
                            <a href="{{ route('home5') }}" class="nav-link">Imóveis</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.venda') }}" class="nav-link">Vender seu
                                imóvel</a>

                            <!-- INDICAR UM IMÓVEL -->
                            <a href="{{ route('user.vendaIndique.indique') }}" class="nav-link">Indicar um
                                Imóvel</a>

                            <!-- TRABALHE CONOSCO -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Trabalhe Conosco</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-corretor') }}">Corretores</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-fotografo') }}">Fotógrafos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.trabalhe-conosco.trabalhe-avaliador') }}">Avaliadores
                                            de Imóvel</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- SOBRE NÓS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Sobre Nós</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.about.about') }}">Quem
                                            Somos</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.contact.contact') }}">
                                            Contato
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.blog.blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.contact.duvidas-frequentes') }}">
                                            Dúvidas Frequentes
                                        </a>
                                    </li> --}}
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>
        @endif
