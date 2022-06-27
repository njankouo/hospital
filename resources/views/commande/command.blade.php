@extends('layouts.master')

@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-family: forte">créer une nouvelle commande</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('commande.produit') }}" method="POST" class="form-block">
                        @csrf
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">Date Commande</label>
                                <input type="date" class="my-2 form-control @error('date') is-invalid @enderror"
                                    name="date" placeholder="Enter ...">
                                @error('date')
                                    <p>{{ $message }}</p>
                                @enderror
                                <label for="">Date Livraison</label>
                                <input type="date" class="my-2 form-control @error('dateLivraison') is-invalid @enderror"
                                    name="dateLivraison">
                                @error('dateLivraison')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">

                                <label for="">Fournisseur</label>
                                <select id="" class="my-2 form-control @error('fournisseur') is-invalid @enderror"
                                    name="fournisseur">
                                    <option value="">.....</option>
                                    @foreach ($fournisseur as $fournisseurs)
                                        <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}</option>
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <p>{{ $message }}</p>
                                @enderror
                                {{-- <label for=""> Code Commande</label>
                                <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                    id="inputSuccess" placeholder="Enter ..." name="code">
                                @error('code')
                                    <p>{{ $message }}</p>
                                @enderror --}}
                                <label for="">status commande</label>
                                <input type="text" class="form-control my-2 @error('status') is-invalid @enderror"
                                    name="status" value="en cours">
                                @error('status')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6">

                            </div>
                            <div class="col-8 my-4">
                                <button type="submit" class="btn btn-primary mx-1">save</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-dark"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des commandes</h3>

                </div>
                <div class=" card-body">

                    <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">code commande
                                </th>
                                <th class="th-sm">Date Commande
                                </th>
                                <th class="th-sm">Date Livraison
                                </th>

                                <th class="th-sm">fournisseur
                                </th>



                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commande as $commandes)
                                <tr>
                                    <td>{{ $commandes->id }}</td>
                                    <td>{{ $commandes->date_commande }}</td>
                                    <td>{{ $commandes->date_livraison }}</td>

                                    <td>{{ $commandes->fournisseur->nom }}</td>
                                    <td>
                                        <a href="{{ route('commande.article', $commandes->id) }}" class="btn btn"><i
                                                class="fa fa-eye fa-2x text-info"></i></a>
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
@endsection