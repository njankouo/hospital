@extends('layouts.master')

@section('title','liste des livraisons effectue')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Livraisons</a></li>

                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">livraisons Validés</h4>
                        <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-shopping-cart"></i>
                        </span>Bon De Livraison</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr style="text-align: center">
                                        <th >Code </th>
                                        <th >Designation</th>
                                        <th >Pu</th>
                                        <th >Qte</th>
                                        <th >Date Commande</th>
                                        <th >Date Livraison</th>
                                        <th >Status</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($livraison as $livraisons)
                                    <tr>
                                        <td></td>
                                        <td>{{ $livraisons->produit_id}}</td>
                                        <td>{{ $livraisons->pu }}</td>
                                        <td>{{ $livraisons->qte }}</td>
                                        <td>{{ $livraisons->dateCommande }}</td>
                                        <td>{{ $livraisons->dateLivraison }}</td>
                                        <td>
                                            @if ($livraisons->status==1)
                                            <a href="javascript:void()" class="badge badge-rounded badge-outline-success">livraison effectué</a>
                                            @endif
                                                 </td>
                                        <td>
                                            <button type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#example-lg{{ $livraisons->id }}" data-item-id="1"><span class="btn-icon-left text-warning"><i class="fa fa-eye color-warning"></i>
                                            </span>Voir</button>
                                            &nbsp; &nbsp; &nbsp;

                                            <button type="button" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                            </span>facture</button>
                                        </td>
                                    </tr>
                                      <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg{{ $livraisons->id }}">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Descritption Du Produit Livré</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card">


                                                                    <div class="basic-list-group">
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Designation <span class="badge badge-primary badge-pill">{{ $livraisons->produit_id }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Quantite <span class="badge badge-primary badge-pill">{{ $livraisons->qte }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Prix Unitaire <span class="badge badge-primary badge-pill">{{ $livraisons->pu }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Date Commande <span class="badge badge-primary badge-pill">{{ $livraisons->dateCommande }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Date Livraison <span class="badge badge-primary badge-pill">{{ $livraisons->dateLivraison }}</span>
                                                                            </li>
                                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Status <span class="badge badge-primary badge-pill">Livré</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

@stop
