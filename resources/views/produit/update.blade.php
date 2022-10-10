@extends('layouts.master')

@section('contenu')
    <div class="row">
        <div class="col-9">

            <div class="card">
                <div class="card-title bg-primary">
                    <p style="font-family: forte;font-size:15px;" class="my-2 mx-2 text-light p-3">
                        <i class="fa fa-product-hunt fa-2x"></i> mise à jour des produits
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('produit.updat', ['produits' => $produits->id]) }}" method="POST"
                        class="form-block">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">DESIGNATION DU PRODUIT</label>
                                <input type="text" class="my-2 form-control @error('designation') is-invalid @enderror"
                                    placeholder="Enter ..." name="designation" value="{{ $produits->designation }}">
                                @error('designation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


                                <label for="">CATEGORIE DU PRODUIT</label>
                                <select class="@error('categorie_id') is-invalid @enderror" data-live-search="true"
                                    name="categorie_id">
                                    <optgroup label="selectionner la categorie">
                                        <option value="">.......</option>
                                        @foreach ($categorie as $cat)
                                            @if ($produits->categorie_id == $cat->id)
                                                <option value="{{ $cat->id }}" selected>{{ $cat->libelle }}</option>
                                            @else
                                                <option value="{{ $cat->id }}">{{ $cat->libelle }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>

                                @error('categorie_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-6">
                                <label for="">QUANTITE EN STOCK</label>
                                <input type="text"
                                    class=" text-right   my-2 form-control @error('qte') is-invalid @enderror"
                                    placeholder="Enter ..." name="qte" value="{{ $produits->qtestock }}">
                                @error('qte')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <label for="">GRAMMAGE/TAILLE</label>
                                <input type="text" class="my-2 form-control @error('grammage') is-invalid @enderror"
                                    id="inputSuccess" placeholder="Enter ..." name="grammage"
                                    value="{{ $produits->grammage }}">
                                @error('grammage')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="">QUANTITE SEUIL</label>
                                <input type="number"
                                    class=" text-right  form-control my-2 @error('qteseuil') is-invalid @enderror"
                                    name="qteseuil" placeholder="..." value="{{ $produits->stock_seuil }}">
                                @error('qteseuil')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-12">
                                <label for="">UNITE </label>
                                <select class="@error('unite_id') is-invalid @enderror  my-2" name="unite_id">
                                    <option value="">........</option>
                                    <optgroup label="selectionner la forme">
                                        @foreach ($type as $typ)
                                            @if ($produits->type_article_id == $typ->id)
                                                <option value="{{ $typ->id }}" selected>{{ $typ->nom }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>

                                @error('unite_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">PRIX D'ACHAT </label>
                                <input type="number"
                                    class="text-right  form-control my-2 @error('pa') is-invalid @enderror" name="pa"
                                    placeholder="..." value="{{ $produits->pu }}">
                                @error('pa')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="">PRIX DE VENTE </label>
                                <input type="number"
                                    class=" text-right  form-control my-2 @error('pv') is-invalid @enderror" name="pv"
                                    placeholder="..." value="{{ $produits->pv }}">
                                @error('pv')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="">RAYON DES PRODUITS</label>
                                <select name="rayon_id" id="" class=" @error('rayon_id') is-invalid @enderror">
                                    <option value="">.............</option>
                                    <optgroup label=" selectionner le rayon">
                                        @foreach ($rayon as $rayons)
                                            @if ($produits->rayon_id == $rayons->id)
                                                <option value="{{ $rayons->id }}" selected>{{ $rayons->libelle }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('rayon_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="">FOURNISSEUR </label>
                                <select id="" class=" @error('fournisseur_id') is-invalid @enderror"
                                    name="fournisseur_id">
                                    <option value="">...........</option>
                                    <optgroup label="selectionner le fournisseur">
                                        @foreach ($fournisseur as $fournisseurs)
                                            @if ($produits->fournisseur_id == $fournisseurs->id)
                                                <option value="{{ $fournisseurs->id }}" selected>
                                                    {{ $fournisseurs->nom }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('fournisseur_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">EQUIVALENCE DU PRODUIT</label>
                                <input type="text" class="my-2 form-control" name="equivalence"
                                    placeholder="Enter ..." value="{{ $produits->equivalence }}">
                                {{-- <label for="">Famille Produit</label> --}}
                                {{-- <select name="famille_id" id="" class="form-control my-2">
                                    @foreach ($famille as $familles)
                                        @if ($familles->id == $produits->famille_id)
                                            <option value="{{ $familles->id }}" selected>{{ $familles->libelle }}
                                            </option>
                                        @else
                                            <option value="{{ $familles->id }}">{{ $familles->libelle }}
                                            </option>
                                        @endif
                                    @endforeach

                                </select> --}}
                            </div>

                            <div class="col-6">
                                <label for="">date fabrication (OPTIONNEL)</label>
                                <input type="date" name="fabrication" id="" class="form-control my-2"
                                    value="{{ $produits->date_fabrication }}">


                            </div>
                            <div class="col-6">
                                <label for="">IMAGE DU PRODUIT (optionnel)</label>
                                <input type="file"
                                    class="form-control my-2
                        @error('image') is-invalid @enderror"
                                    name="image" onchange="previewFile(this)">
                                @error('image')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <fieldset class="text-light">
                                    <img id="previewImg" alt="" style="width:70%; height:auto;" class="my-4">
                                </fieldset>
                            </div>


                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">modification</button>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-primary"></div>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function previewFile(input) {
            var file = $('input[type=file]').get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
