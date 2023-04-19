@extends('layouts.master')

@section('title','Gestion Des Ordonances')

@section('contenu')
<style>
    i:hover{
       transform:scale(1.5);
    }
 </style>
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
                                        {{-- <a  href="{{ route('ordonance.pdf',$ordonances->id) }}" type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-print"></i>
                                        </span>Imprimer</a> --}}
                                        <a  href="{{ route('ordonance.pdf',$ordonances->id) }}" class="mr-2 btn btn-rounded btn-primary" data-toggle="tooltip" data-placement="top" title="ordonance"><i class="fa fa-download text-light"></i> </a>
                                        <button class="mr-2 btn btn-rounded btn-secondary"data-toggle="modal" data-target="#exampleModalpopover{{ $ordonances->id }}"><i class="fa fa-edit text-light"></i> </button>

                                    </td>
                                    <div class="modal fade" id="exampleModalpopover{{ $ordonances->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ajouter Des Medicaments A la Prescription De {{ !empty($ordonances->patient) ? $ordonances->patient->nom:'' }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="Medicament">Medicaments</label>
                                                    <select class="multi-select select2-hidden-accessible" name="medicament[]" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true" >

                                                        <optgroup label="selectionnez les medicaments">
                                                            @foreach ($produit as $produits)


                                                        <option value="{{ $produits->designation }}<br/><br/>">{{ $produits->designation }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
