<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    @can('admin')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-title my-3 mx-3">
                        <h3 style="font-family:forte">listing des utilisateurs</h3>
                        <div style="margin-left: 80%">

                        </div>
                        <a href="{{ route('user.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>Nouvelle
                            utilisateur
                        </a>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="width: 30%">Nom utilisateur</th>
                                        <th style="width: 20%">sexe</th>
                                        <th style="width: 15%">role</th>
                                        <th style="width: 20%">telephone</th>
                                        <th style="width: 20%">status</th>
                                        <th style="width: 20%">Operation</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($role as $roles)
                                        <tr>
                                            <td></td>
                                            <td> {{ $roles->nom }}</td>
                                            <td>
                                                @if ($roles->sexe == 'feminin')
                                                    <img src="{{ asset('img/lien.png') }}" alt="" style="width: 45px">
                                                @else
                                                    <img src="{{ asset('img/lion.png') }}" style="width:45px;">
                                                @endif
                                            </td>
                                            <td>{{ optional($roles->role)->nom }}</td>
                                            <td>{{ $roles->telephone1 }}</td>
                                            <td>
                                                @if ($roles->status == 'actif')
                                                    <span class="badge badge-info"> {{ $roles->status }}</span>
                                                @else
                                                    <span class="badge badge-danger"> {{ $roles->status }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('role.vue', $roles->id) }}" class="btn"> <i
                                                        class="large material-icons "> add</i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
