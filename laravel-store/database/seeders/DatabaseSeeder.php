<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\blogPostFactory;
//use Database\seeders\blogpostsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Category::factory()->count(10)->create();
    	$this->call([
	    //blogpostsSeeder::class,
	    //userSeeder::class

	    ]);
    }
}
