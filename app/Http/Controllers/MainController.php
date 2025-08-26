<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class MainController extends Controller
{

   public function index(){
    //Trazendo todos os posts que os dados dos usuarios que postaram 
    $posts = Posts::with('user')->get();

    return view('dashboard', ['posts' => $posts]);
   }

}
