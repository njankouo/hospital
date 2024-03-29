 <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
 <script type="text/javascript">
     var route = "{{ url('autocomplete') }}";
     $('#search').typeahead({
         source: function(query, process) {
             return $.get(route, {
                 query: query
             }, function(data) {
                 return process(data);
             });
         }
     });
 </script>
 @extends('layouts.master')

 @section('contenu')
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <p style="font-family: forte">modifier la vente</p>
                 </div>
                 <div class="card-body">
                     <form action="{{ route('vente.update', ['vent' => $vent->id]) }}" method="POST" class="form-block">
                         @csrf
                         <input type="hidden" class="form-control" name="_method" value="put">
                         <div class="form-row" style="margin: 10px;">


                             <div class="col-12">
                                 <label for="">Date Vente</label>
                                 <input type="date" class="my-2 form-control @error('date') is-invalid @enderror"
                                     name="date" placeholder="Enter ..." value="{{ $vent->date_vente }}">
                                 @error('date')
                                     <p>{{ $message }}</p>
                                 @enderror

                                 <label for="">Responsable de Vente</label>

                                 <input type="text" value="{{ $vent->user }}" class="form-control my-2" name="user">

                             </div>
                             <div class="col-6">
                                 <label for=""> Code Vente</label>
                                 <input type="text" class="my-2  @error('code') is-invalid @enderror" id="inputSuccess"
                                     placeholder="Enter ..." name="code" value="{{ $vent->id }}">
                                 @error('code')
                                     <p>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col s6">
                                 <label for="">Nom Du Client</label>
                                 <input type="text" value="{{ $vent->client }}" class=" my-2" name="client" validate>
                                 @error('client')
                                     <p class="text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col s12">
                                 <label for="">****unite </label>
                                 <input type="text" class="form-control my-2" name="unite"
                                     value="{{ $vent->unite }}">
                                 @error('unite')
                                     <p>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-12">
                                 <label for="">produits</label>
                                 <select name="produit" id="produit_name"
                                     class=" produit_name my-2 @error('produit') is-invalid @enderror"
                                     style="border-color: indigo">

                                     @foreach ($produit as $produits)
                                         @if ($vent->produit_id == $produits->id)
                                             <option value="{{ $produits->id }}" selected>
                                                 {{ $produits->designation }}
                                             </option>
                                         @else
                                             <option value="{{ $produits->id }}">{{ $produits->designation }}
                                         @endif
                                     @endforeach
                                 </select>
                                 @error('produit')
                                     <p>{{ $message }}</p>
                                 @enderror
                             </div>


                             <div class="col-6">
                                 <label for="">****tva</label>
                                 <input type="number" class="my-2 form-control" value="0" name="tva"
                                     style="border-color: indigo">
                                 @error('tva')
                                     <p>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-6">
                                 <label for="">****pu</label>
                                 <input type="number" class="form-control @error('pu')  @enderror" name="pu"
                                     style="border-color: indigo" value="{{ $vent->pu }}">
                                 @error('pu')
                                     <p>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-6">
                                 <label for="">****qte</label>
                                 <input type="number" class="form-control @error('qte')  @enderror" name="qte"
                                     style="border-color: indigo" value="{{ $vent->qte_sortie }}">
                                 @error('qte')
                                     <p>{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="col-6">
                                 <label for="">****remise (en pourcentage)</label>
                                 <input type="number" class="form-control @error('remise')  @enderror" name="remise"
                                     style="border-color: indigo" value="{{ $vent->remise }}">

                             </div>
                             <div class="col-6">
                                 <label for="">annuler cette vente</label>
                                 <input type="text" class="form-control" name="reset" style="border-color: indigo"
                                     value="reset">
                             </div>
                             <div class="col-8 my-4">
                                 <button type="submit" class="btn btn-primary mx-1">mise à jour vente</button>

                             </div>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="card-footer bg-dark"></div>
         </div>
     </div>
 @endsection
