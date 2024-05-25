{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <title>Aplikasi Kehadiran</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

    <!-- Choose Layout -->
    <div class="choose-layout-area">
        <div class="setting-trigger-icon" id="settingTrigger">
            <i class="ti-settings"></i>
        </div>
        <div class="choose-layout" id="chooseLayout">
            <div class="quick-setting-tab">
                <div class="widgets-todo-list-area">
                    <h4 class="todo-title">Todo List:</h4>
                    <form id="form-add-todo" class="form-add-todo">
                        <input type="text" id="new-todo-item" class="new-todo-item form-control" name="todo"
                            placeholder="Add New">
                        <input type="submit" id="add-todo-item" class="add-todo-item" value="+">
                    </form>

                    <form id="form-todo-list">
                        <ul id="flaptToDo-list" class="todo-list">
                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="test"><span></span></label>Go to Market
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Meeting with AD
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Check Mail
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Work for Theme
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Create a Plugin
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Fixed Template Issues
                                <i class="todo-item-delete ti-close"></i></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        <div class="flapt-sidemenu-wrapper">
            <!-- Desktop Logo -->
            <div class="flapt-logo">
                <a href="index.html"><img class="desktop-logo" src="{{ asset('image/logo.png') }}" alt="Desktop Logo"> <img
                        class="small-logo" src="{{ asset('image/small-logo.png') }}" alt="Mobile Logo"></a>
            </div>

            <!-- Side Nav -->
            <div class="flapt-sidenav" id="flaptSideNav">
                <!-- Side Menu Area -->
                <div class="side-menu-area">
                    <!-- Sidebar Menu -->
                    <nav>
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="menu-header-title">Dashboard</li>
                            <li><a href="#"><i class='bx bx-home-heart'></i><span>Dashboard</span></a></li>
                            <li class="active"><a href="{{ route('dashboard') }}"><i class='bx bx-user-circle'></i><span>Absensi</span></a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logoutForm').submit();">
                                                        <i class="bx bx-power-off"></i>
                                                        <span>Log Out</span>
                                    </a>
                                {{-- Logout User --}}
                                <form method="POST" action="{{ route('logout') }}" class="logoutForm" id="logoutForm">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo">
                        <a href="index.html"><img src="{{ asset('image/small-logo.png') }}" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="flapt-triggers">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                    </div>
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class='bx bx-menu-alt-right'></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">

                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-item"><i class="font-15"
                                aria-hidden="true"></i> {{ Auth::user()->name }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="{{ asset('image/person_1.jpg') }}"
                                    alt=""></button>
                            <div class="dropdown-menu profile dropdown-menu-right">
                                <!-- User Profile Area -->
                                <div class="user-profile-area">
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item"><i class="bx bx-wrench font-15"
                                            aria-hidden="true"></i> Profile Setting</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </header>


            <!-- Main Page -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">

                            
                {{-- cek if message --}}
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <strong>Sukses</strong> Data Berhasil Diupdate.
                </div>
                @endif

                            <div class="col-12 col-md-4">
                                <div class="card mb-30">
                                    <img src="{{ asset('image/4.jpg') }}" class="profile-cover-img" alt="thumb">
                                    <div class="card-body text-center">
                                        <h6 class="font-20 mb-1">{{ Auth::user()->name }}</h6>
                                        <p class="font-13 text-dark">Web Developer</p>
                                        <p class="description px-4">Ini bisa dipake atau engga, kalau mau dipake ini bisa diisi penjelasan di ilangin juga gapapa</p>
                                    <div class="card address mb-30">
                                        <div class="card-body">
                                            <h4 class="font-16 mb-15">Contact :</h4>
                                            <div class="mt-0 d-flex align-items-center">
                                                <i class="fa fa-home pr-2"></i>
                                                <h6 class="font-14 mb-0">{{ Auth::user()->email }}</h6>
                                            </div>
                                            <div class="mt-3 d-flex align-items-center">
                                                <i class="fa fa-phone pr-2"></i>
                                                <h6 class="font-14 mb-0">+91 656 887 245</h6>
                                            </div>
                                            <div class="mt-3 d-flex align-items-center">
                                                <i class="fa fa-map pr-2 align-self-start"></i>
                                                <h6 class="font-14 mb-0">Van Barneveldlaan 98, Netherlands</h6>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- ./profile -->
                            </div>
                            
                            {{-- Data User --}}
                            <div class="col-12 col-md-8">
                                <div class="profile-crm-area">
                                    <div class="card mb-30">
                                        <div class="card-body">
                                            {{-- ini user data--}}
                                            <h4>Profile Information</h4>
                                            <p class="mt-1 text-sm text-gray-600">
                                                Update your account's profile information and email address.
                                            </p>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('patch')
                                                <div class="row profile-row">
                                                    <div class="col-xs-5 col-sm-3">
                                                        <span class="profile-cat">Full Name</span>
                                                    </div>
                                                    <div class="col-xl-7 col-sm-9">
                                                        <input type="text"
                                                            class="form-control rounded-0 form-control-md"
                                                            id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="row profile-row">
                                                    <div class="col-xs-5 col-sm-3">
                                                        <span class="profile-cat">Email</span>
                                                    </div>
                                                    <div class="col-xl-7 col-sm-9">
                                                        <input type="email"
                                                            class="form-control rounded-0 form-control-md"
                                                            id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="row profile-row">
                                                    <div class="col-xs-5 col-sm-3">
                                                        <button class="btn btn-primary btn-block" type="submit">Update
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="profile-crm-area">
                                    <div class="card mb-30">
                                        <div class="card-body">
                                            {{-- ini user data--}}
                                            <h4>Update Password</h4>
                                            <p class="mt-1 text-sm text-gray-600">
                                                Ensure your account is using a long, random password to stay secure.
                                            </p>
                                            <div class="card-body">
                                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('put')

                                                <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Password Lama</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <input id="update_password_current_password" name="current_password" type="password" class="form-control rounded-0 form-control-md" autocomplete="current-password">
                                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Password Baru</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <input id="update_password_password" name="password" type="password" class="form-control rounded-0 form-control-md" autocomplete="new-password">
                                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <span class="profile-cat">Comfirm Password</span>
                                                        </div>
                                                        <div class="col-xl-7 col-sm-9">
                                                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control rounded-0 form-control-md" autocomplete="new-password">
                                                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="row profile-row">
                                                        <div class="col-xs-5 col-sm-3">
                                                            <button class="btn btn-primary btn-block" type="submit">Update Password
                                                        </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                

                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Footer Area -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Footer Area -->
                                <footer class="footer-area d-sm-flex justify-content-center align-items-center justify-content-between">
                                    <!-- Copywrite Text -->
                                    <div class="copywrite-text">
                                        <p>Created by @<a href="#">Theme-zome</a></p>
                                    </div>
                                    <div class="fotter-icon text-center">
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Pinterest">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-toggle="tooltip" title="Instagram">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </footer>
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
    <script src="js/settings.js"></script>
    <script src="js/scrool-bar.js"></script>
    <script src="js/todo-list.js"></script>
    <script src="js/active.js"></script>
    
    <script>
        // Get all elements with class="closebtn"
        var close = document.getElementsByClassName("closebtn");
        var i;

        // Loop through all close buttons
        for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function() {

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function() {
                    div.style.display = "none";
                }, 600);
            }
        }
    </script>

</body>

</html>