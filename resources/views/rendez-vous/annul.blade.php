<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@extends('layouts.master')

@section('title','rendez-vous annulé')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Rendez-Vous Annul&eacute;s</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>


                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rendez-Vous Annul&eacute;s</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Suivi Ppar</th>
                                    <th scope="col">Motifs Rdv</th>
                                    <th scope="col">Date Rdv</th>
                                    <th scope="col">Restorer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rdv as $rdvs)
                                <tr>
                                    <td>{{ $rdvs->patient->nom }}&nbsp;{{ $rdvs->patient->prenom }}</td>
                                    <td>{{ $rdvs->responsable }}</td>
                                    <td>{{ $rdvs->titre }}</td>
                                    <td>{{ $rdvs->date }}</td>
                                    <td>
                                   <a class="btn btn-rounded btn-primary" href="{{ route('restore.rdv',$rdvs->id) }}"><span class="material-symbols-outlined">
                                            restore_from_trash
                                    </span>
                                </a>
                                <a class="btn btn-rounded btn-secondary" href=""><span class="material-symbols-outlined">
                                    edit
                            </span>
                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
