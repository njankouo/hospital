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
                            <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline;font-style:italic">INFORMATIONS PATIENT</h4>
                            {{-- <h6>
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
                            </h6> --}}
                            <div class="card">
                                <div class="card-header d-block">

                                    <p class="mb-0 subtitle" style="text-align: center">
                                        NOM ET PRENOM: {{ $patient->nom }}&nbsp;{{ $patient->prenom }}

                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        DATE NAISSANCE: {{ $patient->date }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        AGE: {{ $patient->age }}
                                    </p>

                                    <p class="mb-0 subtitle" style="text-align: center">
                                        LIEU DE NAISSANCE: {{ $patient->lieu }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        PROFESSION: {{ $patient->profession }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        ADRESSE: {{ $patient->adresse }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        TELEPHONE: {{ $patient->telephone }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        ASSURANCE: {{ $patient->assurance }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        GROUPE SANGUIN: {{ $patient->groupe }}
                                    </p>
                                    <p class="mb-0 subtitle" style="text-align: center">
                                        ETAT CIVIL: {{ $patient->etat }}
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar bg-info progress-bar-striped" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%; height:10px;" role="progressbar">
                                            <span class="sr-only">100% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="pt-4">
                            {{-- @foreach ($consultation as $consultations)
                           @if ($consultations->patient_id==$patient->id)

                           <h5>  ANTECEDANTS CHIRURGICAUX: {{ $consultations->antecedant_churirgicaux }}</h5>
                             <h5> ANTECEDANTS FAMILLIALES: {{ $consultations->antecedant_familliale }}</h5>
                           @else
                           @endif
                           @endforeach --}}
                           <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Antec&eacute;dants&nbsp;{{ $patient->nom }}&nbsp;{{ $patient->prenom }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-hover verticle-middle">
                                        <thead>
                                            <tr>

                                                <th scope="col">Antecedants Familliales</th>
                                                <th scope="col">Antecedants Chirurgicaux</th>
                                                <th scope="col">Autres Antecedants</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($consultation as $consultations)
                                             @if ($consultations->patient_id==$patient->id)
                                            <tr>

                                                <td>{{ $consultations->antecedant_familliale }}</td>
                                                <td>
                                                    {{ $consultations->antecedant_churirgicaux }}
                                                </td>
                                                <td>

                                                </td>
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

                    <div class="tab-pane fade active show" id="message">
                        <div class="pt-4">
                            <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline">CONSULTATIONS PATIENT</h4>

                                @foreach ($consultation as $consultations)
                                @if($consultations->patient_id==$patient->id )

                            <div class="card">

                                <div class="card-header d-block">
                                    <h4 class="card-title">CONSULTATION DU: {{ $consultations->created_at }}</h4>
                                 </div>
                                <div class="card-body">
                                    <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                        <div class="accordion__item">
                                            <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#header-bg_collapseOne" aria-expanded="false">
                                                <span class="accordion__header--icon"></span>
                                                <span class="accordion__header--text"> Consultation Suivi Par: {{ $consultations->responsable }}</span>
                                                <span class="accordion__header--indicator"></span>
                                            </div>
                                            <div id="header-bg_collapseOne" class="accordion__body collapse" data-parent="#accordion-seven" style="">
                                                <div class="accordion__body--text">
                                                    <h6 >NOM ET PRENOM: {{ $patient->nom }}&nbsp; {{ $patient->prenom }}</</h6>
                                                    <h6 >AGE: {{ $consultations->age }}</</h6>
                                                    <h6 >POID: {{ $consultations->poid }}</</h6>
                                                    <h6 >TENSION: {{ $consultations->tension }}</</h6>
                                                    <h6 >ALLERGIES: {{ $consultations->add_allergie }}</</h6>
                                                    <h6 >MOTIF CONSULTATION: {{ $consultations->motif }}</</h6>
                                                    <h6 >DIAGNOSTIQUE: {{ $consultations->diagnostique }}</</h6>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            {{-- @else
                            <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline">AUCUNE CONSULTATIONS N'A ETE EFFECTUEE POUR LE MOMENT...</h4> --}}


                            @endif
                           @endforeach

                           <h4 style="text-align: center;color:blue;font-weight:bold;size:25px;text-transform:underline;text-fixed:fixed">PRESCIPTIONS MEDICALES</h4>
                           <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">


                                               {{-- @foreach ($prescription as $prescriptions)
                                                   @if($prescriptions->patient_id==$patient->id)

                                            <div id="accordion-nine" class="accordion accordion-active-header">
                                                <div class="accordion__item">
                                                    <div class="accordion__header collapsed" data-toggle="collapse" data-target="#active-header_collapseOne" aria-expanded="false">
                                                        <span class="accordion__header--icon"></span>
                                                        <span class="accordion__header--text">PRESCRIPTION DU: {{ $consultation->created_at }}</span>
                                                        <span class="accordion__header--indicator"></span>
                                                    </div>
                                                    <div id="active-header_collapseOne" class="accordion__body collapse" data-parent="#accordion-nine" style="">
                                                        <div class="accordion__body--text">
                                                            <table class="table table-responsive-sm">
                                                                <thead>
                                                                    <tr>

                                                                        <th>Medicament</th>
                                                                        <th>Quantite</th>
                                                                        <th>Posologie</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                               <tr>

                                                                    <td>{!! html_entity_decode($prescriptions->medicament ) !!}
                                                                </td>
                                                                <td>{!! html_entity_decode($prescriptions->qte ) !!}
                                                                </td>
                                                                <td>{!! html_entity_decode($prescriptions->dosage ) !!}</td>

                                                               </tr>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                                   @endif
                                               @endforeach --}}






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
