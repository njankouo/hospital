

@extends('layouts.master')


@section('title','Creation Des Commandes')

@section('contenu')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hey, Bienvenue!</h4>
                    <span class="ml-1">{{ Auth()->user()->name ?? '' }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Commandes</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulaire Des Commandes</h4>
                <form method="post" action="{{ route('add.commande')}}">
                    @csrf
                <button type="submit" class="btn btn-rounded btn-info text-white" style="float: right"><span class="btn-icon-left text-info"><i class="fa fa-check color-info"></i>
                </span>Creer Commande</button>
            </div>
            <div class="card-body">
                <div class="basic-form">

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="date commande..." name="dateCommande" value="{{\Carbon\Carbon::now()  }}" readonly>
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <input type="date" class="form-control" placeholder="date livraison" id="mdate" data-dtp="dtp_mFN7C" name="dateLivraison">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <input type="text" class="form-control" placeholder="fournisseur..." name="fournisseur">
                            </div>
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <input type="text" class="form-control" placeholder="responsable de la commande..." value="{{ Auth()->user()->name ?? '' }}" readonly name="responsableCom">
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Commandes Crees</h4>
                        <a type="button" class="btn btn-rounded btn-info text-white" href="{{ route('save.commande') }}" style="float: right"><span class="btn-icon-left text-info"><i class="fa fa-cloud color-info"></i>
                        </span>Produit Commande</a>
                  </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                       <th>Date Commande</th>
                                        <th>Date Livraison</th>
                                        <th>Fournisseur</th>
                                        <th>Responsable Commande</th>
                                        <th style="text-align: center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commande as $commandes)


                                        <tr>
                                            <td>{{ $commandes->dateCommande }}</td>
                                            <td>{{ $commandes->dateLivraison}}</td>
                                            <td>{{ $commandes->fournisseur}}</td>
                                            <td>{{ $commandes->responsableCom}}</td>
                                            <td>
                                                <a type="button" href="{{ route('valide.commande',$commandes->id) }}" class="btn btn-rounded btn-info text-white"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                                </span>Valider</a>
                                            </td>
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



@stop


