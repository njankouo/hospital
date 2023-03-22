@extends('layouts.master')


@section('title','update des Patients')

@section('contenu')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hey, Bienvenue!</h4>
                    <span class="ml-1">{{ Auth()->user()->name ?? ''}}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Mise a Jour Patients</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospital</a></li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mise a Jour Patient</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{ route('edit.patient',['patient'=>$patient->id]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" class="form-control" placeholder="Nom..." value="{{ $patient->nom }}" name="nom">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prenom</label>
                                <input type="text" class="form-control" placeholder="Prenom..." value="{{ $patient->prenom }}" name="prenom">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telephone</label>
                                <input type="number" class="form-control" placeholder="Telephone..." value="{{ $patient->telephone }}" name="telephone">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date Naissance</label>
                                <input type="text" class="form-control" name="date" value="{{ $patient->date }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="profession" value="{{ $patient->profession }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="assurance" value="{{ $patient->assurance }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="numAssurance" value="{{ $patient->numAssurance }}">
                            </div></div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Sexe</label>
                                <select id="inputState" class="form-control" name="sexe">
                                    <option selected="">Choose...</option>
                                    @if ($patient->sexe==0)
                                    <option value="0" selected>masculin</option>
                                    @else
                                    <option value="1">feminin</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Lieu De Naissance</label>
                                <input type="text" class="form-control" value="{{ $patient->lieu }}" name="lieu">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Personne a Contacter</label>
                                <input type="text" class="form-control" value="{{ $patient->prevenir }}" name="prevenir">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Numero Personne a Contacter</label>
                                <input type="number" class="form-control" value="{{ $patient->tel }}" name="tel">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $patient->email }}" name="email">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Adresse</label>
                                <input type="text" class="form-control" value="{{ $patient->adresse }}" name="adresse">
                            </div>
                        </div>
                        <div style="float: right">
                            <a type="button" class="btn btn-rounded btn-outline-danger " href="{{route('patient') }}">retour</a>
                            <button type="submit" class="btn btn-rounded btn-outline-secondary">Modifier</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@stop
