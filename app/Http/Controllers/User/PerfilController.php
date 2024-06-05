<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\ForgotPassword;
use App\Jobs\RunXMLProperties;
use App\Models\Customer;
use App\Models\FileXML;
use App\Models\PhotosProperty;
use App\Models\Property;
use App\Models\PropertyCaracteristicas;
use App\Models\Proprietarios;
use App\Models\TypeProperty;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\Hash;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class PerfilController extends Controller
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
        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.user',
            [
                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.user")
                    ],
                ]
            ]
        );
    }

    public function minha_senha()
    {

        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.senha-user',
            [
                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.senha-user")
                    ],
                ]
            ]
        );
    }

    public function link_xml()
    {

        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.addImovel-xml',
            [
                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.addImovel-xml")
                    ],
                ]
            ]
        );
    }


    public function perfilUser()
    {

        return view(
            'user.perfil.user.geralPerfilUser',
            [
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.geralPerfilUser")
                    ],
                ]
            ]
        );
    }


    public function meus_imoveis()
    {
        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.imoveis-user',
            [

                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.imoveis-user")
                    ],
                ]
            ]
        );
    }

    public function lista_xmls()
    {
        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.lista-xml',
            [

                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.lista-xml")
                    ],
                ]
            ]
        );
    }


    public function add_xml()
    {

        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.add-xml',
            [

                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.add-xml")
                    ],
                ]
            ]
        );
    }

    public function add_propriedade($prop_id = null)
    {
        if ($prop_id != null)
            $propertie = Property::find($prop_id);
        else
            $propertie = null;

        return view(
            'user.perfil.add-propriedade',
            [
                "propertie" => $propertie,
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.add-propriedade")
                    ],
                ]

            ]
        );
    }

    public function resumo_propriedade($id)
    {
        $ret = null;
        try {
            $propertie = Property::where([['id', '=', $id]])->first();

            if (!$propertie)
                throw new \Exception("Propriedade não encontrada!");

            $images = PhotosProperty::where([['property_id', '=', $propertie->id]])->get();

            if (!$images)
                throw new \Exception("Images não encontrada!");

            $type = TypeProperty::where([['id', '=', $propertie->type_prop_id]])->first();

            if (!$type)
                throw new \Exception("Tipo não encontrada!");

            return view(
                'user.perfil.resumo-propriedade',
                [
                    'propertie' => $propertie,
                    'images' => $images,
                    'type' => $type,
                    "bread_subcontents" => [
                        [
                            'title' => "Configurações gerais do sistema",
                            "target_url" =>  route("user.perfil.resumo-propriedade", [$propertie->id])
                        ],
                    ]

                ]
            );
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

    public function imoveis_indicados()
    {

        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.imoveis-indicados',
            [

                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.imoveis-indicados")
                    ],
                ]
            ]
        );
    }

    public function funcoes_user()
    {
        $customer = Auth::guard('customer')->user();

        return view(
            'user.perfil.user.funcoes-user',
            [
                'customer' => $customer,

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.funcoes-user")
                    ],
                ]
            ]
        );
    }

    public function virar_corretor()
    {
        return view(
            'user.perfil.user.funcoes.virar-corretor',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.funcoes.virar-corretor")
                    ],
                ]
            ]
        );
    }

    public function virar_avaliador()
    {
        return view(
            'user.perfil.user.funcoes.virar-avaliador',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.funcoes.virar-avaliador")
                    ],
                ]
            ]
        );
    }

    public function virar_fotografo()
    {
        return view(
            'user.perfil.user.funcoes.virar-fotografo',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.funcoes.virar-fotografo")
                    ],
                ]
            ]
        );
    }

    public function indicar_imovel()
    {
        return view(
            'user.perfil.user.indicar-imovel',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.user.indicar-imovel")
                    ],
                ]
            ]
        );
    }

    public function cadastrar()
    {
        return view(
            'user.perfil.loginCadastrar.cadastrar',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.loginCadastrar.cadastrar")
                    ],
                ]
            ]
        );
    }

    public function entrar()
    {
        return view(
            'user.perfil.loginCadastrar.entrar',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.perfil.loginCadastrar.entrar")
                    ],
                ]
            ]
        );
    }

    public function esqueceuSenha($token)
    {
        return view(
            'user.perfil.loginCadastrar.esqueceuSenha',
            [
                'token' => $token,
                "bread_subcontents" => [
                    [
                        'title' => "Esqueceu sua senha",
                        "target_url" =>    route("user.perfil.loginCadastrar.entrar")
                    ],
                ]
            ]
        );
    }

    public function messages()
    {
        return [
            'unique' => 'A title is required',
        ];
    }

    public function addCustomer(Request $request)
    {
        $ret = null;
        try {
            // $validated = $request->validate([
            //     'name' => 'required|max:255',
            //     'CPF' => 'required|max:14',
            //     'phone' => 'required',
            //     'email' => 'required|unique:customers,email',
            //     'data_nasc' => 'required',
            //     'password' => 'required',
            //     'terms' => 'required',
            // ]);


            $validator = Validator::make(
                [
                    "name" => $request->name,
                    "CPF" => $request->CPF,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "data_nasc" => $request->data_nasc,
                    "password" => $request->password,
                    "terms" => $request->terms,

                ],
                [
                    'name' => 'required|max:255',
                    'CPF' => 'required|max:14',
                    'phone' => 'required',
                    'email' => 'required|unique:customers,email',
                    'data_nasc' => 'required',
                    'password' => 'required',
                    'terms' => 'required',
                ],
                [
                    "name.required" => "Nome é obrigatório",
                    "CPF.required" => "CPF é obrigatório",
                    "phone.required" => "Telefone é obrigatório",
                    "email.required" => "Email é obrigatório",
                    "data_nasc.required" => "Data de nascimento é obrigatório",
                    "password.min" => "Senha muito curta",
                    "terms" => 'Termo é obrigatório',
                    "email.unique" => "Email já cadastrado",
                ]
            );


            if ($validator->fails()) {
                $errors = $validator->errors();

                throw new \Exception($errors->first());
            }

            $insertCustomer = [
                'CPF' => $request->CPF,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'data_nasc' => $request->data_nasc,
                'terms' => $request->terms == true ? 1 : 0,
                'status' => 1
            ];

            $customer = Customer::create($insertCustomer);

            Auth::guard('customer')->login($customer);


            $ret = [
                'success' => true,
                'message' => "Cadastrado com sucesso!",
                'redirect' => route("user.perfil.loginCadastrar.entrar"),
                'code' => 200,
                'customer' => $customer
            ];
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'message' => $th->getMessage(),
                'redirect' => route("user.perfil.loginCadastrar.cadastrar"),
                'code' => 400
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function authCustomer(Request $request)
    {
        $ret = null;
        try {
            $credential = [
                'email' => $request->email,
                'password' => $request->password
            ];

            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::guard('customer')->attempt($credential, false)) {

                $customer = Auth::guard('customer')->user();
                if (!$customer->status) {
                    Auth::guard('customer')->logout();
                    throw new \Exception("Usuário desativado, entre em contato com o suporte");
                }

                $ret =  [
                    'success' => true,
                    'info' => "Autenticado",
                    'message' => "Autentificado com sucesso! Redirecionando...",
                    'redirect' => route("user.perfil.user.imoveis-user"),
                    'code' => 200
                ];
            } else
                $ret =  [
                    'success' => false,
                    'info' => "Erro ao autenticar!",
                    'message' => "Erro ao autenticar!",
                    'code' => 400,
                    'invalid' => 1
                ];
        } catch (Exception $th) {
            $ret =  [
                'success' => false,
                'info' => "Erro ao autenticar!",
                'message' => $th->getMessage(),
                'code' => 400
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function authenticateWithGoogle(Request $request)
    {

        $ret = null;
        try {
            $client = new \Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
            $payload = $client->verifyIdToken($request->credentials);
            if (!$payload)
                throw new \Exception("Token inválido");

            $user = Customer::where('google_id', $request->id)->first();

            if ($user) {
                Auth::guard('customer')->login($user);

                $ret = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Autentificado com sucesso!',
                    'redirect' => route("user.perfil.user.imoveis-user")
                ];
            } else {

                $alreadyExists = Customer::where('email', $request->email)->first();

                if ($alreadyExists) {
                    $alreadyExists->google_id = $request->id;
                    $alreadyExists->update();

                    Auth::guard('customer')->login($alreadyExists);
                } else {

                    $newUser = Customer::create([
                        'phone' => '99999999999',
                        'name' => $request->name,
                        'email' => $request->email,
                        'CPF' => '12345678909',
                        'google_id' => $request->id,
                        'password' => Hash::make('5987pwateste1108'),
                        'status' => 1,
                        'data_nasc' => null,
                        'terms' => 1,
                    ]);

                    Auth::guard('customer')->login($newUser);
                }

                $ret = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Autentificado com sucesso!',
                    'redirect' => route("user.perfil.user.imoveis-user")
                ];
            }
        } catch (Exception $e) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $e->getMessage(),
                'redirect' => route("user.perfil.loginCadastrar.entrar")
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function logoutCustomer()
    {
        Auth::guard('customer')->logout();
        return redirect()->route("user.perfil.loginCadastrar.entrar");
    }

    public function sendForgotPassword(Request $request)
    {
        $ret = null;
        try {
            $customer = Customer::where('email', '=', $request->email)->first();

            if (!$customer)
                throw new \Exception('Usuário não encontrado');

            $token = Str::uuid()->toString();
            $customer->remember_token = $token;
            $customer->update();

            dispatch(new ForgotPassword($customer, $token));
            $ret = [
                'success' => true,
                'code' => 200,
                'message' => 'Um email de redefinição será enviado, caso haja uma conta vinculada!',
                'redirect' => route("user.perfil.user.user")
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

    public function newPassword(Request $request)
    {
        $ret = null;
        try {
            $customer = Customer::where([['remember_token', '=', $request->token_id]])->first();
            if ($customer == null)
                throw new \Exception("Nenhum usúraio correspondente");

            if ($request->password != $request->repeat_password)
                throw new \Exception("Senhas não conferem");

            $customer->update(['password' => Hash::make($request->password), 'remember_token' => null]);

            $ret = [
                'status' => true,
                'message' =>  'Senha alterada!',
                'code' => 200,
                'redirect' => route("user.perfil.loginCadastrar.entrar")
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

    public function insertPropertie(Request $request)
    {
        $ret = null;
        try {
            $data = json_decode($request->data);
            $user = Auth::guard('customer')->user();
            if ($data == null)
                throw new Exception('Dados inválidos');
            if ($user == null)
                throw new Exception('Usuário não encontrado');

            if (strtotime($data->dateFimObra) < strtotime($data->dateInicioObra))
                throw new Exception('A data de fim da obra não pode ser menor que o inicio da obra');
            $dataProprietario = [
                "email" => $data->prop_email,
                "telefone" => $data->prop_phone,
                "nome" => $data->nome_proprietario,
                "user_code" => $user->id
            ];
            $proprietario =    Proprietarios::where('email', $data->prop_email)->first();
            if ($proprietario == null) {
                $insertedProprietario = Proprietarios::create($dataProprietario);
            } else {
                $proprietario->update($dataProprietario);
                $insertedProprietario = Proprietarios::where('email', $data->prop_email)->first();
            }


            $formated = [
                'suites' => $data->suites_imovel ? $data->suites_imovel : 0,
                'url_video' => $data->video_midia,
                'CEP' => $data->CEP,
                'bathrooms' => $data->banheiros_imovel ? $data->banheiros_imovel : 0,
                'bedroom' => $data->quartos_imovel ? $data->quartos_imovel : 0,
                'category' => $data->categoria_imovel,
                'complement' => $data->complement ? $data->complement : null,
                'condominium' => $data->condominio_preco ? 1 : 0,
                'condominium_price' => $data->valorCondominio_preco == "" ? null : $data->valorCondominio_preco,
                'description' => $request->description_html,
                'district' => $data->district,
                'garage' => $data->vagas_imovel ? $data->vagas_imovel : 0,
                'iptu_price' => $data->iptu_preco ? $data->iptu_preco  : 0,
                'number' => $data->number,

                'prop_price' => $data->venda_preco ? $data->venda_preco : 0,
                'prop_rent' => $data->venda_aluguel ? $data->venda_aluguel : 0,
                'price' => $data->venda_aluguel ? $data->venda_aluguel : $data->venda_preco,

                'prop_size' => $data->area_imovel,
                'state' => $data->state,
                'street' => $data->street,

                'cpf_vendor' => isset($data->prop_cpf) ? $data->prop_cpf : null,

                'name_vendor' => $data->nome_proprietario,
                'phone_vendor' => $data->prop_phone,
                'email_vendor' => $data->prop_email,

                'type_prop_id' => $data->tipo_imovel,

                'city_id' => $request->citie_id,
                'city_name' =>  $data->city_id,

                'customer_code' => $user->id,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'formated_address' => $request->formated_address,
                'place_id' => $request->place_id,
                'id_youtube' => $request->id_youtube,
                'state_name' => $request->state_name,

                'condominio_id' => isset($request->condominio_id) ? $request->condominio_id : null,
                'corretagem' => isset($data->honorario_corretagem) ? $data->honorario_corretagem : null,
                'andar_apartamento' => isset($data->andar_apartamento) ? $data->andar_apartamento : null,
                'available' => 0,
                "finalidade" => $data->finalidadeUtilizacao,
                "status_imovel" => $data->statusImovel,
                "inicioObra" => $data->dateInicioObra ? $data->dateInicioObra : null,
                "fimObra" => $data->dateFimObra ? $data->dateFimObra : null,
                "tempoConstrução" => $data->tempoConstrucao,
                "notaComodidade" => $request->notaComodidade,
                "notaFotos" => $request->notaFotos,
                "notaDescricao" => $request->notaDescricao,
                "notaVideo" => $request->notaVideo,
                "proprietario" => $insertedProprietario->id
            ];

            if ($request->prop_id != "" && $request->prop_id != null) {
                $prop = Property::find($request->prop_id);
                if ($prop == null)
                    throw new Exception('Imóvel não encontrado');

                Property::where('id', '=', $prop->id)->update($formated);

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


                PhotosProperty::where('id', '=', $prop->id)->delete();

                $ret = [
                    'status' => true,
                    'message' => "Imovel atualizado com sucesso",
                    'code' => 200,
                    'prop_code' => $prop->prop_code,
                    'prop_id' => $prop->id
                ];
            } else {
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
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'code' => 400,
                'message' => $th->getMessage(),
            ];
        }
        return response()->json($ret, $ret['code']);
    }
    public function updateInfo(Request $request)
    {
        $ret = null;
        try {

            $data = json_decode($request->data);
            if ($data == null)
                throw new Exception('Dados inválidos');

            $formated = [
                'CPF' => $data->cpf_perfil,
                'email' => $data->email_perfil,
                'phone' => $data->telefone_perfil,
                'data_nasc' => $data->data_nascimento,
                'name' => $data->complete_name,
            ];

            $res  = Customer::where('id', '=', $request->customer_id)->update($formated);
            if ($res <= 0)
                throw new Exception('Os dados não foram atualizados!');

            $ret = [
                'status' => true,
                'message' =>  'Dados atualizados!',
                'code' => 200,
                'redirect' => route("user.perfil.user.user")
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


    public function getPropertiesUserTabs(Request $request)
    {

        try {
            $user = Auth::guard('customer')->user();

            if ($user == null)
                throw new Exception('Usuário não encontrado');

            $properties = Property::where([
                ['customer_code', '=', $user->id]
            ])->orderBy('created_at', 'DESC')->get();

            $result = [];

            foreach ($properties as $key => $value) {
                $image = '';
                $photo = PhotosProperty::where([['property_id', '=', $value->id]])->orderBy('created_at', 'ASC')->first();

                if ($photo == null)
                    $image = asset('storage/empty-image.svg');
                else
                    $image = asset(str_replace('public', 'storage', $photo->pathname));


                array_push($result, ['propertie' => $value, 'img' => $image]);
            }



            $ret = [
                'status' => true,
                'code' => 200,
                'dados' => $result,
                'redirect' => route("user.perfil.user.user")
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


    public function addStringXML(Request $request)
    {
        $ret = null;
        try {

            $user = Auth::guard('customer')->user();
            if (!$user)
                throw new Exception('User inválido');

            $responseDist = Http::get($request->url_xml);

            if (!$responseDist)
                throw new Exception('URL inválida');

            FileXML::create([
                'url_xml' => $request->url_xml,
                'name' => $request->name,
                'user_id' => $user->id,
            ]);

            dispatch(new RunXMLProperties($user, $request->url_xml))->onQueue('high');

            $ret = [
                'status' => true,
                'message' =>  'XML adicionado!',
                'code' => 200,
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

    public function imoveisTabs()
    {
        $user = Auth::guard('customer')->user();

        Debugbar::info('teste');

        $query = Property::query();
        $query->where('customer_code', '=', $user->id);


        if (request('aprovado') == 1) {
            $query->where('available', '=', 1);
            $query->where('is_from_xml', '=', 0);
            $query->where('available_user', '=', 1);
        }

        if (request('aguardando') == 1) {
            $query->where('available', '=', 0);
            $query->where('is_from_xml', '=', 0);
            $query->where('available_user', '=', 1);
        }

        if (request('xml') == 1) {
            $query->where('is_from_xml', '=', 1);
            $query->where('available', '=', 1);
            $query->where('available_user', '=', 1);
        }

        if (request('desabilitado') == 1) {
            $query->where('available_user', '=', 0);
        }

        // $query = Property::where([
        //     ['customer_code', '=', $user->id]
        // ])->orderBy('created_at', 'DESC')->get();

        // Debugbar::info($properties);

        $imoveis = $query->paginate(8);


        // $query = Property::query();
        // $imoveis = $query->paginate(24);

        return view('user.perfil.user.paginacaoImoveis.tabUser')->with('properties', $imoveis);
    }

    public function imoveisTabsAprovados()
    {
        $user = Auth::guard('customer')->user();

        Debugbar::info('teste');

        $query = Property::query();
        $query->where('customer_code', '=', $user->id);
        $query->where('available', '=', 1);

        // $query = Property::where([
        //     ['customer_code', '=', $user->id]
        // ])->orderBy('created_at', 'DESC')->get();

        // Debugbar::info($properties);

        $imoveis = $query->paginate(1);

        return view('user.perfil.user.paginacaoImoveis.tabUserAprovados')->with('properties', $imoveis);
    }

    public function listXML(Request $request)
    {
        $ret = null;
        try {

            $customer = Auth::guard('customer')->user();

            $xmls = FileXML::where("user_id", "=", $customer->id)->get();
            $ret = [
                'status' => true,
                'message' =>  'XML list!',
                'code' => 200,
                'xml' => $xmls
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

    public function deleteItemListXML($id)
    {
        $ret = null;
        try {

            $customer = Auth::guard('customer')->user();

            $xml = FileXML::where([
                ["user_id", "=", $customer->id],
                ["id", "=", $id],
            ])->first();

            $xml->delete();

            $ret = [
                'status' => true,
                'message' =>  'XML deleted!',
                'code' => 200,
                'redirect' => route("user.perfil.user.lista-xml")
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
