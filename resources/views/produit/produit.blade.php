<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">Inventaire Des produits</h3>
                    <a class="btn btn-success" style="font-family:forte" href="{{ route('product.create') }}">nouveaux
                        products</a>
                    <a class="btn btn-warning" style="font-family:forte" href="{{ route('inventaire.pdf') }}">Impressions
                        PDF
                    </a>
                    {{-- <a class="btn btn-info" style="font-family:forte" href="">Génerer Le Fichier EXCEL
                    </a> --}}
                </div>
            </div>
            <div class=" card-body">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Designation
                            </th>
                            <th class="th-sm">equivalence
                            </th>
                            <th class="th-sm">Prix de Vente
                            </th>
                            <th class="th-sm">Prix d'achat
                            </th>
                            <th class="th-sm">Quantite En Stock
                            </th>
                            <th class="th-sm">Unité
                            </th>
                            <th class="th-sm">fournisseur
                            </th>
                            <th class="th-sm">stock de securité</th>
                            <th class="th-sm">date fabrication</th>
                            <th class="th-sm">date expiration</th>
                            @can('admin')
                                <th class="th-sm">Opération</th>
                            @endcan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produit as $produits)
                            @if ($produits->qtestock < $produits->stock_seuil)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                    <marquee behavior="" direction=""><strong> {{ $produits->designation }}
                                            !En Rupture de stock veuillez passer la commande


                                        </strong></marquee>

                                </div>
                            @endif
                            <tr>
                                <td>{{ $produits->designation }}</td>
                                <td>{{ $produits->equivalence }}</td>
                                <td>{{ $produits->pv }}</td>
                                <td>{{ $produits->pu }}</td>
                                <td>{{ $produits->qtestock }}</td>
                                <td>{{ $produits->type->nom }}</td>
                                <td>{{ $produits->fournisseur->nom }}</td>
                                <td>{{ $produits->stock_seuil }}</td>
                                <td>{{ $produits->date_fabrication }}</td>
                                <td>{{ $produits->date_peremption }}</td>
                                @can('admin')
                                    <td>


                                        <a href="{{ route('update.produit', $produits->id) }}" class="btn btn"> <i
                                                class="fa fa-eye fa-2x"></i></a>
                                    </td>
                                @endcan
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
@endsection
