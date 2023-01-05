<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Morilog\Jalali\Jalalian;
class blogController extends Controller
{
	public function single($slug) {
		$blog_post=BlogPost::where('slug_fa',$slug)->first();
		$jalalidate=BlogPost::get_date($blog_post);

		//dd($date);
		return view('single',['blog_post'=>$blog_post,'jalalidate'=>$jalalidate]);
    }


}
