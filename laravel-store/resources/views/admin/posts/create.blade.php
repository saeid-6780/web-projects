@extends('admin/base')
@section('content')
    <div class="container">
    <h2>ایجاد مقاله</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
        </div>
        @endif
    <form method="post" action="/admin/blog">
        @csrf
        <div class="form-group">
            <lable class="" for="title">title</lable>
            <input class="form-control  " type="text" id="post-title" name="title">
        </div>

        <div class="form-group">
            <lable class="" for="category">title</lable>
            <select style="height:7em" class="form-control" type="text" id="category" name="category[]" multiple>

                @foreach(App\Models\Category::get() as $cat)

                    <option name="{{$cat->id}}" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <lable class="" for="description">description</lable>
            <textarea class="form-control  " name="description" id="description"></textarea>
            <button class="btn btn-primary">ارسال</button>
        </div>

    </form>
    </div>
@endsection