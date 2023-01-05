<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\blogPostFactory;
//use Ybazli\Faker\Facades\Faker;

class blogpostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    BlogPost::factory()->count(5)->create();
    }
}
