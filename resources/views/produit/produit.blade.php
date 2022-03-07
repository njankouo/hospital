<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">Listing Des produits</h3>
                </div>
                <div class="card-body">

                    <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Nom produits
                                </th>
                                <th class="th-sm">Image produits
                                </th>
                                <th class="th-sm">Status
                                </th>
                                <th class="th-sm">Prix Unitaire
                                </th>
                                <th class="th-sm">Quantite En Stock
                                </th>
                                <th class="th-sm">Unite de gestion
                                </th>
                                <th class="th-sm">stock de securité</th>
                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            </tr>
                            </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
