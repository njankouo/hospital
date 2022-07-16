<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
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
    @if (session()->has('success'))
        <div class="alert alert-success">

            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des livraisons effectuées</h3>

                </div>
                <div class=" card-body">
                    <a href="{{ route('group.livraison') }}" class="btn btn-primary"
                        style="float: right;margin-bottom:12px ">
                        <i class="fa fa-plus-square fa-2x" aria-hidden="true "></i> Livraisons Groupés
                    </a>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th class="th-sm">code commande
                                </th>
                                <th class="th-sm">produit
                                </th>
                                <th class="th-sm">quantite

                                </th>
                                <th class="th-sm">unite

                                </th>
                                <th class="th-sm">pu</th>

                                <th class="th-sm">Date Commande
                                </th>
                                <th class="th-sm">Date Livraison
                                </th>
                                <th class="th-sm">Status
                                </th>
                                <th class="th-sm">fournisseur
                                </th>



                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livraison as $commandes)
                                <tr>
                                    <td>{{ $commandes->commande_id }}</td>
                                    <td>{{ $commandes->produit->designation }}</td>
                                    <td>{{ $commandes->qte }}</td>
                                    <td>{{ $commandes->unite }}</td>
                                    <td>{{ $commandes->pu }}</td>
                                    <td>{{ $commandes->date_commande }}</td>
                                    <td>{{ $commandes->date_livraison }}</td>
                                    <td>

                                        {{ $commandes->status }}

                                    </td>
                                    <td>{{ $commandes->fournisseur }}</td>

                                    <td>
                                        {{-- <a class="btn btn" href="{{ route('bon.livraison', $commandes->id) }}"><i
                                                class="fa fa-eye fa-2x text-info"></i></a> --}}
                                        @if ($commandes->status == 'validé')
                                        @else
                                            <a href="{{ route('edit.commande', $commandes->id) }}" class="btn btn">
                                                <i class="fa fa-pencil fa-2x"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('TOCART', $commandes->id) }}" class="btn  btn">
                                            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
                                        </a>
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
@endsection
