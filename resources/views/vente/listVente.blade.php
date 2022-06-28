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
                    <h3 style="font-family: forte">liste des ventes effectuées</h3>

                </div>
                <div class=" card-body">
                    {{ \App\Models\VenteProduit::sum('pu') }}
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th class="th-sm">code vente
                                </th>
                                <th class="th-sm">produit
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


                                <th class="th-sm">client
                                </th>



                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $details)
                                @if ($details->vente_id == $details->vente_id)
                                    <tr>
                                        <td>{{ $details->vente_id }}</td>
                                        <td>{{ $details->produit->designation }}</td>
                                        <td>{{ $details->qte_sortie }}</td>
                                        <td>{{ $details->unite }}</td>
                                        <td>{{ $details->pu }}</td>
                                        <td>
                                            @if ($details->remise == null)
                                                <span class="badge badge-info">aucune remise</span>
                                            @else
                                                {{ $details->remise }} %
                                            @endif

                                        </td>
                                        <td>{{ $details->pu * $details->qte_sortie * (1 - $details->remise / 100) }}
                                        </td>
                                        <td>{{ $details->date_vente }}</td>
                                        <td>{{ $details->client }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('delete.vente', $details->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <i type="submit"
                                                    class="fa fa-trash fa-2x text-danger btn-flat show_confirm"
                                                    data-toggle="tooltip" title='Delete'></i>
                                            </form>


                                            <a href="{{ route('facture', $details->id) }}" class="btn btn"> <i
                                                    class="fa fa-print text-info fa-2x mx-2"></i></a>
                                            {{-- <a href="{{ route('edit.vente', $details->id) }}" class="btn btn">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        </tr>
                        </tfoot>
                    </table>

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
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
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
@endsection
