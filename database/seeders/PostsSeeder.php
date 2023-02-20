<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // drop 
        Post::truncate();

        Post::create([
            'id' => 1,
            'title' => 'Post 1',
            'extract' => 'Extract 1',
            'content' => 'Content 1',
            'expirable' => true,
            'caducable' => true,
            'comentable' => true,
            'access' => 'public'
        ]);
        
    }
}
