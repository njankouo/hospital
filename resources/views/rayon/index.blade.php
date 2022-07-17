@extends('layouts.master')

@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-3 mx-3">
                    <h3 style="font-family:forte">liste des Rayons</h3>
                    <div style="margin-left: 80%">
                        <a href="" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl">
                            <i class="fa fa-plus"></i>Nouveaux Rayon
                        </a>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="text-center">
                                <tr>

                                    <th style="width: 30%">ID</th>
                                    <th style="width: 20%">libelle</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">


                                @foreach ($rayon as $rayons)
                                    <tr>
                                        <td>{{ $rayons->id }}</td>
                                        <td>{{ $rayons->libelle }} </td>


                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        {{-- {{ $type->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">

            <div class="card">
                <div class="card-title d-flex bg-primary text-light p-2">

                    <i class="fa fa-users fa-2x"></i>
                    <h3 style="font-size:20px;font-family:forte"> Nouveau Rayon</h3>
                </div>
                <div class="card body">

                    <form action="{{ route('rayon.create') }}" method="POST" class="form-block">
                        @csrf
                        <div class="row" style="margin: 10px;">


                            <div class="col-12">
                                <label for="">libelle</label>
                                <input type="text" class="my-2 form-control @error('nom') is-invalid @enderror"
                                    name="nom" placeholder="Enter ..." required>
                                @error('nom')
                                    <p>{{ $message }}</p>
                                @enderror



                                <div class="col-8 my-4">
                                    <button type="submit" class="btn btn-primary mx-1">save</button>
                                    <a class="btn btn-danger mx-1" data-dismiss="modal">close</a>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="card-footer bg-primary"></div>
            </div>
        </div>
    </div>
</div>
</div>
