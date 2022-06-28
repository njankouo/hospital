@extends('layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div id="box" class="log-in">
        <div class="head-nav">
            <span class="log-in" style="font-family:forte">LOGIN NOW</span>
            <span class="sign-up" style="font-family:forte">LOGIN NOW</span>
        </div>

        <div id="log-in" class="inline-form">


                <div class="row ">



                    <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-12">

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-12 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-12">

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form> --}}
    {{-- <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
    </style>

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-black">

                    <div class="px-5 ms-xl-4">

                        <span class="h1 fw-bold mb-0" style="font-style: italic">
                            AUTHENTIFICATION
                        </span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-3 ms-xl-4 mt-2 pt-2 ">



                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example18">adresse E-mail</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example28">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="submit"
                                    style="width: 100%">Login</button>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('img/isl.png') }}" alt="Login image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section> --}}
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-12 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">


                                    <form method="POST" action="{{ route('login') }}" style="width: 29rem;">
                                        @csrf


                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fa fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Pharmacie</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez avec vos
                                            identifiants
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg"
                                                name="email" value="{{ old('email') }}" />
                                            <label class="form-label" for="form2Example17">Name </label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" class="form-control form-control-lg "
                                                name="password" required autocomplete="current-password" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}"
                                                style="font-size: 15px">
                                                Forgot your password
                                            </a>
                                        @endif
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="#!" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
