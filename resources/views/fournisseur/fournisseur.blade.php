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
                <div class="card-title my-3 mx-3">
                    <h3 style="font-family:forte">liste des fournisseurs</h3>
                    <div style="margin-right: 65%" class="d-flex">
                        <a href="{{ route('fournisseur.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus mx-2"></i>Nouveau
                        </a>

                        <a href="{{ route('fournisseur.pdf') }}" class="btn btn-secondary mx-4">Format PDF</a>
                    </div>

                    <div class="card-content">
                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th style="width: 30%">Nom fournisseur</th>
                                    <th style="width: 20%">Prenom</th>
                                    <th style="width: 15%">Telephone</th>
                                    <th style="width: 20%">email</th>
                                    <th style="width: 20%">status contrat</th>
                                    <th style="width: 20%">status</th>
                                    <th style="width: 20%">Operation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($four as $fours)
                                    <tr>
                                        <td>
                                            @if ($fours->sexe == 'F')
                                                <img src="{{ asset('img/lien.png') }}" alt="" style="width: 45px">
                                            @elseif($fours->sexe == 'M')
                                                <img src="{{ asset('img/lion.png') }}" alt="" style="width: 45px">
                                            @else
                                                <span class="badge badge-info"
                                                    style="font-style: italic;font-size:15px">entreprise</span>
                                            @endif


                                        </td>
                                        <td>{{ $fours->nom }}</td>
                                        <td>{{ $fours->prenom }}</td>
                                        <td> {{ $fours->telephone1 }}</td>
                                        <td>{{ $fours->email }}</td>
                                        <td>
                                            @if (count($fours->contrat))
                                                <span class="badge blue text-white">contrat en cour</span>
                                            @else
                                                <span class="badge red text-white">aucun contrat</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($fours->status == 'inactif')
                                                <span class="badge badge-danger">{{ $fours->status }}</span>
                                            @else
                                                <span class="badge badge-info">{{ $fours->status }}</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('fournisseur.edit', $fours->id) }}" class="btn btn">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $four->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
