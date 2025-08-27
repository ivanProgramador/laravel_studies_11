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
   }

   public function deletePost(){
       if(Gate::denies('post.delete')){
          abort(403, "Você não tem permissão para eliminar posts");
      }
   }

}
