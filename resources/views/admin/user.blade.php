<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->

    <title>Aplikasi Kehadiran</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">

    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('../css/mini-event-calendar.min.css') }}">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">

    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="{{ asset('../css/dataTable/datatables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/dataTable/responsive.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/dataTable/buttons.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('../css/dataTable/select.bootstrap4.css') }}">

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
                            <li><a href="{{ route('admin.index') }}"><i class='bx bx-home-heart'></i><span>Dashboard</span></a></li>
                            <li class="active"><a href="{{ route('admin.user') }}"><i class='bx bx-user-circle'></i><span>User</span></a></li>
                            <li><a href="{{ route('admin.jam-masuk') }}"><i class='fa fa-clock-o'></i><span>Jam Masuk</span></a></li>
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

            <!-- Body Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-12 col-sm-6 col-xl">
                                <!-- Card -->
                                <div class="card box-margin">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="text-uppercase font-14">
                                                    TANGGAL & WAKTU
                                                </h6>

                                                <!-- Heading -->
                                                <span class="font-24 text-dark mb-0" id="current-time">
                                                   
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                            {{-- cek if message --}}
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Sukses</strong> {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Sukses</strong> {{ session('error') }}
                                </div>
                            @endif

                        <div class="row">
                            <div class="col-12 box-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2">Daftar User</h4>

                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <!-- Actions -->
                                                            <td>
                                                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <div class="actions ml-3">
                                                                        <button type="submit" class="action-item mr-2" data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    </div>
                    <!-- / .row -->
                </div>

                    <!-- Footer Area -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Footer Area -->
                                <footer
                                    class="footer-area d-sm-flex justify-content-center align-items-center justify-content-between">
                                    <!-- Copywrite Text -->
                                    <div class="copywrite-text">
                                        <p>Created by @<a href="#">RIGEL</a></p>
                                    </div>
                                    <div class="fotter-icon text-center">
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Pinterest">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Instagram">
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


    <!-- Plugins Js -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bundle.js"></script>

    <!-- Active JS -->
    <script src="../js/settings.js"></script>
    <script src="../js/scrool-bar.js"></script>
    <script src="../js/todo-list.js"></script>
    <!-- DATE TIME -->
    <script src="../js/waktu.js"></script>
    <script src="../js/active.js"></script>

    <!-- Inject JS -->
    <script src="{{ asset('../js/dataTable/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/datatables.bootstrap4.js') }}"></script>
    <script src="{{ asset('../js/dataTable/datatable-responsive.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/datatable-button.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/button.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/button.html5.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/button.flash.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/button.print.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/datatables.keytable.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/datatables.select.min.js') }}"></script>
    <script src="{{ asset('../js/dataTable/demo.datatable-init.js') }}"></script>
    
</body>

</html>