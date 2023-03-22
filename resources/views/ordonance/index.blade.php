@extends('layouts.master')

@section('title','Gestion Des Ordonances')

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
                    <li class="breadcrumb-item"><a href="#">Ordonances</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Ordonances</h4>
                                       </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table-hover" style="min-width: 845px; text-align:center">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Suivi Par</th>

                                        <th>Medicament(s)</th>
                                        <th>Quantite</th>
                                        <th>Posologie</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordonance as $ordonances)
                                   <tr>

                                    <td>{{ !empty($ordonances->patient) ? $ordonances->patient->nom:'' }} </td>
                                    <td>{!! html_entity_decode($ordonances->responsable) !!}</td>
                                    <td>{!! html_entity_decode($ordonances->medicament) !!}</td>
                                    <td>{!! html_entity_decode($ordonances->qte) !!}</td>
                                    <td>{!! html_entity_decode($ordonances->dosage) !!}</td>
                                    <td>
                                        <a  href="{{ route('ordonance.pdf',$ordonances->id) }}" type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-print"></i>
                                        </span>Imprimer</a>
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
</div>
@endsection
