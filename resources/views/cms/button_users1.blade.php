<!DOCTYPE html>
<html lang="en">

<head>
    <title>News Site</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('login/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <!-- font-awesome/v6.3.0/css -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>

    <div class="limiter bg-dark">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 bg-light" style="border: 1px solid black;">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-49 text-dark">
                        موجه صفحات الدخول
                    </span>
                    <div class="container-login100-form-btn  mt-3">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <a class="login100-form-btn" href="{{ url('cms/admin/login') }}">

                                <i class="fa-solid fa-user-gear m-2"></i> Login as Admin
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn  mt-3">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <a class="login100-form-btn" href="{{ url('cms/author/login') }}">
                                <i class="fa-solid fa-chalkboard-user m-2"></i> Login as Author
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->


</body>

</html>
