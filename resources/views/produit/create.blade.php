 <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('js/toastr.min.js') }}"></script>
 <script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>

 <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

 @extends('layouts.master')

 @section('contenu')
     <div class="row">
         <div class="col-9">

             <div class="card">
                 <div class="card-title bg-primary">
                     <p style="font-family: forte;font-size:15px;" class="my-2 mx-2 text-light p-3">
                         <i class="fa fa-product-hunt fa-2x"></i> creation nouveaux produit
                     </p>
                 </div>
                 <div class="card-content">
                     <form action="{{ route('produit.create') }}" method="POST" class="col s12">
                         @csrf
                         {{-- <div class="form-row" style="margin: 10px;">


                             <div class="col-6 input-field">

                                 <input type="text" class="my-2 validate @error('designation') is-invalid @enderror"
                                     name="designation" value="{{ old('designation') }}" id="designation">
                                 <label for="designation">DESIGNATION DU PRODUIT</label>
                                 @error('designation')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror




                                 <select multiple>
                                     @foreach ($categorie as $cat)
                                         <option value="{{ $cat->id }}">{{ $cat->libelle }}</option>
                                     @endforeach
                                 </select>

                                 <label for="">FORME GALLELIQUE</label>
                             </div>


                             <div class="col-6 input-field">
                                 <label for="qte">QUANTITE EN STOCK</label>
                                 <input type="number"
                                     class=" text-right   my-2 form-control @error('qte') is-invalid @enderror"
                                     name="qte" value="{{ old('qte') }}" id="qte">
                                 @error('qte')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror

                                 <input type="text" class="my-2 form-control" id="grammage" validate
                                     value="{{ old('grammage') }}">
                                 <label for="grammage">GRAMMAGE/TAILLE</label> --}}
                         {{-- @error('grammage')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                         {{-- </div>

                             <div class="col-6">
                                 <label for="">QUANTITE SEUIL</label>
                                 <input type="number"
                                     class=" text-right  form-control my-2 @error('qteseuil') is-invalid @enderror"
                                     name="qteseuil" placeholder="..." value="{{ old('qteseuil') }}">
                                 @error('qteseuil')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror

                             </div>
                             <div class="col-6">
                                 <label for="">FORME </label>
                                 <select class="@error('unite_id') is-invalid @enderror form-control my-2" name="unite_id">
                                     <option value="">........</option>
                                     <optgroup label="selectionner la forme">
                                         @foreach ($type as $typ)
                                             <option value="{{ $typ->id }}">{{ $typ->nom }}</option>
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
                                     placeholder="..." value="{{ old('pa') }}">
                                 @error('pa')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>

                             <div class="col-6">
                                 <label for="">PRIX DE VENTE </label>
                                 <input type="number"
                                     class=" text-right  form-control my-2 @error('pv') is-invalid @enderror" name="pv"
                                     placeholder="..." value="{{ old('pv') }}">
                                 @error('pv')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-6">
                                 <label for="">RAYON DES PRODUITS</label>
                                 <select name="rayon_id" id=""
                                     class="form-control @error('rayon_id') is-invalid @enderror">
                                     <option value="">.............</option>
                                     <optgroup label=" selectionner le rayon">
                                         @foreach ($rayon as $rayons)
                                             <option value="{{ $rayons->id }}">{{ $rayons->libelle }}</option>
                                         @endforeach
                                     </optgroup>
                                 </select>
                                 @error('rayon_id')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-6">
                                 <label for="">FOURNISSEUR </label>
                                 <select id="" class="form-control" name="fournisseur_id">
                                     <option value="">...........</option>
                                     <optgroup label="selectionner le fournisseur">
                                         @foreach ($fournisseur as $fournisseurs)
                                             <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}</option>
                                         @endforeach
                                     </optgroup>
                                 </select>
                                 {{-- @error('fournisseur_id')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror --}}
                         {{-- </div>
                             <div class="col-6">
                                 <label for="">EQUIVALENCE DU PRODUIT</label>
                                 <input type="text" class="my-2 form-control @error('equivalence') is-invalid @enderror"
                                     name="equivalence" placeholder="Enter ..." value="{{ old('equivalence') }}">
                                 @error('equivalence')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror --}}
                         {{-- </div>

                             <div class="col-6">
                                 <label for="">date fabrication (OPTIONNEL)</label>
                                 <input type="date" name="fabrication" id="" class="form-control my-2"
                                     value="{{ old('fabrication') }}">

                             </div>
                             <div class="col-6">
                                 <label for="">date expiration (OPTIONNEL)</label>
                                 <input type="date" name="expiration" id="" class="form-control my-2"
                                     value="{{ old('expiration') }}">

                                 <label for="">FAMILLE PRODUIT</label>
                                 <select name="famille_id" id="" class="form-control my-2">
                                     <optgroup label="selectionnez la famille de produit">
                                         <option value="">...........</option>
                                         @foreach ($famille as $familles)
                                             <option value="{{ $familles->id }}">{{ $familles->libelle }}</option>
                                         @endforeach
                                     </optgroup>
                                 </select>

                             </div>




                             <div class="col-6">
                                 <label for="">IMAGE DU PRODUIT (OPTIONNEL)</label>
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
                 <div class="modal-footer"> --}}

                         <div class="row">
                             <div class="input-field col s6">
                                 <input type="text" class="my-2 validate @error('designation') is-invalid @enderror"
                                     name="designation" value="{{ old('designation') }}" id="designation">
                                 <label for="designation">DESIGNATION DU PRODUIT</label>
                                 @error('designation')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror

                             </div>
                             <div class="input-field col s6">
                                 <label for="qte">QUANTITE EN STOCK</label>
                                 <input type="number"
                                     class=" text-right   my-2 form-control @error('qte') is-invalid @enderror"
                                     name="qte" value="{{ old('qte') }}" id="qte" validate>
                                 @error('qte')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="input-field col s12">
                                 <select multiple>
                                     @foreach ($categorie as $cat)
                                         <option value="{{ $cat->id }}">{{ $cat->libelle }}</option>
                                     @endforeach
                                 </select>

                                 <label for="">FORME GALLELIQUE</label>
                             </div>
                         </div>
                         <div class="row">
                             <div class="input-field col s6">
                                 <input type="text" class="my-2 form-control" id="grammage" validate
                                     value="{{ old('grammage') }}">
                                 <label for="grammage">GRAMMAGE/TAILLE</label>
                                 {{-- @error('grammage')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror --}}
                             </div>

                             <div class="input-field col s6">
                                 <label for="">QUANTITE SEUIL</label>
                                 <input type="number"
                                     class=" text-right  form-control my-2 @error('qteseuil') is-invalid @enderror"
                                     name="qteseuil" value="{{ old('qteseuil') }}">
                                 @error('qteseuil')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="input-field col s12">

                                 <select class="@error('unite_id') is-invalid @enderror " name="unite_id" multiple>


                                     @foreach ($type as $typ)
                                         <option value="{{ $typ->id }}">{{ $typ->nom }}</option>
                                     @endforeach

                                 </select>
                                 <label for="">FORME </label>
                                 @error('unite_id')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="input-field col s6">
                                 <label for="">PRIX D'ACHAT </label>
                                 <input type="number"
                                     class="text-right  form-control my-2 @error('pa') is-invalid @enderror" name="pa"
                                     value="{{ old('pa') }}">
                                 @error('pa')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="input-field col s6">
                                 <label for="">PRIX DE VENTE </label>
                                 <input type="number" class="my-2 text-right @error('pv') is-invalid @enderror"
                                     name="pv" value="{{ old('pv') }}" validate>
                                 @error('pv')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="input-field col s12">

                                 <select name="rayon_id" id="" class="@error('rayon_id') is-invalid @enderror"
                                     multiple>

                                     @foreach ($rayon as $rayons)
                                         <option value="{{ $rayons->id }}">{{ $rayons->libelle }}</option>
                                     @endforeach

                                 </select>
                                 <label for="">RAYON DES PRODUITS</label>
                                 @error('rayon_id')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                         <div class="row">
                             <div class="input-field col s12">

                                 <select id="" multiple name="fournisseur_id">

                                     <optgroup label="selectionner le fournisseur">
                                         @foreach ($fournisseur as $fournisseurs)
                                             <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}</option>
                                         @endforeach
                                     </optgroup>
                                 </select>
                                 <label for="">FOURNISSEUR </label>
                             </div>
                         </div>

                         <div class="row">
                             <div class="input-field col s6">
                                 <label for="">EQUIVALENCE DU PRODUIT</label>
                                 <input type="text" class="my-2 @error('equivalence') is-invalid @enderror"
                                     name="equivalence" value="{{ old('equivalence') }}">


                             </div>
                             <div class="input-field col s6">


                                 <input type="date" name="fabrication" id="" class="form-control my-2"
                                     value="{{ old('fabrication') }}">
                                 <label for="">date fabrication (OPTIONNEL)</label>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col s6">
                                 <div class="file-field input-field">
                                     <div class="btn">
                                         <span>image produit</span>
                                         <input type="file" name="image" onchange="previewFile(this)">
                                     </div>
                                     <div class="file-path-wrapper">
                                         <input class="file-path validate" type="text">
                                     </div>
                                 </div>


                                 <fieldset class="text-light">
                                     <img id="previewImg" alt="" style="width:70%; height:auto;" class="my-4">
                                 </fieldset>
                             </div>
                         </div>

                 </div>
                 <button type="submit" class="btn btn-primary">enregistrer</button>
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
     <script>
         @if (Session::has('info'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true,
                 positionClass: 'toast-top-center'
             }
             toastr.success("{{ session('info') }}");
         @endif
     </script>
     <script>
         @if (Session::has('error'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true,
                 positionClass: 'toast-top-center'
             }
             toastr.error();
             ("{{ session('error') }}");
         @endif
     </script>
 @endsection
