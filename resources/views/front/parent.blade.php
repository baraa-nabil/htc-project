<?php
// use App\Models\Category;
// $categories = Category::where('status','active')->orderBy('updated_at','desc')->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('front/css/modern-business.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">news</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homeWeb') }}">home</a>
                    </li>
                    @foreach ($categories as $categoty )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('all',$categoty->id) }}">{{ $categoty->name }}</a>
                    </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Momen Sisalem 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('script')
</body>

</html>