@extends('layouts.app')

@section("extrastyle")
<style>
    body {
        background: #0A2B45 !important;
        background-size: cover;
        background-attachment: fixed;
    }

    /* To maintain the aspect ratio (16:9), you can use a pseudo-element */
    body::before {
        content: "";
        /* padding-top: 15%;  */
        /* 16:9 Aspect Ratio (9 / 16 * 100) */
        display: block;
    }
    .card{
        background: rgba(255,255,255,0.8) !important;
    }
    .card-header{
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }
    .login-logo{
        height: 70px;
    }
    .title-card-body{
        text-align: center;
        margin-bottom: 30px;
    }
    .main{
        margin-left: 0 !important;
        background: #0A2B45 !important;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="./img/logo.png" alt="logo" class="login-logo">
                </div>

                <div class="card-body">
                    <h3 class="title-card-body">Masuk Ke Akun</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Masuk') }}
                                </button>
                                <a href="/register" class="btn btn-light"> Daftar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
