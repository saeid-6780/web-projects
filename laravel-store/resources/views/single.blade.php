@extends('master-templates.master-page')
@push('styles')
<link href="<?= Illuminate\Support\Facades\URL::asset( 'css/blog.css' ) ?>" rel="stylesheet">
@endpush
@section('page-content')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
            </div>
            <!-- /page_header -->
            <div class="row">
                <div class="col-lg-9">
                <?php include( resource_path( 'views' ) . '\templates\single-content.blade.php' )?>
                <!-- /single-post -->
                    <?php include( resource_path( 'views' ) . '\templates\single-comment.blade.php' )?>
                </div>
                <!-- /col -->
            <?php include( resource_path( 'views' ) . '\templates\single-sidebar.blade.php' )?>
            <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection