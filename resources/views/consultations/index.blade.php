<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@extends('layouts.master')

@section('title','registre des consultations')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Consultations</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Consultations</h4>

                           <a type="button" class="btn btn-primary" href="{{ route('save.consultation') }}"> Consultation <span
                               class="btn-icon-right"><i class="fa fa-plus"></i></span></a>

                                       </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Responsable Consultation</th>
                                        <th>Patients</th>

                                        <th>Diagnostique</th>
                                        <th>Date Consultation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @foreach ($consultation as $consultations)
                                    <tr>
                                        <td>{{ $consultations->responsable }}</td>
                                        <td>{{ $consultations->patient->nom }}</td>
                                        <td>{{ $consultations->diagnostique }}</td>
                                        <td>{{ $consultations->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button  style="margin: 3%" type="button" class="text-white btn btn-rounded btn-primary" data-toggle="modal" data-target="#example-lg{{ $consultations->id }}" data-item-id="1"><span class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                            </span>voir</button>
                                            <a type="button" class="text-white btn btn-rounded btn-secondary" href="{{ route('add.prescription',$consultations->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-pencil color-info"></i>
                                            </span>Prescrire</a>
                                        </td>
                                    </tr>
                                    
                                    <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg{{ $consultations->id }}">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">INFORMATION DE LA CONSULTATION</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>PATIENT : {{ $consultations->patient->nom }} &nbsp;{{ $consultations->patient->prenom }} </h4>
                                                            <h4>TENSION : {{ $consultations->tension }} Mmhg</h4>
                                                            <h4>POID : {{ $consultations->poid }}</h4>
                                                            <h4>TAILLE : {{ $consultations->taille }}</h4>
                                                            <h4>ANTECEDANT : {{ $consultations->antecedant }}</h4>
                                                            <h4>ACTIVITE QUOTDIENNE : {{ $consultations->activite }}</h4>

                                                        </div>
                                                        <div class="col-md-6">
                                                        
                                                            <h4>MOTIFS CONSULTATIONS: {!! html_entity_decode( $consultations->motif ) !!}
                                                               </h4>
                                                            <h4>DIAGNOSTIQUE : {{ $consultations->diagnostique }}</h4>
                                                           <h4>EST-IL ALLERGIQUE? : 
                                                            @if ($consultations->allergie==0)
                                                                non
                                                                @else
                                                                oui
                                                            @endif
                                                            
                                                           </h4>
                                                           @if($consultations->allergie==0)

                                                           @else
                                                           <h4>ALLERGIE : {{ $consultations->add_allergie }}</h4>
                                                          
                                                           @endif
                                                           
                                                        </div>
                                                        <div class="col-4"></div>
                                                        <div class="col-7">
                                                            <h6 style="text-decoration: underline">RESPONSABLE CONSULTATION : {{ $consultations->responsable }}</h6>
                                                                 </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <h6>DATE DE CREATION : {{ $consultations->created_at->diffForHumans() }}</h6>

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
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
</div>
@stop
