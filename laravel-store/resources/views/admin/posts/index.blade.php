@extends('master-templates/master-page')
@section('page-content')

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Item</a>
            <a class="dropdown-item" href="#">Another Item</a>
            <a class="dropdown-item" href="#">One more item</a>
        </div>
    </div>

    <div class="container">
    <h2>لیست مقالات</h2>
        <table class="table">
            <thead>
            <tr>
                <td>ردیف</td>
                <td>موضوع</td>
                <td>عملیات</td>
            </tr>
            </thead>
            <tbody>
            @foreach($blog_post as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url('/')}}/admin/blog/{{$post['id']}}/edit" >{{$post['title']}}</a></td>
                    <td>
                        <form action="/admin/blog/{{$post['id']}}" method="post">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection