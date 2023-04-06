@extends('layouts.master')

@section('title','gestion des ventes')

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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste Des Codes Ventes</h4>
                    <a type="button" class="btn btn-primary" style="-webkit-animation: pulse 1s infinite"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus fa-2x text-white" ></i></a>
                    {{-- --}}
                    <div class="modal fade" id="exampleModalCenter">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('save.vente') }}" method="post" >
                                    @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Formulaire Codes Ventes</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="col-12">

                                        <label for="vendu">Vendu Par:</label>
                                        <input type="text" class="form-control" value="{{ Auth()->user()->name??'' }}" name="responsable">
                                        <label for="date">Date Vente</label>
                                        <input type="text" name="date_vente" id="" class="form-control" value="{{ \Carbon\Carbon::now() }}">

                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover verticle-middle table-responsive-sm" style="text-align: center" >
                            <thead>
                                <tr>
                                    <th scope="col">Codes Ventes</th>
                                    <th scope="col">Date Ventes</th>
                                    <th scope="col">Vente effectu&eacute;e par:</th>
                                    {{-- <th scope="col">Designation</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Conditionnement</th>
                                    <th scope="col">quantite</th>

                                    <th scope="col">prix unitaire</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vente as $ventes)

                                <tr>


                                    <td>{{ $ventes->id }}</td>
                                    <td>{{ $ventes->date }}</td>
                                    <td>{{ $ventes->responsable }}</td>
                                    <td>
                                        <span><a  href="{{ route('add.vente',$ventes->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted"></i> </a><a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
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

@endsection
