<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable(
            // dom: 'Bfrtip',
            // buttons: [{
            //         extend: 'print',
            //         exportOptions: {
            //             columns: ':visible'
            //         }
            //     },
            //     'colvis'
            // ],
            // columnDefs: [{
            //     targets: 1,
            //     visible: false
            // }]
        );
    });
</script>
<link rel="stylesheet" href="{{ asset('css/icon.css') }}">

<link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
@extends('layouts.master')
@section('title', 'PHARMACIE |ETATS DES VENTES ')
@section('contenu')
    @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des ventes effectués</h3>
                    <hr>
                    <div class="row">
                        <div class="input-field col s6">



                            <form action="{{ route('liste.vente') }}" method="GET">
                                <div class="input-group mb-3 col s6">
                                    <label for="">date minimale</label>
                                    <input type="date" class="form-control" name="start">
                                </div>
                                <div class="col s6">


                                    <label for="">date maximale</label>
                                    <input type="date" class="form-control" name="end">
                                </div>
                                <button class="btn waves-effect blue" type="submit" style="float:right">search
                                    <i class="fa fa-search text-light"></i>
                                </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class=" card-content">
                {{-- <a href="" class="btn btn-primary" style="float: left;margin-bottom:25px;">
                        <i class="	fa fa-print fa-2x"></i>Impression en fonction des dates
                    </a> --}}
                <a href="{{ route('vente.group') }}" class="btn btn-primary" style="float: right;margin-bottom:15px;">
                    <i class="	fa fa-cloud-upload fa-2x"></i>ventes Groupeés
                </a>

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                {{-- <th class="th-sm">ID
                                </th> --}}
                                <th class="th-sm">code vente
                                </th>
                                <th class="th-sm">designation
                                </th>
                                <th class="th-sm">quantite

                                </th>
                                <th class="th-sm">unite

                                </th>
                                <th class="th-sm">pu</th>
                                </th>
                                <th class="th-sm">Remise</th>
                                <th class="th-sm">PTTC</th>
                                <th class="th-sm">Date vente
                                </th>
                                {{-- <th class="th-sm">Reglement
                                </th> --}}


                                <th class="th-sm">client
                                </th>

                                <th class="th-sm">responsable vente
                                </th>

                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total=0 @endphp
                            @foreach ($detail as $details)
                                @if ($details->stat == 'non')
                                    @php $total +=  $details->pu * $details->qte_sortie * (1 - $details->remise / 100) @endphp


                                    {{-- @if ($details->date_vente != $carbon->format('Y-m-d H:i:s'))
                                @else --}}
                                    <tr>
                                        {{-- <td>00{{ $details->id }}</td> --}}
                                        <td>{{ $details->vente_id }}</td>
                                        <td>{{ $details->produit->designation }}</td>
                                        <td>{{ $details->qte_sortie }}</td>
                                        <td>{{ $details->unite }}</td>
                                        <td>{{ $details->pu }}</td>
                                        <td>
                                            @if ($details->remise == null)
                                                <span class=" badge ">aucune remise</span>
                                            @else
                                                {{ $details->remise }} %
                                            @endif

                                        </td>
                                        <td>{{ $details->pu * $details->qte_sortie * (1 - $details->remise / 100) }}
                                        </td>
                                        <td>{{ $details->date_vente }}</td>
                                        {{-- <td>{{ $details->reglement }}</td> --}}
                                        <td>{{ $details->client }}</td>
                                        <td>{{ $details->user }}</td>
                                        <td>

                                            <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Action
                                            </a>

                                            <!-- Dropdown Structure -->
                                            <ul id='dropdown1' class='dropdown-content'>
                                                <li> <a href="{{ route('edit.vente', $details->id) }}" class="btn btn">
                                                        <i class="large material-icons text-white">edit</i>
                                                    </a></li>
                                                <li>
                                                    <form method="POST"
                                                        action="{{ route('delete.vente', $details->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <a class="btn btn-danger"> <i type="submit"
                                                                class="large material-icons fa-2x text-light btn-flat show_confirm"
                                                                data-toggle="tooltip" title='Delete'>trash</i></a>
                                                    </form>
                                                </li>
                                                <li class="divider"></li>

                                            </ul><br>

                                            <form action="{{ route('cart.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $details->id }}" name="id">
                                                <input type="hidden" value="{{ $details->produit->designation }}"
                                                    name="name">
                                                <input type="hidden" value="{{ $details->pu }}" name="pu">
                                                <input type="hidden" value="{{ $details->remise }}" name="remise">
                                                <input type="hidden" value="{{ $details->qte_sortie }}" name="qte_sortie">
                                                <input type="hidden" value="{{ $details->unite }}" name="unite">
                                                <input type="hidden" value="{{ $details->user }}" name="user">
                                                <input type="hidden" value="{{ $details->client }}" name="client">
                                                <button
                                                    class="px-4 py-2 text-light bg-blue-800 rounded btn btn-primary my-4">generer

                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- @endif --}}
                                @endif
                            @endforeach
                            <p style="font-style: italic">LE MONTANT TOTAL DES SORTIES EST DE:
                                {{ $total }}</p>
                        </tbody>
                        </tr>
                        <tfoot>

                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


    <script>
        $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrain_width: false, // Does not change width of dropdown to that of the activator
            hover: true, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: false, // Displays dropdown below the button
            alignment: 'left' // Displays dropdown with edge aligned to the left of button
        });
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `voulez vous annuler cette vente?`,
                    text: "si oui, confirmer avec OK.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@stop
