<?php

namespace App\Http\Controllers;

use App\Models\Proprietarios;
use Exception;
use Illuminate\Http\Request;
use DataTables;
use Auth;

class ProprietariosController extends Controller
{
    public function index()
    {
        return view(
            'admin.proprietarios.index',
            [
                "bread_title" => "Lista de Proprietários",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de proprietarios",
                        "target_url" =>  route("admin.proprietarios.index")
                    ],

                ]
            ]
        );
    }

    public function addProprietario(Request $request)
    {
        $ret = null;
        try {
            $user = Auth::guard('admin')->user();
            if (!$user)
                throw new \Exception("Não foi possível encontrar o usuário");

            $data = [
                "email" => $request->data["email"],
                "telefone" => $request->data["telefone"],
                "nome" => $request->data["nome"],
                "user_code" => $user->id
            ];

            if (!$request->prop_id) {
                $prop =  Proprietarios::create($data);

                if ($prop == null)
                    throw new \Exception("Não foi possível adicionar o proprietário");

                $ret = [
                    "code" => 200,
                    "status" => true,
                    "message" => "Proprietário adicionado com sucesso!",
                    "proprietario" => $prop

                ];
            } else {
                $prop =  Proprietarios::where("id",$request->prop_id)->update($data);

                $ret = [
                    "code" => 200,
                    "status" => true,
                    "message" => "Proprietário atualizado com sucesso!",
                    "proprietario" => $prop

                ];
            }
        } catch (Exception $th) {
            $ret = [
                "code" => 400,
                "status" => false,
                "message" => $th->getMessage()
            ];
        }
        return response()->json($ret, $ret["code"]);
    }

    public function getProprietarios()
    {

        $user = Auth::guard('admin')->user();
        $proprietario = null;
        if ($user->type == 'master')
            $proprietario = Proprietarios::all();
        else
            $proprietario = Proprietarios::where([['user_code', '=', $user->id]])->get();

        $results = [];
        foreach ($proprietario as $key => $prop) {


            array_push($results, [
                'id' => $prop->id,
                'nome' => $prop->nome,
                'email' => $prop->email,
                'telefone' => $prop->telefone,
            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }

    public function deleteProprietario($id)
    {
        $ret = null;
        try {

            $user = Auth::guard('admin')->user();
            if (!$user)
                throw new \Exception("Usuário não encontrado");


            $prop =  Proprietarios::find($id);
            $prop->delete();

            $ret = [
                "status" => true,
                "code" => 200,
                "message" => "Proprietario deletado"
            ];
        } catch (Exception $th) {
            $ret = [
                "status" => false,
                "code" => 400,
                "message" => $th->getMessage()
            ];
        }

        return response()->json($ret, $ret["code"]);
    }
}
