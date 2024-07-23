<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Word Wise</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/wordwiseCircle.png')}}">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->
    <script src="https://kit.fontawesome.com/ff5868ab46.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
    <script src="{{asset('javascript/index.js')}}"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .active-nav {
            color: white !important;
            background-color: rgba(255, 255, 255, .1) !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{url('admin/books')}}" class="brand-link" style="text-decoration:none">
                    <img src="{{asset('images/wordwiseCircle.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Word Wise Admin</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('images/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{url('admin/person/'.Auth::user()->id)}}" class="d-block" style="text-decoration:none">{{ Auth::user()->name }}</a>
                        </div>
                    </div>

                    <p style="color:white;" class="m-0">Books Functions CRUD</p>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{url('admin/books')}}" class="nav-link {{ request()->routeIs('books.*' )? 'active-nav' : '' }}">
                                    <i class="nav-icon fa-solid fa-book good"></i>
                                    <p>
                                        Books
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/authors')}}" class="nav-link {{ request()->routeIs('authors.*') ? 'active-nav' : '' }}">
                                    <i class="nav-icon fa-solid fa-user good"></i>
                                    <p>
                                        Authors
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/genres')}}" class="nav-link {{ request()->routeIs('genres.*') ? 'active-nav' : '' }}">
                                    <i class="nav-icon fa-solid fa-layer-group good"></i>
                                    <p>
                                        Genres
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/publishinghouses')}}" class="nav-link {{ request()->routeIs('publishinghouses.*') ? 'active-nav' : '' }}">
                                    <i class="nav-icon fa-solid fa-house good"></i>
                                    <p>
                                        Publishing Houses
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin/backup')}}" class="nav-link {{ request()->routeIs('backup.*')  || request()->routeIs('backupShow')  ? 'active-nav' : '' }}">
                                    <i class=" nav-icon fa-solid fa-trash bad"></i>
                                    <p>
                                        Backup Bin <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <p style="color:white" class="m-0 mt-4">Admin Roles Functions CRUD</p>

                            <li class="nav-item">
                                <a href="{{url('admin/roles')}}" class="nav-link {{ request()->routeIs('roles.*')   ? 'active-nav' : '' }}">
                                    <i class=" nav-icon fa-solid fa-users good"></i>
                                    <p>
                                        Manage Roles <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('admin/person')}}" class="nav-link {{ request()->routeIs('person.*') ? 'active-nav' : '' }}">
                                    <i class=" nav-icon fa-solid fa-user-check good"></i>
                                    <p>
                                        Authorized Persons <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>




                            <li class="nav-item">
                                <a href="{{url('admin/unauthorized')}}" class="nav-link {{ request()->routeIs('unauthorized.*')   ? 'active-nav' : '' }}">
                                    <i class=" nav-icon fa-solid fa-user-xmark bad"></i>
                                    <p>
                                        Unuthorized Persons <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>




                            <p style="color:white" class="m-0 mt-4">Logout</p>
                            <li class="nav-item logoutButton">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="nav-icon fa-solid fa-right-from-bracket bad"></i>
                                    <p>Logout</p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <!-- /.sidebar-menu -->
                    </nav>
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @if (session('successAlert'))
                <div class='alert  alert-dismissible alert-success fade show m-4 ' role='alert'>
                    <strong>{{session('successAlert')}}</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                </div>
                @endif

                <main class="py-2">
                    @yield('content')
                </main>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->



            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->




</body>

</html>