<style>

.pulse-button {



  display: block;
  width: 55px;
  height: 55px;
  font-size: 19px;
  font-weight: light;
  font-family: 'Trebuchet MS', sans-serif;

  text-align: center;
  line-height: 50px;
  letter-spacing: -1px;
  color: white;
  border: none;
  border-radius: 50%;
  background: #5a99d4;
  cursor: pointer;
  box-shadow: 0 0 0 0 rgba(#5a99d4, .5);
  -webkit-animation: pulse 1.5s infinite;
}
.pulse-button:hover {
  -webkit-animation: none;
}
</style>
@extends('layouts.master')
@section('tilte','creation des ventes')
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
                    <li class="breadcrumb-item"><a href="{{ route('ventes') }}">Ventes</a></li>
                </ol>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Formulaire Des Ventes</h4>
                    <span class="pulse-button">panier</i></span>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{ route('addvente.produit') }}">

                            @csrf
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="designation">Designation</label>
                                    <select id="single-select" data-select2-id="single-select" tabindex="-1" class="select2-hidden-accessible form-control" aria-hidden="true" name="designation">

                                    @foreach ($produit as $produits)


                                        <option value="{{ $produits->id }}">{{ $produits->designation }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Prix Unitaire</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="prix unitaire" name="pu">
                                </div>

                                <div class="col-sm-6">
                                    <label for="designation">Conditionnement</label>
                                    <select name="conditionnement" id="" class="form-control">
                                        @foreach ($conditionnement as $conditionnements)

                                        <option value="{{ $conditionnements->libelle }}">{{ $conditionnements->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Quantite</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="quantite" name="qte">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Code Vente</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="code vente" readonly value="{{ $vente->id }}" name="code">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Date Vente</label>
                                    <input type="text" class="form-control" style="text-align: right" placeholder="date vente" readonly value="{{ $vente->date }}" name="date_vente">
                                </div>
                                <div class="col-sm-12 mt-2 mt-sm-0">
                                    <label for="pu">Vendu par</label>
                                    <input type="text" class="form-control" style="text-align: right"  readonly value="{{ $vente->responsable }}" name="responsable">
                                </div>
                                <div class=" mt-2" >
                                    <button type="submit" class="btn btn-primary" style="float: right" >Valider</button>

                                </div>
                               </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
