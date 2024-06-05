<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaracteristicasCondominio;
use App\Models\City;
use App\Models\CondominioCaracteristicas;
use App\Models\Condominio;
use App\Models\Configurations;
use App\Models\PhotosCondominio;
use Illuminate\Http\Request;
use Auth;
use Barryvdh\Debugbar\Facades\Debugbar;
use DataTables;
use Image;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Storage;

class CondominioController extends Controller
{

    public function condominios()
    {
        return view(
            'admin.condominio.condominio',
            [
                "bread_title" => "Lista de Condomínios",
                "bread_subcontents" => [
                    [
                        'title' => "Dados sobre os condomínios cadastrados",
                        "target_url" =>  route("admin.condominio.condominio")
                    ],

                ]
            ]
        );
    }

    public function addCondominio()
    {
        return view(
            'admin.condominio.add-condominio',
            [
                "bread_title" => "Adicionar um condominio",
                "bread_subcontents" => [
                    [
                        'title' => "Dados sobre os condomínios cadastrados",
                        "target_url" =>  route("admin.condominio.add-condominio")
                    ],

                ]
            ]
        );
    }

    public function caracteristicasCondominio()
    {
        return view(
            'admin.condominio.caracteristica-condominio',
            [
                "bread_title" => "Lista de Características do Condomínio",
                "bread_subcontents" => [
                    [
                        'title' => "Dados sobre as características do Condomínio",
                        "target_url" =>  route("admin.condominio.caracteristica-condominio")
                    ],

                ]
            ]
        );
    }

    public function addCaracteristica()
    {
        return view(
            'admin.condominio.add-caracteristicaCondominio',
            [
                "bread_title" => "Add nova caracteristica",
                "bread_subcontents" => [
                    [
                        'title' => "Dados sobre as características do Condomínio",
                        "target_url" =>  route("admin.condominio.add-caracteristicaCondominio")
                    ],

                ]
            ]
        );
    }


    public function addCaracteristicaCondominio(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if ($validated) {

            $exists = CaracteristicasCondominio::where([['name', '=', $request->name]])->first();
            if ($exists) {
                return response()->json([
                    'success' => true,
                    'message' => "Caracteristica já existe",
                ], 200);
            } else {
                $caract = CaracteristicasCondominio::create($request->all());
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

        $caracteristicas = CaracteristicasCondominio::orderBy('name', 'ASC')->get();

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
        $caract = CaracteristicasCondominio::where([['id', "=", $id]])->first();
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

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000, 99999);
        } while (Condominio::where("condominio_code", "=", $code)->first());

        return $code;
    }

    public function storeCondominio(Request $request)
    {
        $ret = null;

        try {
            $data = json_decode($request->data);
            $user = Auth::guard('admin')->user();

            if ($data == null)
                throw new Exception('Dados inválidos');

            $formated = [
                'url_video' => $data->url_video_condominio,
                'CEP' => $data->cep_condominio,
                'complement' => $data->complement ? $data->complement : null,
                'district' => $data->district,
                'number' => $data->number,
                'state' => $data->state,
                'street' => $data->street,
                'title' => $data->name_condominio,
                'city_id' => $request->citie_id,
                'user_code' => $user->id
            ];

            if ($request->cond_id != null) {
                $cond = Condominio::find($request->cond_id);
                if ($cond == null)
                    throw new Exception('Condominio não encontrado');

                Condominio::where('id', '=', $request->cond_id)->update($formated);

                //delete old selection
                CondominioCaracteristicas::where('condominio_id', '=', $cond->id)->delete();
                //add again
                // if (!isset($data->list_caract))
                //     throw new Exception('Caracteriscticas não selecionadas');

                if (isset($data->list_caract) && is_array($data->list_caract)) {
                    foreach ($data->list_caract as $key => $value) {
                        $insertProp = [
                            'condominio_id' => $cond->id,
                            'caracteristicas_condominio_id' => $value
                        ];
                        CondominioCaracteristicas::insert($insertProp);
                    }
                } else {
                    if (isset($data->list_caract)) {
                        $insertProp = [
                            'condominio_id' => $cond->id,
                            'caracteristicas_condominio_id' => $data->list_caract
                        ];
                        CondominioCaracteristicas::insert($insertProp);
                    }
                }

                $ret = [
                    'status' => true,
                    'message' => "Imovel atualizado com sucesso",
                    'code' => 200,
                    'condominio_code' => $cond->condominio_code,
                    'condominio_id' => $cond->id,
                    'CEP' => $cond->CEP,
                    'complement' => $cond->complement,
                    'number' => $cond->number,
                    'title' => $cond->title,
                    'redirect' => route("admin.condominio.condominio")

                ];
            } else {
                $formated['condominio_code'] =  $this->generateUniqueCode();

                $condominio = Condominio::create($formated);
                if ($condominio == null)
                    throw new Exception('Erro ao criar Condominio');

                // if (!isset($data->list_caract))
                //     throw new Exception('Caracteriscticas não selecionadas');

                if (isset($data->list_caract) && is_array($data->list_caract)) {
                    foreach ($data->list_caract as $key => $value) {
                        $insertProp = [
                            'condominio_id' => $condominio->id,
                            'caracteristicas_condominio_id' => $value
                        ];
                        CondominioCaracteristicas::insert($insertProp);
                    }
                } else {
                    if (isset($data->list_caract)) {

                        $insertProp = [
                            'condominio_id' => $condominio->id,
                            'caracteristicas_condominio_id' => $data->list_caract
                        ];
                        CondominioCaracteristicas::insert($insertProp);
                    }
                }

                $ret = [
                    'status' => true,
                    'message' => "Condominio inserido com sucesso",
                    'code' => 200,
                    'condominio_code' => $condominio->condominio_code,
                    'condominio_id' => $condominio->id,
                    'CEP' => $condominio->CEP,
                    'title' => $condominio->title,
                    'complement' => $condominio->complement,
                    'number' => $condominio->number,
                    'redirect' => route("admin.condominio.condominio")
                ];
            }
        } catch (Exception $th) {
            $ret = [
                'code' => 400,
                'status' => false,
                'message' => $th->getMessage()
            ];
        }
        return response()->json($ret, $ret['code']);
    }


    public function addImgCondominio($condominio_code, $condominio_id)
    {

        $file = request('file');

        $name = $file->getClientOriginalName();
        // $path = $file->store('public/condominios/' . $condominio_code .'/' . $name);
        if (!file_exists(storage_path('app/public/condominios/' . $condominio_code))) {
            mkdir(storage_path('app/public/condominios/' . $condominio_code));
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
        /* insert watermark at bottom-left corner with 5px offset */
        $image->insert($water, 'center');
        $image->save(storage_path('app/public/condominios/' . $condominio_code . '/' . $name));
        $path = asset('storage/condominios/' . $condominio_code . '/' . $name);
        // $image_resize = Image::make($file->getRealPath());
        // $image_resize->resize(400, 400);

        // $watermark = Image::make(public_path('marca_dagua/11324436-m-removebg-preview.png'));
        // Debugbar::info(public_path('marca_dagua/11324436-m-removebg-preview.png'));
        // $image_resize->insert($watermark, 'center');
        $oDate = date('Y-m-d H:i:s');

        $insert['name'] = $name;
        $insert['pathname'] = $path;
        $insert['condominio_id'] = $condominio_id;
        $insert['created_at'] = $oDate;

        PhotosCondominio::insert($insert);
    }

    public function listCondominiosJson()
    {

        $user = Auth::guard('admin')->user();
        $condominio = null;
        if ($user->type == 'master')
            $condominio = Condominio::all();
        else
            $condominio = Condominio::where([['user_code', '=', $user->id]])->get();

        // return response()->json(['status' => true, 'itens' => $condominio], 200);

        $results = [];
        foreach ($condominio as $key => $cond) {
            $photo = PhotosCondominio::where([['condominio_id', '=', $cond->id]])->orderBy('created_at', 'ASC')->first();

            if ($photo == null)
                $image = asset('storage/empty-image.svg');
            else
                $image = asset(str_replace('public', 'storage', $photo->pathname));

            $city = City::find($cond->city_id)->first();

            array_push($results, [
                'id' => $cond->id,
                'address' => $cond->street . ' / ' . $city->citie,
                'title' => $cond->title,
                'condominio_code' => $cond->condominio_code,
                'photo' => $image
            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }

    public function listCondominiosSelectedJson($id)
    {

        $condominio = Condominio::find($id);
        $result = $condominio->getCaracteristicas()->get();
        return $result;
    }

    public function deleteCondominio($id)
    {
        $ret = null;
        try {
            $prop = Condominio::find($id);
            if ($prop == null)
                throw new \Exception('Condominio não encontrado');

            $res = $prop->delete();
            if ($res == 0)
                throw new \Exception('Condominio não deletado');

            $ret = [
                'status' => true,
                'message' => 'Condominio deletado com sucesso!',
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
    public function getCondominio($id)
    {
        $ret = null;
        try {
            $prop = Condominio::find($id);
            if ($prop == null)
                throw new \Exception('Condominio não encontrado');

            $ret = [
                'condominio' => $prop,
                'status' => true,
                'message' => 'Condominio encontrado!',
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

    public function editCondomio($id)
    {
        $condominio = Condominio::find($id);

        return view(
            'admin.condominio.edit-condominio',
            [
                "condominio" => $condominio,
                "bread_title" => "Editar Condominio",
                "bread_subcontents" => [
                    [
                        'title' => "Insira dados sobre o condominio",
                        "target_url" =>  route("admin.condominio.condominio")
                    ],

                ]
            ]
        );
    }

    public static function getImagesCondominio($cond_id)
    {
        $result = [];
        $imgs = PhotosCondominio::where('condominio_id', '=', $cond_id)->orderBy('created_at', 'ASC')->get();

        foreach ($imgs as $key => $value) {
            array_push($result, [
                'filename' => $value->name,
                'pathname' => asset(str_replace('public', 'storage', $value->pathname)),
                'condominio_id' => $cond_id
            ]);
        }
        $ret = [
            'status' => true,
            'message' => 'get images ok',
            'imgs' => $result,
            'code' => 200
        ];
        return response()->json($ret, $ret['code']);
    }

    public function deleteImg(Request $request)
    {
        $photos = PhotosCondominio::where([
            ['condominio_id', '=', $request->prop_id],
            ['name', '=', $request->fileName]
        ])->get();
        foreach ($photos as $key => $value) {
            Storage::delete($value->pathname);
        }
        $result = PhotosCondominio::where([
            ['condominio_id', '=', $request->prop_id],
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

    public function deleteAllImages($id)
    {
        $photos = PhotosCondominio::where([
            ['condominio_id', '=', $id],
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


    public function storeImages(Request $request)
    {
        $ret = null;

        try {
            if ($request->hasFile('image')) {

                foreach ($request->file('image') as $image) {
                    $file = $image;

                    $path = $file->store('public/condominios/' . $request->cond_id);
                    $name = $file->getClientOriginalName();

                    $oDate = date('Y-m-d H:i:s');

                    $insert['name'] = $name;
                    $insert['pathname'] = $path;
                    $insert['condominio_id'] = $request->cond_id;
                    $insert['created_at'] = $oDate;

                    PhotosCondominio::insert($insert);
                }
                $ret = [
                    'status' => true,
                    'message' => 'ok files',
                    'code' => 200
                ];
            }
        } catch (\Exception $th) {
            $ret = [
                'status' => false,
                'message' => $th->getMessage(),
                'code' => 400
            ];
        }
        return response()->json($ret, $ret['code']);
    }
}
