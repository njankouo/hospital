@extends('layouts.master')

@section('title','dossier patient')

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

                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('patient') }}">Patients</a></li>
                    <li class="breadcrumb-item active"><a href="">Dossier Patient</a></li>
                </ol>
            </div>
        </div>
        <h5 style="text-align: center">PATIENT:&nbsp;{{ $patient->nom }}&nbsp;{{ $patient->prenom }}</h5>
        <div class="card-body">
            <!-- Nav tabs -->
            <div class="default-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home">Informations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile">Antecedants</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#message">Dossier Patient</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="home" role="tabpanel">
                        <div class="pt-4">
                            <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline">INFORMATIONS PATIENT</h4>
                            <h6>
                                NOM ET PRENOM: {{ $patient->nom }}&nbsp;{{ $patient->prenom }}
                            </h6>
                            <h6>
                                DATE NAISSANCE: {{ $patient->date }}
                            </h6>
                            <h6>
                                AGE: {{ $patient->age }}
                            </h6>
                            <h6>
                                LIEU DE NAISSANCE: {{ $patient->lieu }}
                            </h6>
                            <h6>
                                EMAIL: {{ $patient->email }}
                            </h6>
                            <h6>
                                PROFESSION: {{ $patient->profession }}
                            </h6>
                            <h6>
                                ADRESSE: {{ $patient->adresse }}
                            </h6>
                            <h6>
                                TELEPHONE: {{ $patient->telephone }}
                            </h6>
                            <h6>
                                ASSURANCE: {{ $patient->assurance }}
                            </h6>
                            <h6>
                                PERSONNE A PREVENIR: {{ $patient->prevenir }}
                            </h6>
                            <h6>
                                TELEPHONE PERSONNE A PREVENIR: {{ $patient->tel }}
                            </h6>
                            <h6>
                               GROUPE SANGUIN: {{ $patient->groupe }}

                            </h6>
                            <h6>
                               ETAT CIVIL: {{ $patient->etat }}
                            </h6>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="pt-4">
                            <h4>This is profile title</h4>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                            </p>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                            </p>
                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="message">
                        <div class="pt-4">
                            <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline">CONSULTATIONS PATIENT</h4>
                            <a type="button" class="btn btn-secondary" style="float: right">Imprimer <span class="btn-icon-right"><i class="fa fa-file"></i></span>
                            </a>
                                @foreach ($consultation as $consultations)
                                @if($consultations->patient_id==$patient->id)
                                    <div class="mt-4">
                                <h6 style="text-decoration: underline">DATE CONSULTATION: {{ $consultations->created_at }}</h6>
                                <h6 >NOM ET PRENOM: {{ $consultations->patient->nom }}&nbsp; {{ $consultations->patient->prenom }}</</h6>
                                <h6 >AGE: {{ $consultations->age }}</</h6>
                                <h6 >POID: {{ $consultations->poid }}</</h6>
                                <h6 >TENSION: {{ $consultations->tension }}</</h6>
                                <h6 >ALLERGIES: {{ $consultations->add_allergie }}</</h6>
                                <h6 >MOTIF CONSULTATION: {{ $consultations->motif }}</</h6>
                                <h6 >DIAGNOSTIQUE: {{ $consultations->diagnostique }}</</h6>
                                <h6 style="text-align:center">SUIVI PAR: {{ $consultations->responsable }}</</h6>
                            </div>
                                @endif
                           @endforeach
                           <hr>
                           <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline">PRESCIPTIONS MEDICALES</h4>
                           <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm">
                                        <thead>
                                            <tr>

                                                <th>Medicament</th>
                                                <th>Dosage</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                               @foreach ($prescription as $prescriptions)
                                                   @if($prescriptions->patient_id==$patient->id)
                                                   <h6 style="text-decoration: underline">DATE PRESCRIPTION: {{ $consultations->created_at }}</h6>
                                                   <tr>
                                                    <td>{!! html_entity_decode($prescriptions->medicament ) !!}
                                                    </td>
                                                    <td>{!! html_entity_decode($prescriptions->dosage ) !!}</td>

                                                   </tr>
                                                   @endif
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
        </div>
    </div>
</div>
@endsection
