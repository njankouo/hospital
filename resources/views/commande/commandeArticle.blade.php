@extends('layouts.master')

@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-family: forte">valider une nouvelle commande</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('command') }}" method="POST" class="form-block">
                        @csrf
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">Date Commande</label>
                                <input type="date" class="my-2 form-control @error('date') is-invalid @enderror"
                                    name="date" placeholder="Enter ..." value="{{ $commande->date_commande }}">
                                @error('date')
                                    <p>{{ $message }}</p>
                                @enderror
                                <label for="">Date Livraison</label>
                                <input type="date" class="my-2 form-control @error('dateLivraison') is-invalid @enderror"
                                    name="dateLivraison" value="{{ $commande->date_livraison }}">
                                @error('dateLivraison')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">

                                <label for="">Fournisseur</label>
                                <select id="" class="my-2 form-control @error('fournisseur') is-invalid @enderror"
                                    name="fournisseur" value="{{ $commande->fournisseur_id }}">
                                    <option value="">.....</option>
                                    @foreach ($fournisseur as $fournisseurs)
                                        @if ($commande->fournisseur_id == $fournisseurs->id)
                                            <option value="{{ $fournisseurs->nom }}" selected>{{ $fournisseurs->nom }}
                                            @else
                                            <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <p>{{ $message }}</p>
                                @enderror

                                <label for=""> Code Commande</label>
                                <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                    id="inputSuccess" placeholder="Enter ..." name="code" value="{{ $commande->id }}">
                                @error('code')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">status commande</label>
                                <input type="text" class="form-control my-2 @error('status') is-invalid @enderror"
                                    name="status" value="en cours">
                                @error('status')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">****produits</label>
                                <select name="produit" id=""
                                    class="form-control my-2 @error('produit') is-invalid @enderror"
                                    style="border-color: indigo">
                                    <option value="">.....</option>
                                    @foreach ($produit as $produits)
                                        <option value="{{ $produits->id }}">{{ $produits->designation }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('produit')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">****unite </label>
                                <select name="unite" id=""
                                    class="form-control my-2 @error('unite') is-invalid @enderror"
                                    style="border-color: indigo">
                                    <option value="">.....</option>
                                    @foreach ($type as $types)
                                        <option value="{{ $types->nom }}">{{ $types->nom }}</option>
                                    @endforeach
                                </select>
                                @error('unite')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">****tva</label>
                                <input type="number" class="my-2 form-control" value="0" name="tva"
                                    style="border-color: indigo">
                                @error('produit')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">****pu</label>
                                <input type="number" class="form-control @error('pu')  @enderror" name="pu"
                                    style="border-color: indigo">
                                @error('pu')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">****qte</label>
                                <input type="number" class="form-control @error('qte')  @enderror" name="qte"
                                    style="border-color: indigo">
                                @error('qte')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for=""> Mode de reglement</label>
                                <select class="form-control" name="mode">
                                    <optgroup label="choose paiement">
                                        <option value="">.....</option>
                                        <option value="mobile">mobile(MTN/ORANGE...)</option>
                                        <option value="espece">espèce</option>
                                        <option value="autre">autre....</option>
                                    </optgroup>
                                </select>

                            </div>
                            <div class="col-6">
                                <label for=""> remise (en pourcentage)</label>
                                <input type="number" name="remise" id="" class="form-control">

                            </div>

                            <div class="col-8 my-4">
                                <button type="submit" class="btn btn-primary mx-1">valider la commande</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-dark"></div>
        </div>
    </div>
@endsection
