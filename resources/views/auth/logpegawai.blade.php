<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('jsasli/app.js') }}" defer></script>
    <script type="text/javascript" src="{{asset('jsasli/jquery-3.3.1.min.js')}}"></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('cssasli/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-top:150px ">
                        <div class="card-header">{{ __('Login Pegawai') }}</div>
        
                        <div class="card-body">
                                @if ($message = Session::get('errors'))
                                <div class="row justify-content-center">
                                    <div class="alert alert-danger alert-block col-sm-6">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                                <strong>{{ $message }}</strong>
                                            </div>
                                </div>
                                
                              @endif
                            <form method="POST" action="/loginpegawai" aria-label="{{ __('Login') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
        
                                        
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
        
                                        
                                    </div>
                                </div>
        
                                
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        <a class="btn btn-link" href="/">
                                            {{ __('Login Petugas') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


