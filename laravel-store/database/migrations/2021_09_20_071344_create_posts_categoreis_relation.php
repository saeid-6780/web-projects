<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsCategoreisRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogpost_category', function (Blueprint $table) {
            $table->unsignedBigInteger('blogpost_id');
	        $table->foreign('blogpost_id')->references('id')->on('categoreis');
            $table->unsignedBigInteger('category_id');
	        $table->foreign('category_id')->references('id')->on('blog_posts');
	        $table->unique(['blogpost_id','category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_categoreis_relation');
    }
}
