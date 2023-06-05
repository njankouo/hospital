<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <style>
        i:hover{
           transform:scale(1.5);
        }
     </style>
@extends('layouts.master')

@section('title','gestion des paiements')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Caisses</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-weight:bold">Liste Des Paiements</h4>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus text-white"></i>Nouveau Paiement</button>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display table table-hover" style="min-width: 845px; text-align: center">
                                <thead>
                                    <tr style="text-align: center">

                                        <th >Nom Patient</th>
                                        <th>Motifs Versements</th>

                                        <th >Montant a Verser</th>
                                        <th>Versement Versé</th>

                                        <th >Reste A payer</th>
                                        <th>Date De Paiement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caisse as $caisses)
                                    <tr>

                                        <td>{{ $caisses->patient->nom}} &nbsp;{{ $caisses->patient->prenom }}</td>

                                        <td>{{$caisses->motif}}</td>
                                        <td>{{ $caisses->montant }}</td>
                                        <td>{{ $caisses->versement }}</td>
                                        <td></td>

                                        <td>{{ $caisses->updated_at->diffForHumans() }}</td>
                                        
                                        <div class="modal fade" id="exampleModalCenter">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Etablissement Du Paiement</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('add.paiement')}}" method="post">

                                                            @csrf
                                                            <label for="patient">Patient</label>
                                                            <select name="patient_id" id="nom" class="form-control">
                                                                <option>selectinnez le patient</option>
                                                                @foreach ($patient as $patients)

                                                                <option value="{{ $patients->id }}">{{ $patients->nom }}</option>

                                                                @endforeach
                                                            </select>

                                                            <label for="versement">Versement</label>
                                                            <input type="number" style="text-align: right;" name="versement" class="form-control" placeholder="Versement">

                                                            <label for="versement">Montant</label>
                                                            <input type="number" style="text-align: right;" name="montant" class="form-control" placeholder="montant">
                                                            <label for="Motif">Motif Versement</label>
                                                            <select name="motif" id="" class="form-control">

                                                               <option value="examen medical">Examen Medical</option>
                                                               <option value="bilan medical">Bilan Medical</option>
                                                                <option value="consultation">Consultation</option>
                                                                <option value="hospitalisation">Hospitalisation</option>
                                                            </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                                        <button type="submit" class="btn btn-primary">enregistrer</button>
                                                    </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('message') }}");
  @endif
  </script>
  <script>
    @if(Session::has('error'))
     toastr.options =
     {
       "closeButton" : true,
       "progressBar" : true
     }
           toastr.error("{{ session('error') }}");
     @endif
     </script>
@endsection
