@extends('layouts.master')
@section('contenu')
    <div class="col-8">
        <div class="card">
            <div class="card-title d-flex bg-primary text-light">

                <i class="fa fa-users fa-2x my-2 mx-1"></i>
                <h3 style="font-size:20px;font-family:forte" class="p-3"> creation fournisseur</h3>
            </div>
            <div class="card body">
                @if (session('success'))
                    <div class="col-sm-12">
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <form action="{{ route('insert.fournisseur') }}" method="POST" class="form-block">
                        @csrf
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">Nom</label>
                                <input type="text" class="my-2 @error('nom') is-invalid @enderror" name="nom"
                                    placeholder="Enter ..." value="{{ old('nom') }}">
                                @error('nom')
                                    <p>{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="col-6">

                                <label for="">Prenom (Optionnel)</label>
                                <input type="text" class="my-2 form-control @error('prenom') is-invalid @enderror"
                                    placeholder="Enter ..." name="prenom" value="{{ old('prenom') }}">
                                @error('prenom')
                                    <p>{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-6">
                                <label for="">telephone2</label>
                                <input type="tel" class="form-control my-2 " name="telephone2" placeholder="..."
                                    disabled>
                            </div>
                            <div class="col-6">
                                <label for="">email</label>
                                <input type="email" class="form-control my-2 @error('email') is-invalid @enderror"
                                    name="email" placeholder="..." value="{{ old('email') }}">
                                @error('email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">status</label>
                                <input type="text" class="form-control" name="status" value="actif">



                                @error('sexe')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col s6">
                                <label for="">sexe (Optionnel)</label>
                                <select name="sexe" id="" class="my-2 @error('sexe') is-invalid @enderror">
                                    <option value="" disabled>select gender</option>
                                    <option value=""></option>
                                    <option value="M">Masculin</option>
                                    <option value="F">feminin</option>
                                </select>
                            </div>
                            <div class="col s12">
                                <label for="">telephone1</label>
                                <input type="text" class="form-control @error('telephone1') is-invalid @enderror"
                                    id="inputSuccess" placeholder="Enter ..." name="telephone1"
                                    value="{{ old('telephone1') }}">
                                @error('telephone1')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-8 my-4">
                                <button type="submit" class="btn btn-primary mx-1">save</button>
                                <a class="btn btn-danger mx-1" href="{{ route('fournisseur.liste') }}">retour</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="card-footer bg-primary"></div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        })
    </script>
@endsection
