<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Post;
use App\Models\Property;
use App\Models\PropertyCaracteristicas;
use App\Models\TypePost;
use DebugBar\DebugBar;
use Exception;
use Auth;
use Illuminate\Http\Request;

class ListaPaginacaoController extends Controller
{

    public function listaPaginacao()
    {
        return view(
            'user.imoveisPaginacao.imovelPaginacao',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.imoveisPaginacao.imovelPaginacao")
                    ],
                ]
            ]
        );
    }

    public function listaPost()
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
            $query->where('type_prop_id', '=', 2);
        } else if (request('ordenar') == 'carrosselCasa') {
            $query->where('type_prop_id', '=', 1);
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

        $imoveis = $query->paginate(24);

        return view('user.imoveisPaginacao.postImovelPaginacao')->with('properties', $imoveis);
    }



}





