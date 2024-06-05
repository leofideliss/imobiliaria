<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caracteristicas;
use App\Models\Cargos;
use App\Models\City;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\TypeProperty;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{

    // BEGIN CITIES 
    public function city()
    {
        return view(
            'admin.register.city.cities',
            [
                "bread_title" => "Cidades",
                "bread_subcontents" => [
                    [
                        'title' => "Cidades",
                        "target_url" =>  route("admin.register.city.cities")
                    ],
                ]
            ]
        );
    }

    public function addCity(Request $request)
    {
        $validated = $this->validate($request, [
            'state' => 'required|max:255',
            'citie' => 'required|max:255',
        ]);

        if ($validated) {
            if ($request->allCities != null) {
                foreach ($request->allCities as $key => $value) {
                    $findCitie = City::where([
                        ['state', '=', $request->state],
                        ['citie', '=', $value]
                    ])->first();
                    if (!$findCitie) {
                        City::create(
                            ['state' => $request->state, 'citie' => $value]
                        );
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => "Todas as cidades cadastradas",
                ], 200);
            } else {
                $findCitie = City::where([
                    ['state', '=', $request->state],
                    ['citie', '=', $request->citie],
                ])->first();

                if ($findCitie) {
                    return response()->json([
                        'success' => true,
                        'message' => "Cidade já foi cadastrada",
                    ], 200);
                } else {
                    $city = City::create($request->all());
                    return response()->json([
                        'success' => true,
                        'message' => "Cidade criada com sucesso",
                    ], 200);
                }
            }
        } else
            return response()->json([
                'success' => false,
                'message' => "Erro ao Criar cidade",
            ], 400);
    }

    public function listCitiesJson()
    {

        $cities = City::orderBy('citie', 'ASC')->get();

        $results = [];
        foreach ($cities as $key => $city) {
            array_push($results, [
                'id' => $city->id,
                'state' => $city->state,
                'citie' => $city->citie,
            ]);
        }

        return DataTables::of($results)->make();
    }

    public function deleteCity($id)
    {
        $city = City::where([['id', "=", $id]])->first();
        $city->delete();
        if ($city != null)
            return response()->json([
                'success' => true,
                'message' => 'Cidade Deletada!',
                'city' => $city
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Cidade não encontrada!'
            ], 400);
    }

    public function getCitieByName(Request $request)
    {
        $city = City::where([['citie', "=", $request->citie]])->first();
        if ($city != null)
            return response()->json([
                'success' => true,
                'message' => 'Cidade encontrada!',
                'city' => $city
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Cidade não encontrada!'
            ], 400);
    }

    public function getCitieById($id)
    {
        $city = City::where([['id', "=", $id]])->first();
        return $city;
    }

    // END CITIES 

    // BEGIN PROPERTY 

    public function property()
    {
        return view(
            'admin.register.property-type.property',
            [
                "bread_title" => "Tipo de Propriedade",
                "bread_subcontents" => [
                    [
                        'title' => "Defina todos os tipos de propriedades",
                        "target_url" =>  route("admin.register.property-type.property")
                    ],
                ]
            ]
        );
    }

    public function addTypeProperty(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if ($validated) {
            $type = TypeProperty::where([['name', '=', $request->name]])->first();
            if ($type) {
                return response()->json([
                    'success' => true,
                    'message' => "Tipo já cadastrado",
                ], 200);
            } else {
                $property = TypeProperty::create($request->all());
                return response()->json([
                    'success' => true,
                    'message' => "Tipo criado com sucesso",
                ], 200);
            }
        } else
            return response()->json([
                'success' => false,
                'message' => "Erro ao Criar Tipo",
            ], 400);
    }

    public function listTypeProperty()
    {

        $properties = TypeProperty::orderBy('name', 'DESC')->get();

        $results = [];
        foreach ($properties as $key => $property) {
            array_push($results, [
                'id' => $property->id,
                'name' => $property->name,
            ]);
        }
        return DataTables::of($results)->make();
    }

    public function deleteProperty($id)
    {
        $property = TypeProperty::where([['id', "=", $id]])->first();
        $property->delete();
        if ($property != null)
            return response()->json([
                'success' => true,
                'message' => 'Propriedade Deletada!',
                'property' => $property
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Propriedade não encontrada!'
            ], 400);
    }

    // END PROPERTY

    // BEGIN CARACTERISTICAS 


    public function caracteristicas()
    {
        return view(
            'admin.register.caracteristicas_imovel.caracteristicas_imovel',
            [
                "bread_title" => "Características do Imóvel",
                "bread_subcontents" => [
                    [
                        'title' => "Defina as características do Imóvel",
                        "target_url" =>  route("admin.register.caracteristicas_imovel.caracteristicas_imovel")
                    ],
                ]
            ]
        );
    }

    public function addCaracteristica(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if ($validated) {

            $exists = Caracteristicas::where([['name', '=', $request->name]])->first();
            if ($exists) {
                return response()->json([
                    'success' => true,
                    'message' => "Caracteristica já existe",
                ], 200);
            } else {
                $caract = Caracteristicas::create($request->all());
                return response()->json([
                    'success' => true,
                    'message' => "Caracteristica criada com sucesso",
                ], 200);
            }
        } else
            return response()->json([
                'success' => false,
                'message' => "Erro ao Criar Caracteristica",
            ], 400);
    }

    public function listCaracteristicasJson()
    {

        $caracteristicas = Caracteristicas::orderBy('name', 'ASC')->get();

        $results = [];
        foreach ($caracteristicas as $key => $caracter) {
            array_push($results, [
                'id' => $caracter->id,
                'name' => $caracter->name,
            ]);
        }
        return DataTables::of($results)->make();
    }


    public function deleteCaracteristica($id)
    {
        $caract = Caracteristicas::where([['id', "=", $id]])->first();
        $caract->delete();
        if ($caract != null)
            return response()->json([
                'success' => true,
                'message' => 'Caracteristica Deletada!',
                'caract' => $caract
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Caracteristica não encontrada!'
            ], 400);
    }
    // END CARACTERISTICAS 

    public function tiposUsuarios()
    {
        return view(
            'admin.register.user-type.tipos-usuarios',
            [
                "bread_title" => "Cargos Usuários no Sistema Admin",
                "bread_subcontents" => [
                    [
                        'title' => "Defina os Cargos para os usuários no sistema admin",
                        "target_url" =>  route("admin.register.user-type.tipos-usuarios")
                    ],
                ]
            ]
        );
    }

    public function addUserType(Request $request)
    {
        $ret = null;
        try {
            $validated = $request->validate([
                'name' => 'required|max:255',
            ]);
            if (!$validated)
                throw new \Exception("Dados inválidos");

            $exists = Cargos::where([['name', '=', $request->name]])->first();
            if ($exists) {
                $ret = [
                    'status' => true,
                    'message' => 'Cargo já existe!',
                    'code' => 200
                ];
            } else {
                $cargos = Cargos::create(['name' => $request->name]);


                $ret = [
                    'status' => true,
                    'message' => 'Cargo adicionado com sucesso!',
                    'code' => 200,
                    'cargo' => $cargos
                ];
            }
        } catch (Exception $e) {
            $ret = [
                'status' => false,
                'message' => $e->getMessage(),
                'code' => 400,
            ];
        }
        return response()->json($ret, $ret['code']);
    }


    public function listCargosJson()
    {

        $cargos = Cargos::orderBy('name', 'ASC')->get();

        $results = [];
        foreach ($cargos as $key => $cargo) {
            array_push($results, [
                'id' => $cargo->id,
                'name' => $cargo->name,
            ]);
        }
        return DataTables::of($results)->make();
    }

    public function listCargos()
    {
        $ret = null;
        try {
            $cargos = Cargos::orderBy('name', 'ASC')->get();
            if (!$cargos)
                throw new \Exception('nenhum cargo encontrado');

            $ret = [
                'status' => true,
                'message' => 'list cargos',
                'code' => 200,
                'cargos' => $cargos
            ];
        } catch (Exception $th) {
            $ret = [
                'status' => false,
                'message' => $th->getMessage(),
                'code' => 400
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function deleteCargos($id)
    {
        $cargo = Cargos::where([['id', "=", $id]])->first();
        $cargo->delete();
        if ($cargo != null)
            return response()->json([
                'success' => true,
                'message' => 'Cargo Deletada!',
                'caract' => $cargo
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Cargo não encontrada!'
            ], 400);
    }

    public function addTipos_imoveis(Request $request)
    {
    }



}
