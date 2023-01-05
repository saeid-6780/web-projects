<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\BlogPost;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BlogController1 extends Controller
{
	public function index(  ) {
		$blog_post=BlogPost::all();
		return view('admin.posts.index',['blog_post'=>$blog_post]);
    }
	public function create(  ) {
		return view('admin.posts.create');
    }

	public function create_post( BlogRequest $request ) {
		$validated_data=$request->validated();
		/*if ($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}*/
		BlogPost::create([
			'title'=>$validated_data['title'],
			'slug_fa'=>str_replace(' ','-',$validated_data['title']),
			'description'=>$validated_data['description']
		]);
		return redirect('admin/posts/create');
    }

	public function edit(BlogPost $blogpost ) {
		//$blog_post=BlogPost::findorfail($id);
		return view('admin.posts.edit',['blog_post'=>$blogpost]);
    }

	public function edit_put(BlogRequest $request, BlogPost $blogpost  ) {
		//$blog_post=BlogPost::findorfail($id);
		$validated_data=$request->validated();
		$blogpost->update($validated_data);
		return back();
    }

	public function delete( BlogPost $blogpost  ) {
		//$blog_post=BlogPost::findorfail($id);
		$blogpost->delete();
		return back();
    }
}
