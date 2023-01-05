<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Mail\register;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
	public function home_page() {
		$last_blog_post=$this->get_last_blog_post();
		//dd(BlogPost::find(7)->user);
		//dd(($last_blog_post));

		//dd(BlogPost::find(11)->category);
		//dd(Category::find(1)->first()->blogpost);
		return view('index',['last_blog_post'=>$last_blog_post]);
    }

	public function get_last_blog_post(  ) {
		//Mail::to('to@example.com')->send(new register('saeid'));
		$posts=BlogPost::orderBy('created_at', 'desc')->take(4)->get();
		foreach ($posts as $key=>$post){
			$posts[$key]['jdate']=BlogPost::get_date($post);
		}
		return $posts;
    }
}
