@extends('layouts.master')

@section('title','gestion des options')

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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Bilan / Radiologie / Certificats Medicaux</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
             </ol>
          </div>
       </div>
       <div class="card">
        <div class="card-header">
            <h4 class="card-title">Patient: {{$patient->nom}}&nbsp;{{$patient->prenom}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3">
                    <div class="nav flex-column nav-pills">
                        <a href="#v-pills-home" data-toggle="pill" class="nav-link show">BILAN Sanguin</a>
                        <a href="#v-pills-profile" data-toggle="pill" class="nav-link">RADIOLOGIE</a>
                        <a href="#v-pills-profil" data-toggle="pill" class="nav-link">Echographie</a>
                        <a href="#v-pills-profi" data-toggle="pill" class="nav-link">Scanner</a>
                        <a href="#v-pills-prof" data-toggle="pill" class="nav-link">IRM</a>
                        <a href="#v-pills-messages" data-toggle="pill" class="nav-link active">CERTIFICATS MEDICAUX</a>
                      <a href="#v-pills-settings" data-toggle="pill" class="nav-link">PRESCRIPTIONS</a>
                    </div>
                </div>
                <div class="col-xl-9">

                    <div class="tab-content">

                        <div id="v-pills-home" class="tab-pane fade col-4">

                        </div>
                        <div id="v-pills-profile" class="tab-pane fade">
                                    <div class="col-8">
                                    <div class="basic-form">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="First name">

                                                    <input type="text" class="form-control mt-3" placeholder="Last name">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                        </div>
                        <div id="v-pills-profil" class="tab-pane fade">
                        </div>
                        <div id="v-pills-profi" class="tab-pane fade">
                        </div>
                        <div id="v-pills-prof" class="tab-pane fade">
                        </div>

                            {{-- <div class="col-8">
                            <div class="basic-form">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="First name">

                                            <input type="text" class="form-control mt-3" placeholder="Last name">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                {{-- </div>

                        <div id="v-pills-profile" class="tab-pane fade">
                            <div class="col-8">
                            <div class="basic-form">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="First name">

                                            <input type="text" class="form-control mt-3" placeholder="Last name">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                </div> --}}

                        <div id="v-pills-messages" class="tab-pane fade">
                            <div class="row">
                            <div class="col-8">

                            </div>
                            <div class="col-4">
                                <h5 class="text-primary"style="font-weight:bold;text-transform:underline">Certificats Numeris&eacute;s</h5>
                            </div>
                        </div>
                    </div>
                        <div id="v-pills-settings" class="tab-pane fade  show">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Formulaire De Prescription</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" action="{{ route('prescrition.examen') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="patient_id">Code Patient</label>
                                                    <input type="text" class="form-control" value="{{ $patient->id }}" name="patient_id" id="patient_id">
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <label for="suivi">Suivi Par</label>
                                                    <input type="text" class="form-control" value="{{ Auth()->user()->name }}" name="responsable">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="medicament">Medicament</label>
                                                    <select id="remain-open" data-select2-id="remain-open" tabindex="-1" class="multi-select select2-hidden-accessible" aria-hidden="true" multiple name="produit_id[]" required>
                                                        <optgroup label="selectionnez le produit">
                                                        @foreach ($produit as $produits)

                                                            <option value="{{ $produits->designation }}">{{ $produits->designation }}     </option>

                                                        @endforeach
                                                    </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <label for="suivi">Posologie</label>
                                                    <select  tabindex="-1" class="multi-select select2-hidden-accessible" aria-hidden="true" multiple name="dosage[]" required>

                                                        <optgroup label="Selectionnez la posologie" >
                                                            <option value="1 CPx3/j <br/><br/>">1 CPx3/j</option>
                                                            <option value="1 CPx2/j <br/><br/>">1 CPx2/j</option>
                                                            <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                                            <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                            <label for="qte">Quantite</label>
                                            <select  tabindex="-1" class="multi-select select2-hidden-accessible" aria-hidden="true" multiple name="qte[]" required>
                                                    <option value="1 BOITE<br/><br/>">1 BOITE</option>
                                                    <option value="2 BOITE<br/><br/>">2 BOITE</option>
                                                    <option value="3 BOITE<br/><br/>">3 BOITE</option>

                                            </select>
                                                </div>

                                            </div>
                                            <button style="float: right;" type="submit" name="submit" class="btn btn-primary mt-2">Valider</button>

                                        </form>
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
