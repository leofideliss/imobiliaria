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
use App\Models\PropertyFilesPDF;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Exception;
use Illuminate\Support\Facades\DB;
use stdClass;

class ListController extends Controller
{

    public function detalhes_imovel($id)
    {

        $propertie = Property::where([['id', '=', $id]])->get();



        return view(
            'user.property.detalhe_imovel',
            [
                'properties' => $propertie,

                "bread_subcontents" => [
                    [
                        'title' => "Detalhes Imóvel",
                        "target_url" =>  route("user.property.detalhe_imovel", ['id' => $id])
                    ],
                ]
            ]
        );
    }

    public static function getImagesPropertie($prop_id)
    {
        $results = [];
        $imgs = PhotosProperty::where('property_id', '=', $prop_id)->get();
        if (count($imgs) == 0) {
            $newobj = new stdClass(); //create a new 
            $newobj->filename = 'Image empty';
            $newobj->pathname = asset('storage/empty-image.svg');
            $newobj->property_id = $prop_id;
            array_push($results, $newobj);
        } else
            $results = $imgs;
        return $results;
    }

    public static function getCitie($city_id)
    {
        $cidade = City::where('id', '=', $city_id)->first();
        return $cidade;
    }


    public static function getTypePropertie($prop_id)
    {
        $typePropertie = TypeProperty::where('id', '=', $prop_id)->get();
        return $typePropertie;
    }

    public static function getCaractetisticasPropertie($prop_id)
    {
        $property = Property::where('id', '=', $prop_id)->first();
        $result = $property->getCaracteristicas()->get();
        return $result;
    }

    public static function getCaractetisticasProperties()
    {
        $caracteristicas = Caracteristicas::all();
        return $caracteristicas;
    }

    public static function getPDFs($prop_id)
    {
        $property = PropertyFilesPDF::where('property_id', '=', $prop_id)->get();
        
        return $property;
    }

    public static function getTiposImoveis()
    {
        $tipoPropriedade = TypeProperty::all();
        return $tipoPropriedade;
    }

    public static function getLocations($prop_id)
    {
        $locations = NearbyPlaces::where('property_id', '=', $prop_id)->get();
        return $locations;
    }

    // public function lista_imoveis(Request $request)
    // {
    //     // POVOAR OS CAMPOS SELECTS
    //     $tipoImovel = TypeProperty::orderBy('name')->get();
    //     $caracteristicas = Caracteristicas::orderBy('name')->get();
    //     $estados = City::orderBy('state')->get();


    //     // filter
    //     $propQuery = Property::query();

    //     $qtdQuarto = $request->quantidadeQuarto;
    //     $qtdBanheiro = $request->quantidadeBanheiros;

    //     if ($request->type_property) {
    //         $propQuery->where('type_prop_id', '=', $request->input('type_property'));
    //     }

    //     if ($request->quantidadeQuarto) {
    //         $propQuery->where('bedroom', '=', $request->input('quantidadeQuarto'));
    //     }

    //     if ($request->quantidadeBanheiros) {
    //         $propQuery->where('bathrooms', '=', $request->input('quantidadeBanheiros'));
    //     }

    //     // if ($request->estado) {
    //     //     $propQuery->where('type_prop_id', '=', $request->input('estado'));
    //     // }

    //     $data = $propQuery->paginate(3);
    //     // end filter

    //     return view(
    //         'user.property.lista-imoveis',
    //         [
    //             'tipoImoveis' => $tipoImovel,
    //             'caracteristicas' => $caracteristicas,
    //             'estados' => $estados,
    //             'properties' => $data,
    //             'qtdQuarto' => $qtdQuarto,
    //             'qtdBanheiro' => $qtdBanheiro,
    //             "bread_subcontents" => [
    //                 [
    //                     'title' => "Detalhes Imóvel",
    //                     "target_url" =>  route("user.property.lista-imoveis")
    //                 ],
    //             ]
    //         ]
    //     );
    // }


    public function imoveis_home(Request $request)
    {

        $imoveis = Property::where("available","=",1)->get();


        // filter
        $propQuery = Property::query();

        if ($request->quantidadeQuarto) {
            $propQuery->where('bedroom', '=', $request->input('quantidadeQuarto'));
        }

        $posts = $propQuery->paginate(4);
        // end filter

        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }

        return view(
            'post',
            [
                'posts' => $posts,
                'imoveis' => $imoveis,
            ]
        );

        // return view(
        //     'post', compact('posts')
        // );
    }

    public function imoveis_quarta(Request $request)
    {

        if ($request->quantidadeQuarto) {
            $posts = Property::latest()->get();
            $posts->where('bedroom', '=', $request->input('quantidadeQuarto'));
            $posts = $posts->paginate(3);
        } else {
            $posts = Property::latest()->paginate(3);
        }


        if ($request->ajax()) {

            $view = view('user.home.home4', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }

        $query = $request->all();
        return view(
            'user.home.home4',
            [
                'posts' => $posts,
                'query' => $query
            ]
        );
    }

    public function viewInfiniteScroll()
    {
        $filter = "latest";

        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];
        }

        if ($filter == "latest") {
            $order = "created_at";
            $dir = "DESC";
        } elseif ($filter == "popular") {
            $order = "count";
            $dir = "DESC";
        } elseif ($filter == "oldest") {
            $order = "created_at";
            $dir = "ASC";
        }

        $posts = Property::query()
            ->orderBy($order, $dir)
            ->limit(5)
            ->offset(0)
            ->get();

        return view('user.home.home4', compact('posts'));
    }

    public function getInfiniteScroll(Request $request)
    {
        $filter = "latest";

        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];
        }

        if (isset($request->offset)) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

        if ($filter == "latest") {
            $order = "created_at";
            $dir = "DESC";
        } elseif ($filter == "popular") {
            $order = "count";
            $dir = "DESC";
        } elseif ($filter == "oldest") {
            $order = "created_at";
            $dir = "ASC";
        }

        $posts = Property::query()
            ->orderBy($order, $dir)
            ->limit(5)
            ->offset($offset)
            ->get();

        return $posts;
    }
    // public function lista_imoveis()
    // {
    //     $tipoImovel = TypeProperty::orderBy('name')->get();

    //     return view(
    //         'user.property.lista-imoveis',
    //         [
    //             'tipoImoveis' => $tipoImovel,
    //             'properties' => DB::table('properties')->paginate(3),
    //             "bread_subcontents" => [
    //                 [
    //                     'title' => "Detalhes Imóvel",
    //                     "target_url" =>  route("user.property.lista-imoveis")
    //                 ],
    //             ]
    //         ]
    //     );
    // }

    public function contact()
    {
        return view(
            'user.contact.contact',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.contact.contact")
                    ],
                ]
            ]
        );
    }

    public function about()
    {
        return view(
            'user.about.about',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.about.about")
                    ],
                ]
            ]
        );
    }

    public function erro()
    {
        return view(
            'user.404erro.404erro',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.404erro.404erro")
                    ],
                ]
            ]
        );
    }

    public function paginacaoLaravelAjax()
    {

        // $imoveis = Property::when(request('nome') != null, function($query){
        //     return $query->where('title', 'like', '%'.request('nome').'%');
        // })->paginate(4);

        $query = Property::query();

        // if (request('nome') != null) {
        //     $query->where('title', 'like', '%'.request('nome').'%');
        // }

        // if(request('ordenar') == 'barato'){
        //     $query->orderBy('prop_price', 'asc');
        // }else if(request('ordenar') == 'caro'){
        //     $query->orderBy('prop_price', 'desc');
        // }else if(request('ordenar') == 'recentes'){
        //     $query->orderBy('created_at', 'desc');
        // }

        // if(request('venda') ==  'venda'){
        //     $query->where('category', '=', 'Venda');
        // } 

        if (request('quartos') != null) {

            if (request('quartos') == 1) {
                $query->where('bedroom', '>=', 1);
            } else if (request('quartos') == 2) {
                $query->where('bedroom', '>=', 2);
            } else if (request('quartos') == 3) {
                $query->where('bedroom', '>=', 3);
            } else if (request('quartos') == 4) {
                $query->where('bedroom', '>=', 4);
            } else if (request('quartos') == 5) {
                $query->where('bedroom', '>=', 5);
            }
        }

        if (request('banheiros') != null) {

            if (request('banheiros') == 1) {
                $query->where('bathrooms', '>=', 1);
            } else if (request('banheiros') == 2) {
                $query->where('bathrooms', '>=', 2);
            } else if (request('banheiros') == 3) {
                $query->where('bathrooms', '>=', 3);
            } else if (request('banheiros') == 4) {
                $query->where('bathrooms', '>=', 4);
            } else if (request('banheiros') == 5) {
                $query->where('bathrooms', '>=', 5);
            }
        }

        if (request('vagas') != null) {

            if (request('vagas') == 0) {
                $query->where('garage', '=', 0);
            } else if (request('vagas') == 1) {
                $query->where('garage', '>=', 1);
            } else if (request('vagas') == 2) {
                $query->where('garage', '>=', 2);
            } else if (request('vagas') == 3) {
                $query->where('garage', '>=', 3);
            } else if (request('vagas') == 4) {
                $query->where('garage', '>=', 4);
            }
        }

        if (request('suites') != null) {

            if (request('suites') == 0) {
                $query->where('suites', '=', 0);
            } else if (request('suites') == 1) {
                $query->where('suites', '>=', 1);
            } else if (request('suites') == 2) {
                $query->where('suites', '>=', 2);
            } else if (request('suites') == 3) {
                $query->where('suites', '>=', 3);
            } else if (request('suites') == 4) {
                $query->where('suites', '>=', 4);
            }
        }

        if (request('tipoImovel') != null) {

            if (request('tipoImovel') == 'venda') {
                $query->where('category', '=', 'Venda');
            } else if (request('tipoImovel') == 'aluguel') {
                $query->where('category', '=', 'Aluguel');
            } else if (request('tipoImovel') == 'vendaAluguel') {
                $query->where('category', '=', 'VendaAluguel');
            }
        }

        // if(request('minArea') != null){
        //     print('minArea');
        // }        
        // if(request('maxArea') != null){
        //     print('maxArea');
        // }
        if (request('minArea') != null) {
            $areaMinima = request('minArea');
            $areaMinima = intval($areaMinima);
        }

        if (request('maxArea') != null) {
            $areaMaxima = request('maxArea');
            $areaMaxima = intval($areaMaxima);
        }

        if (request('minArea') != null and request('maxArea') != null) {
            $query->where('prop_size', '>=', $areaMinima)
                ->where('prop_size', '<=', $areaMaxima);
        } else if (request('minArea') != null) {
            $query->where('prop_size', '>=', $areaMinima);
        } else if (request('maxArea') != null) {
            $query->where('prop_size', '<=', $areaMaxima);
        }

        if (request('maxCondominio') != null) {
            $condominioMaximo = request('maxCondominio');
            $condominioMaximo = floatval($condominioMaximo);
        }

        if (request('maxCondominio') != null) {

            $query->where(function ($query) {
                $query->where('condominium', '=', 1)
                    ->orWhere('condominium', '=', 0);
            })->where(function ($query) {
                if (request('maxCondominio') != null) {
                    $condominioMaximo = request('maxCondominio');
                    $condominioMaximo = floatval($condominioMaximo);
                }
                $query->where('condominium_price', '<=', $condominioMaximo)
                    ->orWhere('condominium_price', '=', null);
            });
        }

        $imoveis = $query->paginate(8);

        return view('user.lista.list')->with('properties', $imoveis);
    }

    public function jsonPaginacaoLaravelAjax()
    {
        $ret = null;
        try {
            $query = Property::query();

            if (request('quartos') != null) {

                if (request('quartos') == 1) {
                    $query->where('bedroom', '>=', 1);
                } else if (request('quartos') == 2) {
                    $query->where('bedroom', '>=', 2);
                } else if (request('quartos') == 3) {
                    $query->where('bedroom', '>=', 3);
                } else if (request('quartos') == 4) {
                    $query->where('bedroom', '>=', 4);
                } else if (request('quartos') == 5) {
                    $query->where('bedroom', '>=', 5);
                }
            }

            if (request('banheiros') != null) {

                if (request('banheiros') == 1) {
                    $query->where('bathrooms', '>=', 1);
                } else if (request('banheiros') == 2) {
                    $query->where('bathrooms', '>=', 2);
                } else if (request('banheiros') == 3) {
                    $query->where('bathrooms', '>=', 3);
                } else if (request('banheiros') == 4) {
                    $query->where('bathrooms', '>=', 4);
                } else if (request('banheiros') == 5) {
                    $query->where('bathrooms', '>=', 5);
                }
            }

            if (request('vagas') != null) {

                if (request('vagas') == 0) {
                    $query->where('garage', '=', 0);
                } else if (request('vagas') == 1) {
                    $query->where('garage', '>=', 1);
                } else if (request('vagas') == 2) {
                    $query->where('garage', '>=', 2);
                } else if (request('vagas') == 3) {
                    $query->where('garage', '>=', 3);
                } else if (request('vagas') == 4) {
                    $query->where('garage', '>=', 4);
                }
            }

            if (request('suites') != null) {

                if (request('suites') == 0) {
                    $query->where('suites', '=', 0);
                } else if (request('suites') == 1) {
                    $query->where('suites', '>=', 1);
                } else if (request('suites') == 2) {
                    $query->where('suites', '>=', 2);
                } else if (request('suites') == 3) {
                    $query->where('suites', '>=', 3);
                } else if (request('suites') == 4) {
                    $query->where('suites', '>=', 4);
                }
            }

            if (request('tipoImovel') != null) {

                if (request('tipoImovel') == 'venda') {
                    $query->where('category', '=', 'Venda');
                } else if (request('tipoImovel') == 'aluguel') {
                    $query->where('category', '=', 'Aluguel');
                } else if (request('tipoImovel') == 'vendaAluguel'){
                    $query->where('category', '=', 'VendaAluguel');
                }
            }

            if (request('minArea') != null) {
                $areaMinima = request('minArea');
                $areaMinima = intval($areaMinima);
            }

            if (request('maxArea') != null) {
                $areaMaxima = request('maxArea');
                $areaMaxima = intval($areaMaxima);
            }

            if (request('minArea') != null and request('maxArea') != null) {
                $query->where('prop_size', '>=', $areaMinima)
                    ->where('prop_size', '<=', $areaMaxima);
            } else if (request('minArea') != null) {
                $query->where('prop_size', '>=', $areaMinima);
            } else if (request('maxArea') != null) {
                $query->where('prop_size', '<=', $areaMaxima);
            }

            if (request('maxCondominio') != null) {
                $condominioMaximo = request('maxCondominio');
                $condominioMaximo = floatval($condominioMaximo);
            }

            if (request('maxCondominio') != null) {

                $query->where(function ($query) {
                    $query->where('condominium', '=', 1)
                        ->orWhere('condominium', '=', 0);
                })->where(function ($query) {
                    if (request('maxCondominio') != null) {
                        $condominioMaximo = request('maxCondominio');
                        $condominioMaximo = floatval($condominioMaximo);
                    }
                    $query->where('condominium_price', '<=', $condominioMaximo)
                        ->orWhere('condominium_price', '=', null);
                });
            }

            // $imoveis = $query->paginate(8);
            $imoveis = $query->get();

            $results = [];

            foreach ($imoveis as $key => $property) {
                $photo = PhotosProperty::where([['property_id', '=', $property->id]])->first();
    
                $tipoPropriedade = TypeProperty::where([['id', '=', $property->type_prop_id]])->first();
    
                if ($photo == null)
                    $image = asset('storage/empty-image.svg');
                else
                    $image = asset(str_replace('public', 'storage', $photo->pathname));
    
                if ($property->category == 'Venda')
                    $prop_value = $property->prop_price;
                else
                    $prop_value = $property->prop_rent;
    
                array_push($results, [
                    'lat' => $property->lat,
                    'lng' => $property->lng,
                    'bathrooms' => $property->bathrooms,
                    'bedroom' => $property->bedroom,
                    'prop_size' => $property->prop_size,
                    'street' => $property->street,
                    'number' => $property->number,
                    'district' => $property->district,
                    'garage' => $property->garage,
                    'state' => $property->state,
                    'id' => $property->id,
                    'title' => $property->title,
                    'prop_code' => $property->prop_code,
                    'category' => $property->category,
                    'prop_value' => $prop_value,
                    'available' => $property->available,
                    'city_name' => $property->city_name,
                    'type_property' => $tipoPropriedade->name,
                    'photo' => $image,
                    'prop_price' => $property->prop_price,
                ]);
            }

            Debugbar::info($query->get());

            $ret = [
                'message' => 'Get properties ok',
                'code' => 200,
                'status' => true,
                'properties' => $results
            ];
        } catch (Exception $th) {
            $ret = [
                'message' => $th->getMessage(),
                'code' => 400,
                'status' => false,
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function listaPost()
    {

        $query = Post::query();

        if (request('nome') != null) {
            $query->where('title', 'like', '%' . request('nome') . '%');
        }

        if (request('categoria') != 'todas') {
            $query->where('type_post', '=', request('categoria'));
        }

        if (request('ordenar') == 'novos') {
            $query->orderBy('created_at', 'asc');
        } else if (request('ordenar') == 'antigos') {
            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->paginate(6);

        return view('user.blog.listaPost')->with('posts', $posts);
    }

    public function listAllPropertiesFiltro($imoveis)
    {

        $imoveisRecebidos = $imoveis;

        $results = [];
        foreach ($imoveisRecebidos as $key => $property) {
            $photo = PhotosProperty::where([['property_id', '=', $property->id]])->first();

            $tipoPropriedade = TypeProperty::where([['id', '=', $property->type_prop_id]])->first();

            if ($photo == null)
                $image = asset('storage/empty-image.svg');
            else
                $image = asset(str_replace('public', 'storage', $photo->pathname));

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            array_push($results, [
                'lat' => $property->lat,
                'lng' => $property->lng,
                'bathrooms' => $property->bathrooms,
                'bedroom' => $property->bedroom,
                'prop_size' => $property->prop_size,
                'street' => $property->street,
                'number' => $property->number,
                'district' => $property->district,
                'garage' => $property->garage,
                'state' => $property->state,
                'id' => $property->id,
                'title' => $property->title,
                'prop_code' => $property->prop_code,
                'category' => $property->category,
                'prop_value' => $prop_value,
                'available' => $property->available,
                'city_name' => $property->city_name,
                'type_property' => $tipoPropriedade->name,
                'photo' => $image
            ]);
        }
        return response()->json(['status' => true, 'itens' => $results], 200);
    }

    public function paginacaoInfinitScroll(Request $request)
    {

        $query = Property::query();

        $query->where('available', '=', 1);
        $query->where('available_user', '=', 1);
        // $city = null;

        // Debugbar::info(request('cidade'));

        // if(request('cidade') != null){
        //     $city = City::where([
        //         ['citie','like','%'.request('cidade').'%']
        //         ])->first();
        // }



        // if(request('checkboxCaracteristica') != null){

        //     Debugbar::info(request('checkboxCaracteristica'));

        //     $infosCaracteristicas = PropertyCaracteristicas::where([
        //         ['caracteristicas_id','=',request('checkboxCaracteristica')],
        //         ])->all();

        //     Debugbar::info('tipo caracteristica');
        //     Debugbar::info(count($infosCaracteristicas));
        //     Debugbar::info($infosCaracteristicas[0]);
        //     for($i=0; $i<count($infosCaracteristicas); $i++){
        //         $query->where('id', '=', $infosCaracteristicas->property_id);
        //     }

        // }

        Debugbar::info(request('checkboxCaracteristica'));

        if (request('checkboxCaracteristica') != null) {
            $contador = 0;
            $listIDsProperties = [];

            foreach (request('checkboxCaracteristica') as $key => $value) {
                $infosCaracteristicas = PropertyCaracteristicas::where([
                    ['caracteristicas_id', '=', $value],
                ])->get();
                if ($contador == 0) {
                    foreach ($infosCaracteristicas as $key_propertie => $value_propertie) {

                        array_push($listIDsProperties, $value_propertie->property_id);
                    }
                    $contador++;
                } else {

                    $novaList = [];

                    foreach ($listIDsProperties as $key_list => $value_list) {
                        foreach ($infosCaracteristicas as $key_caract => $value_caract) {
                            if ($value_list == $value_caract->property_id) {
                                array_push($novaList, $value_caract->property_id);
                            }
                        }
                    }

                    $listIDsProperties = $novaList;
                }
            }


            Debugbar::info($listIDsProperties);

            $query->whereIn('id', $listIDsProperties);
            // Debugbar::info(request('checkboxCaracteristica'));
            // Debugbar::info('tipo caracteristica');
            // Debugbar::info($infosCaracteristicas);
        }

        if (request('tipoImoveis') != null) {

            $listIDsTipos = [];

            foreach (request('tipoImoveis') as $key => $value) {
                array_push($listIDsTipos, $value);
            }

            // Debugbar::info($listIDsTipos);

            $query->whereIn('type_prop_id', $listIDsTipos);
        }



        if (request('estado') != null) {
            $query->where('state_name', 'like', '%' . request('estado') . '%');
        }

        // if(request('rua') != null){
        //     $query->where('street', 'like', '%'.request('rua').'%');
        // }

        if (request('bairro') != null) {
            $query->where('district', 'like', '%' . request('bairro') . '%');
        }

        if (request('cidade') != null) {

            $query->where('city_name', 'like', '%' . request('cidade') . '%');
        }

        if (request('rua') != null) {
            $query->where('street', 'like', '%' . request('rua') . '%');
        }


        if (request('ordenar') == 'menorPreco') {
            $query->orderBy('price', 'asc');
        } else if (request('ordenar') == 'maiorPreco') {
            $query->orderBy('price', 'desc');
        } else if (request('ordenar') == 'menorM2') {
            $query->orderBy('prop_size', 'asc');
        } else if (request('ordenar') == 'maiorM2') {
            $query->orderBy('prop_size', 'desc');
        } else if (request('ordenar') == 'carrosselApartamento') {
            $query->where('type_prop_id', '=', 1);
        } else if (request('ordenar') == 'carrosselCasa') {
            $query->where('type_prop_id', '=', 2);
        }

        if (request('quartos') != null) {

            if (request('quartos') == 1) {
                $query->where('bedroom', '>=', 1);
            } else if (request('quartos') == 2) {
                $query->where('bedroom', '>=', 2);
            } else if (request('quartos') == 3) {
                $query->where('bedroom', '>=', 3);
            } else if (request('quartos') == 4) {
                $query->where('bedroom', '>=', 4);
            } else if (request('quartos') == 5) {
                $query->where('bedroom', '>=', 5);
            }
        }

        if (request('banheiros') != null) {

            if (request('banheiros') == 1) {
                $query->where('bathrooms', '>=', 1);
            } else if (request('banheiros') == 2) {
                $query->where('bathrooms', '>=', 2);
            } else if (request('banheiros') == 3) {
                $query->where('bathrooms', '>=', 3);
            } else if (request('banheiros') == 4) {
                $query->where('bathrooms', '>=', 4);
            } else if (request('banheiros') == 5) {
                $query->where('bathrooms', '>=', 5);
            }
        }

        if (request('vagas') != null) {

            if (request('vagas') == 0) {
                $query->where('garage', '=', 0);
            } else if (request('vagas') == 1) {
                $query->where('garage', '>=', 1);
            } else if (request('vagas') == 2) {
                $query->where('garage', '>=', 2);
            } else if (request('vagas') == 3) {
                $query->where('garage', '>=', 3);
            } else if (request('vagas') == 4) {
                $query->where('garage', '>=', 4);
            }
        }

        if (request('suites') != null) {

            if (request('suites') == 0) {
                $query->where('suites', '=', 0);
            } else if (request('suites') == 1) {
                $query->where('suites', '>=', 1);
            } else if (request('suites') == 2) {
                $query->where('suites', '>=', 2);
            } else if (request('suites') == 3) {
                $query->where('suites', '>=', 3);
            } else if (request('suites') == 4) {
                $query->where('suites', '>=', 4);
            }
        }

        if (request('tipoImovel') != null) {

            if (request('tipoImovel') == 'venda') {
                $query->where('category', '=', 'Venda');
            } else if (request('tipoImovel') == 'aluguel') {
                $query->where('category', '=', 'Aluguel');
            } else if (request('tipoImovel') == 'vendaAluguel') {
                $query->where('category', '=', 'VendaAluguel');
            }
        }

        if (request('minArea') != null) {
            $areaMinima = request('minArea');
            $areaMinima = intval($areaMinima);
        }

        if (request('maxArea') != null) {
            $areaMaxima = request('maxArea');
            $areaMaxima = intval($areaMaxima);
        }

        if (request('minArea') != null and request('maxArea') != null) {
            $query->where('prop_size', '>=', $areaMinima)
                ->where('prop_size', '<=', $areaMaxima);
        } else if (request('minArea') != null) {
            $query->where('prop_size', '>=', $areaMinima);
        } else if (request('maxArea') != null) {
            $query->where('prop_size', '<=', $areaMaxima);
        }

        if (request('maxPreco') != null) {
            $requestMaxPreco = request('maxPreco');
            $formatadoMaxPreco = str_replace(array('.'), '', $requestMaxPreco);
            $formatadoMaxPreco = str_replace(array(','), '.', $formatadoMaxPreco);
            $maxPrecoConvertido = floatval($formatadoMaxPreco);
            // Debugbar::info('preço formatado');
            // Debugbar::info($maxPrecoConvertido);

        }

        if (request('minPreco') != null) {
            $requestMinPreco = request('minPreco');
            $formatadoMinPreco = str_replace(array('.'), '', $requestMinPreco);
            $formatadoMinPreco = str_replace(array(','), '.', $formatadoMinPreco);
            $minPrecoConvertido = floatval($formatadoMinPreco);
            // Debugbar::info('preço formatado');
            // Debugbar::info($maxPrecoConvertido);
        }

        if (request('minPreco') != null and request('maxPreco') != null) {
            $query->where('price', '>=', $minPrecoConvertido)
                ->where('price', '<=', $maxPrecoConvertido);
        } else if (request('minPreco') != null) {
            $query->where('price', '>=', $minPrecoConvertido);
        } else if (request('maxPreco') != null) {
            $query->where('price', '<=', $maxPrecoConvertido);
        }

        if (request('maxCondominio') != null) {
            $condominioMaximo = request('maxCondominio');
            $condominioMaximo = str_replace(array('.'), '', $condominioMaximo);
            $condominioMaximo = str_replace(array(','), '.', $condominioMaximo);
            $condominioMaximo = floatval($condominioMaximo);
        }

        if (request('maxCondominio') != null) {

            $query->where(function ($query) {
                $query->where('condominium', '=', 1)
                    ->orWhere('condominium', '=', 0);
            })->where(function ($query) {
                if (request('maxCondominio') != null) {
                    $condominioMaximo = request('maxCondominio');
                    $condominioMaximo = str_replace(array('.'), '', $condominioMaximo);
                    $condominioMaximo = str_replace(array(','), '.', $condominioMaximo);
                    $condominioMaximo = floatval($condominioMaximo);
                }
                $query->where('condominium_price', '<=', $condominioMaximo)
                    ->orWhere('condominium_price', '=', null);
            });
        }

        $imoveis = $query->paginate(8);

        return view('contInfinito')->with('properties', $imoveis);
    }

    public function getImoveisSemelhantes($imovel)
    {
        $queryImoveis = Property::where('type_prop_id', '=', $imovel->type_prop_id)
            ->where('id', '!=', $imovel->id)
            ->where('category', '=', $imovel->category)
            ->limit(12)
            ->get();

        return $queryImoveis;
    }

    public function todosImoveis()
    {
        $imoveis = Property::where("available","=",1)->get();

        return view(
            'home5',
            [
                'imoveis' => $imoveis,
            ]
        );
    }

    public function formatarPrecoImovel($preco)
    {
        $valorFormatado = number_format($preco, 2, ',', '.');

        return $valorFormatado;
    }

    public function formatarPrecoEntrada($preco)
    {
        $precoAjustado = $preco * 0.55;

        $valorFormatado = number_format($precoAjustado, 2, ',', '.');

        return $valorFormatado;
    }

    public function buscarDescricaoGeral()
    {
        $configuracoes = Configurations::all();

        return $configuracoes;
    }

    public static function getDadosCondominio($condom_id)
    {
        $imgs = Condominio::where('id', '=', $condom_id)->get();

        return $imgs;
    }


    public static function getCaracteristicasCondominio($condom_id)
    {
        $condominio = Condominio::where('id', '=', $condom_id)->first();
        $result = $condominio->getCaracteristicas()->get();
        return $result;
    }

    public static function getImagesCondominio($cond_id)
    {
        $imgs = PhotosCondominio::where('condominio_id', '=', $cond_id)->get();

        return $imgs;
    }
}
