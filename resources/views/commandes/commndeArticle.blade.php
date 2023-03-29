<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@extends('layouts.master')

@section('title','validation de la commande')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Commandes Produits</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Valider Commande</h3>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{ route('add.commandes') }}">
                        {!! csrf_field() !!}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date Commande</label>
                                <input type="text" class="form-control" placeholder="Date Commande" value="{{ $commande->dateCommande }}" name="dateCommande">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date Livraison</label>
                                <input type="text" class="form-control" placeholder="Date Livraison" name="dateLivraison" value="{{ $commande->dateLivraison }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fournisseur</label>
                                <input type="text" class="form-control" placeholder="Fournisseur" name="Fournisseur" value="{{ $commande->fournisseur }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Responsable Commande</label>
                                <input type="text" class="form-control" value="{{ $commande->responsableCom }}">
                            </div>


                            <div class="form-group col-md-6">
                                <label>Produit</label>
                                <select class="js-example-disabled-multi produit" name="produit" multiple="multiple" id="produit">
                                    <option>renseignez le Produit</option>
                                    @foreach ($produit as $produits)


                                    <option value="{{ $produits->id }}">{{ $produits->designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Conditionnement</label>
                                <select class="js-example-disabled-multi" multiple="multiple" name="conditionnement_id">
                                    <option>renseignez le conditionnement</option>
                                    @foreach ($conditionnement as $conditionnements)


                                    <option value="{{ $conditionnements->id }}">{{ $conditionnements->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Quantite</label>
                                <input type="number" class="form-control" placeholder="quantite a commander" name="qteCommande">

                            </div>
                            <div class="form-group col-md-6">
                                <label> Prix Unitaire</label>
                                <input type="number" class="form-control pu" placeholder="prix Unitaire" name="pu" id="pu">

                            </div>
                            <div class="form-group col-md-12">
                                <label>Code Commande</label>
                                <input type="number" class="form-control" placeholder="Code Commande" name="code" value="{{$commande->id  }}" readonly >

                            </div>
                        </div>

                        <div style="float: right">

                        <a type="button" href="{{ route('add.commande') }}" class="btn btn-rounded btn-outline-danger">Retour</a>
                        <button type="submit" class="btn btn-rounded btn-outline-secondary" >Valider Commande</button>

                    </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $(document).ready(function() {
        $(document).on('change', '.produit', function() {
            var prod = $(this).val();
            var a = $(this).parent();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
    //             $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    // });
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
// });
// $.ajaxSetup({

// headers: {

//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

// }

// });
            $.ajax({
                type: "GET",
                url: "{{ route('charger.price') }}",
                "timeout": 5000,
                data: {
                    'id': prod
                },
                dataType: 'json',

                success: function(data) {
                   console.log(data);
                  // console.log(.pu);
                   //  a.find('.pu').val(data.pv)
                   // query('.pu').html(data);
                    $(".pu").val(data.pu);
                },
                error: function() {
                   // alert('none');

                }
            });
        });
    });
    </script>

@stop
