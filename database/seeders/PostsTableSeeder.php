<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts =[
            [
                'user_id' => 1,
                'title' => 'Primeiro post ',
                'content' => 'Esse post é sobre Laravel 12',     
            ],
            [
                'user_id' => 1,
                'title' => 'Segundo post ',
                'content' => 'Esse post é sobre Gates',
            ],
            [   'user_id' => 2,
                'title' => 'Terceiro post ',
                'content' => 'Esse post é sobre politicas de acesso',
            ],
             [  
                'user_id' => 2,
                'title' => 'Quarto post ',
                'content' => 'Esse post é sobre criação de posts',
            ]
        ];
        DB::table('posts')->insert($posts);
       
        
    }
}
