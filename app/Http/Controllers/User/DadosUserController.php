<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Caracteristicas;
use App\Models\City;
use App\Models\NearbyPlaces;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\PropertyCaracteristicas;
use App\Models\TypeProperty;
use Illuminate\Http\Request;
use App\DemoTask;
use App\Models\Condominio;
use App\Models\Configurations;
use App\Models\PhotosCondominio;
use App\Models\Post;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Exception;
use Illuminate\Support\Facades\DB;
use stdClass;

class DadosUserController extends Controller
{

    public static function getDados()
    {
        $dados = Configurations::latest()->get();

        return $dados;
    }

}
