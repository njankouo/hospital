@extends('layouts.master')

@section('title','liste des commandes valide')

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
                    <li class="breadcrumb-item"><a href="{{ route('commandes') }}">Commandes</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Commandes validés</a></li>

                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Commandes Validés</h4>
                        {{-- <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-left text-primary"><i class="fa fa-shopping-cart"></i>
                        </span>Bon De Commande</button> --}}
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
                                            @if ($commandes->status==null)
                                            <a href="javascript:void()" class="badge badge-rounded badge-outline-danger">En Cours...</a>
                                            @else
                                            <a href="javascript:void()" class="badge badge-rounded badge-outline-primary">Commande Livr&eacute;</a>
                                            @endif
                                                 </td>
                                        <td>
                                            <button type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#example-lg{{ $commandes->id }}" data-item-id="1"><i class="fa fa-eye text-white"></i>
                            </button>


                                            {{-- <button type="button" class="btn btn-rounded btn-info"><i class="fa fa-plus text-white"></i>
                                            </button> --}}

                                            <a type="button" class="btn btn-rounded btn-danger" href="{{ route('soft.commande',$commandes->id) }}"><i class="fa fa-minus text-white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                      <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg{{ $commandes->id }}">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">AJOUTER A LA LIVRAISON</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="{{ route('add.livraison',['commande'=>$commandes->id]) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="put">
                                                                <div class="basic-form">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" placeholder="Designation" value="{{ $commandes->produit_id }}" name="produit_id">
                                                                            </div>
                                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                                <input type="number" class="form-control" placeholder="quantite" name="qte" value="{{ $commandes->qte }}">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6">
                                                                                <input type="text" class="form-control" placeholder="date commande" value="{{ $commandes->dateCommande }}" name="dateCommande">
                                                                            </div>
                                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                                <input type="text" class="form-control" placeholder="date livraison" name="dateLivraison" value="{{ $commandes->dateLivraison }}">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-6">
                                                                                <input type="number" class="form-control" placeholder="prix unitaire" value="{{ $commandes->pu }}" name="pu">
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <input type="number" class="form-control" placeholder="conditionnement" value="{{ $commandes->conditionnement_id }}" name="conditionnement_id">
                                                                            </div>

                                                                        </div>
                                                                        <br>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12">
                                                                                <input type="number" class="form-control" placeholder="code commande" value="{{ $commandes->code }}" name="code">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12">
                                                                                <input type="number" class="form-control" placeholder="status" value="1" name="status">
                                                                            </div>

                                                                        </div>

                                                                </div>


                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                                    <button type="submit" class="btn btn-primary">soumettre</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
</div>

@stop
