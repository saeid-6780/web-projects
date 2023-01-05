<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;


class blogController extends Controller
{

	public function __construct(  ) {
		$this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $blog_post=BlogPost::all();
	    return view('admin.posts.index',['blog_post'=>$blog_post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
	    $validated_data=$request->validated();
	    /*if ($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}*/
	    /*$blogpost=BlogPost::create([

	    ]);*/
($validated_data);
	    $blogpost=Auth::user()->blogposts()->create([
	    	'title'=>$validated_data['title'],
		    'slug_fa'=>str_replace(' ','-',$validated_data['title']),
	        'description'=>$validated_data['description']
	    ]);
	    $blogpost->category()->attach($validated_data['category']);

	    return redirect('admin/blog/'.$blogpost->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($postid )
    {
	    $blog_post=BlogPost::findorfail($postid);
	    $category=$blog_post->category()->get()->pluck('id');
	    foreach ($category as $key=>$cat)
	    	$cat_arr[$key]=$cat;
	    return view('admin.posts.edit',['blog_post'=>$blog_post,'category'=>$cat_arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $postid)
    {
	    $blog_post=BlogPost::findorfail($postid);
	    $validated_data=$request->validated();
	    $blog_post->update($validated_data);
	    $blog_post->category()->sync($validated_data['category']);
	    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($postid)
    {
	    $blog_post=BlogPost::findorfail($postid);
	    $blog_post->delete();
	    return back();
    }
}
