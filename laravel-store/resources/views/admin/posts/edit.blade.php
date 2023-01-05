@extends('master-templates/master-page')
@section('page-content')
    <div class="container">
        <h2>ویرایش مقاله</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @php
            var_dump($category);
        @endphp
        <form method="post" action="/admin/blog/{{$blog_post['id']}}">
            @csrf
            @method('put')
            <div class="form-group">
                <lable class="" for="title">title</lable>
                <input class="form-control  " type="text" id="post-title" name="title" value="{{$blog_post['title']}}">
            </div>
            <div class="form-group">
                <lable class="" for="category">title</lable>
                <select style="height:7em" class="form-control" type="text" id="category" name="category[]" multiple>


                    @foreach(App\Models\Category::get() as $cat)

                        <option name="{{$cat->id}}" value="{{$cat->id}}" {{in_array($cat->id,$category)?'selected':''}}>{{$cat->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <lable class="" for="description">description</lable>
                <textarea class="form-control  " name="description" id="description" value="">{{$blog_post['description']}}</textarea>

            </div>
            <div class="form-group">
                <button class="btn btn-primary">ارسال</button>
            </div>
        </form>
    </div>
@endsection