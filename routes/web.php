<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    //testando se existe um login feito por esse usuario
    if (Auth::check()) {
        //se sim ele vai aparar a dasboard 
        return redirect()->route('dashboard');
    }else {
        //se não ele vai para a tela de login
        return view('login');
    }
});


Route::middleware('auth')->group(function () {

     Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
