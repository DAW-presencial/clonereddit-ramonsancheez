<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // drop
        Community::truncate();
    
        Community::create([
            'id' => 1,
            'name' => 'Post 1',
            'description' => 'Extract 1'
        ]);
    }
}
