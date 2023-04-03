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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Ventes</a></li>
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
                        <form>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" placeholder="Designation">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Prix Unitaire</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="prix unitaire">
                                </div>

                                <div class="col-sm-6">
                                    <label for="designation">Conditionnement</label>
                                    <select name="conditionnement" id="" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Quantite</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="quantite">
                                </div>

                                <div class=" mt-2" >
                                    <button type="button" class="btn btn-primary btn-lg" >Valider</button>

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
