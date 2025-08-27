<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //gate para rota de criação 
        Gate::define('post.create',function(User $user){
            return($user->role === 'admin' || $user->role === 'normal_user');
        });
        
        //gate para rota de deletar 
         Gate::define('post.delete',function(User $user,$post){
            return($user->role === 'admin' || $user->id === $post->user_id);
        });

      
    }
}
