@extends('layouts.master')



@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-3 mx-3">
                    <h3 style="font-family:forte">galeniques des produits</h3>
                    <div style="margin-left: 75%">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">
                            <i class="fa fa-plus" style="text-overflow: ellipsis; white-space: nowrap;">
                                Nouvelle forme galenique
                            </i>
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="text-center">
                                <tr>

                                    <th style="width: 30%">ID</th>
                                    <th style="width: 20%">forme galenique du produit</th>


                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($cat as $categorie)
                                    <tr>
                                        <td>{{ $categorie->id }}</td>
                                        <td>{{ $categorie->libelle }}</td>



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
@endsection

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="card">
                <div class="card-title d-flex bg-primary text-light p-2">

                    <i class="fa fa-users fa-2x"></i>
                    <h3 style="font-size:20px;font-family:forte"> Nouvelle forme galenique produit</h3>
                </div>
                <div class="card body">
                    <div class="row">
                        <form action="{{ route('categorie.create') }}" method="POST" class="form-block">
                            @csrf
                            <div class="form-row" style="margin: 10px;">


                                <div class="col-12">
                                    <label for="">libelle</label>
                                    <input type="text"
                                        class="my-2 form-control @error('libelle') is-invalid @enderror" name="libelle"
                                        placeholder="Enter ...">
                                    @error('libelle')
                                        <p>{{ $message }}</p>
                                    @enderror

                                </div>
                                {{-- <div class="col-12">
                                    <label for="">type de produit</label>
                                    <select name="type_id" id="" class="form-control my-2">
                                        <option value="" disabled>choose type produit</option>
                                        @foreach ($type as $typ)
                                            <option value="{{ $typ->id }}">{{ $typ->nom }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-8 my-4">
                                    <button type="submit" class="btn btn-primary mx-1">save</button>
                                    <a class="btn btn-danger mx-1" data-dismiss="modal">close</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-footer bg-primary">

                </div>
            </div>
        </div>
    </div>
</div>
