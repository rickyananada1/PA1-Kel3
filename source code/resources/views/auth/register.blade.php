<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
<body class="layout-4">

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{ asset('img/logo.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Registrasi akun</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Alamat Surel')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <x-input-label for="tipe_akun" :value="__('Tipe Akun')"/>
                                    <select name="tipe_akun" class='form-control selectric'>
                                    <option value="0">Bank Sampah</option>
                                    <option value="1">Nasabah</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <x-input-label for="password" :value="__('Kata Sandi')" class="d-block"/>
                                            <x-text-input id="password" class="form-control pwstrength" data-indicator="pwindicator"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group col-6">
                                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                                        <x-text-input id="password_confirmation" class="form-control"
                                                    type="password"
                                                    name="password_confirmation" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_CLIENT') }}"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" style="color:blue">
                                        {{ __('Sudah memiliki akun?') }}
                                    </a>
                                </div><br>

                                <div class="form-group">
                                     <x-primary-button class="btn btn-primary btn-lg btn-block">
                                        {{ __('Registrasi') }}
                                    </x-primary-button>
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

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback" async defer></script>
<!-- OR and then call turnstile.ready(onloadTurnstileCallback) -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js"></script>
</html>
