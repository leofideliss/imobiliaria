<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configurations;
use Exception;
use Auth;

use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function lista_contatos()
    {
        return view(
            'admin.settings.blog.posts',
            [
                "bread_title" => "Posts do Blog",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de todos posts do Blog",
                        "target_url" =>  route("admin.settings.blog.posts")
                    ],
                ]
            ]
        );
    }

}
