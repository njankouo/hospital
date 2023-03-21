<link href="{{ asset('') }}vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
<!-- Custom Stylesheet -->
<link href="./css/style.css" rel="stylesheet">
@extends('layouts.master')

@section('title','ajout des consultations')

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
                    <li class="breadcrumb-item"><a href="{{ route('consultations') }}">Liste Des Consultations</a></li>
                    <li class="breadcrumb-item active" ><a href="{{ route('save.consultation') }}">Nouvelle Consultation</a></li>
                    <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                </ol>
            </div>
        </div>


<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire De Consultation</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('add.consultations') }}" id="step-form-horizontal" class="step-form-horizontal">
                    @csrf
                    <div>
                        <h4>Information Personnel</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-6 mb-0">

                                        <label>Responsable Consultation</label>
                                        <input type="text" class="form-control" placeholder="responsable consultation" value="{{ auth()->user()->name }}" name="responsable">


                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                        <label>Patient</label>
                                        <select class="form-control @error('patient_id') is-invalid
                                        @enderror" name="patient_id">
                                            <option>Renseignez Le Patient En Consultation</option>
                                            @foreach ($patient as $patients)


                                            <option value="{{ $patients->id }}">{{ $patients->nom }}  {{ $patients->prenom }}</option>
                                            @endforeach
                                        </select>
                                        @error('patient_id')
                                        <span  class="text-danger">{{ $message }}</span>

                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-0">



                                        <div class="form-group">
                                            <label>Antecedents Personnel</label>
                                            <input type="text" class="form-control @error('antecedant') is-invalid

                                            @enderror" placeholder="antecedant" name="antecedant">
                                            @error('antecedant')
                                            <span  class="text-danger">{{ $message }}</span>

                                        @enderror

                                    </div></div>
                                    <div class="col-lg-6 mb-0">

                                        <label>Poids</label>
                                        <input type="text" class="form-control @error('poid') is-invalid

                                        @enderror" placeholder="Poid" name="poid">
                                        @error('poid')
                                        <span  class="text-danger">{{ $message }}</span>

                                    @enderror

                                        <div class="form-group">


                                    </div>
                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                        <label>Taille</label>
                                        <input type="text" class="form-control @error('taille') is-invalid

                                        @enderror" placeholder="Taille" name="taille">
                                        @error('taille')
                                        <span  class="text-danger">{{ $message }}</span>

                                    @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                        <label>Tension</label>
                                        <input type="text" class="form-control @error('tension') is-invalid

                                        @enderror" placeholder="Tension" name="tension">
                                        @error('tension')
                                        <span  class="text-danger">{{ $message }}</span>

                                    @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                    <label>Activite Personnelle</label>
                                                <input type="text" class="form-control @error('activite') is-invalid

                                                @enderror" placeholder="Activite Personnelle" name="activite">
                                                @error('activite')
                                                <span  class="text-danger">{{ $message }}</span>

                                            @enderror
                                </div>
                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                    <label>Diagnostique</label>
                                            <input type="text" class="form-control @error('diagnostique') is-invalid

                                            @enderror" placeholder="Diagnostique" name="diagnostique">
                                            @error('diagnostique')
                                            <span  class="text-danger">{{ $message }}</span>

                                        @enderror
                                </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                    <label>Le Patient A t'il (elle) Des Allergies ?</label>&nbsp;&nbsp;
                                <input type="checkbox" name="allergie" id="yourBox" value="1"> OUI&nbsp;&nbsp;
                                <input type="checkbox" name="allergie" id="yourcheck " value="0"> NON
                                </div>
                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                        <label>Preciser Ces Allergies </label>
                                        <input type="text" name="add_allergie" id="yourText" name="precision" class="form-control" disabled>

                                    </div>
                                </div>
                                <div class="col-lg-6 mb-0">
                                    <div class="form-group">
                                        <label>IMC (Indice De Masse Corporelle)</label>
                                        <input type="text" name="indice" id="yourText" name="precision" class="form-control" >

                                    </div>
                            </div>

                        </section>

                        <h4>Informations Supplementaires</h4>
                        <section>
                            <div class="row">
                                <div class="col-10 col-sm-12 mb-0">
                                    <button type="submit" class="btn btn-primary" style="float: right;">Valider Consultation</button>
                                    </div>
                                    <div class="col-lg-12 mb-0">
                                        <div class="form-group">
                                            <label>Temperature </label>
                                            <input type="text" name="temperature" id="yourText" name="precision" class="form-control" >

                                        </div>
                                    </div>
                                <div class="col-lg-12 mb-0">
                                    <div class="form-group">
                                        <label>Pression Arterielle </label>
                                        <input type="text" name="pression" id="yourText"  class="form-control" >

                                    </div>
                                </div>

                                <div class="col-10 col-sm-12 mb-0">
                                    <label>Activites Quotidiennes </label>
                                    <input type="text"  name="activite" class="form-control @error('activite') is-invalid

                                    @enderror" id="" >
                                    @error('activite')
                                    <span class="text-danger"> {{ $message }}</span>

                                @enderror
                                </div>
                                <div class="col-10 col-sm-12 mb-0">
                                <label>Motifs De La Consultation</label>
                                <textarea name="motif" class="form-control"></textarea>
                                </div>

                            </div>


                        </section>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./vendor/global/global.min.js"></script>
<script src="./js/quixnav-init.js"></script>
<script src="./js/custom.min.js"></script>



<script src="./vendor/jquery-steps/build/jquery.steps.min.js"></script>
<script src="./vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Form validate init -->
<script src="./js/plugins-init/jquery.validate-init.js"></script>



<!-- Form step init -->
<script src="./js/plugins-init/jquery-steps-init.js"></script>

    </div>
</div>
@endsection

