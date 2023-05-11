<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@extends('layouts.master')


@section('title','Edition Des Utilisateurs')

@section('contenu')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hey, Bienvenue!</h4>
                    <span class="ml-1">{{ Auth()->user()->name ??''}}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users') }}">Liste Des Utilisateurs</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Mise A Jour Utilisateur</a></li>

                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mise a Jour Utilisateurs</h3>
                <form method="post" action="{{ route('register',['user'=>$user->id]) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                <button type="submit" class="btn btn-rounded btn-info" style="float: right"><span class="btn-icon-left text-info"><i class="fa fa-check color-info"></i>
                </span>Mise a Jour</button>

            </div>
            <div class="card-body">
                <div class="basic-form">

                        <div class="form-row">
                            <div class="col-sm-6">

                                <input type="text" class="form-control" placeholder=" Nom Utilisateur..." name="name" value="{{ $user->name }}" >
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <input type="text" class="form-control" placeholder="Prenom Utilisateur..." name="prenom" value="{{ $user->prenom }}" >
                            </div>
                        </div>
                        <br>
                            <div class=" form-row">
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="email" class="form-control" placeholder="Email Utilisateur..." name="email" value="{{ $user->email }}" >
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="tel" class="form-control" placeholder="Telephone Utilisateur..." name="telephone" value='{{ $user->telephone }}' >
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-sm-12 mt-2 mt-sm-0">
                                    <select id="inputState" class="form-control" name="sexe" >
                                        <option selected="">Selectionnez Le Sexe</option>
                                        @if ($user->sexe==1)
                                        <option value="1" selected>Masculin</option>
                                        @else
                                        <option value="0">Feminin </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" class="form-control" placeholder="poste Utilisateur..." name="poste"  value="{{ $user->poste }}">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" class="form-control" placeholder="Specialite Utilisateur..." name="specialite" value="{{ $user->specialite }}" >
                                </div>

                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" class="form-control" placeholder="date naissance utilisateur..." name="date" value="{{ $user->date }}" >
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" class="form-control" placeholder="Lieu naissance Utilisateur..." name="lieu" value="{{ $user->lieu }}">
                                </div>
                            </div>
                            <br>
                            @if ($user->password!=null)
                                @else
                                <div class="form-row">
                                    <div class="col-sm-12 mt-2 mt-sm-0">
                                        <input type="password" class="form-control" placeholder="Definir Un Mot De Passe..." name="password" style="border-color: red">
                                    </div>

                                </div>
                            @endif

                            <br>
                            <div class="form-row">
                                <div class="col-sm-12 mt-2 mt-sm-0">
                                    <h5>ROLES</h5>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 mt-2 mt-sm-0">
                                    <label class="radio-inline">
                                        @foreach ($role as $roles)
                                        @if($roles->id==$user->role_id)
                                        <label>
                                        <input type="radio" name="role_id" value="{{ $roles->id }}" checked>{{ $roles->libelle }}</label>
                                            @else
                                            <label>
                                            <input type="radio" name="role_id" value="{{ $roles->id }}" >{{ $roles->libelle }}</label>

                                        @endif
                                        @endforeach


                                </div>
                            </div>
                        </div>


                </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>

    </div>
@stop


