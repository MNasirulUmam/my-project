<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>	@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">My-Project Middle</a>
                <a class="navbar-brand hidden" href="">M</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('home')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Middle elements</h3><!-- /.menu-title -->
                    <li class="active">
                        <a href="{{route('company.index')}}"> <i class="menu-icon fa fa-building-o"></i>Company</a>
                    </li>
                    <li class="active">
                        <a href="{{route('departement.index')}}"> <i class="menu-icon fa fa-tasks"></i>Departement</a>
                    </li>
                    <li class="active">
                        <a href="{{route('users.index')}}"> <i class="menu-icon fa fa-users"></i>Users</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        <div class="dropdown for-notification">
                        
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>
                            <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-id"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-jp"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>
<body>
           
                    <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="container">
                    <div class="col-md-5">
                        @include('flash-message')
                    </div>
                </div>
            </div>
        
        @yield('breadcrumbs')
        @yield('content')  
        <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('style/assets/js/main.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
            } );
        </script> 
</body>
</html>