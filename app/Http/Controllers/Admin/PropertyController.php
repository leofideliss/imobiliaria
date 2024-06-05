<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\RunXMLProperties;
use App\Models\Caracteristicas;
use App\Models\City;
use App\Models\Condominio;
use App\Models\Configurations;
use App\Models\Customer;
use App\Models\FileXML;
use App\Models\FileXMLProperties;
use App\Models\NearbyPlaces;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\PropertyCaracteristicas;
use App\Models\PropertyFilesPDF;
use App\Models\TypeProperty;
use App\Models\User;
use App\Models\VideoProperty;
use Illuminate\Http\Request;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Exception;
use DataTables;
use Image;
use Illuminate\Support\Str;


use Faker\Provider\ar_JO\Address;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000, 99999);
        } while (Property::where("prop_code", "=", $code)->first());

        return $code;
    }
    public function index()
    {
        return view(
            'admin.property.add-property',
            [
                "bread_title" => "Cadastrar Imóvel",
                "bread_subcontents" => [
                    [
                        'title' => "Insira dados sobre o imóvel",
                        "target_url" =>  route("admin.property.index")
                    ],

                ]
            ]
        );
    }

    public function resumo_propriedade($id)
    {

        $prop =  Property::find($id);

        $type = TypeProperty::where([['id', '=', $prop->type_prop_id]])->first();

        if (!$type)
            throw new \Exception("Tipo não encontrada!");

        $images = PhotosProperty::where([['property_id', '=', $prop->id]])->get();

        if (!$images)
            throw new \Exception("Images não encontrada!");

        return view(
            'admin.property.resumo-property',
            [
                "propertie" => $prop,
                'type' => $type,
                'images' => $images,
                "bread_title" => "Resumo das Informações do Imóvel",
                "bread_subcontents" => [
                    [
                        'title' => "Veja os dados do imóvel",
                        "target_url" =>  route("admin.property.resumo-property", $id)
                    ],

                ]
            ]
        );
    }

    public function list()
    {
        return view(
            'admin.property.property',
            [
                "bread_title" => "Todos Imóveis Cadastrados",
                "bread_subcontents" => [
                    [
                        'title' => "Lista todos os imóveis cadastrados",
                        "target_url" =>  route("admin.property.property")
                    ],

                ]
            ]
        );
    }

    public function listAdmin()
    {
        return view(
            'admin.property.propertyAdmin',
            [
                "bread_title" => "Imóveis Administrador",
                "bread_subcontents" => [
                    [
                        'title' => "Lista todos os imóveis dos administradores cadastrados",
                        "target_url" =>  route("admin.property.propertyAdmin")
                    ],

                ]
            ]
        );
    }

    public function gamificacao()
    {
        return view(
            'admin.dashboard.gamificacao',
            [
                "bread_title" => "Gamificação",
                "bread_subcontents" => [
                    [
                        'title' => "Confira os pontos dos imóveis",
                        "target_url" =>  route("admin.dashboard.gamificacao")
                    ],

                ]
            ]
        );
    }

    public function listCustomers()
    {
        return view(
            'admin.property.propertyCustomers',
            [
                "bread_title" => "Pendentes de Aprovação",
                "bread_subcontents" => [
                    [
                        'title' => "Lista com todos imóveis EXTERNO que estão aguardando aprovação do ADMIN.",
                        "target_url" =>  route("admin.property.customers")
                    ],
                ]
            ]
        );
    }

    public function getProperty($id)
    {
        $ret = null;
        try {
            $propertie = Property::where([['id', '=', $id]])->first();
            if (!$propertie)
                throw new \Exception("Propriedade não encontrada!");

            $ret = [
                'message' => "Imóvel encontrado",
                'sucess' => true,
                'propertie' => $propertie,
                'code' => 200
            ];
        } catch (Exception $th) {
            $ret = [
                'message' => $th->getMessage(),
                'sucess' => false,
                'propertie' => $propertie,
                'code' => 400
            ];
        }
        return response()->json($ret, $ret['code']);
    }
    // insert properties
    public function addProperty(Request $request)
    {
        $data = json_decode($request->data);
        $user = Auth::guard('admin')->user();
        // return response()->json(['data' => $request->citie_id ], 200);

        $ret = null;
        try {
            if ($data == null)
                throw new Exception('Dados inválidos');

            if (strtotime($data->dateFimObra) < strtotime($data->dateInicioObra))
                throw new Exception('A data de fim da obra não pode ser menor que o inicio da obra');


            $formated = [
                'suites' => $data->suites ? $data->suites : 0,
                'url_video' => $data->url_video,
                'CEP' => $data->CEP,
                'bathrooms' => $data->bathrooms ? $data->bathrooms : 0,
                'bedroom' => $data->bedroom ? $data->bedroom : 0,
                'category' => $data->category,
                'complement' => $data->complement ? $data->complement : null,
                'condominium' => $data->condominium,
                'condominium_price' => $data->condominium == "0" ? null : $data->condominium_price,
                'description' => $request->description_html,
                'district' => $data->district,
                'garage' => $data->garage ? $data->garage : 0,
                'iptu_price' => $data->iptu_price ? $data->iptu_price  : 0,
                'number' => $data->number,
                'prop_price' => $data->prop_price ? $data->prop_price : 0,
                'prop_rent' => $data->prop_rent ? $data->prop_rent : 0,
                'price' => $data->prop_rent ? $data->prop_rent : $data->prop_price,
                'prop_size' => $data->prop_size,
                'state' => $data->state,
                'street' => $data->street,
                'cpf_vendor' => isset($data->cpf_vendor) ? $data->cpf_vendor : null,
                'name_vendor' => $data->name_vendor,
                'phone_vendor' => $data->phone_vendor,
                'email_vendor' => $data->email_vendor,
                'type_prop_id' => $data->type_prop_id,
                'city_id' => $request->citie_id,
                'city_name' =>  $data->city_id,
                'user_code' => $user->id,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'formated_address' => $request->formated_address,
                'place_id' => $request->place_id,
                'id_youtube' => $request->id_youtube,
                'state_name' => $request->state_name,
                'condominio_id' => $request->condominio_id,
                'corretagem' => $data->honorario_corretagem,
                'available' => 1,
                "finalidade" => $data->finalidadeUtilizacao,
                "status_imovel" => $data->statusImovel,
                "inicioObra" => $data->dateInicioObra ? $data->dateInicioObra : null,
                "fimObra" => $data->dateFimObra ? $data->dateFimObra : null,
                "tempoConstrução" => $data->tempoConstrucao,
                "notaComodidade" => $request->notaComodidade,
                "notaFotos" => $request->notaFotos,
                "notaDescricao" => $request->notaDescricao,
                "notaVideo" => $request->notaVideo,
                "proprietario" => $request->name_vendor,
                "exclusividade" => $data->opcaoExclusividade

            ];


            // EDIT PROPERTY
            if (isset($data->propertie_id)) {
                $prop = Property::find($data->propertie_id);
                if ($prop == null)
                    throw new Exception('Imóvel não encontrado');

                Property::where('id', '=', $data->propertie_id)->update($formated);

                //delete old selection
                PropertyCaracteristicas::where('property_id', '=', $prop->id)->delete();
                //add again
                if (isset($data->list_caract)) {
                    if (is_array($data->list_caract)) {
                        foreach ($data->list_caract as $key => $value) {
                            $insertProp = [
                                'property_id' => $prop->id,
                                'caracteristicas_id' => $value
                            ];
                            PropertyCaracteristicas::insert($insertProp);
                        }
                    } else {
                        $insertProp = [
                            'property_id' => $prop->id,
                            'caracteristicas_id' => $data->list_caract
                        ];
                        PropertyCaracteristicas::insert($insertProp);
                    }
                }



                $ret = [
                    'status' => true,
                    'message' => "Imovel atualizado com sucesso",
                    'code' => 200,
                    'prop_code' => $prop->prop_code,
                    'prop_id' => $prop->id
                ];
            }
            // ADD PROPERTY
            else {
                $formated['prop_code'] =  $this->generateUniqueCode();

                $property = Property::create($formated);
                if ($property == null)
                    throw new Exception('Erro ao criar Imóvel');

                $prop_id = $property->id;

                // CREATE PROP_CODE
                $type = TypeProperty::find($property->type_prop_id);
                if ($type == null)
                    throw new Exception('Tipo não encontrado');
                $nova_string = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $type->name);
                $pro_code = $nova_string[0] . $nova_string[1] . $nova_string[2];
                $pro_code = strtoupper($pro_code);
                $pro_code .= $property->prop_code;

                $title = $type->name . " em " . $formated['city_name'] . " (" . $formated['prop_size'] . " m²)";
                Property::where([['id', '=', $property->id]])->update(['prop_code' => $pro_code, 'title' => $title]);

                if (isset($data->list_caract)) {
                    if (is_array($data->list_caract)) {
                        foreach ($data->list_caract as $key => $value) {
                            $insertProp = [
                                'property_id' => $prop_id,
                                'caracteristicas_id' => $value
                            ];
                            PropertyCaracteristicas::insert($insertProp);
                        }
                    } else {
                        $insertProp = [
                            'property_id' => $prop_id,
                            'caracteristicas_id' => $data->list_caract
                        ];
                        PropertyCaracteristicas::insert($insertProp);
                    }
                }

                $ret = [
                    'status' => true,
                    'message' => "Imovel inserido com sucesso",
                    'code' => 200,
                    'prop_code' => $pro_code,
                    'prop_id' => $prop_id
                ];
            }
        } catch (Exception $e) {
            $ret = [
                'status' => false,
                'message' => $e->getMessage(),
                'code' => 400
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function generateMapJson()
    {
        Property::generateJsonMap();
        return response()->json(['success' => true], 200);
    }

    public function listPropertiesJson()
    {

        $user = Auth::guard('admin')->user();
        $properties = null;

        if ($user->type == 'master')
            $properties = Property::where([
                ["available", "=", 1],
                ["available_user", "=", 1]
            ])->get();
        else
            $properties = Property::where([
                ['user_code', '=', $user->id],
                ["available", "=", 1],
                ["available_user", "=", 1]
            ])->get();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photo = PhotosProperty::where([['property_id', '=', $property->id]])->orderBy('created_at', 'ASC')->first();

            if ($photo == null)
                $image = asset('storage/empty-image.svg');
            else
                $image = asset(str_replace('public', 'storage', $photo->pathname));

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            if ($property->category == 'Venda')
                $prop_categoria = 'Venda';
            else if ($property->category == 'Aluguel')
                $prop_categoria = 'Aluguel';
            else if ($property->category == 'VendaAluguel')
                $prop_categoria = 'Venda e Aluguel';

            $preco_m2 = $prop_value / $property->prop_size;

            $type = TypeProperty::find($property->type_prop_id);

            if ($property->customer_code == null)
                $userBuscado = User::find($property->user_code);
            else
                $userBuscado = Customer::find($property->customer_code);


            if ($property->condominium == 0) {
                // Criar o array com os parâmetros desejados
                $propertyArray = [
                    'categoria' => $prop_categoria,
                    'area' => $property->prop_size,
                    'title' => $property->title,
                    'dataCriacao' => $property->created_at,
                    'endereco' => $property->street . ', ' . $property->number . ' - ' . $property->city_name . '/' . $property->state_name,
                    'code' => $property->prop_code,
                    'possuiCond' => 0,
                    'price' => $prop_value,
                    'precom2' => $preco_m2,
                    'dormitorios' => $property->bedroom,
                    'banheiros' => $property->bathrooms,
                    'vagas' => $property->garage,
                    'user_name' => $userBuscado->name,
                ];
            } else {
                // Criar o array com os parâmetros desejados
                $propertyArray = [
                    'categoria' => $prop_categoria,
                    'area' => $property->prop_size,
                    'title' => $property->title,
                    'dataCriacao' => $property->created_at,
                    'endereco' => $property->street . ', ' . $property->number . ' - ' . $property->city_name . '/' . $property->state_name,
                    'code' => $property->prop_code,
                    'possuiCond' => 1,
                    'condominium' => $property->prop_code,
                    'price' => $prop_value,
                    'precom2' => $preco_m2,
                    'precoCond' => $property->condominium_price,
                    // 'nomeCondominio' => 
                    'dormitorios' => $property->bedroom,
                    'banheiros' => $property->bathrooms,
                    'vagas' => $property->garage,
                    'user_name' => $userBuscado->name,
                ];
            }


            array_push($results, [
                'id' => $property->id,
                'propriedadesArray' => $propertyArray,
                // 'formated_address' => $property->street . ' - ' . $property->city_name . '/' . $property->state_name,
                'prop_code' => $property->prop_code,
                'category_prop' => $property->category,
                'prop_value' => $prop_value,
                'available' => $property->available,
                'photo' => $image,
                'type' => $type->name,
                'category' => $type->category,
                'is_from_xml' => $property->is_from_xml
            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }

    public function listPropertiesJsonGame()
    {

        $user = Auth::guard('admin')->user();
        $properties = null;

        if ($user->type == 'master')
            $properties = Property::where([
                ["available", "=", 1],
                ["available_user", "=", 1]
            ])->get();
        else
            $properties = Property::where([
                ['user_code', '=', $user->id],
                ["available", "=", 1],
                ["available_user", "=", 1]
            ])->get();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photo = PhotosProperty::where([['property_id', '=', $property->id]])->orderBy('created_at', 'ASC')->first();

            if ($photo == null)
                $image = asset('storage/empty-image.svg');
            else
                $image = asset(str_replace('public', 'storage', $photo->pathname));

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            if ($property->category == 'Venda')
                $prop_categoria = 'Venda';
            else if ($property->category == 'Aluguel')
                $prop_categoria = 'Aluguel';
            else if ($property->category == 'VendaAluguel')
                $prop_categoria = 'Venda e Aluguel';

            $preco_m2 = $prop_value / $property->prop_size;

            $type = TypeProperty::find($property->type_prop_id);

            if ($property->user_code == null)
                $userBuscado = Customer::find($property->customer_code);
            else
                $userBuscado = User::find($property->user_code);

            if ($property->condominium == 0) {
                // Criar o array com os parâmetros desejados
                $propertyArray = [
                    'categoria' => $prop_categoria,
                    'area' => $property->prop_size,
                    'notaComodidade' => $property->notaComodidade,
                    'notaFotos' => $property->notaFotos,
                    'notaDescricao' => $property->notaDescricao,
                    'notaVideo' => $property->notaVideo,
                    'dataCriacao' => $property->created_at,
                    'title' => $property->title,
                    'endereco' => $property->street . ', ' . $property->number . ' - ' . $property->city_name . '/' . $property->state_name,
                    'code' => $property->prop_code,
                    'possuiCond' => 0,
                    'price' => $prop_value,
                    'precom2' => $preco_m2,
                    'dormitorios' => $property->bedroom,
                    'banheiros' => $property->bathrooms,
                    'vagas' => $property->garage,
                    'user_name' => $userBuscado->name,
                ];
            } else {
                // Criar o array com os parâmetros desejados
                $propertyArray = [
                    'categoria' => $prop_categoria,
                    'area' => $property->prop_size,
                    'notaComodidade' => $property->notaComodidade,
                    'notaFotos' => $property->notaFotos,
                    'notaDescricao' => $property->notaDescricao,
                    'notaVideo' => $property->notaVideo,
                    'dataCriacao' => $property->created_at,
                    'title' => $property->title,
                    'endereco' => $property->street . ', ' . $property->number . ' - ' . $property->city_name . '/' . $property->state_name,
                    'code' => $property->prop_code,
                    'possuiCond' => 1,
                    'condominium' => $property->prop_code,
                    'price' => $prop_value,
                    'precom2' => $preco_m2,
                    'precoCond' => $property->condominium_price,
                    // 'nomeCondominio' => 
                    'dormitorios' => $property->bedroom,
                    'banheiros' => $property->bathrooms,
                    'vagas' => $property->garage,
                    'user_name' => $userBuscado->name,
                ];
            }


            array_push($results, [
                'id' => $property->id,
                'propriedadesArray' => $propertyArray,
                // 'formated_address' => $property->street . ' - ' . $property->city_name . '/' . $property->state_name,
                'prop_code' => $property->prop_code,
                'category_prop' => $property->category,
                'prop_value' => $prop_value,
                'available' => $property->available,
                'photo' => $image,
                'type' => $type->name,
                'category' => $type->category,
                'is_from_xml' => $property->is_from_xml
            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }

    public function listPropertiesJsonCustomers()
    {
        $properties = Property::where([['customer_code', '<>', null]])->get();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photo = PhotosProperty::where([['property_id', '=', $property->id]])->orderBy('created_at', 'ASC')->first();

            if ($photo == null)
                $image = asset('storage/empty-image.svg');
            else
                $image = asset(str_replace('public', 'storage', $photo->pathname));

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            array_push($results, [
                'id' => $property->id,
                'formated_address' => $property->street . ' - ' . $property->city_name . '/' . $property->state_name,
                'prop_code' => $property->prop_code,
                'category' => $property->category,
                'prop_value' => $prop_value,
                'available' => $property->available,
                'photo' => $image
            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }

    public function listPropertiesJsonAdmin()
    {
        $user = Auth::guard('admin')->user();
        $properties = null;

        $properties = Property::where([['user_code', '=', $user->id]])->get();
        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photo = PhotosProperty::where([['property_id', '=', $property->id]])->orderBy('created_at', 'ASC')->first();

            if ($photo == null)
                $image = asset('storage/empty-image.svg');
            else
                $image = asset(str_replace('public', 'storage', $photo->pathname));

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            array_push($results, [
                'id' => $property->id,
                'formated_address' => $property->street . ' - ' . $property->city_name . '/' . $property->state_name,
                'prop_code' => $property->prop_code,
                'category' => $property->category,
                'prop_value' => $prop_value,
                'available' => $property->available,
                'photo' => $image
            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }

    public function listAllProperties()
    {

        // $properties = Property::all();

        // $properties = Property::where([['available', '=', 1]])->get();
        // $properties = Property::where([['available_user', '=', 1]])->get();

        $properties = Property::where('available', 1)
            ->where('available_user', 1)
            ->get();

        $results = [];
        foreach ($properties as $key => $property) {
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
                'prop_price' => $property->prop_price,
                'prop_rent' => $property->prop_rent,
                'prop_value' => $prop_value,
                'available' => $property->available,
                'city_name' => $property->city_name,
                'type_property' => $tipoPropriedade->name,
                'photo' => $image
            ]);
        }
        return response()->json(['status' => true, 'itens' => $results], 200);
    }

    public function listProperties()
    {
        $user = Auth::guard('admin')->user();
        $properties = null;
        if ($user->type == 'master')
            $properties = Property::all();
        else
            $properties = Property::where([['user_code', '=', $user->id]])->get();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photos = PhotosProperty::where([['property_id', '=', $property->id]])->get();

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            array_push($results, [
                'propertie' => $properties,
                'photos' => $photos
            ]);
        }

        return view('admin.property.teste', ['properties' => $results]);
    }

    public function listPropertiesViewJson()
    {
        $user = Auth::guard('admin')->user();
        $properties = null;
        if ($user->type == 'master')
            $properties = Property::all();
        else
            $properties = Property::where([['user_code', '=', $user->id]])->get();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photos = PhotosProperty::where([['property_id', '=', $property->id]])->get();

            if ($property->category == 'Venda')
                $prop_value = $property->prop_price;
            else
                $prop_value = $property->prop_rent;

            array_push($results, [
                'propertie' => $properties,
                'photos' => $photos
            ]);
        }
        return response()->json(['properties' => $results], 200);
    }


    public function deleteProperty($id)
    {
        $ret = null;
        try {
            $prop = Property::find($id);
            if ($prop == null)
                throw new \Exception('Imovél não encontrado');

            $res = $prop->delete();
            if ($res == 0)
                throw new \Exception('Imovél não deletado');

            $ret = [
                'status' => true,
                'message' => 'Imovél deletado com sucesso!',
                'code' => 200
            ];
        } catch (Exception $e) {
            $ret = [
                'status' => false,
                'message' => $e->getMessage(),
                'code' => 400
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function editProperty($id)
    {
        $propertie = Property::find($id);
        $condominio = Condominio::find($propertie->condominio_id);
        return view(
            'admin.property.edit-property',
            [
                "propertie" => $propertie,
                "condominio" => $condominio,
                "bread_title" => "Editar Imóvel",
                "bread_subcontents" => [
                    [
                        'title' => "Insira dados sobre o imóvel",
                        "target_url" =>  route("admin.property.index")
                    ],

                ]
            ]
        );
    }


    public static function getFilesPDFPropertie($prop_id)
    {
        $result = [];
        $files = PropertyFilesPDF::where('property_id', '=', $prop_id)->orderBy('created_at', 'ASC')->get();

        if ($files == null) {
            array_push($result, [
                'filename' => 'not found',
                'pathname' => asset('storage/empty-image.svg'),
                'property_id' => $prop_id
            ]);
        } else {
            foreach ($files as $key => $value) {
                array_push($result, [
                    'filename' => $value->name,
                    'pathname' => $value->public_path,
                    'property_id' => $prop_id
                ]);
            }
        }

        $ret = [
            'status' => true,
            'message' => 'get files ok',
            'files' => $result,
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }
    public static function getImagesPropertie($prop_id)
    {
        $result = [];
        $imgs = PhotosProperty::where('property_id', '=', $prop_id)->orderBy('created_at', 'ASC')->get();

        if ($imgs == null) {
            array_push($result, [
                'filename' => 'Image empty',
                'pathname' => asset('storage/empty-image.svg'),
                'property_id' => $prop_id
            ]);
        } else {
            foreach ($imgs as $key => $value) {
                array_push($result, [
                    'filename' => $value->name,
                    'pathname' => asset(str_replace('public', 'storage', $value->pathname)),
                    'property_id' => $prop_id
                ]);
            }
        }

        $ret = [
            'status' => true,
            'message' => 'get images ok',
            'imgs' => $result,
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }

    public static function getVideosPropertie($prop_id)
    {
        $result = [];
        $videos = VideoProperty::where('property_id', '=', $prop_id)->get();

        foreach ($videos as $key => $value) {
            array_push($result, [
                'filename' => $value->name,
                'pathname' => asset(str_replace('public', 'storage', $value->pathname)),
                'property_id' => $prop_id
            ]);
        }
        $ret = [
            'status' => true,
            'message' => 'get videos ok',
            'videos' => $result,
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }

    public function deletePDF(Request $request)
    {
        $file = PropertyFilesPDF::where([
            ['property_id', '=', $request->prop_id],
            ['name', '=', $request->fileName]
        ])->first();

        $prop = Property::find($request->prop_id);


        if (Storage::disk("public")->exists($prop->prop_code . '/files/' . $file->filename))
            Storage::disk("public")->delete($prop->prop_code . '/files/' . $file->filename);

        $file->delete();
        $ret = [
            'status' => true,
            'message' => 'delete file ok',
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }
    public function deleteImg(Request $request)
    {
        $photos = PhotosProperty::where([
            ['property_id', '=', $request->prop_id],
            ['name', '=', $request->fileName]
        ])->get();
        foreach ($photos as $key => $value) {
            Storage::delete($value->pathname);
        }
        $result = PhotosProperty::where([
            ['property_id', '=', $request->prop_id],
            ['name', '=', $request->fileName]
        ])->delete();

        $ret = [
            'status' => true,
            'message' => 'delete images ok',
            'imgs' => $result,
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }

    public function deleteVideo(Request $request)
    {
        $photos = VideoProperty::where([
            ['property_id', '=', $request->prop_id],
            ['name', '=', $request->fileName]
        ])->get();
        foreach ($photos as $key => $value) {
            Storage::delete($value->pathname);
        }
        $result = VideoProperty::where([
            ['property_id', '=', $request->prop_id],
            ['name', '=', $request->fileName]
        ])->delete();

        $ret = [
            'status' => true,
            'message' => 'delete videos ok',
            'imgs' => $result,
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }

    public function post_img($prop_code, $prop_id)
    {

        $file = request('file');

        $name = $file->getClientOriginalName();

        $seachPhoto = PhotosProperty::where([
            ['property_id', '=', $prop_id],
            ['name', '=', $name],
        ])->first();
        if ($seachPhoto != null)
            return;

        // $path = $file->store('public/' . $prop_code);
        if (!file_exists(storage_path('app/public/' . $prop_code))) {
            mkdir(storage_path('app/public/' . $prop_code));
        }

        $config = Configurations::first();

        if ($config != null && $config->img_name != null)
            $waterMarkPath = 'marca_dagua/' . $config->img_name;
        else
            $waterMarkPath = 'assets/img/logo/logo-project.png';

        Image::configure(['driver' => 'imagick']);
        $waterMarkUrl = public_path($waterMarkPath);
        $water = Image::make($waterMarkUrl);

        $water->resize(320, 320);

        $image = Image::make(request('file')->getRealPath());
        $image->insert($water, 'center');
        $image->save(storage_path('app/public/' . $prop_code . '/' . $name));

        $path = asset('storage/' . $prop_code . '/' . $name);

        $oDate = date('Y-m-d H:i:s');
        $insert['name'] = $name;
        $insert['pathname'] = $path;
        $insert['property_id'] = $prop_id;
        $insert['created_at'] = $oDate;
        $photo = PhotosProperty::insert($insert);
    }


    public function post_pdf(Request $request, $prop_code, $prop_id)
    {
        $ret = null;

        try {

            $request->validate([
                'file' => 'required|mimes:pdf'
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $file_uuid = Str::uuid()->toString()  . '.pdf';

                $file->storeAs($prop_code . '/files', $file_uuid, 'public');
            }

            $file_path = asset('gallery_pwa/' . $prop_code . '/files/' . $file_uuid);


            //save in bd
            PropertyFilesPDF::create([
                'filename' => $file_uuid,
                'name' => $fileName,
                'public_path' => $file_path,
                'property_id' => $prop_id
            ]);

            $ret = [
                'filename' => $file_uuid,
                'status' => true,
                'code' => 200,
                'message' => 'save file ok',
                'public_path' => $file_path,
            ];
        } catch (\Exception $th) {

            $ret = [
                'status' => false,
                'code' => 400,
                'message' => $th->getMessage()
            ];
        }

        return response()->json($ret, $ret['code']);
    }
    public function post_video($prop_code, $prop_id)
    {
        //SET VIDEO
        $video = request('file');

        $videoName = $video->getClientOriginalName();
        $pathVideo = $video->storeAs('public/' . $prop_code, $videoName);

        VideoProperty::create([
            'name' => $videoName,
            'pathname' => $pathVideo,
            'property_id' => $prop_id
        ]);
    }


    public function view_property()
    {
        return view(
            'admin.property.view-property',
            [
                "bread_title" => "Dados da Propriedade",
                "bread_subcontents" => [
                    [
                        'title' => "Lista todos os imóveis cadastrados",
                        "target_url" =>  route("admin.property.view-property")
                    ],

                ]
            ]
        );
    }

    public function nearbyPlaces(Request $request, $prop_id = null)
    {
    }
    // {
    //     $nearby = NearbyPlaces::where([["property_id", "=", $request->property_id]])->get();
    //     foreach ($nearby as $key => $value) {
    //         $value->delete();
    //     }

    //     $restaurant = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $request->lat . "%2C" . $request->lng . "&radius=1000&type=gym&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&language=pt-BR";
    //     $restaurantResponse = Http::get($restaurant);
    //     $dataRestaurant =  json_decode($restaurantResponse->body());
    //     $count_res = 0;
    //     foreach ($dataRestaurant->results as $key => $value) {
    //         if ($count_res < 3)
    //             if ($value->business_status == "OPERATIONAL") {

    //                 $responseDist = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $request->lat . "%2C" . $request->lng . "&destinations=" . $value->geometry->location->lat . "%2C" . $value->geometry->location->lng . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
    //                 $data = json_decode($responseDist->body());
    //                 NearbyPlaces::create([
    //                     'property_id' => $request->property_id,
    //                     'name' => $value->name,
    //                     'place_id' => $value->place_id,
    //                     'vicinity' => $value->vicinity,
    //                     'lat' => $value->geometry->location->lat,
    //                     'lng' => $value->geometry->location->lng,
    //                     'type' => "Restaurante",
    //                     'dist' => $data->rows[0]->elements[0]->distance->text
    //                 ]);

    //                 $count_res++;
    //             }
    //     }

    //     $supermarket = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $request->lat . "%2C" . $request->lng . "&radius=1000&type=supermarket&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&language=pt-BR";
    //     $supermarketResponse = Http::get($supermarket);
    //     $datasupermarket =  json_decode($supermarketResponse->body());
    //     $cont_supermarket = 0;
    //     foreach ($datasupermarket->results as $key => $value) {
    //         if ($cont_supermarket < 3)
    //             if ($value->business_status == "OPERATIONAL") {

    //                 $responseDist = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $request->lat . "%2C" . $request->lng . "&destinations=" . $value->geometry->location->lat . "%2C" . $value->geometry->location->lng . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
    //                 $data = json_decode($responseDist->body());
    //                 NearbyPlaces::create([
    //                     'property_id' => $request->property_id,
    //                     'name' => $value->name,
    //                     'place_id' => $value->place_id,
    //                     'vicinity' => $value->vicinity,
    //                     'lat' => $value->geometry->location->lat,
    //                     'lng' => $value->geometry->location->lng,
    //                     'type' => "Super Mercado",
    //                     'dist' => $data->rows[0]->elements[0]->distance->text
    //                 ]);

    //                 $cont_supermarket++;
    //             }
    //     }

    //     $school = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $request->lat . "%2C" . $request->lng . "&radius=1000&type=school&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0&language=pt-BR";
    //     $schoolResponse = Http::get($school);
    //     $dataschool =  json_decode($schoolResponse->body());
    //     $cont_school = 0;
    //     foreach ($dataschool->results as $key => $value) {
    //         if ($cont_school < 3)
    //             if ($value->business_status == "OPERATIONAL") {

    //                 $responseDist = Http::get("https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $request->lat . "%2C" . $request->lng . "&destinations=" . $value->geometry->location->lat . "%2C" . $value->geometry->location->lng . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
    //                 $data = json_decode($responseDist->body());
    //                 NearbyPlaces::create([
    //                     'property_id' => $request->property_id,
    //                     'name' => $value->name,
    //                     'place_id' => $value->place_id,
    //                     'vicinity' => $value->vicinity,
    //                     'lat' => $value->geometry->location->lat,
    //                     'lng' => $value->geometry->location->lng,
    //                     'type' => "Escola",
    //                     'dist' => $data->rows[0]->elements[0]->distance->text
    //                 ]);

    //                 $cont_school++;
    //             }
    //     }
    //     return response()->json(['status' => true, 'data' => $data], 200);
    // }

    public function getGeolocation($address)
    {
        $reponse = Http::get("https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=AIzaSyCMCowQmtr0CyvTFVw5RdA2Pzt2Wq0sG-0");
        $data = json_decode($reponse->body());
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    public function deleteAllProperty($id)
    {
        $photos = PhotosProperty::where([
            ['property_id', '=', $id],
        ])->get();

        foreach ($photos as $key => $value) {
            Storage::delete($value->pathname);
            $value->delete();
        }

        $ret = [
            'status' => true,
            'message' => 'delete images ok',
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }

    public static function getTodosImoveis()
    {
        $todasPropriedades = Property::all();
        return $todasPropriedades;
    }

    public static function getTodasCidades()
    {
        $todasCidades = City::all();
        return $todasCidades;
    }

    public static function getCategoriaImoveis()
    {
        $imoveisVenda = Property::where([
            ['category', '=', 'Venda'],
        ])->get();

        $qtdImoveisVenda = count($imoveisVenda);

        $imoveisAluguel = Property::where([
            ['category', '=', 'Aluguel'],
        ])->get();

        $qtdImoveisAluguel = count($imoveisAluguel);

        $arrayRetorno = [
            ['Venda', $qtdImoveisVenda],
            ['Aluguel', $qtdImoveisAluguel]
        ];

        return response()->json($arrayRetorno);
    }



    public function listPropertiesActivesJson()
    {
        $user = Auth::guard('admin')->user();
        $properties = null;
        if ($user->type == 'master')
            $properties = Property::where([['available', '=', 1]])->get();
        else
            $properties = Property::where([['user_code', '=', $user->id], ['available', '=', 1]])->get();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($properties as $key => $property) {
            $photo = PhotosProperty::where([['property_id', '=', $property->id]])->orderBy('created_at', 'ASC')->get();
            $type = TypeProperty::find($property->type_prop_id);
            $caract = $property->getCaracteristicas()->get();

            if ($photo == null)
                $photo = asset('storage/empty-image.svg');


            array_push($results, [
                'imoveis' => $property,
                'photo' => $photo,
                'type' => $type,
                'caracteristicas' => $caract
            ]);
        }
        return response()->json(['status' => true, 'itens' => $results], 200);
    }

    public function gerarXML()
    {
        return view(
            'admin.property.gerarXml',
            [
                "bread_title" => "Gerar XML dos imóveis cadastrados",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de todos os XML gerados",
                        "target_url" =>  route("admin.property.gerarXml")
                    ],

                ]
            ]
        );
    }


    public function alterStatus(Request $request)
    {
        $ret = null;
        try {
            $propertie = Property::find($request->prop_id);
            if (!$propertie)
                throw new \Exception("Imóvel não encontrado");

            $propertie->available = $request->status;
            $propertie->update();

            $ret = [
                'status' => true,
                'message' => 'statusa atualizado',
                'redirect' => route("admin.property.customers"),
                'code' => 200
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

    public function alterStatusUser(Request $request)
    {
        $ret = null;
        try {
            $propertie = Property::find($request->prop_id);
            if (!$propertie)
                throw new \Exception("Imóvel não encontrado");

            $propertie->available_user = $request->status;
            $propertie->update();

            $ret = [
                'status' => true,
                'message' => 'status atualizado',
                'redirect' => route("admin.property.customers"),
                'code' => 200
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

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }

    public function addPropertyXML(Request $request)
    {
        $user = Auth::guard('admin')->user();
        dispatch(new RunXMLProperties($user))->onQueue('high');
    }


    public function listXmls(Request $request)
    {
        $ret = null;
        try {
            $user = Auth::guard('admin')->user();
            if (!$user)
                throw new \Exception("Usuário não encontrado");

            $xmls = FileXML::where([
                ["user_id", "=", $user->id],
                ["generated", "=", 1],
            ])->get();

            $results = [];
            foreach ($xmls as $key => $value) {

                array_push($results, [
                    'name' => $value->name,
                    'date' => date(strtotime($value->created_at)),
                    'qtd' => $value->qtd_imoveis,
                    'link' => $value->url_xml,
                    'id' => $value->id
                ]);
            }

            return DataTables::of($results)->make();
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function getPropertiesSelecteds(Request $request)
    {
        $ret = null;
        try {
            $user = Auth::guard('admin')->user();
            if (!$user)
                throw new \Exception("Usuário não encontrado");

            $results = [];
            foreach ($request->properties_code as $key => $value) {
                $prop = Property::where("prop_code", "=", $value)->first();
                $photo = PhotosProperty::where("property_id", "=", $prop->id)->get();
                $type = TypeProperty::find($prop->type_prop_id);
                $caract = $prop->getCaracteristicas()->get();
                array_push($results, [
                    "imoveis" => $prop,
                    "photo" => $photo,
                    'type' => $type,
                    'caracteristicas' => $caract
                ]);
            }

            $ret = [
                'success' => true,
                'code' => 200,
                'message' => 'properties ok',
                'result' => $results,
                'user' => $user
            ];
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function createLinkXMLProperties(Request $request)
    {
        $ret = null;
        try {
            $props = json_decode($request->prop_publication);
            $file_id = $request->file_id_update;

            if ($request->file_id_update) {
                FileXMLProperties::where("file_id", $request->file_id_update)->delete();

                foreach ($props as $key => $value) {
                    FileXMLProperties::create([
                        'file_id' => $request->file_id_update,
                        'prop_code' => $value->prop_code,
                        'publication_type' => $value->publication_type
                    ]);

                    $ret = [
                        'success' => true,
                        'code' => 200,
                        'message' => 'xml props updated',
                    ];
                }
            } else {

                foreach ($props as $key => $value) {
                    FileXMLProperties::create([
                        'file_id' => $request->file_id,
                        'prop_code' => $value->prop_code,
                        'publication_type' => $value->publication_type
                    ]);
                }

                $ret = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'xml props Generated',
                ];
            }
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }
    public function getXMLPropertiesList(Request $request, $id)
    {
        $ret = null;
        try {
            $props = FileXMLProperties::where('file_id', $id)->get(['prop_code', 'publication_type'])->toArray();
            if (!$props)
                throw new \Exception("Error");

            $ret = [
                'success' => true,
                'code' => 200,
                'message' => 'xml props Generated',
                'props' => $props,
                'file_name' => $request->file_name,
                'file_id' => $id

            ];
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function createLinkXML(Request $request)
    {
        $ret = null;
        try {
            $user = Auth::guard('admin')->user();
            if (!$request->file_id) {
                if (!$request->file)
                    throw new \Exception("File not exists in request");
                if (!$request->name)
                    throw new \Exception("name not exists in request");
                if (!$request->qtd)
                    throw new \Exception("qtd not exists in request");

                if (!$user)
                    throw new \Exception("Usuário não encontrado");

                $name =   $request->name . '.' . strtotime(date("Y-m-d h:i:s")) . '.xml';
                $path = Storage::disk("file_XML")->put($user->id . '/' . $name, $request->file);

                $fileCreated = FileXML::create([
                    'url_xml' => asset("file_XML/" . $user->id . '/' . $name),
                    'name' => $request->name,
                    'user_id' => $user->id,
                    'generated' => 1,
                    'qtd_imoveis' => $request->qtd,
                    'file_name' => $name,
                    'padrao' => $request->padrao
                ]);

                $ret = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'xml Generated',
                    'file_created' => $fileCreated->id
                ];
            } else {

                $filexml = FileXML::where("id", $request->file_id)->first();

                FileXML::where("id", $request->file_id)->update([
                    'qtd_imoveis' => $request->qtd,
                    'padrao' => $request->padrao,
                    'name' => $request->name,
                ]);


                $path = Storage::disk("file_XML")->put($user->id . '/' . $filexml->file_name, $request->file);

                $ret = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'xml already exists',
                    'file_created' => $request->file_id
                ];
            }
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }


    public function deleteXML($id)
    {
        $ret = null;
        try {

            $user = Auth::guard('admin')->user();
            if (!$user)
                throw new \Exception("Usuário não encontrado");

            $xml = FileXML::find($id);
            $xml->delete();
            Storage::disk("file_XML")->delete($user->id . '/' . $xml->file_name);

            $ret = [
                'success' => true,
                'code' => 200,
                'message' => 'xml deleted'
            ];
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }
}
