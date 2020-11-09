<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} | Iniciar sesión</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
    {{-- Custom style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
{{-- <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>{{ config('app.name') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="card-header">{{ __('Iniciar sesión') }}</div>        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input 
                            name="email"
                            type="email" 
                            class="form-control" 
                            placeholder="Email"
                            value="{{ old('email') }}"
                            @error('email') is-invalid @enderror>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input 
                            name="password"
                            type="password" 
                            class="form-control" 
                            placeholder="Contraseña"
                            required 
                            @error('password') is-invalid @enderror>
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>            
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Recuérdame
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div> 
                </form>
                <p class="mb-1">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Restablecer contraseña
                        </a>
                    @endif
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</body> --}}

<body>
    <div class="container-fluid p-5 px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card border-0">
            <div class="row d-flex">
                <div class="col col-md-6 d-none d-md-block">
                    <div class="p-5"> <img src="https://i.imgur.com/uNGdWHi.png" class="img-fluid"> </div>
                </div>
                <div class="col col-md-6 p-5">
                    <h1 class="text-center pb-3">LaraBlog</h1>
                    <div class="container row">
                        <h6>Iniciar sesión con</h6>
                        <div class="pl-4">
                            <a href="">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="">
                                <i class="fab fa-twitter"></i>   
                            </a>
                            <a href="">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="container row mb-4">
                        <div class="line"></div> <small class="or text-center">O</small>
                        <div class="line"></div>
                    </div>
                    <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label>Correo electónico</label>
                                <input 
                                    name="email"
                                    type="email" 
                                    class="form-control" 
                                    placeholder="Email"
                                    value="{{ old('email') }}"
                                    @error('email') is-invalid @enderror>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                {{-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            <div class="form-group row">
                                <label>Contraseña</label>
                                <input 
                                    name="password"
                                    type="password" 
                                    class="form-control" 
                                    placeholder="Contraseña"
                                    required 
                                    @error('password') is-invalid @enderror>
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="ml-2">
                                    Recuérdame
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </form>
                        <p class="mb-1">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Restablecer contraseña
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


