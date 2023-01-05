<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
//use Ybazli\Faker\Facades\Faker;

class blogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
	    $title=$this->faker->title;
	    //DB::table('blog_posts')->insert([

		    //]
	    //);
        return [
	        'title'=>$title,
	        'slug'=>str_replace(' ','-',$title),
	        'description'=>$this->faker->text(),
	        //'created_at'=>now(),
	        //'updated_at'=>now()
        ];
    }
}
