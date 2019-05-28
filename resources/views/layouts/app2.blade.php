<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventaris</title>
    <script src="{{ asset('jsasli/jquery-3.3.1.min.js') }}" ></script>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('jsasli/bootstrap.min.js') }}"></script>

    {{-- datatables
    <link href={{asset('plugins/datatables/jquery.dataTables.min.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/buttons.bootstrap.min.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/fixedHeader.bootstrap.min.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/responsive.bootstrap.min.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/scroller.bootstrap.min.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/dataTables.colVis.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/dataTables.bootstrap.min.css')}} rel="stylesheet" type="text/css"/>
    <link href={{asset('plugins/datatables/fixedColumns.dataTables.min.css')}} rel="stylesheet" type="text/css"/>

    <script src={{asset('plugins/datatables/jquery.dataTables.min.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.bootstrap.js')}}></script>

    <script src={{asset('plugins/datatables/dataTables.buttons.min.js')}}></script>
    <script src={{asset('plugins/datatables/buttons.bootstrap.min.js')}}></script>
    <script src={{asset('plugins/datatables/jszip.min.js')}}></script>
    <script src={{asset('plugins/datatables/pdfmake.min.js')}}></script>
    <script src={{asset('plugins/datatables/vfs_fonts.js')}}></script>
    <script src={{asset('plugins/datatables/buttons.html5.min.js')}}></script>
    <script src={{asset('plugins/datatables/buttons.print.min.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.fixedHeader.min.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.keyTable.min.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.responsive.min.js')}}></script>
    <script src={{asset('plugins/datatables/responsive.bootstrap.min.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.scroller.min.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.colVis.js')}}></script>
    <script src={{asset('plugins/datatables/dataTables.fixedColumns.min.js')}}></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('cssasli/app.css') }}" rel="stylesheet">

    <link href="{{ asset('cssasli/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="/pegawai/pinjam" class="nav-link">Barang</a>
                        </li>
                        <li class="nav-item">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="/logoutpegawai">Logout</a>
                            </li>
                    </ul>

                   
                </div>
            </div>
        </nav> --}}
        <nav class="navbar navbar-dark bg-dark mb-5">
            <span class="navbar-brand mb-0 h1 mx-auto">Inventory</span>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="/logoutpegawai" class="nav-link">Logout</a>
                </li>
            </ul>
            </ul>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
