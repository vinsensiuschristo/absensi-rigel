{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <title>Register</title>

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
                <div class="col-md-8 col-lg-6">
                    <!-- Middle Box -->
                    <div class="middle-box my-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="font-24 mb-30">Create account.</h4>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="fullname">Name</label>
                                        <input class="form-control" type="text" id="fullname" placeholder="Name"
                                        name="name" :value="old('name')" required autofocus autocomplete="name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email"
                                            placeholder="Enter your email" id="email" name="email" :value="old('email')" required autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" id="password"
                                            placeholder="Enter your password"
                                            type="password" name="password" required autocomplete="new-password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Confirm Password</label>
                                        <input class="form-control" id="password_confirmation"
                                            type="password" name="password_confirmation" required autocomplete="new-password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="form-group mb-0 mt-15">
                                        <button class="btn btn-primary btn-block" type="submit">Create my
                                            account</button>
                                    </div>

                                    <div class="text-center mt-15"><span class="mr-2 font-13">Already have an
                                            account?</span><a class="font-13" href="{{ route('login') }}">Sign in</a></div>

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