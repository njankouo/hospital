@extends('layouts.app')

@section('content')
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

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous avec vos
                                            identifiants
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg 2 @error('nom') is-invalid @enderror"
                                                name="nom" value="{{ old('nom') }}" />
                                            <label class="form-label" for="form2Example17">Nom </label>
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline
                                                mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" autocomplete="current-password" />
                                            <label class="form-label" for="form2Example27">Password</label>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="pt-1
                                                mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        {{-- @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}"
                                                style="font-size: 15px">
                                                Forgot your password
                                            </a>
                                        @endif --}}
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Identifiant oubliez? <a
                                                href="#!" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Application gestion.</a>
                                        <a href="#!" class="small text-muted">Pharmacie</a>
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
