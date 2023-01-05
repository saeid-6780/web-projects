<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
	        $table->renameColumn('slug','slug_fa');
	        $table->foreignId('user_id')->default(11);
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->integer('view')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_posts', function (Blueprint $table) {
	        $table->renameColumn('slug_fa','slug');
	        $table->dropColumn('user_id');
	        $table->dropColumn('view');
        });
    }
}
