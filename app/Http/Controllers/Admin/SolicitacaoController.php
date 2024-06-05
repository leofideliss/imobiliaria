<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function solicitacao_corretor()
    {
        return view(
            'admin.solicitacoes.corretores.solicitacoes-corretores',
            [
                "bread_title" => "Solicitações Corretores",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de solicitações para tornar-se um corretor",
                        "target_url" =>  route("admin.solicitacoes.corretores.solicitacoes-corretores")
                    ],
                ]
            ]
        );
    }

    public function aprovar_corretores()
    {
        return view(
            'admin.solicitacoes.corretores.aprovar-corretor',
            [
                "bread_title" => "Solicitações Corretores",
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("admin.solicitacoes.corretores.aprovar-corretor")
                    ],
                ]
            ]
        );
    }

    public function solicitacao_fotografo()
    {
        return view(
            'admin.solicitacoes.fotografos.solicitacoes-fotografos',
            [
                "bread_title" => "Solicitações Fotógrafos",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de solicitações para tornar-se um corretor",
                        "target_url" =>  route("admin.solicitacoes.fotografos.solicitacoes-fotografos")
                    ],
                ]
            ]
        );
    }

    public function aprovar_fotografo()
    {
        return view(
            'admin.solicitacoes.fotografos.aprovar-fotografo',
            [
                "bread_title" => "Solicitações Corretores",
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("admin.solicitacoes.fotografos.aprovar-fotografo")
                    ],
                ]
            ]
        );
    }

    public function solicitacao_avaliador()
    {
        return view(
            'admin.solicitacoes.avaliadores.solicitacoes-avaliadores',
            [
                "bread_title" => "Solicitações Avaliadores",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de solicitações para tornar-se um corretor",
                        "target_url" =>  route("admin.solicitacoes.avaliadores.solicitacoes-avaliadores")
                    ],
                ]
            ]
        );
    }

    public function aprovar_avaliador()
    {
        return view(
            'admin.solicitacoes.avaliadores.aprovar-avaliador',
            [
                "bread_title" => "Solicitações Avaliadores de Imóveis",
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("admin.solicitacoes.avaliadores.aprovar-avaliador")
                    ],
                ]
            ]
        );
    }

}