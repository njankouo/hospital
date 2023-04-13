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

                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">livraisons Effectu&eacute;es</h4>

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
                                        <td>00{{ $livraisons->code }}</td>
                                        <td>{{ $livraisons->produit->designation}}</td>
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


                                        </td>
                                    </tr>
                                      <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg{{ $livraisons->id }}">
                                        <div class="modal-dialog modal-centered ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Descritption Du Produit Livré</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <div id="accordion-ten" class="accordion accordion-header-shadow accordion-rounded">
                                                                <div class="accordion__item">
                                                                    <div class="accordion__header collapsed accordion__header--primary" data-toggle="collapse" data-target="#header-shadow_collapseOne" aria-expanded="false">
                                                                        <span class="accordion__header--icon"></span>
                                                                        <span class="accordion__header--text">Code Commande: 00{{ $livraisons->code }}</span>
                                                                        <span class="accordion__header--indicator"></span>
                                                                    </div>
                                                                    <div id="header-shadow_collapseOne" class="accordion__body collapse" data-parent="#accordion-ten" style="">
                                                                        <div class="accordion__body--text">
                                                                            <h6>Designation: {{ $livraisons->produit->designation}}</h6>
                                                                            <h6>Quantit&eacute;: {{ $livraisons->qte }} {{ $livraisons->conditionnement->libelle }}</h6>
                                                                            <h6>Prix D'achat: {{ $livraisons->pu }}</h6>
                                                                            <h6>Date Commande: {{ $livraisons->dateCommande }}</h6>
                                                                            <h6>Livraison Effectu&eacute;e Le {{ $livraisons->dateLivraison }}</h6>

                                                                            <h5 style="font-weight:bold;text-align:right">PRIX TTC {{ $livraisons->qte * $livraisons->pu }}</h5>
                                                                        </div>

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
