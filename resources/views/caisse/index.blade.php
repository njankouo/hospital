<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
{{-- <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> --}}
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

            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <table id="example" class="table table-striped table-bordered my-4">
                            {{ $carbon->format('Y-m-d') }}
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <th>Client </th>
                                    <th>Date Entée</th>
                                    <th>montant entré</th>


                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($caisse as $caisses)
                                    @if ($caisses->date_vente != $carbon->format('Y-m-d'))
                                    @else
                                        <tr>
                                            <td>{{ $caisses->id }}</td>
                                            <td>{{ $caisses->client }}</td>
                                            <td>{{ $caisses->created_at->diffForHumans() }}</td>
                                            <td class="text-success">
                                                {{ $caisses->pu * $caisses->qte_sortie * (1 - $caisses->remise / 100) }}
                                                (FCFA)
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
            {{-- <div class="container">
                <div class="row">


                    <div class="col">

                    </div>
                </div>
            </div> --}}
        </div>

    </div>
@endsection
