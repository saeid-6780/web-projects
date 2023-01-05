<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Http\Requests\BlogRequest;

class blogController2 extends Controller
{
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
	    $blogpost=BlogPost::create([
		    'title'=>$validated_data['title'],
		    'slug_fa'=>str_replace(' ','-',$validated_data['title']),
		    'description'=>$validated_data['description']
	    ]);
	    dd($blogpost->id);
	    return redirect('admin/blog/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( BlogPost $blogpost)
    {
	    return view('admin.posts.edit',['blog_post'=>$blogpost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, BlogPost $blogpost  )
    {
	    //$blog_post=BlogPost::findorfail($id);
	    $validated_data=$request->validated();
	    $blogpost->update($validated_data);
	    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogpost )
    {
    	dd($blogpost->all());
	    //$blog_post=BlogPost::findorfail($id);
	    //$blogpost->delete();
	    //return back();
    }
}
