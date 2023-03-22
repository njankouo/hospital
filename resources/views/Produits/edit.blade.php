@extends('layouts.master')


@section('title','edition des produits')

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
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('produits') }}">Liste Des Produits </a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Mise A jour Produits </a></li>

                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mise a Jour Produits</h3>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{ route('edition.produit', ['produit' => $produit->id]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>designation</label>
                                <input type="text" class="form-control" placeholder="designation" value="{{ $produit->designation }}" name="designation">
                            </div>
                            <div class="form-group col-md-6">
                                <label>equivalence</label>
                                <input type="text" class="form-control" placeholder="equivalence" name="equivalence" value="{{ $produit->equivalence }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>quantite stock</label>
                                <input type="number" class="form-control" placeholder="quantite stock" name="qteStock" value="{{$produit-> qteStock }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>quantite seuil</label>
                                <input type="number" class="form-control" name="qteSeuil" value="{{ $produit->qteSeuil }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>conditionnement</label>
                                <select id="inputState" class="form-control" name="conditionnement_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($conditionnement as $conditionnements)
                                    @if ($conditionnements->id==$produit->conditionnement_id)



                                    <option value="{{ $conditionnements->id }}" selected>{{ $conditionnements->libelle }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Famille</label>
                                <select id="inputState" class="form-control" name="famille_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($famille as $familles)
                                    @if ($familles->id==$produit->famille_id)
                                    <option value="{{ $familles->id }}" selected>{{ $familles->libelle }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Prix Unitaire</label>
                                <input type="number" class="form-control" placeholder="prix unitaire" name="pu" value="{{$produit-> pu }}">

                            </div>

                            <div class="form-group col-md-6">
                                <label>Forme Gallelique</label>
                                <select id="inputState" class="form-control" name="forme_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($forme as $formes)
                                    @if ($formes->id==$produit->forme_id)
                                    <option value="{{ $formes->id }}" selected>{{ $formes->libelle }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="float: right">
                            <a type="button" class="btn btn-rounded btn-outline-danger" href="{{ route('produits') }}">Retour</a>
                        <button type="submit" class="btn btn-rounded btn-outline-secondary">Modifier</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
