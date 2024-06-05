<?php

use App\Http\Controllers\Admin\CondominioController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\User\ListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/property/uploadImg/{prop_code}/{prop_id}', [PropertyController::class, "post_img"])->name("admin.property.post_img");


Route::post('/property/uploadVideo/{prop_code}/{prop_id}', [PropertyController::class, "post_video"])->name("admin.property.post_video");
Route::get('/property/getImgs/{prop_id}', [PropertyController::class, "getImagesPropertie"])->name("admin.property.get_imgs");
Route::get('/property/getFilesPDF/{prop_id}', [PropertyController::class, "getFilesPDFPropertie"])->name("admin.property.getFilesPDFPropertie");

Route::get('/property/getVideos/{prop_id}', [PropertyController::class, "getVideosPropertie"])->name("admin.property.get_videos");
Route::get('/property/listPropertiesFiltros', [ListController::class, "listAllPropertiesFiltro"])->name("admin.property.listPropertiesFiltros");
Route::get('/property/listAllProperties', [PropertyController::class, "listAllProperties"])->name("admin.property.listAllProperties");
Route::get('/usuario.listJson', [ListController::class, "jsonPaginacaoLaravelAjax"])->name("property.listAllPropertiesJson");



//CONDOMINIO
// Route::post('/condominio/uploadImg/{condominio_code}/{condominio_id}', [CondominioController::class, "addImgCondominio"])->name("admin.property.addImgCondominio");

Route::get('/condominio/getImgs/{cond_id}', [CondominioController::class, "getImagesCondominio"])->name("admin.condominio.getImagesCondominio");
