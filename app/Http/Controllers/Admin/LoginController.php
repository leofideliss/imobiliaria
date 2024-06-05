<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view(
            'admin.login.login',
            [
                "bread_title" => "Usuários",
                "bread_subcontents" => [
                    [
                        'title' => "Usuário",
                        "target_url" =>  route("admin.login.login")
                    ],
                ]
            ]
        );
    }

    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $this->validate($request, $rules, [
            'email.required' => "E-mail is required",
            'email.email' => "Wrong e-mail format",
            'password.required' => "Password is required"
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credential, false)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => "Autentificado com sucesso!",
                    'redirect' => route("admin.dashboard.index")
                ],
                200
            );
        } else {

            return response()->json(
                [
                    'success' => false,
                    'message' => "Credenciais Inválidas"
                ],
                400
            );
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.login');
    }
}
