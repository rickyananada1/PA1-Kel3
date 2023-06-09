<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body class="layout-4">

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('img/logo.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Masuk</h4>
                        </div>
                        <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="text-align-left">
                                        <x-input-label for="email" :value="__('Alamat Surel')" />
                                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="mt-2" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div><br>
                                    <div class="form-group">
                                        <x-input-label for="password" :value="__('Kata Sandi')" />
                                        <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="mt-2" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">{{ __('Ingat Saya') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Log in') }}
                                        </button>
                                    </div>
                                    <div class="mt-5 text-muted text-center">
                                        Tidak memiliki akun? <a href="{{ route('register') }}" style="color:blue">Registrasi disini!</a>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
