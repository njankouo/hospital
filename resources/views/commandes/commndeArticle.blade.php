
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
        <h4>Commande Des Produits</h4>
        <div class="row">
        <div class="form-group col-md-4">
            <form id="commande-form" >

            <label>Produit</label>
            <select class="form-control produit" name="produit_id" id="nom-produit">
                <option>renseignez le Produit</option>
                @foreach ($produit as $produits)


                <option value="{{ $produits->id }}">{{ $produits->designation }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Conditionnement</label>
            <select class="form-control" name="conditionnement_id" id="conditionnement">
                <option>conditionnement...</option>
                @foreach ($conditionnement as $conditionnements)


                <option value="{{ $conditionnements->libelle }}">{{ $conditionnements->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <label> Quantite</label>
            <input type="number" class="form-control" placeholder="quantite..." name="qteCommande" id="quantite">

        </div>
        <div class="form-group col-md-2">
            <label> Prix Unitaire</label>
            <input type="number" class="form-control pu" placeholder="prix Unitaire" name="pu" id="prix">

        </div>
        <div class="form-group col-md-2">

            <button type="submit" class="btn btn-rounded btn-info mt-4">
            Ajouter
        </button>
        </div>
    </div>
    <input type="text" class="form-control" name="code" id="code" value="{{ $commande->id }}" readonly>
</form>
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{ route('add.commandes') }}">
                        {!! csrf_field() !!}

                        <div class="form-row">
                            <div class="table-responsive">
                                <table class="table header-border table-responsive-sm text-center"  id="commande-table">
                                    <thead>
                                        <tr>

                                            <th>Code Produit</th>
                                            <th>Quantite</th>
                                            <th>Conditionnement</th>
                                            <th>prix unitaire</th>
                                            <th>remise</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <th colspan="6">
                                         Montant Total De La Commande
                                        </th>
                                        <th colspan="2"></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                     <div style="float: right">
                        @foreach ($commandes as $commandes)

                        @endforeach
                          <a href="{{ route('facture.commande',$commandes->id) }}" class="btn btn-rounded btn-outline-primary">Etablir La Facture</a>
                    </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<script>
    $(document).ready(function() {
        $('#commande-form').on('submit', function(e) {
            e.preventDefault();
            var nomProduit = $('#nom-produit').val();
            var quantite = $('#quantite').val();
            var prix = $('#prix').val();
            var conditionnement = $('#conditionnement').val();
            var code = $('#code').val();
            $.ajax({
                url: "{{ route('add.commande') }}",
                method: 'POST',
                data: {
                    nomProduit: nomProduit,
                    quantite: quantite,
                    prix: prix,
                    conditionnement:conditionnement,
                    code:code,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    var commande = {
                        nomProduit: nomProduit,
                        quantite: quantite,
                        prix: prix,
                        conditionnement:conditionnement,
                        code:code,
                    };
                    $('#commande-table tbody').append('<tr><td>' + commande.nomProduit + '</td><td>' + commande.quantite + '</td><td>' + commande.conditionnement + '</td><td>' + commande.prix + '</td><td>' + commande.remise+ '</td><td>' + commande.prix + '</td></tr>');
                }
            });
        });
    });
</script>

<script>
    $.ajax({
    url: '/proforma/' + id,
    type: 'GET',
    success: function(response) {
        // Afficher le PDF dans une nouvelle fenêtre ou un nouvel onglet
        window.open(response);
    },
    error: function(xhr) {
        console.log(xhr.responseText);
    }
});
</script>

@stop
