<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.css') }}">
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
                                <th class="th-sm">Status de paiement
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
                                    <td>
                                        {{-- @if ($commandes->status_paiement == 'paiement reglé') --}}
                                        <!-- Default switch -->
                                        <input data-id="{{ $commandes->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="payé" data-off="en attente"
                                            {{ $commandes->status_paiement ? 'checked' : '' }}>
                                        {{-- </span>
                                        @else
                                            <span class="badge badge-danger"> {{ $commandes->status_paiement }}</span>
                                        @endif --}}


                                    </td>
                                    <td>{{ $commandes->fournisseur }}</td>

                                    <td>
                                        {{-- <div class="form-check form-switch">
                                            <a href="{{ route('bon.livraison', $commandes->id) }}">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault"
                                                    value="{{ $commandes->status_paiement }}"></a>
                                        </div> --}}
                                        {{-- <a class="btn btn" href="{{ route('bon.livraison', $commandes->id) }}"><i
                                                class="fa fa-eye fa-2x text-info"></i></a> --}}
                                        @if ($commandes->status == 'validé')
                                        @else
                                            <a href="{{ route('edit.commande', $commandes->id) }}" class="btn btn">
                                                <i class="fa fa-pencil fa-2x"></i>
                                            </a>
                                        @endif

                                        <form action="{{ route('cart.livraison') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $commandes->id }}" name="id">
                                            <input type="hidden" value="{{ $commandes->produit->designation }}"
                                                name="name">
                                            <input type="hidden" value="{{ $commandes->pu }}" name="pu">
                                            <input type="hidden" value="{{ $commandes->remise }}" name="remise">
                                            <input type="hidden" value="{{ $commandes->qte }}" name="qte">
                                            <input type="hidden" value="{{ $commandes->unite }}" name="unite">
                                            <input type="hidden" value="{{ $commandes->reglement }}" name="reglement">
                                            <button class=" text-light btn btn-primary">creer
                                                facture
                                            </button>
                                        </form>
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
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var commande_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('toggle.find') }}',
                    data: {
                        'status': status,
                        'commande_id': commande_id
                    },
                    success: function(data) {
                        onsole.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection
