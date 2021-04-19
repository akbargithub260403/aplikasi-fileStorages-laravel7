<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('judul')</title>

    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">


    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link href="{{ asset('css/font.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icon.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <link href="{{ asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/themes/all-themes.css')}}" rel="stylesheet" />

    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">LARAVEL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                 
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{!! asset('img/'.Auth::user()->avatar) !!}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ Route('show',Auth::user()->id)}}"><i class="material-icons">person</i>Profile</a>
                            </li>
                            @if (auth()->user()->role == 'super_admin')
                            <li>
                                <a href="{{ Route('tambahAdmin')}}"><i class="material-icons">person</i>Tambah Admin</a>
                            </li>
                            @endif
                            <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="{{ Route('home')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    @if(auth()->user()->role == 'super_admin')
                    <li>
                        <a href="{{ Route('daftar_admin')}}">
                            <i class="material-icons">face</i>
                            <span>Daftar Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('tambahStudents')}}">
                            <i class="material-icons">account_box</i>
                            <span>Tambah Students</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'admin')
                    <li>
                        <a href="{{ Route('createPost')}}">
                            <i class="material-icons">outbond</i>
                            <span>Create Post</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'students')
                    <li>
                        <a href="{{ Route('post',Auth::user()->prodi)}}">
                            <i class="material-icons">question_answer</i>
                            <span>Postingan</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- #Menu -->
           
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

    <section class="content">
        @yield('content')
            @yield('judulContent')
    </section>




    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('plugins/node-waves/waves.js')}}"></script>
    <script src="{{ asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('plugins/morrisjs/morris.js')}}"></script>
    <script src="{{ asset('plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{ asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{ asset('js/admin.js')}}"></script>
    <script src="{{ asset('js/pages/index.js')}}"></script>
    <script src="{{ asset('js/demo.js')}}"></script>
</body>

</html>
