<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
@if (Session()->has('success'))
    <span class="alert-primary text-center">
        {{ Session::get('success') }}
    </span>
@endif
@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-3 mx-3">
                    <h3 style="font-family:forte">listing des fournisseurs</h3>
                    <div style="margin-left: 80%">
                        <a href="" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl">
                            <i class="fas fa-plus"></i>New fournisseurs
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th></th>
                                    <th style="width: 30%">Nom fournisseur</th>
                                    <th style="width: 20%">Prenom</th>
                                    <th style="width: 15%">Telephone</th>
                                    <th style="width: 20%">email</th>
                                    <th style="width: 20%">Operation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($four as $fours)
                                    <tr>
                                        <td>
                                            @if ($fours->sexe == 0)
                                                <img src="{{ asset('img/lien.png') }}" alt="" style="width: 45px">
                                            @else
                                                <img src="{{ asset('img/lion.png') }}" alt="" style="width: 45px">
                                            @endif


                                        </td>
                                        <td>{{ $fours->nom }}</td>
                                        <td>{{ $fours->prenom }}</td>
                                        <td> {{ $fours->telephone1 }}</td>
                                        <td>{{ $fours->email }}</td>


                                        <td>
                                            <div class="dropdown dropup">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown">Operation in table
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu mx-2">
                                                    <a href="#" class="btn btn-danger my-2">delete</a>
                                                    <a href="#" class="btn btn-primary">update</a>

                                                </ul>
                                            </div>
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
@include('fournisseur.create')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}">

</script>


<script src="{{ asset('js/toastr.min.js') }}"></script>

@if (Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}");
    </script>
@endif
