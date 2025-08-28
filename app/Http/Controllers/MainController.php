<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

   public function index(){
    //Trazendo todos os posts que os dados dos usuarios que postaram 
    $posts = Posts::with('user')->get();

    return view('dashboard', ['posts' => $posts]);
   }



   public function createPost(){
      if(Gate::denies('post.create')){
          abort(403, "Você não tem permissão para criar posts");
      }
      return view('create-post');
   }

   public function storePost(Request $request){

    //testando a permissão

      if(Gate::denies('post.create')){
          abort(403, "Você não tem permissão para criar posts");
      }

    //validando os dados do formulário
     $request->validate(
           [
                'title' => 'required|min:3|max:100',
                  'content' => 'required|min:3|max:1000'
           ],
           [
               'title.min' => 'O título deve ter no mínimo 3 caracteres',
               'title.required' => 'O título é obrigatório',
               'content.required' => 'O corpo do post é obrigatório',
               'title.max' => 'O título deve ter no máximo 100 caracteres',
               'content.max' => 'O corpo do post deve ter no máximo 1000 caracteres',
               'content.min' => 'O corpo do post deve ter no mínimo 3 caracteres',
            ]
        );



        //salvando o post no banco de dados
        Posts::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id()
        ]);

        //redirecionando para a dashboard
        return redirect()->route('dashboard');
   }

    

   







   public function deletePost($id){

       $post = Posts::find($id);

       if(Gate::denies('post.delete',$post)){
          abort(403, "Você não tem permissão para eliminar posts");
      }
       
       $post->delete();

       return redirect()->route('dashboard');


   }

}
