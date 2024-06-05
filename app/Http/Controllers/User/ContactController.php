<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Configurations;

class ContactController extends Controller
{
    public function index()
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

    public function duvidas()
    {
        return view(
            'user.contact.duvidas-frequentes',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.contact.duvidas-frequentes")
                    ],
                ]
            ]
        );
    }

    public function politica_privacidade()
    {
        return view(
            'user.contact.politica-privacidade',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.contact.politica-privacidade")
                    ],
                ]
            ]
        );
    }

    public function venda()
    {
        return view(
            'user.vendaIndique.venda',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.vendaIndique.venda")
                    ],
                ]
            ]
        );
    }

    public function indique()
    {
        return view(
            'user.vendaIndique.indique',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.vendaIndique.indique")
                    ],
                ]
            ]
        );
    }

    public function termos_uso()
    {
        return view(
            'user.contact.termos-uso',
            [
                
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.contact.termos-uso")
                    ],
                ]
            ]
        );
    }

    public function getVideoVenda(){
        $configuracoes = Configurations::all();
       
        return $configuracoes;
    }

}