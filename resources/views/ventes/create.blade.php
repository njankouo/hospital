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
@section('tilte','creation des ventes')
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
                    <li class="breadcrumb-item"><a href="{{ route('ventes') }}">Ventes</a></li>
                </ol>
            </div>
        </div>

            <h5>Vente Des Ventes</h5>
        <div class="row">
            <div class="form-group col-md-4">
                        {{-- <form method="post" action="{{ route('addvente.produit') }}">

                            @csrf
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="designation">Designation</label>
                                    <select id="single-select" data-select2-id="single-select" tabindex="-1" class="select2-hidden-accessible form-control" aria-hidden="true" name="designation">

                                    @foreach ($produit as $produits)


                                        <option value="{{ $produits->id }}">{{ $produits->designation }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Prix Unitaire</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="prix unitaire" name="pu">
                                </div>

                                <div class="col-sm-6">
                                    <label for="designation">Conditionnement</label>
                                    <select name="conditionnement" id="" class="form-control">
                                        @foreach ($conditionnement as $conditionnements)

                                        <option value="{{ $conditionnements->libelle }}">{{ $conditionnements->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Quantite</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="quantite" name="qte">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Code Vente</label>
                                    <input type="number" class="form-control" style="text-align: right" placeholder="code vente" readonly value="{{ $vente->id }}" name="code">
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="pu">Date Vente</label>
                                    <input type="text" class="form-control" style="text-align: right" placeholder="date vente" readonly value="{{ $vente->date }}" name="date_vente">
                                </div>
                                <div class="col-sm-12 mt-2 mt-sm-0">
                                    <label for="pu">Vendu par</label>
                                    <input type="text" class="form-control" style="text-align: right"  readonly value="{{ $vente->responsable }}" name="responsable">
                                </div>
                                <div class=" mt-2" >
                                    <button type="submit" class="btn btn-primary" style="float: right" >Valider</button>

                                </div>
                               </div>
                        </form> --}}

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
                    <div class="row">
                    <div class="col-6">
                    <label for="code">Code Vente</label>
                    <input type="text" class="form-control" name="code" id="code" value="{{ $vente->id }}" readonly>
                    </div>
                    <div class="col-6">
                    <label for="responsable">Responsable Vente</label>
                    <input type="text" value="{{ auth()->user()->name??'' }}" name="responsable" id="responsable" class="form-control">
                </div>
            </div>
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
                                                 Montant Total De La vente
                                                </th>
                                                <th colspan="2"></th>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>

                                <div style="float: right">
                                  <a href="{{ route('facture.commande',$vente->id) }}" class="btn btn-rounded btn-outline-primary">Etablir La Facture</a>

                            </div>
                                </form>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#commande-form').on('submit', function(e) {
            e.preventDefault();
            var nomProduit = $('#nom-produit').val();
            var quantite = $('#quantite').val();
            var prix = $('#prix').val();
            var conditionnement = $('#conditionnement').val();
            var code = $('#code').val();
            var responsable=$('#responsable').val();
            $.ajax({
                url: "{{ route('addvente.produit') }}",
                method: 'POST',
                data: {
                    nomProduit: nomProduit,
                    quantite: quantite,
                    prix: prix,
                    conditionnement:conditionnement,
                    code:code,
                    responsable:responsable,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    var commande = {
                        nomProduit: nomProduit,
                        quantite: quantite,
                        prix: prix,
                        conditionnement:conditionnement,
                        code:code,
                        responsable:responsable,
                    };
                    $('#commande-table tbody').append('<tr><td>' + commande.nomProduit + '</td><td>' + commande.quantite + '</td><td>' + commande.conditionnement + '</td><td>' + commande.prix + '</td><td>' + commande.remise+ '</td><td>' + commande.prix + '</td><td>' + commande.responsable + '</td></tr>');
                }
            });
        });
    });
</script>
@endsection
