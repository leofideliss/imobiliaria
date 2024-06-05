<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class InformacoesController extends Controller
{
    public function trabalhe_fotografo()
    {
        return view(
            'user.trabalhe-conosco.trabalhe-fotografo',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.trabalhe-conosco.trabalhe-fotografo")
                    ],
                ]
            ]
        );
    }

    public function trabalhe_corretor()
    {
        return view(
            'user.trabalhe-conosco.trabalhe-corretor',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.trabalhe-conosco.trabalhe-corretor")
                    ],
                ]
            ]
        );
    }

    public function trabalhe_avaliador()
    {
        return view(
            'user.trabalhe-conosco.trabalhe-avaliador',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.trabalhe-conosco.trabalhe-avaliador")
                    ],
                ]
            ]
        );
    }

}