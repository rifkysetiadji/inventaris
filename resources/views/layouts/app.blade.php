<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src={{asset('js/jquery-3.3.1.min.js')}}></script>
    <script src={{asset('js/datatables.js')}}></script>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>  --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    <link rel="stylesheet" href={{asset('DataTables_2/datatables.min.css')}}>
    <link href={{asset('DataTables_2/Buttons-1.5.6/css/buttons.dataTables.min.css')}} rel="stylesheet" type="text/css" />

    <link href={{asset('css/spinkit.css')}} rel="stylesheet" type="text/css" />
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet" type="text/css" />
    <link href={{asset('css/core.css')}} rel="stylesheet" type="text/css" />
    {{-- <link href={{asset('css/datatables.css')}} rel="stylesheet" type="text/css" /> --}}
    <link href={{asset('css/components.css')}} rel="stylesheet" type="text/css" />
    <link href={{asset('css/icons.css')}} rel="stylesheet" type="text/css" />
    <link href={{asset('css/pages.css')}} rel="stylesheet" type="text/css" />
    <link href={{asset('css/menu.css')}} rel="stylesheet" type="text/css" />
    <link href={{asset('css/responsive.css')}} rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="app">
        
        
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
                    <!-- Image logo -->
                    <a href="/home" class="logo">
                        <span>
                            <img src={{asset('images/logo.png')}} alt="" height="25">
                        </span>
                        <i>
                            <img src={{asset('images/logo_sm.png')}} alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left nav-menu-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                           


                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src={{asset('images/users/avatar-1.jpg')}} alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                   
                                    <li><a href={{ route('logout') }}   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metisMenu nav" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            @if (Auth::user()->level==="Administrator")
                                <li>
                                    <a href="/barang" aria-expanded="true"> <span> Barang </span> </a>
                                </li>
                                <li>
                                    <a href="/jenis" aria-expanded="true"> <span> Jenis </span> </a>
                                </li>
                                <li>
                                    <a href="/ruang" aria-expanded="true"> <span> Ruangan </span> </a>
                                </li>
                                <li>
                                    <a href="/petugas" aria-expanded="true"> <span> Petugas </span> </a>
                                </li>
                                <li>
                                    <a href="/pegawai" aria-expanded="true"> <span> Pegawai </span> </a>
                                </li>
                            @else
                                <li>
                                    <a href="/peminjaman" aria-expanded="true"> <span> Peminjaman </span> </a>
                                </li>
                                <li>
                                    <a href="/pengembalian" aria-expanded="true"> <span> Pengembalian </span> </a>
                                </li>
                            @endif
                            
                            

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                <h4 class="page-title"></h4>
                                    
                                    <div class="clearfix">{{$title}}</div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        
                        <div class="row">
                            <main class="py-4">
                                @yield('content')
                            </main>
                        </div>
                        <!--- end row -->




                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2017 © Adminox. - Coderthemes.com
                </footer>

            </div>

        </div>
        
        
        
    </div>


     <!-- jQuery  -->
     {{-- <script src={{asset('js/jquery.min.js')}}></script> --}}
    
     <script src={{asset('js/bootstrap.min.js')}}></script>
     
     
     <script src={{asset('plugins/datatables/buttons.html5.min.js')}}></script>
     <script src={{asset('plugins/datatables/jszip.min.js')}}></script>
     {{-- <script src={{asset('js/metisMenu.min.js')}}></script> --}}
     <script src={{asset('js/waves.js')}}></script>


     <script src={{asset('DataTables_2/DataTables-1.10.18/js/jquery.dataTables.js')}}></script>
     <script src={{asset('DataTables_2/Buttons-1.5.6/js/dataTables.buttons.min.js')}}></script>
     <script src={{asset('DataTables_2/pdfmake.min.js')}}></script>
     <script src={{asset('DataTables_2/vfs_fonts.js')}}></script>
     <script src={{asset('DataTables_2/jszip.min.js')}}></script>
     <script src={{asset('DataTables_2/Buttons-1.5.6/js/buttons.html5.min.js')}}></script>
     <script src={{asset('DataTables_2/Buttons-1.5.6/js/buttons.print.min.js')}}></script>

     {{-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> --}}
</body>
</html>
