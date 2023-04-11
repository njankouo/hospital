
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

@section('title','liste des ventes')

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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Details Ventes</a></li>

                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h4 class="card-title">Liste Des Ventes</h4>
                            <span class="pulse-button">panier {{ count((array) session('cart')) }}</i></span>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover verticle-middle table-responsive-sm" style="text-align: center" >

                            <thead>
                                        <tr role="row">
                                            <th>Codes Ventes</th>
                                            <th>Designation</th>
                                            <th>Quantite</thpan=>
                                            <th>Conditionnement</th>
                                            <th>Pu</th>

                                            <th>Date Vente</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vente as $ventes)
                                    <tr>
                                        <td>{{ $ventes->code }}</td>
                                        <td>{{ $ventes->produit->designation }}</td>
                                        <td>{{ $ventes->qte }}</td>
                                        <td>{{ $ventes->conditionnement }}</td>
                                        <td>{{ $ventes->pu }}</td>
                                        <td>{{ $ventes->created_at->diffForHumans() }}</td>
                                        <td>
                                            <span><a href="javascript:void()" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil text-primary"></i> </a>
                                                <a href="{{ route('soft.vente',$ventes->id) }}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close text-danger"></i></a></span>
                                            <span>
                                                <a href="{{ route('add.to.cart', $ventes->id) }}" class="m-4">
                                                <i class="fa fa-check "></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
