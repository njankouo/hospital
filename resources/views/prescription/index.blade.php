@extends('layouts.master')

@section('title','gestion des prescriptions')

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
                    <li class="breadcrumb-item"><a href="{{route('consultations')}}">Prescription</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulaire De Prescription</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="{{ route('add.presciption') }}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="patient">Patient</label>
                                        @foreach ($patient as $patients)
                                        @if ($patients->id==$consultation->patient_id)
                                            <select name="patient_id" id="" class="form-control">
                                                <option value="{{ $patients->id }}" selected>{{ $patients->nom }}&nbsp;{{ $patients->prenom }}</option>
                                            </select>
                                        @endif

                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label for="reponsable">Responsable Prescription</label>
                                        <input class="form-control form-control" type="text" placeholder="Renseignez le Patient" id="reponsable" value="{{ $consultation->responsable }} " name="responsable">

                                      <div>
                                    <div class="form-group">
                                        <label for="Medicament">Medicaments</label>
                                        <select class="multi-select select2-hidden-accessible" name="medicament[]" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true" >

                                            <optgroup label="selectionnez les medicaments">
                                                @foreach ($produit as $produits)


                                            <option value="{{ $produits->designation }}<br/><br/>">{{ $produits->designation }}</option>
                                            @endforeach
                                        </optgroup>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="reponsable">Posologie</label>
                                        <select class="multi-select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true" name="dosage[]" multiple="">
                                            <optgroup label="Selectionnez le dosage" >
                                                <option value="1 CPx3/j <br/><br/>">1 CPx3/j</option>
                                                <option value="1 CPx2/j <br/><br/>">1 CPx2/j</option>
                                                <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                                <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                            </optgroup>
                                        </select>
                                        <div class="form-group">
                                            <label for="qte">Quantite</label>
                                            <select id="remain-open" data-select2-id="remain-open" tabindex="-1" class="multi-select select2-hidden-accessible" aria-hidden="true" multiple name="qte[]">

                                                <option value="1 BOITE<br/><br/>">1 BOITE</option>
                                                <option value="2 BOITE<br/><br/>">2 BOITE</option>
                                                <option value="3 BOITE<br/><br/>">3 BOITE</option>
                                            </select>
                                        </div>
                                      <div>
                                        <br/>
                                        <div class="form-group">
                                        <button style="float: right;" type="submit" name="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
