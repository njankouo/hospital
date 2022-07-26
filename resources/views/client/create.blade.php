@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="col-8">


            <div class="card">
                <div class="card-title d-flex bg-primary text-light">
                    @if (Session::has('message'))
                        <h5 class="alert alert-success">{{ Session::get('message') }}</h5>
                    @endif
                    <i class="fa fa-users fa-2x mx-2 my-2"></i>
                    <h3 style="font-size:20px;font-family:forte" class="my-2"> New Client</h3>
                </div>
                <div class="card body">
                    <div class="row">
                        <form action="{{ route('create.client') }}" method="POST" class="form-block">
                            @csrf
                            <div class="form-row" style="margin: 10px;">


                                <div class="col-6">
                                    <label for="">Nom</label>
                                    <input type="text" class="my-2 form-control @error('nom') is-invalid @enderror"
                                        name="nom" placeholder="Enter ..." value="{{ old('nom') }}">
                                    @error('nom')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">Prenom (OPTIONNEL)</label>
                                    <input type="text" class="my-2 form-control @error('prenom') is-invalid @enderror"
                                        placeholder="Enter ..." name="prenom" value="{{ old('prenom') }}">
                                    @error('prenom')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="">sexe</label>
                                    <select name="sexe" id=""
                                        class="form-control my-2 @error('sexe') is-invalid @enderror"
                                        value="{{ old('sexe') }}">
                                        <option value="" disabled>select gender</option>
                                        <option value=""></option>
                                        <option value="1">Masculin</option>
                                        <option value="0">feminin</option>
                                    </select>
                                    @error('sexe')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">telephone </label>
                                    <input type="text" class="my-2 form-control @error('telephone') is-invalid @enderror"
                                        id="inputSuccess" placeholder="Enter ..." name="telephone"
                                        value="{{ old('telephone') }}">
                                    @error('telephone')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="col-6">
                                    <label for="">E-mail (OPTIONNEL)</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email...." name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">numero cni(OPTIONNEL)</label>
                                    <input type="text" class="my-2 form-control @error('numeroCNI') is-invalid @enderror"
                                        id="inputSuccess" placeholder="Enter ..." name="numeroCNI">
                                    @error('numeroCNI')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="">adresse</label>
                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                        placeholder="adresse...." name="adresse" value="{{ old('adresse') }}">
                                    @error('adresse')
                                        <p>{{ $message }}</p>
                                    @enderror

                                    <label>Status</label>

                                    <select disabled="disabled" class="form-control my-2" name="status">
                                        <option value="1">actif</option>
                                    </select>
                                </div>
                                <div class="col-8 my-4">
                                    <a class="btn btn-danger mx-1" href="{{ route('client.liste') }}">retour aux
                                        données</a>
                                    <button type="submit" class="btn btn-primary mx-1">save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-footer bg-primary"></div>
            </div>
        </div>
    </div>
@endsection
