@extends('layouts.master')

@section('title','hospitalisations terminés')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Hospitalisations Termin&eacute;s</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hospitalisations Finalis&eacute;s</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Suivi Par:</th>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Chambre</th>
                                    <th scope="col">Date Debut</th>
                                    <th scope="col">Date Fin</th>
                                    <th scope="col">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospitalisation as $hospitalisations)


                                <tr>
                                    <td>{{ $hospitalisations->responsable }}</td>
                                        <td>
                                            @if ($hospitalisations->patient_id==0)
                                                <i class="fa fa-cancel text-danger"></i>
                                                @else
                                                <a href="javascript:void()" class="badge badge-rounded badge-light">{{ $hospitalisations->patient->nom }} &nbsp;{{ $hospitalisations->patient->prenom }}</a>
                                            @endif
                                        </td>
                                        <td>



                                            {{ $hospitalisations->chambre->numero}}

                                        </td>
                                        <td>{{ $hospitalisations->datedebut }}</td>
                                        <td>{{ $hospitalisations->deleted_at->diffForHumans() }}</td>
                                        <td> {!! html_entity_decode( $hospitalisations->note ) !!}</td>

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
