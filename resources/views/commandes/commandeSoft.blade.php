@extends('layouts.master')

@section('title','commandes annulés')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Commandes Annul&eacute;es</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Commandes Annul&eacute;es</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header-border table-hover verticle-middle text-center">
                            <thead>

                                <thead>
                                    <tr style="text-align: center">
                                        <th >Code </th>
                                        <th >Designation</th>
                                        <th >Pu</th>
                                        <th >Qte</th>
                                        <th >Date Commande</th>
                                        <th >Date Livraison</th>
                                        <th >Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commande as $commandes)
                                    @if ($commandes->status==1)
                                    @else


                                    <tr>
                                        <td><?php echo '00'?>{{ $commandes->code }}</td>
                                        <td>{{ $commandes->produit->designation}}</td>
                                        <td>{{ $commandes->pu }}</td>
                                        <td>{{ $commandes->qte }}</td>
                                        <td>{{ $commandes->dateCommande }}</td>
                                        <td>{{ $commandes->dateLivraison }}</td>
                                        <td>
                                            @if ($commandes->deleted_at)
                                            <a href="javascript:void()" class="badge badge-rounded badge-outline-danger">Commande Annul&eacute;</a>
                                            @endif
                                                 </td>

                                    </tr>
                                    @endif
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
