      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

      @extends('layouts.master')

      @section('contenu')
          @if ($notification = Session::get('error'))
              <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $notification }}</strong>
              </div>
          @endif

          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <p style="font-family: forte">valider la nouvelle livraison</p>
                      </div>
                      <div class="card-body">
                          <form action="{{ route('commande.edition', ['commande' => $commande->id]) }}" method="POST"
                              class="form-block">

                              @csrf
                              <input type="hidden" name="_method" value="put">
                              <div class="form-row" style="margin: 10px;">


                                  <div class="col-6">
                                      <label for="">Date Commande</label>
                                      <input type="date" class="my-2 form-control @error('date') is-invalid @enderror"
                                          name="date" placeholder="Enter ..." value="{{ $commande->date_commande }}">
                                      @error('date')
                                          <p>{{ $message }}</p>
                                      @enderror
                                      <label for="">Date Livraison</label>
                                      <input type="date"
                                          class="my-2 form-control @error('dateLivraison') is-invalid @enderror"
                                          name="dateLivraison" value="{{ $commande->date_livraison }}">
                                      @error('dateLivraison')
                                          <p>{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="col-6">

                                      <label for="">Fournisseur</label>
                                      <input type="text" class="form-control my-2" value="{{ $commande->fournisseur }}"
                                          name="fournisseur">
                                      {{-- <select id="" class="my-2 form-control @error('fournisseur') is-invalid @enderror"
                                    name="fournisseur" value="{{ $commande->fournisseur_id }}">
                                    <option value="">.....</option>
                                    @foreach ($fournisseur as $fournisseurs)
                                        @if ($commande->fournisseur == $fournisseurs->id)
                                            <option value="{{ $fournisseurs->nom }}" selected>{{ $fournisseurs->nom }}
                                            @else
                                            <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select> --}}
                                      @error('fournisseur')
                                          <p>{{ $message }}</p>
                                      @enderror
                                      <label for=""> Code Commande</label>
                                      <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                          id="inputSuccess" placeholder="Enter ..." name="code"
                                          value="{{ $commande->commande_id }}">
                                      @error('code')
                                          <p>{{ $message }}</p>
                                      @enderror
                                  </div>

                                  <div class="col-6">
                                      <label for="">status commande</label>
                                      <input type="text" class="form-control my-2 @error('status') is-invalid @enderror"
                                          name="status" value="validé">
                                      @error('status')
                                          <p>{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="col-6">
                                      <label for="">****produits</label>
                                      <input type="text" class="form-control my-2" value="{{ $commande->produit_id }}"
                                          name="produit">
                                      {{-- <select name="produit" id=""
                                    class="form-control my-2 @error('produit') is-invalid @enderror"
                                    style="border-color: indigo">
                                    <option value="">.....</option>
                                    @foreach ($produit as $produits)
                                        <option value="{{ $produits->id }}">{{ $produits->designation }}
                                        </option>
                                    @endforeach
                                </select> --}}
                                      @error('produit')
                                          <p>{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="col-6">
                                      <label for="">****unite </label>
                                      <input type="text" class="form-control my-2" value="{{ $commande->unite }}"
                                          name="unite">
                                      {{-- <select name="unite" id="" class="form-control my-2 @error('unite') is-invalid @enderror"
                                    style="border-color: indigo">
                                    <option value="">.....</option>
                                    @foreach ($type as $types)
                                        <option value="{{ $types->nom }}">{{ $types->nom }}</option>
                                    @endforeach
                                </select> --}}
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
                                          style="border-color: indigo" value="{{ $commande->pu }}">
                                      @error('pu')
                                          <p>{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="col-6">
                                      <label for="">****qte</label>
                                      <input type="number" class="form-control @error('qte')  @enderror" name="qte"
                                          style="border-color: indigo" value="{{ $commande->qte }}">
                                      @error('qte')
                                          <p>{{ $message }}</p>
                                      @enderror
                                  </div>

                                  <div class="col-8 my-4">
                                      <button type="submit" class="btn btn-primary mx-1">valider la livraison</button>

                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  <div class="card-footer bg-dark"></div>
              </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

          <script>
              @if (Session::has('error'))
                  toastr.error("{{ Session::get('error') }}");
              @endif
          </script>
      @endsection
