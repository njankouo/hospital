  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>
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
  <script type="text/javascript">
      $(document).ready(function() {
          $(document).on('Change', '.produit_name', function() {
              console.log("je suis un prduit");

          });
      });
  </script>
  @extends('layouts.master')

  @section('contenu')
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <p style="font-family: forte">valider une nouvelle vente</p>
                  </div>
                  <div class="card-body">
                      <form action="{{ route('vent') }}" method="POST" class="form-block">
                          @csrf
                          <div class="form-row" style="margin: 10px;">

                              <div class="col-12">
                                  <label for="">Responsable de Vente</label>
                                  <select name="user" id="" class="form-control">
                                      @foreach ($user as $usr)
                                          @if ($vente->user_id == $usr->id)
                                              <option value="{{ $usr->nom }}" selected>{{ $usr->nom }}</option>
                                          @endif
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-6">
                                  <label for="">Date Vente</label>
                                  <input type="text" class="my-2 form-control @error('date') is-invalid @enderror"
                                      name="date" placeholder="Enter ..." value="{{ $vente->date_vente }}">
                                  @error('date')
                                      <p>{{ $message }}</p>
                                  @enderror


                              </div>
                              <div class="col-6">
                                  <label for=""> Code Vente</label>
                                  <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                      id="inputSuccess" placeholder="Enter ..." name="code" value="{{ $vente->id }}">
                                  @error('code')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div>

                              <label for="">Nom Du Client</label>
                              <select name="client" id=""
                                  class="form-control @error('client') is-invalid @enderror">
                                  @foreach ($client as $clients)
                                      <option value="{{ $clients->nom }}">{{ $clients->nom }}</option>
                                  @endforeach
                              </select>
                              @error('client')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                              <div class="col-6">
                                  <label for="">****produits</label>
                                  <select name="produit" id=""
                                      class="form-control my-2 @error('produit') is-invalid @enderror produit_name"
                                      style="border-color: indigo">
                                      <option value="">.....</option>
                                      @foreach ($produit as $produits)
                                          @if ($produits->qtestock <= 0)
                                          @else
                                              <option value="{{ $produits->id }}">{{ $produits->designation }}
                                              </option>
                                          @endif
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

                              {{-- <div class="col-6">
                                  <label for="">****tva</label>
                                  <input type="number" class="my-2 form-control" value="0" name="tva"
                                      style="border-color: indigo">
                                  @error('tva')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div> --}}
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
                                  <label for="">****remise (en pourcentage)</label>
                                  <input type="number" class="form-control @error('remise')  @enderror" name="remise"
                                      style="border-color: indigo">

                              </div>
                              <div class="col-6">
                                  <label for=""> Mode De Reglement</label>
                                  <select name="reglement" class="form-control @error('reglement') is-invalid @enderror"
                                      id="">
                                      <optgroup label="selectionnez le mode de reglement">
                                          <option value="">.....</option>
                                          <option value="espèce">espèce</option>
                                          <option value="mobile">Mobile</option>
                                          <option value="autre">Autre</option>
                                      </optgroup>
                                  </select>

                                  @error('reglement')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div>

                              <div class="col-8 my-4">
                                  <button type="submit" class="btn btn-primary mx-1">valider la vente</button>

                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="card-footer bg-dark"></div>
          </div>
      </div>
  @endsection
