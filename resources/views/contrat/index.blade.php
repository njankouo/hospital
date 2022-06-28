<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(10000, 0).slideUp(400, function() {
            $(this).remove();
        });
    }, 4000);
</script>
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
@extends('layouts.master')
@section('contenu')
    @if (session()->has('success'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>


            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des contrats </h3>
                    <a href="{{ route('contrat.creation') }}" class="btn btn-info"> création du nouveau contrat</a>

                </div>
                <div class=" card-body">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th class="th-sm">fournisseur
                                </th>
                                <th class="th-sm">date debut contrat
                                </th>
                                <th class="th-sm">date fin contrat

                                </th>
                                <th class="th-sm">mode de reglement
                                </th>
                                <th class="th-sm">fichier image
                                </th>




                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contrat as $contrats)
                                <tr>
                                    <td>{{ $contrats->fournisseur->nom }}</td>
                                    <td>{{ $contrats->date_debut }}</td>
                                    <td>{{ $contrats->date_fin }}</td>
                                    <td>{{ $contrats->reglement }}</td>
                                    <td>
                                        <img class="rounded" src="{{ asset('img') }}/{{ $contrats->image }}"
                                            alt="" style="width: 88px;height:50px;">
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('contrat.delete', $contrats->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <i type="submit" class="fa fa-trash fa-2x text-danger btn-flat show_confirm"
                                                data-toggle="tooltip" title='Delete'></i>
                                        </form>
                                        <a href="{{ route('edit', $contrats->id) }}" class="btn btn-info"> <i
                                                class="fa fa-edit"></i></a>
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
