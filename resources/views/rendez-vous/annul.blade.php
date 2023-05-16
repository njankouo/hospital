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
                        <table class="table verticle-middle table-responsive-sm text-center table-hover">
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
                                    <td>{{ $rdvs->user->name }}</td>
                                    <td>{{ $rdvs->titre }}</td>
                                    <td>{{ $rdvs->date }}</td>
                                    <td>
                                   <a class="btn btn-danger" href="{{ route('restore.rdv',$rdvs->id) }}"><i class="fa fa-refresh">

                                    </i>
                                </a>
                                <button class="btn btn-secondary"data-toggle="modal" data-target="#exampleModalCenter{{ $rdvs->id }}"><i class="fa fa-edit">

                            </i>
                        </button>
                                    </td>


                                </tr>
                                <div class="modal fade" id="exampleModalCenter{{ $rdvs->id }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Formulaire De Mise A Jour</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="{{ route('edit.rdv',['rdvs'=>$rdvs->id]) }}" method="post">

                                                        @csrf
                                                        <input type="hidden" value="put" name="_method">
                                                        <label for="date">Date Rdv</label>
                                                        <input type="datetime" name="date" id="date" class="form-control" value="{{ $rdvs->date }}">
                                                        <label for="end_date">Date Fin Rdv</label>
                                                        <input type="datetime" name="end_date" class="form-control" value="{{ $rdvs->end_date }}">
                                                        <label for="motifs">Motifs Rdv</label>
                                                        <input type="text" value="{{ $rdvs->titre }}" class="form-control" name="titre">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
