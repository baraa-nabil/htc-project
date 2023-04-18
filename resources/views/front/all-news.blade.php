@extends('front.parent')

@section('title', ' All-News')

@section('style')
@endsection

@section('content')

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{ $categories->name }}
        <small>Subheading</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('homeWeb') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $categories->name }}</li>
    </ol>

    <!-- news title One -->
    @foreach ($articles as $article )

    <div class="row">
        <div class="col-md-7">
            <a href="newsdetailes.html">
                <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0"
                    src="{{ asset('storage/images/article/' . $article->image ?? "") }} " alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->short_description }}</p>
            <a class="btn btn-primary" href="{{ route('det',$article->id) }}">View news title
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <!-- /.row -->

    <hr>
    @endforeach


    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        {{ $articles->links() }}
    </ul>

</div>
<!-- /.container -->

@endsection

@section('script')
@endsection