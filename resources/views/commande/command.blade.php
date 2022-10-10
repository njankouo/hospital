<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
<div class='notifications top-right'></div>

@extends('layouts.master')

@section('contenu')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-family: forte">créer une nouvelle commande</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('commande.produit') }}" method="POST" class="form-block">
                        @csrf
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">Date Commande</label>
                                <input type="text"
                                    class="datepicker my-2 form-control @error('date') is-invalid @enderror" name="date"
                                    placeholder="Enter ...">
                                @error('date')
                                    <p>{{ $message }}</p>
                                @enderror
                                <label for="">Date Livraison</label>
                                <input type="text" class="my-2 datepicker" name="dateLivraison">

                            </div>

                            <div class="col s6">
                                <label for="">status commande</label>
                                <input type="text" class=" my-2 @error('status') is-invalid @enderror" name="status"
                                    value="en cours">
                                @error('status')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">

                                <label for="">Fournisseur</label>
                                <select class="my-2 @error('fournisseur') is-invalid @enderror" name="fournisseur">

                                    @foreach ($fournisseur as $fournisseurs)
                                        @if ($fournisseurs->status == 'actif')
                                            <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <p>{{ $message }}</p>
                                @enderror


                            </div>
                            {{-- <div class="col-6">
                                <label for="">Produit</label>
                                <select name="produit" id=""
                                    class="form-control @error('produit') is-invalid @enderror my-2">
                                    <option>........</option>
                                    @foreach ($produit as $produits)
                                        <option value="{{ $produits->designation }}">{{ $produits->designation }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('produit')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">qte</label>
                                <input type="number" class="form-control my-2 @error('qte') is-invalid @enderror"
                                    name="qte">
                                @error('qte')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">unite</label>
                                <select name="unite" id=""
                                    class="form-control @error('unite') is-invalid @enderror my-2">
                                    <option value="">....</option>
                                    @foreach ($unite as $unites)
                                        <option value="{{ $unites->nom }}">{{ $unites->nom }}</option>
                                    @endforeach
                                </select>
                                @error('unite')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">pu</label>
                                <input type="number" class="form-control my-2 @error('pu') is-invalid @enderror"
                                    name="pu">
                                @error('pu')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-8 my-4">
                                <button type="submit" class="btn btn-primary mx-1">save</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-dark"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des commandes</h3>

                </div>
                <div class=" card-content">
                    <div class="table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">code commande
                                    </th>
                                    <th class="th-sm">Date Commande
                                    </th>
                                    <th class="th-sm">Date Livraison
                                    </th>

                                    <th class="th-sm">fournisseur
                                    </th>



                                    <th class="th-sm">Opération</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commande as $commandes)
                                    <tr>
                                        <td>{{ $commandes->id }}</td>
                                        <td>{{ $commandes->date_commande }}</td>
                                        <td>{{ $commandes->date_livraison }}</td>

                                        <td>{{ $commandes->fournisseur->nom }}</td>
                                        <td>
                                            <a href="{{ route('commande.article', $commandes->id) }}" class="btn btn"><i
                                                    class="material-icons fa-2x text-white">eye </i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
        $(document).ready(function() {
            $('.datepicker').datepicker();
        });
    </script>
@endsection
