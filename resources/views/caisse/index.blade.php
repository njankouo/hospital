<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#example').DataTable();
    // });
    $(document).ready(function() {
        $('#example').DataTable({
            "fnDrawCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(4)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update status DIV
                $('#status').html('<b>LE MONTANT DE VENTE JOURNALIER :</b> <u>' + total +
                    '</u>  FCFA'
                );
            }
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">

@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="card">
            <p class="text-center" style="font-style: italic;font-size:25px;">
                <a href="{{ route('etat') }}" class="btn btn"> <i class="btn btn	fa fa-download fa-2x text-primary"
                        style="float: right"></i></a> Etats Des Ventes
                Journalières
            </p>

        </div>
    </div>
    <div class="row">
        <div class="card my-4">
            <div class="card-title p-3">
                <p class="mx-4" style="font-style: italic;font-size:25px;">
                    <i class="fa fa-plus-square fa-2x text-success"> ENTRéE
                        CAISSE
                    </i>
                </p>
                <div id="status" style="float: right;font-size:20px"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">

                        <table id="example" class="table table-striped table-bordered my-4">
                            {{ Carbon\Carbon::now()->toDateString() }}
                            <?php \Carbon\Carbon::setUTF8(true);
                            setlocale(LC_TIME, 'French'); ?>
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <th>Client </th>
                                    <th>Date Entée</th>
                                    <th>Designation</th>
                                    <th>montant entré</th>
                                    <th>reglement</th>


                                </tr>

                            </thead>
                            <tbody>
                                @php $total=0 @endphp
                                @foreach ($caisse as $caisses)
                                  @if ($caisses->date_vente != $carbon->format('Y-m-d'))
                                    @else
                                        @php $total+= $caisses->pu * $caisses->qte_sortie * (1 - $caisses->remise / 100) @endphp

                                        <tr>
                                            <td>{{ $caisses->id }}</td>
                                            <td>{{ $caisses->client }}</td>
                                            <td>{{ $caisses->created_at->diffForHumans() }}</td>
                                            <td>{{ $caisses->produit->designation }}</td>
                                            <td class="text-success">
                                                {{ $caisses->pu * $caisses->qte_sortie * (1 - $caisses->remise / 100) }}

                                            </td>
                                            <td>{{ $caisses->reglement }}</td>
                                        </tr>
                                    @endif
                                @endforeach


                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
            <div class="container">
                <div class="row">


                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-primary">
            <p class="text-light" style="font-size: 25px;font-style:italic;float:right;text-decoration:underline">Le montant
                total des ventes est de:{{ $total }}</p>
        </div>
    </div>
    {{-- <script>
        $('#example')
            .on('xhr.dt', function(e, settings, json, xhr) {
                $('#total').html(json.sum);
            })
    </script> --}}
@endsection
