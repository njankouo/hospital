@extends('layouts.master')

@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-3 mx-3">
                    <h3 style="font-family:forte">listing des types de produits</h3>
                    <div style="margin-left: 80%">
                        <a href="" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl">
                            <i class="fas fa-plus"></i>New type Produits
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="text-center">
                                <tr>

                                    <th style="width: 30%">ID</th>
                                    <th style="width: 20%">type de produit</th>
                                    <th style="width: 20%">Operation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">


                                @foreach ($type as $typ)
                                    <tr>
                                        <td>{{ $typ->id }}</td>
                                        <td>{{ $typ->nom }} </td>



                                        <td>
                                            <div class="dropdown dropup">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown">Operation in table
                                                    <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <a href="#" class="btn btn-danger">delete</a>
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
                        {{ $type->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="card">
                <div class="card-title d-flex">

                    <i class="fas fa-users fa-2x"></i>
                    <h3 style="font-size:20px;font-family:forte"> New type produit</h3>
                </div>
                <div class="card body">

                    <form action="{{ route('insert.create') }}" method="POST" class="form-block">
                        @csrf
                        <div class="row" style="margin: 10px;">


                            <div class="col-12">
                                <label for="">type de produit</label>
                                <input type="text" class="my-2 form-control @error('nom') is-invalid @enderror"
                                    name="nom" placeholder="Enter ...">
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

            </div>
        </div>
    </div>
</div>
</div>
