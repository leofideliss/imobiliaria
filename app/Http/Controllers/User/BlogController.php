<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Post;
use App\Models\TypePost;
use DebugBar\DebugBar;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blog()
    {
        return view(
            'user.blog.blog',
            [

                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.blog.blog")
                    ],
                ]
            ]
        );
    }

    public function getListPost(){
        $posts = Post::orderBy('created_at')->limit(3)->get();

        return $posts;
    }

    public function getPostRecente(){
        $posts = Post::orderBy('created_at')->limit(1)->get();

        return $posts;
    }

    public function getTodasCategorias(){
        $todasCategorias = TypePost::all();

        return $todasCategorias;
    }


    public function getComentariosPost($id){
        $comentarios = Comments::where('post_id', '=', $id)->get();

        return $comentarios;
    }

    public function getCategoria($id){
        $categoria = TypePost::where('id', '=', $id)->first();

        return $categoria;
    }

    public function post($id)
    {

        $posts = Post::where([['id', '=', $id]])->get();
        $comments = Comments::where([['post_id', '=', $id]])->get();
        return view(
            'user.blog.post',
            [
                'posts' => $posts,
                'comments' => $comments,
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("user.blog.post", ['id' => $id])
                    ],
                ]
            ]
        );
    }

    public function addComment(Request $request)
    {
        $ret = null;

        try {

            Comments::create([
                "name" => $request->name,
                "email" => $request->email,
                "comment" => $request->message,
                "post_id" => $request->post_id
            ]);
            $ret = [
                'status' => true,
                'message' => 'ok comment',
                'code' => 200,
                'data' => $request->all()
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
}
