<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable();

    });
</script>


<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
@extends('layouts.master')
@section('title', 'PHARMACIE |ETATS DES SORTIES ')
@section('contenu')
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                positionClass: 'toast-top-center'
            }
            toastr.success("{{ session('success') }}");
        @endif
    </script>
    {{-- @if (session('success'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des sorties des services</h3>
                    <hr>
                    <div class="row">
                        <div class="col-12">



                            <form action="{{ route('show.service') }}" method="GET">
                                <div class="input-group mb-3">
                                    <label for="">date minimale</label>
                                    <input type="date" class="form-control" name="start">
                                    &nbsp; &nbsp;
                                    <label for="">date maximale</label>
                                    <input type="date" class="form-control" name="end">
                                    <button class="btn btn-primary mx-2" type="submit">search
                                        <i class="fa fa-search text-light"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class=" card-body">
                    {{-- <a href="" class="btn btn-primary" style="float: left;margin-bottom:25px;">
                        <i class="	fa fa-print fa-2x"></i>Impression en fonction des dates
                    </a> --}}
                    <a href="{{ route('fact.service') }}" class="btn btn-primary" style="float: right;margin-bottom:15px;">
                        <i class="	fa fa-cloud-upload fa-2x"></i>sorties Groupeés
                    </a>
                    <a href=" {{ route('sortie.pdf') }}" class="btn btn-primary"
                        style="float: right;margin-bottom:15px;margin-right:15px">
                        <i class="	fa fa-print fa-2x"></i>Impression
                    </a>
                    <a href="{{ route('service.anexe') }}" class="btn btn-primary"
                        style="float: right;margin-bottom:15px;margin-right:15px">
                        <i class="	fa fa-fire fa-2x"></i>Repertoire CMCU AGORA
                    </a>

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>

                                    <th class="th-sm">code sortie
                                    </th>
                                    <th class="th-sm">designation
                                    </th>
                                    <th class="th-sm">quantite

                                    </th>
                                    <th class="th-sm">unite

                                    </th>
                                    <th class="th-sm">pu</th>
                                    </th>

                                    <th class="th-sm">PTTC</th>
                                    <th class="th-sm">Date sortie
                                    </th>



                                    <th class="th-sm">beneficiaire
                                    </th>
                                    <th class="th-sm">Poste beneficiaire
                                    </th>

                                    <th class="th-sm">responsable sortie
                                    </th>
                                    <th class="th-sm">Service
                                    </th>
                                    <th class="th-sm">Opération</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total=0 @endphp
                                @foreach ($detail as $details)
                                    @if ($details->stat == 'oui' && $details->service != 'CMCU AGORA')
                                        @php $total +=  $details->pu * $details->qte_sortie * (1 - $details->remise / 100) @endphp
                                        <tr>

                                            <td>{{ $details->vente_id }}</td>
                                            <td>{{ $details->produit->designation }}</td>
                                            <td>{{ $details->qte_sortie }}</td>
                                            <td>{{ $details->unite }}</td>
                                            <td>{{ $details->pu }}</td>

                                            <td>{{ $details->pu * $details->qte_sortie * (1 - $details->remise / 100) }}
                                            </td>
                                            <td>{{ $details->date_vente }}</td>

                                            <td>{{ $details->beneficiaire }}</td>
                                            <td>{{ $details->poste }}</td>
                                            <td>{{ $details->user }}</td>
                                            <td>{{ $details->service }}</td>
                                            <td>
                                                @can('admin')
                                                    {{-- @if ($details->date_vente != $carbon->format('Y-m-d'))
                                                @else --}}
                                                    <form method="POST" action="{{ route('delete.vente', $details->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <a class="btn btn-danger show_confirm text-light" data-toggle="tooltip"
                                                            title='Delete'>annuler </a>
                                                    </form>

                                                    {{-- <a href="{{ route('facture', $details->id) }}" class="btn btn"> <i
                                                    class="fa fa-print text-info fa-2x mx-2"></i></a> --}}
                                                    {{-- <a href="{{ route('edit.vente', $details->id) }}" class="btn btn">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a> --}}
                                                    {{-- @endif --}}
                                                @endcan
                                                <form action="{{ route('cart.service') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $details->id }}" name="id">
                                                    <input type="hidden" value="{{ $details->produit->designation }}"
                                                        name="name">
                                                    <input type="hidden" value="{{ $details->pu }}" name="pu">
                                                    <input type="hidden" value="{{ $details->remise }}" name="remise">
                                                    <input type="hidden" value="{{ $details->qte_sortie }}"
                                                        name="qte_sortie">
                                                    <input type="hidden" value="{{ $details->unite }}" name="unite">
                                                    <input type="hidden" value="{{ $details->user }}" name="user">
                                                    <input type="hidden" value="{{ $details->beneficiaire }}"
                                                        name="beneficiaire">
                                                    <input type="hidden" value="{{ $details->poste }}" name="poste">
                                                    <input type="hidden" value="{{ $details->service }}" name="service">
                                                    <button
                                                        class="px-4 py-2 text-light bg-blue-800 rounded btn btn-primary">generer

                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `voulez vous annuler cette sortie?`,
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
