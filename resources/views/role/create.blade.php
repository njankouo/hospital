@extends('layouts.master')

@section('contenu')
    <div class="row">
        <div class="col-9">

            <div class="card">
                <div class="card-title bg-primary">
                    <p style="font-family: forte;font-size:15px;" class="my-2 mx-2 text-light p-3">
                        <i class="fa fa-users fa-2x"></i> creation nouvelle
                        utilisateur
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="">nom utilisateur</label>
                                <input type="text" placeholder="nom du user....."
                                    class="form-control
                                @error('nom') is-invalid @enderror
                                "
                                    name="nom">
                                @error('nom')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-6">
                                <label for="">prenom utilisateur</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror"
                                    placeholder="prenom utilisateur....." name="prenom">
                                @error('prenom')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-6">
                                <label for="">telephone 1</label>
                                <input type="text" placeholder="telephone1....."
                                    class="form-control @error('telephone1') is-invalid @enderror" name="telephone1">
                            </div>
                            @error('telephone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="col-6">
                                <label for="">telephone2</label>
                                <input type="text" placeholder="telephone2....." class="form-control" disabled>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="email...." name="email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">numero de la piece d'identification</label>
                                <input type="number" placeholder="numero de la piece d'identification....."
                                    class="form-control @error('numeroPieceIdentite') is-invalid @enderror"
                                    name="numeroPieceIdentite">
                                @error('numeroPieceIdentite')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">carte d'identification</label>
                                <select class="form-control @error('pieceIdentite') is-invalid @enderror" id=""
                                    name="pieceIdentite">
                                    <option value=""></option>
                                    <option value="cni">CNI</option>
                                    <option value="passport">PASSPORT</option>
                                    <option value="permis">PERMIS DE CONDUIRE</option>
                                    <option value="recepisse">RECEPISSE</option>
                                    <option value="carte etudiant">CARTE D'ETUDIANT</option>
                                </select>
                                @error('pieceIdentite')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">sexe</label>
                                <select name="sexe" class="form-control @error('sexe') is-invalid @enderror" id="">
                                    <option value=""></option>
                                    <option value="masculin">masculin</option>
                                    <option value="feminin">feminin</option>
                                </select>
                                @error('sexe')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">statut utilisateur </label>
                                <select name="status" class="form-control">
                                    <option value="actif">actif</option>

                                </select>
                            </div>
                        </div>

                        <a href="{{ route('role.liste') }}" class="btn btn-danger my-4">retour a la base</a>
                        <button type="submit" class="btn btn-success my-4">enregistrer</button>
                </div>
                <div class="card-footer bg-primary"></div>
            </div>

        </div>


    </div>

    </div>
    </div>
    </form>
@endsection
