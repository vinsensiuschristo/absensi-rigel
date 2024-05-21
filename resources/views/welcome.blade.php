<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <title>Project Absensi</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="login-area">

    <!-- Preloader -->
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content-">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="hero">
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box py-4">
                        <div class="card">
                            <div class="card-body p-4">

                                <!-- Logo -->
                                <h4 class="font-24 mb-30">Login.</h4>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <input class="form-control login" type="email" id="emailaddress" required="" placeholder="Enter your email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <a href="forget-password.html" class="text-dark float-right"></a>
                                        <input class="form-control login" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                        <div class="checkbox d-inline mb-0">
                                        </div>
                                        <span><a class="font-12 text-success" href="forget-password.html">Forgot your password?</a></span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                    <div class="text-center mt-15"><span class="mr-2 font-12">Don't have an account?</span><a class="font-12" href="{{ route('register') }}">Sign up</a></div>

                                </form>

                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Plugins Js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bundle.js"></script>

    <!-- Active JS -->
    <script src="js/active.js"></script>

</body>

</html>