<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Configurations;
use App\Models\Post;
use App\Models\TypePost;
use Exception;
use Auth;
use DataTables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $config = Configurations::first();
        return view(
            'admin.settings.index',
            [
                "config" => $config,
                "bread_title" => "Configurações",
                "bread_subcontents" => [
                    [
                        'title' => "Configurações gerais do sistema",
                        "target_url" =>  route("admin.settings.index")
                    ],
                ]
            ]
        );
    }

    public function nivel_acesso()
    {
        return view(
            'admin.settings.nivel-acesso',
            [
                "bread_title" => "Níveis de Acesso",
                "bread_subcontents" => [
                    [
                        'title' => "Configurações de níveis de acesso ao sistema",
                        "target_url" =>  route("admin.settings.nivel-acesso")
                    ],
                ]
            ]
        );
    }
    public function mensagem_contato()
    {
        return view(
            'admin.settings.mensagem-contato',
            [
                "bread_title" => "Mensagens de Contato",
                "bread_subcontents" => [
                    [
                        'title' => "Mensagens de Contato de interesse nos imóvel",
                        "target_url" =>  route("admin.settings.mensagem-contato")
                    ],
                ]
            ]
        );
    }

    public function posts()
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

    public function setGeneral(Request $request)
    {
        $ret = null;
        try {
            $data = json_decode($request->data);
            if (!$data)
                throw new \Exception('Dados inválidos');

            $config = Configurations::first();
            if ($config)
                $config->update(['phone' => $data->telefonefixo, 'whatsapp' => $data->whatsapp, 'email' => $data->email ,'descricao' => $request->description_html]);
            else
                $config = Configurations::create(['phone' => $data->telefonefixo, 'whatsapp' => $data->whatsapp, 'email' => $data->email ,'descricao' => $request->description_html]);

            if (!$config)
                throw new \Exception('Erro ao inserir');

            $ret = [
                'message' => 'inserido com sucesso',
                'code' => 200,
                'status' => true,
            ];
        } catch (Exception $th) {
            $ret = [
                'message' => $th->getMessage(),
                'code' => 400,
                'status' => false,
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function setCommission(Request $request)
    {
        $ret = null;
        try {
            $data = json_decode($request->data);

            if (!$data)
                throw new \Exception('Dados inválidos');

            $config = Configurations::first();
            if ($config)
                $config->update(['indicate_com' => $data->comissao_indicar_imovel, 'photo_com' => $data->comissao_fotografo, 'eval_com' => $data->comissao_avaliador, 'realtor_com' => $data->comissao_corretor]);
            else
                $config = Configurations::create(['indicate_com' => $data->comissao_indicar_imovel, 'photo_com' => $data->comissao_fotografo, 'eval_com' => $data->comissao_avaliador, 'realtor_com' => $data->comissao_corretor]);

            if (!$config)
                throw new \Exception('Erro ao inserir');

            $ret = [
                'message' => 'inserido com sucesso',
                'code' => 200,
                'status' => true,
            ];
        } catch (Exception $th) {
            $ret = [
                'message' => $th->getMessage(),
                'code' => 400,
                'status' => false,
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function setSocial(Request $request)
    {
        $ret = null;
        try {
            $data = json_decode($request->data);

            if (!$data)
                throw new \Exception('Dados inválidos');

            $config = Configurations::first();
            if ($config)
                $config->update(['facebook' => $data->link_face, 'instagram' => $data->link_instagram]);
            else {
                $config = Configurations::create(['facebook' => $data->link_face, 'instagram' => $data->link_instagram]);

                if (!$config)
                    throw new \Exception('Erro ao inserir');
            }

            $ret = [
                'message' => 'inserido com sucesso',
                'code' => 200,
                'status' => true,
            ];
        } catch (Exception $th) {
            $ret = [
                'message' => $th->getMessage(),
                'code' => 400,
                'status' => false,
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function addPost(Request $request)
    {

        $ret = null;
        try {
            if ($request->post_id === null) {

                $post = Post::create([
                    'title' => $request->title,
                    'content_text' => $request->content_text,
                    'type_post' => $request->type_post,
                    'only_text' => $request->only_text
                ]);

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    $pathimage = $image->storeAs($post->id, $imageName, 'storage_posts');
                    //    $pathimage= Storage::disk('posts')->storeAs($post->id, $imageName);

                    $post->image_name = $imageName;
                    $post->image_path = $pathimage;
                    $post->save();
                }

                $ret = [
                    'message' => 'inserido com sucesso',
                    'code' => 200,
                    'status' => true,
                    'data' => $request->image

                ];
            } else {
                $post = Post::find($request->post_id);
                $post->title = $request->title;
                $post->content_text = $request->content_text;
                $post->type_post = $request->type_post;
                $post->only_text = $request->only_text;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    $pathimage = $image->storeAs($post->id, $imageName, 'storage_posts');
                    //    $pathimage= Storage::disk('posts')->storeAs($post->id, $imageName);

                    $post->image_name = $imageName;
                    $post->image_path = $pathimage;
                }
                $post->update();

                $ret = [
                    'message' => 'atualizado com sucesso',
                    'code' => 200,
                    'status' => true,
                    'data' => $request->image

                ];
            }
        } catch (Exception $th) {
            $ret = [
                'message' => $th->getMessage(),
                'code' => 400,
                'status' => false,
                'data' => $request->image
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function getAllpost()
    {

        $posts = Post::all();

        // return response()->json(['status' => true, 'itens' => $properties], 200);

        $results = [];
        foreach ($posts as $key => $post) {

            array_push($results, [
                'id' => $post->id,
                'title' => $post->title,
                'image_path' => asset("storage_posts/" . $post->image_path),

            ]);
        }
        // return response()->json(['status' => true, 'itens' => $results], 200);

        return DataTables::of($results)->make();
    }



    public function deletePost($id)
    {
        $ret = null;
        try {
            $post = Post::find($id);
            if ($post == null)
                throw new \Exception('Post não encontrado');

            $res = $post->delete();
            if ($res == 0)
                throw new \Exception('Post não deletado');

            $ret = [
                'status' => true,
                'message' => 'Post deletado com sucesso!',
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


    public function editPost($id)
    {
        $ret = null;
        try {
            $post = Post::find($id);
            if ($post == null)
                throw new \Exception('Post não encontrado');

            $ret = [
                'status' => true,
                'message' => 'Recuperado com sucesso!',
                'post' =>  $post,
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

    public function AddcategoryPosts(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if ($validated) {
            $caract = TypePost::create($request->all());
            return response()->json([
                'success' => true,
                'message' => "Tipo de post criad0 com sucesso",
            ], 200);
        } else
            return response()->json([
                'success' => false,
                'message' => "Erro ao Criar Tipo de post",
            ], 400);
    }

    public function listTypePostCategory()
    {

        $typePost = TypePost::orderBy('name', 'ASC')->get();

        $results = [];
        foreach ($typePost as $key => $type) {
            array_push($results, [
                'id' => $type->id,
                'name' => $type->name,
            ]);
        }
        return DataTables::of($results)->make();
    }

    public function deleteCategoryPosts($id)
    {
        $type = TypePost::where([['id', "=", $id]])->first();
        $type->delete();
        if ($type != null)
            return response()->json([
                'success' => true,
                'message' => 'Tipo de categoria Deletada!',
                'caract' => $type
            ], 200);
        else
            return response()->json([
                'success' => false,
                'message' => 'Tipo de categoria não encontrada!'
            ], 400);
    }

    public function getAllTypesPost()
    {
        $ret = null;
        try {
            $types = TypePost::all();
            if ($types == null)
                throw new \Exception('Tipos de post não encontrado');

            $ret = [
                'status' => true,
                'message' => 'Types Post recuperados',
                'code' => 200,
                'types' => $types
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

    public function categoryPosts()
    {
        return view(
            'admin.settings.blog.category-post',
            [
                "bread_title" => "Categorias dos Posts do Blog",
                "bread_subcontents" => [
                    [
                        'title' => "Lista de todos posts do Blog",
                        "target_url" =>  route("admin.settings.blog.category-post")
                    ],
                ]
            ]
        );
    }

    public function comentarios()
    {
        return view(
            'admin.settings.blog.comentarios-post',
            [
                "bread_title" => "Comentários do Post",
                "bread_subcontents" => [
                    [
                        'title' => "Gerencie os comentários dos posts",
                        "target_url" =>  route("admin.settings.blog.comentarios-post")
                    ],
                ]
            ]
        );
    }
    public function getCommentsByPost($id)
    {
        $ret = null;
        try {
            $comments = Comments::where([['post_id', '=', $id]])->get();
            if (!$comments)
                throw new \Exception("Nenhum comentário encontrado");

            $ret = [
                'status' => true,
                'code' => 200,
                'message' => 'comments ok',
                'comments' => $comments,
                'post_id' => $id
            ];
        } catch (Exception $th) {

            $ret = [
                'status' => false,
                'code' => 400,
                'message' => $th->getMessage()
            ];
        }

        return response()->json($ret, $ret['code']);
    }

    public function deleteCommentsByPost(Request $request)
    {
        $ret = null;
        try {
            if (count($request->arrayDelete) != 0)
                foreach ($request->arrayDelete as $key => $value) {
                    $comment = Comments::where([['id', '=', $value]])->first();
                    $comment->delete();
                }
            else
                throw new \Exception('Nenhum comentário selecionado');

            $ret = [
                'status' => true,
                'code' => 200,
                'message' => 'delete ok'
            ];
        } catch (Exception $th) {

            $ret = [
                'status' => false,
                'code' => 400,
                'message' => $th->getMessage()
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function setVideos(Request $request)
    {
        $ret = null;
        try {

            $data = json_decode($request->data);

            if (!$data)
                throw new \Exception('Dados inválidos');

            $config = Configurations::first();
            if ($config)
                $config->update(['link_vender' => $data->link_vender, 'link_indicar' => $data->link_indicar, 'link_corretores' => $data->link_corretores, 'link_fotografos' => $data->link_fotografos, 'link_avaliadores' => $data->link_avaliadores]);
            else
                $config = Configurations::create(['link_vender' => $data->link_vender, 'link_indicar' => $data->link_indicar, 'link_corretores' => $data->link_corretores, 'link_fotografos' => $data->link_fotografos, 'link_avaliadores' => $data->link_avaliadores]);

            if (!$config)
                throw new \Exception('Erro ao inserir');

            $ret = [
                'status' => true,
                'code' => 200,
                'message' => 'videos ok',
            ];
        } catch (Exception $th) {

            $ret = [
                'status' => false,
                'code' => 400,
                'message' => $th->getMessage()
            ];
        }
        return response()->json($ret, $ret['code']);
    }

    public function setMarcaDagua(Request $request)
    {
        $ret = null;
        try {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $pathimage = $image->storeAs(null, $imageName, 'marca_dagua');

                $config = Configurations::first();
                if ($config)
                    $config->update(['img_name' => $imageName, 'image_path' => $pathimage]);
                else
                    $config = Configurations::create(['img_name' => $imageName, 'image_path' => $pathimage]);

                if (!$config)
                    throw new \Exception('Erro ao inserir');
            }

            $ret = [
                'status' => true,
                'code' => 200,
                'message' => 'image ok',

            ];
        } catch (Exception $th) {

            $ret = [
                'status' => false,
                'code' => 400,
                'message' => $th->getMessage()
            ];
        }
        return response()->json($ret, $ret['code']);
    }
    // public function addCategoryPosts()
    // {
    //     return view(
    //         'admin.settings.blog.add-categoryPost',
    //     );
    // }
}
