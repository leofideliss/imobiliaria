<?php

use App\Http\Controllers\Admin\CondominioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SolicitacaoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProprietariosController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InformacoesController;
use App\Http\Controllers\User\ListaPaginacaoController;
use App\Http\Controllers\User\ListController;
use App\Http\Controllers\User\PerfilController;
use App\Http\Middleware\AuthenticateCustomer;
use App\Http\Middleware\CheckAuthenticated;
use App\Http\Middleware\CheckAuthenticatedCustomer;
use App\Http\Middleware\RefreshAccessInProperty;
use App\Http\Middleware\RefreshAccessWebSite;
use App\Models\Caracteristicas;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\TypeProperty;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.dashboard.index');
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', "index")->name("admin.login.login")->middleware(CheckAuthenticated::class);
    Route::post('/auth', "authenticate")->name("admin.login.authenticate");
});

Route::middleware(["auth:admin"])->group(function () {

    Route::get('/logout', [LoginController::class, "logout"])->name("admin.dashboard.logout");


    // Proprietarios
    Route::get('/admin/proprietarios', [ProprietariosController::class, "index"])->name("admin.proprietarios.index");
    Route::post('/admin/proprietarios/addProprietario', [ProprietariosController::class, "addProprietario"])->name("admin.proprietarios.addProprietario");
    Route::get('/admin/proprietarios/getProprietarios', [ProprietariosController::class, "getProprietarios"])->name("admin.proprietarios.getProprietarios");
    Route::delete('/admin/property/delete-proprietario/{id}', [ProprietariosController::class, "deleteProprietario"])->name("admin.proprietarios.deleteProprietario");
    // BEGIN DASHBOARD ROUTES
    Route::get('/dashboard', [DashboardController::class, "index"])->name("admin.dashboard.index");

    Route::get('/dashboard/getProperties', [DashboardController::class, "getProperties"])->name("admin.dashboard.getProperties");
    Route::get('/dashboard/getTiposImoveis', [DashboardController::class, "getTiposImoveis"])->name("admin.dashboard.getTiposImoveis");
    Route::get('/dashboard/getMunicipios', [DashboardController::class, "getMunicipios"])->name("admin.dashboard.getMunicipios");
    Route::get('/dashboard/getValoresImoveis', [DashboardController::class, "getValoresImoveis"])->name("admin.dashboard.getValoresImoveis");
    Route::get('/dashboard/getStatusImovel', [DashboardController::class, "getStatusImovel"])->name("admin.dashboard.getStatusImovel");
    // END DASHBOARD ROUTES

    // BEGIN PROPERTY ROUTES
    Route::get('/property/index', [PropertyController::class, "index"])->name("admin.property.index");
    Route::get('/property/addPropertyXML', [PropertyController::class, "addPropertyXML"])->name("admin.property.addPropertyXML");

    Route::get('/property/resumo-property/{id}', [PropertyController::class, "resumo_propriedade"])->name("admin.property.resumo-property");

    Route::get('/gamificacao', [PropertyController::class, "gamificacao"])->name("admin.dashboard.gamificacao");
    Route::get('/gamificacao/listPropertiesJsonGame', [PropertyController::class, "listPropertiesJsonGame"])->name("admin.property.listPropertiesJsonGame");

    Route::post('/property/add-property', [PropertyController::class, "addProperty"])->name("admin.property.photos");
    Route::get('/property', [PropertyController::class, "list"])->name("admin.property.property");
    Route::get('/propertyAdmin', [PropertyController::class, "listAdmin"])->name("admin.property.propertyAdmin");
    Route::get('/propertyCustomers', [PropertyController::class, "listCustomers"])->name("admin.property.customers");
    Route::get('/property/edit-property/{id}', [PropertyController::class, "editProperty"])->name("admin.property.editProperty");
    Route::get('/property/getProperty/{id}', [PropertyController::class, "getProperty"])->name("admin.property.getProperty");
    Route::get('/property/listPropertiesJson', [PropertyController::class, "listPropertiesJson"])->name("admin.property.listPropertiesJson");

    Route::get('/property/getPropertiesSelecteds', [PropertyController::class, "getPropertiesSelecteds"])->name("admin.property.getPropertiesSelecteds");
    Route::get('/property/listPropertiesJsonCustomers', [PropertyController::class, "listPropertiesJsonCustomers"])->name("admin.property.listPropertiesJsonCustomers");
    Route::get('/property/listPropertiesJsonAdmin', [PropertyController::class, "listPropertiesJsonAdmin"])->name("admin.property.listPropertiesJsonAdmin");
    Route::get('/property/listPropertiesActivesJson', [PropertyController::class, "listPropertiesActivesJson"])->name("admin.property.listPropertiesActivesJson");
    Route::get('/gerarXML', [PropertyController::class, "gerarXML"])->name("admin.property.gerarXml");
    Route::get('/formatedDataXml', [PropertyController::class, "formatedDataXml"])->name("admin.property.formatedDataXml");
    Route::get('/property/listXmls', [PropertyController::class, "listXmls"])->name("admin.property.listXmls");
    Route::delete('/property/deleteXML/{id}', [PropertyController::class, "deleteXML"])->name("admin.property.deleteXML");
    Route::post('/property/createLinkXML', [PropertyController::class, "createLinkXML"])->name("admin.property.createLinkXML");
    Route::get('/getXMLPropertiesList/{id}', [PropertyController::class, "getXMLPropertiesList"])->name("admin.property.getXMLPropertiesList");
    Route::post('/property/createLinkXMLProperties', [PropertyController::class, "createLinkXMLProperties"])->name("admin.property.createLinkXMLProperties");

    // Route::post('/addPropertyXML', [PropertyController::class, "addPropertyXML"])->name("admin.property.addPropertyXML");



    Route::get('/property/view-property', [PropertyController::class, "view_property"])->name("admin.property.view-property");
    Route::get('/property/getGeolocation/{address}', [PropertyController::class, "getGeolocation"])->name("admin.property.getGeolocation");
    Route::delete('/register/deleteAllProperty/{id}', [PropertyController::class, "deleteAllProperty"])->name("admin.register.city.deleteAllProperty");


    // delete imgs dropzone
    Route::delete('/property/deleteImg', [PropertyController::class, "deleteImg"])->name("admin.property.delete_img");
    Route::delete('/property/deletePDF', [PropertyController::class, "deletePDF"])->name("admin.property.delete_pdf");
    Route::delete('/condominio/deleteImg', [CondominioController::class, "deleteImg"])->name("admin.condominio.delete_img");
    Route::delete('/condominio/deleteAllImages/{id}', [CondominioController::class, "deleteAllImages"])->name("admin.condominio.deleteAllImages");
    Route::delete('/property/deleteVideo', [PropertyController::class, "deleteVideo"])->name("admin.property.delete_video");
    // map.json

    Route::post('/condominio/uploadImg/{condominio_code}/{condominio_id}', [CondominioController::class, "addImgCondominio"])->name("admin.property.addImgCondominio");

    // END PROPERTY ROUTES

    // BEGIN USER ROUTES
    Route::get('/user/admin', [UserController::class, "index"])->name("admin.user.admin.admin");
    Route::post('/user/add-admin', [UserController::class, "addAdmin"])->name("admin.user.admin.add-admin");
    Route::post('/user/add-employee', [UserController::class, "addEmployee"])->name("admin.user.admin.add-employee");
    Route::get('/user/user', [UserController::class, "user"])->name("admin.user.user.user");
    Route::get('/user/listUserJson', [UserController::class, "listUserJson"])->name("admin.user.user.listUserJson");
    Route::get('/user/listEmployeeJson', [UserController::class, "listEmployeesJson"])->name("admin.user.user.listEmployeesJson");
    Route::get('/user/getAdmin/{id}', [UserController::class, "getAdmin"])->name("admin.user.user.getAdmin");
    Route::get('/user/getEmployee/{id}', [UserController::class, "getEmployee"])->name("admin.user.user.getEmployee");
    Route::delete('/user/deleteAdmin/{id}', [UserController::class, "deleteAdmin"])->name("admin.user.user.deleteAdmin");
    Route::delete('/user/deleteEmployee/{id}', [UserController::class, "deleteEmployee"])->name("admin.user.user.deleteEmployee");

    Route::get('/user/usuarioExterno', [UserController::class, "userExterno"])->name("admin.user.usuario_externo.usuario-externo");
    Route::get('/user/listExternalUsers', [UserController::class, "listExternalUsers"])->name("admin.user.listExternalUsers");
    Route::post('/user/alterStatusCustomer', [UserController::class, "alterStatusCustomer"])->name("admin.user.alterStatusCustomer");

    // END USER ROUTES

    // BEGIN SETTINGS ROUTES
    Route::get('/settings', [SettingsController::class, "index"])->name("admin.settings.index");
    Route::post('/settings/general', [SettingsController::class, "setGeneral"])->name("admin.settings.setGeneral");
    Route::post('/settings/commission', [SettingsController::class, "setCommission"])->name("admin.settings.setCommission");
    Route::post('/settings/social', [SettingsController::class, "setSocial"])->name("admin.settings.setSocial");
    Route::post('/settings/videos', [SettingsController::class, "setVideos"])->name("admin.settings.setVideos");
    Route::post('/settings/marcaDagua', [SettingsController::class, "setMarcaDagua"])->name("admin.settings.setMarcaDagua");

    Route::get('/settings/nivel_acesso', [SettingsController::class, "nivel_acesso"])->name("admin.settings.nivel-acesso");

    Route::get('/settings/mensagem_contato', [SettingsController::class, "mensagem_contato"])->name("admin.settings.mensagem-contato");

    Route::get('/posts', [SettingsController::class, "posts"])->name("admin.settings.blog.posts");

    Route::get('/posts/comentarios', [SettingsController::class, "comentarios"])->name("admin.settings.blog.comentarios-post");

    Route::post('/posts/addPost', [SettingsController::class, "addPost"])->name("admin.settings.addPost");
    Route::delete('/posts/deletePost/{id}', [SettingsController::class, "deletePost"])->name("admin.settings.deletePost");
    Route::get('/posts/editPost/{id}', [SettingsController::class, "editPost"])->name("admin.settings.editPost");
    Route::get('/posts/getAllpost', [SettingsController::class, "getAllpost"])->name("admin.settings.getAllpost");
    Route::get('/posts/getAllTypesPost', [SettingsController::class, "getAllTypesPost"])->name("admin.settings.getAllTypesPost");
    Route::get('/posts/getCommentsByPost/{id}', [SettingsController::class, "getCommentsByPost"])->name("admin.settings.getCommentsByPost");
    Route::delete('/posts/deleteCommentsByPost', [SettingsController::class, "deleteCommentsByPost"])->name("admin.settings.deleteCommentsByPost");

    Route::get('/categoryPosts', [SettingsController::class, "categoryPosts"])->name("admin.settings.blog.category-post");
    Route::get('/listTypePostCategory', [SettingsController::class, "listTypePostCategory"])->name("admin.settings.blog.listTypePostCategory");
    Route::post('/AddcategoryPosts', [SettingsController::class, "AddcategoryPosts"])->name("admin.settings.blog.AddcategoryPosts");
    Route::delete('/deleteCategoryPosts/{id}', [SettingsController::class, "deleteCategoryPosts"])->name("admin.settings.blog.deleteCategoryPosts");
    Route::post('/categoryPosts/addCategory', [SettingsController::class, "addPost"])->name("admin.settings.blog.add-categoryPost");

    // END SETTINGS ROUTES

    // BEGIN SOLITICACOES ROUTES
    Route::get('/solicitacao-corretores', [SolicitacaoController::class, "solicitacao_corretor"])->name("admin.solicitacoes.corretores.solicitacoes-corretores");

    Route::get('/solicitacao-corretores/aprovar-corretor', [SolicitacaoController::class, "aprovar_corretores"])->name("admin.solicitacoes.corretores.aprovar-corretor");

    Route::get('/solicitacao-fotografos', [SolicitacaoController::class, "solicitacao_fotografo"])->name("admin.solicitacoes.fotografos.solicitacoes-fotografos");

    Route::get('/solicitacao-fotografos/aprovar-fotografo', [SolicitacaoController::class, "aprovar_fotografo"])->name("admin.solicitacoes.fotografos.aprovar-fotografo");

    Route::get('/solicitacao-avaliadores', [SolicitacaoController::class, "solicitacao_avaliador"])->name("admin.solicitacoes.avaliadores.solicitacoes-avaliadores");

    Route::get('/solicitacao-avaliadores/aprovar-avaliador', [SolicitacaoController::class, "aprovar_avaliador"])->name("admin.solicitacoes.avaliadores.aprovar-avaliador");


    // END SOLITICACOES ROUTES

    // BEGIN REGISTER ROUTES
    Route::get('/register/cities', [RegisterController::class, "city"])->name("admin.register.city.cities");
    Route::post('/register/add-city', [RegisterController::class, "addCity"])->name("admin.register.city.add-city");
    Route::get('/register/listCitiesJson', [RegisterController::class, "listCitiesJson"])->name("admin.register.city.listCitiesJson");
    Route::delete('/register/deleteCity/{id}', [RegisterController::class, "deleteCity"])->name("admin.register.city.deleteCity");
    // Route::get('/register/getCitieById/{id}', [RegisterController::class, "getCitieById"])->name("admin.register.city.getCitieById");

    Route::get('/register/property', [RegisterController::class, "property"])->name("admin.register.property-type.property");
    Route::post('/register/add-type-property', [RegisterController::class, "addTypeProperty"])->name("admin.register.property-type.add-type-property");

    Route::get('/register/caracteristicas', [RegisterController::class, "caracteristicas"])->name("admin.register.caracteristicas_imovel.caracteristicas_imovel");
    Route::post('/register/caracteristicas/add-caracteristica', [RegisterController::class, "addCaracteristica"])->name("admin.register.caracteristicas_imovel.add-caracteristica");
    Route::delete('/register/deleteCaracteristica/{id}', [RegisterController::class, "deleteCaracteristica"])->name("admin.register.city.deleteCaracteristica");

    Route::get('/register/tipos-usuarios', [RegisterController::class, "tiposUsuarios"])->name("admin.register.user-type.tipos-usuarios");
    Route::post('/register/tipos-usuarios/add-tiposUsuarios', [RegisterController::class, "addTipos_imoveis"])->name("admin.register.user-type.add-tipos_usuarios");
    Route::post('/register/addUserType', [RegisterController::class, "addUserType"])->name("admin.register.addUserType");
    Route::get('/register/listCargosJson', [RegisterController::class, "listCargosJson"])->name("admin.register.listCargosJson");
    Route::delete('/register/deleteCargos/{id}', [RegisterController::class, "deleteCargos"])->name("admin.register.deleteCargos");
    Route::get('/user/listCargos', [RegisterController::class, "listCargos"])->name("admin.user.user.listCargos");

    // END REGISTER ROUTES

    // CORRETOR
    Route::get('/corretor/corretor', [UserController::class, "corretor"])->name("admin.user.corretor.corretor");

    //FOTOGRAFO
    Route::get('/fotografo/fotografo', [UserController::class, "fotografo"])->name("admin.user.fotografo.fotografo");

    //AVALIADOR
    Route::get('/avaliador/avaliador_imovel', [UserController::class, "avaliador_imovel"])->name("admin.user.avaliador_imovel.avaliador-imovel");
    // TESTE ****************

    Route::get('/property/listProperties', [PropertyController::class, "listProperties"])->name("admin.property.listProperties");
    Route::get('/property/listPropertiesViewJson', [PropertyController::class, "listPropertiesViewJson"])->name("admin.property.listPropertiesViewJson");

    // BEGIN CONDOMINIO ROTES ROUTES
    Route::get('/condominio', [CondominioController::class, "condominios"])->name("admin.condominio.condominio");
    Route::get('/condominio/listjson', [CondominioController::class, "listCondominiosJson"])->name("admin.condominio.listCondominiosJson");
    Route::get('/condominio/caracteristicas/listCaracteristicasCondominioJsonSelected/{id}', [CondominioController::class, "listCondominiosSelectedJson"])->name("admin.condominio.listCondominiosSelectedJson");

    Route::get('/condominio/add_condominio', [CondominioController::class, "addCondominio"])->name("admin.condominio.add-condominio");
    Route::post('/condominio/storeCondominio', [CondominioController::class, "storeCondominio"])->name("admin.condominio.storeCondominio");
    Route::delete('/condominio/delete-condominio/{id}', [CondominioController::class, "deleteCondominio"])->name("admin.property.deleteCondominio");
    Route::get('/condominio/edit-condominio/{id}', [CondominioController::class, "editCondomio"])->name("admin.property.editCondomio");
    Route::get('/condominio/get-condominio/{id}', [CondominioController::class, "getCondominio"])->name("admin.property.getCondominio");
    Route::get('/caracteristicasCondominio', [CondominioController::class, "caracteristicasCondominio"])->name("admin.condominio.caracteristica-condominio");
    Route::post('/condominio/storeImages', [CondominioController::class, "storeImages"])->name("admin.condominio.storeImages");

    Route::post('/register/caracteristicas/add-caracteristicaCondominio', [CondominioController::class, "addCaracteristicaCondominio"])->name("admin.register.caracteristicas_imovel.add-caracteristicaCondominio");
    Route::get('/register/caracteristicas/listCaracteristicasCondominioJson', [CondominioController::class, "listCaracteristicasJson"])->name("admin.register.caracteristicas_imovel.listCaracteristicasJsonCondominio");
    Route::delete('/register/deleteCaracteristicaCondominio/{id}', [CondominioController::class, "deleteCaracteristica"])->name("admin.register.deleteCaracteristicaCondominio");

    Route::get('/caracteristicasCondominio/addCaracteristica', [CondominioController::class, "addCaracteristica"])->name("admin.condominio.add-caracteristicaCondominio");

    //END CONDOMINIO ROTES
});

// LISTA
Route::controller(ListController::class)->group(function () {
    Route::get('/detalhes-imovel/{id}', "detalhes_imovel")->name("user.property.detalhe_imovel")->middleware(RefreshAccessInProperty::class);;



    Route::get('/contato', "contact")->name("user.contact.contact");

    Route::get('/quem-somos', "about")->name("user.about.about");



    Route::get('/contInfinito', "paginacaoInfinitScroll")->name("contInfinito");
});




//CONTATO
Route::controller(ContactController::class)->group(function () {
    Route::get('/duvidas-frequentes', "duvidas")->name("user.contact.duvidas-frequentes");

    Route::get('/politica-privacidade', "politica_privacidade")->name("user.contact.politica-privacidade");

    Route::get('/termos-uso', "termos_uso")->name("user.contact.termos-uso");

    Route::get('/venda-imovel', "venda")->name("user.vendaIndique.venda");

    Route::get('/indique-imovel', "indique")->name("user.vendaIndique.indique");
});

//BLOG
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', "blog")->name("user.blog.blog");

    Route::get('/post', "post")->name("user.blog.posts");
    Route::post('/post/addComment', "addComment")->name("user.blog.addComment");

    Route::get('/post/{id}', "post")->name("user.blog.post");
});


Route::controller(ListaPaginacaoController::class)->group(function () {
    Route::get('/listaImoveis', "listaPaginacao")->name("user.imoveisPaginacao.imovelPaginacao");

    Route::get('/listImoveis', "listaPost")->name("user.imoveisPaginacao.postImovelPaginacao");
});

Route::controller(PerfilController::class)->group(function () {

    Route::post('/authCustomer', "authCustomer")->name("user.perfil.authCustomer");
    Route::post('/authCustomerGoogle', "authenticateWithGoogle")->name("user.perfil.authenticateWithGoogle");
    Route::post('/addCustomer', "addCustomer")->name("user.perfil.addCustomer");
    Route::get('/logoutCustomer', "logoutCustomer")->name("user.perfil.logoutCustomer");
    Route::get('/entrar', "entrar")->name("user.perfil.loginCadastrar.entrar")->middleware(CheckAuthenticatedCustomer::class);
    Route::get('/redefinirSenha/{token}', "esqueceuSenha")->name("user.perfil.loginCadastrar.esqueceuSenha");
    Route::get('/cadastro', "cadastrar")->name("user.perfil.loginCadastrar.cadastrar");
    Route::post('/sendForgotPassword', "sendForgotPassword")->name("user.sendForgotPassword");
    Route::post('/newPassword', "newPassword")->name("user.newPassword");
});

Route::controller(PerfilController::class)->middleware(AuthenticateCustomer::class)->group(function () {

    Route::post('/updateInfo', "updateInfo")->name("user.updateInfo");

    Route::get('/perfil-user', "index")->name("user.perfil.user.user");

    Route::get('/minha-senha', "minha_senha")->name("user.perfil.user.senha-user");

    Route::get('/imoveis-xml', "link_xml")->name("user.perfil.user.addImovel-xml");

    Route::get('/meus-imoveis', "meus_imoveis")->name("user.perfil.user.imoveis-user");

    // Route::get('/add-xml', "add_xml")->name("user.perfil.add-xml");

    Route::get('/imoveis-indicados', "imoveis_indicados")->name("user.perfil.user.imoveis-indicados");

    Route::get('/lista-xmls', "lista_xmls")->name("user.perfil.user.lista-xml");

    Route::get('/indicar-imovel', "indicar_imovel")->name("user.perfil.user.indicar-imovel");

    Route::get('/add-propriedade/{prop_id?}', "add_propriedade")->name("user.perfil.add-propriedade");

    Route::post('/insert-propriedade', "insertPropertie")->name("user.perfil.insertPropertie");

    Route::get('/resumo-propriedade/{id}', "resumo_propriedade")->name("user.perfil.resumo-propriedade");

    Route::get('/funcoes-user', "funcoes_user")->name("user.perfil.user.funcoes-user");

    Route::get('/virar-corretor', "virar_corretor")->name("user.perfil.user.funcoes.virar-corretor");

    Route::get('/virar-avaliador', "virar_avaliador")->name("user.perfil.user.funcoes.virar-avaliador");

    Route::get('/virar-fotografo', "virar_fotografo")->name("user.perfil.user.funcoes.virar-fotografo");

    Route::get('/getPropertiesUserTabs', "getPropertiesUserTabs")->name("user.perfil.user.funcoes.getPropertiesUserTabs");

    Route::get('/tabUsers', "imoveisTabs")->name("user.perfil.user.paginacaoImoveis.tabUser");

    Route::get('/tabUsersAprovados', "imoveisTabsAprovados")->name("user.perfil.user.paginacaoImoveis.tabUserAprovados");

    Route::post('/addStringXML', "addStringXML")->name("user.perfil.user.funcoes.addStringXML");
    Route::get('/listXML', "listXML")->name("user.perfil.user.funcoes.listXML");
    Route::delete('/deleteItemListXML/{id}', "deleteItemListXML")->name("user.perfil.user.funcoes.deleteItemListXML");
});




Route::controller(InformacoesController::class)->group(function () {
    Route::get('/trabalhe-fotografo', "trabalhe_fotografo")->name("user.trabalhe-conosco.trabalhe-fotografo");

    Route::get('/trabalhe-avaliador', "trabalhe_avaliador")->name("user.trabalhe-conosco.trabalhe-avaliador");

    Route::get('/trabalhe-corretor', "trabalhe_corretor")->name("user.trabalhe-conosco.trabalhe-corretor");
});

// HOME
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', [HomeController::class, "home_imoveis"])->name("user.home.home");

    Route::get('/home2', [HomeController::class, "home2_imoveis"])->name("user.home.home2");
});

Route::get('/user/funcionario_geral', [UserController::class, "funcionario_geral"])->name("admin.user.funcionario.todos.funcionario-geral");

Route::get('/logout', [LoginController::class, "logout"])->name("admin.dashboard.logout");

Route::get('/usuario.laravel', function () {
    return view('user.lista.paginacao');
});

Route::get('/', [ListController::class, "todosImoveis"])->name("home5")->middleware(RefreshAccessWebSite::class);;

Route::get('/usuario.list', [ListController::class, "paginacaoLaravelAjax"])->name("usuario.list");



Route::fallback(function () {
    return view('user.404erro.404erro');
})->name('fallback.404');

Route::get('/list.post', [ListController::class, "listaPost"])->name("list.post");


Route::get('/layoutEmail', function () {
    return view('user.mail.forgotPassword', ['name' => 'André', 'token' => '1234']);
});


Route::get('/getXML', function () {
    try {
        //GET data by url
        $responseDist = Http::get("https://integracao.arboimoveis.com/api/custom-xml/imobiliaria/40aed6019def0ea835bbd9a3b11413da95ab8ed49b55d9e7d0954555abfbf0ffIjY_2lG7n0SVeelQn9btPeFG0IgwAhFbJpTeghNni1Y=/vivareal-xml");
       

        $xml = new \SimpleXMLElement($responseDist);


        foreach ($xml->Listings->Listing as $key => $value) {
            dd();

            foreach ($value->Media as $key => $value2) {
                foreach ($value2->Item as $key => $value3) {
                }
            }
        }
    } catch (Exception $th) {
        dd(
            [
                'code' => 500,
                'message' => $th->getMessage()
            ]
        );
    }


    dd($responseDist);
    $fileContents = $responseDist->body();
});


// urls usadas em ambos os usuários
Route::get('/register/listTypeProperty', [RegisterController::class, "listTypeProperty"])->name("admin.register.property-type.listTypeProperty");
Route::get('/register/getCitieByName', [RegisterController::class, "getCitieByName"])->name("admin.register.city.getCitieByName");
Route::get('/register/caracteristicas/listCaracteristicasJson', [RegisterController::class, "listCaracteristicasJson"])->name("admin.register.caracteristicas_imovel.listCaracteristicasJson");
Route::get('/register/caracteristicas/listCaracteristicasJsonSelected/{id}', [HomeController::class, "getCaractetisticasPropertie"])->name("admin.register.caracteristicas_imovel.listCaracteristicasJsonSelected");
Route::delete('/register/deleteProperty/{id}', [RegisterController::class, "deleteProperty"])->name("admin.register.city.deleteProperty");
Route::delete('/property/delete-property/{id}', [PropertyController::class, "deleteProperty"])->name("admin.property.deleteProperty");
Route::post('/property/alterStatus', [PropertyController::class, "alterStatus"])->name("admin.property.alterStatus");
Route::post('/property/alterStatusUser', [PropertyController::class, "alterStatusUser"])->name("admin.property.alterStatusUser");
Route::post('/property/uploadImg', [PropertyController::class, "post_upload"])->name("admin.property.post_upload");

Route::post('/property/nearbyPlaces/{prop_id?}', [PropertyController::class, "nearbyPlaces"])->name("admin.property.nearbyPlaces");

Route::post('/property/uploadImg/{prop_code}/{prop_id}', [PropertyController::class, "post_img"])->name("admin.property.post_img");

Route::post('/property/uploadPDF/{prop_code}/{prop_id}', [PropertyController::class, "post_pdf"])->name("admin.property.post_pdf");
Route::get('/property/generateMapJson', [PropertyController::class, "generateMapJson"])->name("admin.property.generateMapJson");
