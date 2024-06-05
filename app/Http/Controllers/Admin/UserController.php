<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cargos;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Exception;

class UserController extends Controller
{

    public function index()
    {
        return view(
            'admin.user.admin.admin',
            [
                "bread_title" => "Admins",
                "bread_subcontents" => [
                    [
                        'title' => "Admins",
                        "target_url" =>  route("admin.user.admin.admin")
                    ],
                ]
            ]
        );
    }

    public function userExterno()
    {
        return view(
            'admin.user.usuario_externo.usuario-externo',
            [
                "bread_title" => "Usuários Externos",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de todos usuários externos do sistema.",
                        "target_url" =>  route("admin.user.usuario_externo.usuario-externo")
                    ],
                ]
            ]
        );
    }

    public function addAdmin(Request $request)
    {
        $ret = null;
        try {
            $validated = $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required',
                'phone' => 'required',
                'CPF' => 'required',
                'status' => 'required',
                'password' => 'required'
            ]);

            // find user in database
            $user = User::where([['id', "=", $request->user_id]])->first();
            // format by insert
            $insertUser = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'CPF' => $request->CPF,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'type' => 'master'
            ];
            // user already exist
            if ($user != null) {
                User::where([['email', "=", $request->email]])->update($insertUser);
                $ret = [
                    'success' => true,
                    'message' => "Admin atualizado com sucesso",
                    'user' => $user->id,
                    'code' => 200
                ];
            } else { // user not found

                $findEmail = User::where([
                    ['email', "=", $request->email],

                ])->first();
                $findCPF = User::where([
                    ['CPF', "=", $request->CPF],

                ])->first();

                if ($findEmail)
                    throw new \Exception('Email já utilizado!');

                if ($findCPF)
                    throw new \Exception('CPF já utilizado!');

                $user = User::create($insertUser);
                $ret = [
                    'success' => true,
                    'message' => "Admin criado com sucesso",
                    'user' => $user->id,
                    'code' => 200
                ];
            }
        } catch (Exception $th) {
            $ret = [
                'success' => true,
                'message' => $th->getMessage(),
                'code' => 400
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function addEmployee(Request $request)
    {
        try {
            $validated = $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required',
                'phone' => 'required',
                'CPF' => 'required',
                'status' => 'required',
                'password' => 'required',
                'type' => 'required',
            ]);

            // find user in database
            $user = Employee::where([['id', "=", $request->user_id]])->first();

            $cargo = Cargos::find($request->type);
            // format by insert
            $insertUser = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'CPF' => $request->CPF,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'type' => $request->type,
            ];
            // user already exist
            if ($user != null) {
                Employee::where([['email', "=", $request->email]])->update($insertUser);
                User::where([['email', "=", $request->email]])->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'CPF' => $request->CPF,
                    'status' => $request->status,
                    'password' => Hash::make($request->password),
                    'type' => $cargo->name,
                ]);

                $ret = [
                    'success' => true,
                    'message' => "Funcionário atualizado com sucesso",
                    'user' => $user->id,
                    'code' => 200
                ];
            } else { // user not found
                $findEmail = Employee::where([
                    ['email', "=", $request->email],

                ])->first();
                $findCPF = Employee::where([
                    ['CPF', "=", $request->CPF],

                ])->first();

                if ($findEmail)
                    throw new \Exception('Email já utilizado!');

                if ($findCPF)
                    throw new \Exception('CPF já utilizado!');

                $user = Employee::create($insertUser);
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'CPF' => $request->CPF,
                    'status' => $request->status,
                    'password' => Hash::make($request->password),
                    'type' => $cargo->name,
                ]);

                $ret = [
                    'success' => true,
                    'message' => "Funcionário criado com sucesso",
                    'user' => $user->id,
                    'code' => 200
                ];
            }
        } catch (Exception $th) {
            $ret = [
                'success' => false,
                'message' => $th->getMessage(),
                'code' => 400
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function user()
    {

        return view(
            'admin.user.user.user',
            [
                "bread_title" => "Usuários Gerais",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de todos os usuários gerais",
                        "target_url" =>  route("admin.user.user.user")
                    ],
                ]
            ]
        );
    }

    public function listUserJson()
    {
        $users = User::where([['name', "<>", 'administrador']])->orderBy('created_at', 'DESC')->get();

        $results = [];
        foreach ($users as $key => $user) {
            array_push($results, [
                'id' => $user->id,
                'name' => $user->name,
                'status' => $user->status,
                'email' => $user->email
            ]);
        }
        return DataTables::of($results)->make();
    }
    public function listEmployeesJson()
    {
        $users = Employee::orderBy('created_at', 'DESC')->get();

        $results = [];
        foreach ($users as $key => $user) {
            $cargo = Cargos::find($user->type);

            array_push($results, [
                'id' => $user->id,
                'name' => $user->name,
                'status' => $user->status,
                'email' => $user->email,
                'type' => $cargo->name,
            ]);
        }
        return DataTables::of($results)->make();
    }
    public function listExternalUsers()
    {
        $users = Customer::orderBy('created_at', 'DESC')->get();

        $results = [];
        foreach ($users as $key => $user) {
     

            array_push($results, [
                'id' => $user->id,
                'name' => $user->name,
                'status' => $user->status,
                'email' => $user->email,
            ]);
        }
        return DataTables::of($results)->make();
    }

    public function alterStatusCustomer(Request $request)
    {
        $ret = null;
        try {
            $customer = Customer::find($request->id);
            if (!$customer)
                throw new \Exception("Cliente não encontrado");

            $customer->status = $request->status;
            $customer->update();

            $ret = [
                'status' => true,
                'message' => 'statusa atualizado',
                // 'redirect' => route("admin.property.customers"),
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

    public function getAdmin($id)
    {
        $user = User::where([['id', "=", $id]])->first();
        if ($user != null)
            return response()->json([
                'success' => true,
                'message' => 'Usuário encontrado',
                'user' => $user
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Usuário não encontrado!'
            ], 400);
    }
    public function getEmployee($id)
    {
        $user = Employee::where([['id', "=", $id]])->first();
        if ($user != null)
            return response()->json([
                'success' => true,
                'message' => 'Funcionário encontrado',
                'user' => $user
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Funcionário não encontrado!'
            ], 400);
    }

    public function deleteAdmin($id)
    {
        $user = User::where([['id', "=", $id]])->first();
        $user->delete();
        if ($user != null)
            return response()->json([
                'success' => true,
                'message' => 'Usuário Deletado!',
                'user' => $user
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Usuário não encontrado!'
            ], 400);
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::where([['id', "=", $id]])->first();
        $user = User::where([['email', "=", $employee->email]])->first();

        $user->delete();
        $employee->delete();
        if ($employee != null)
            return response()->json([
                'success' => true,
                'message' => 'Funcionário Deletado!',
                'employee' => $employee
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Funcionário não encontrado!'
            ], 400);
    }

    public function funcionario_geral()
    {
        return view(
            'admin.user.funcionario.todos.funcionario-geral',
            [
                "bread_title" => "Funcionários Gerais",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de todos funcionários do administrativo",
                        "target_url" =>  route("admin.user.funcionario.todos.funcionario-geral")
                    ],
                ]
            ]
        );
    }

    public function corretor()
    {
        return view(
            'admin.user.corretor.corretor',
            [
                "bread_title" => "Corretores",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de usuários que são corretores",
                        "target_url" =>  route("admin.user.corretor.corretor")
                    ],
                ]
            ]
        );
    }

    public function fotografo()
    {
        return view(
            'admin.user.fotografo.fotografo',
            [
                "bread_title" => "Fotógrafos",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de usuários que são fotógrafos",
                        "target_url" =>  route("admin.user.fotografo.fotografo")
                    ],
                ]
            ]
        );
    }

    public function avaliador_imovel()
    {
        return view(
            'admin.user.avaliador_imovel.avaliador-imovel',
            [
                "bread_title" => "Avaliadores de Imovel",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de usuários que são avaliadores de imóveis",
                        "target_url" =>  route("admin.user.avaliador_imovel.avaliador-imovel")
                    ],
                ]
            ]
        );
    }
}
