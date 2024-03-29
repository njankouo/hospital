  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />

  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  @extends('layouts.master')

  @section('contenu')
      {{-- @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif --}}
      <script>
          @if (Session::has('error'))
              toastr.error("{{ Session::get('error') }}");
          @endif
      </script>
      <script>
          @if (Session::has('success'))
              toastr.options = {
                  "closeButton": true,
                  "progressBar": true,
                  positionClass: 'toast-top-center'
              }
              toastr.success("{{ session('success') }}");
          @endif
      </script>
      @foreach ($produit as $produits)
          @if ($produits->qtestock < $produits->stock_seuil)
              <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                  <marquee behavior="" direction=""><strong> {{ $produits->designation }}
                          !En Rupture de stock veuillez passer la commande


                      </strong></marquee>

              </div>
          @endif
      @endforeach
      <div class="row">
          <div class="col-6">
              <div class="card">
                  <div class="card-header">
                      <p style="font-family: forte">valider la sortie du client</p>
                  </div>
                  <div class="card-body">
                      <form action="{{ route('vent') }}" method="POST" class="form-block">
                          @csrf
                          <div class="form-row" style="margin: 10px;">

                              <div class="col-12">
                                  <label for="">Responsable de sortie</label>
                                  <select name="user" id="">
                                      @foreach ($user as $usr)
                                          @if ($vente->user_id == $usr->id)
                                              <option value="{{ $usr->nom }}" selected>{{ $usr->nom }}</option>
                                          @endif
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-6">
                                  <label for="">Date sortie</label>
                                  <input type="text" class="my-2 form-control @error('date') is-invalid @enderror"
                                      name="date" placeholder="Enter ..." value="{{ $vente->date_vente }}">
                                  @error('date')
                                      <p>{{ $message }}</p>
                                  @enderror


                              </div>
                              <div class="col-6">
                                  <label for=""> Code sortie</label>
                                  <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                      id="inputSuccess" placeholder="Enter ..." name="code" value="{{ $vente->id }}">
                                  @error('code')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="col s12">
                                  <label for="">Nom Du Client</label>
                                  <select name="client" id="" class="@error('client') is-invalid @enderror"
                                      readonly>
                                      <optgroup label="selectionnez le client ">

                                          @foreach ($client as $clients)
                                              <option value="{{ $clients->nom }}">{{ $clients->nom }}</option>
                                          @endforeach
                                      </optgroup>
                                  </select>
                                  @error('client')
                                      <p class="text-danger">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="col-12">
                                  <label for="">produits</label>
                                  <select name="produit" id="" data-live-search="true"
                                      class="my-2 @error('produit') is-invalid @enderror produit_name"
                                      style="border-color: indigo;"size="45" tabindex="10">
                                      <optgroup label="selectionnez votre produit à vendre">
                                          <option value="">......</option>
                                          @foreach ($produit as $produits)
                                              @if ($produits->qtestock <= 0)
                                              @else
                                                  <option value="{{ $produits->id }}">{{ $produits->designation }}
                                                  </option>
                                              @endif
                                      </optgroup>
                                      @endforeach

                                  </select>
                                  @error('produit')
                                      <p>{{ $message }}</p>
                                  @enderror

                                  {{-- <select class="form-control" id="search" style="width:500px;" name="user_id"></select> --}}
                              </div>
                              <div class="col-12 my-4">
                                  <label for="">unite </label>
                                  <select name="unite" id=""
                                      class=" @error('unite') is-invalid @enderror productcategory"
                                      style="border-color: indigo;" readonly>
                                      <optgroup label="selectionnez l'unite">
                                          <option value="">.....</option>
                                          @foreach ($type as $types)
                                              <option value="{{ $types->nom }}">{{ $types->nom }}</option>
                                          @endforeach
                                      </optgroup>
                                  </select>
                                  @error('unite')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="col-6 my-4">
                                  <label for="">prix unitaire de vente</label>
                                  <input type="text" class="form-control pu "readonly name="pu"
                                      style="border-color: indigo">
                                  @error('pu')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="col-6 my-4">
                                  <label for="">quantite</label>
                                  <input type="number" class=" @error('qte')  @enderror" name="qte"
                                      style="border-color: indigo">
                                  @error('qte')
                                      <p>{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="col-6">
                                  <label for="">remise % / (OPTIONNEL)</label>
                                  <input type="number" class="form-control @error('remise')  @enderror" name="remise"
                                      style="border-color: indigo">

                              </div>
                              <div class="col-6">
                                  <label for=""> Mode De Reglement</label>
                                  <select name="reglement" @error('reglement') is-invalid @enderror "
                                                                                                                      id="" readonly>
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
                                                                                                              <p class="pu text-dark" id="pu"></p>
                                                                                                              <div class="col-8 my-4">
                                                                                                                  <input type="submit" class="btn btn-primary mx-1" disabled value="valider la sortie">
                                                                                                                  </i>

                                                                                                              </div>
                                                                                                          </div>

                                                                                                  </div>
                                                                                              </div>
                                                                                              <div class="card-footer bg-primary"></div>
                                                                                          </div>
                                                                                          <div class="col-6">
                                                                                              <div class="card">
                                                                                                  <div class="card-header bg-primary">
                                                                                                      <p class="text-light">
                                                                                                          Infos Des Services
                                                                                                      </p>
                                                                                                  </div>
                                                                                                  <div class="card-body">
                                                                                                      <div class="col-12">
                                                                                                          <label for="">beneficier(e)</label>
                                                                                                          <input type="text" class="form-control" value="{{ $vente->beneficiaire }}"
                                                                                                              name="beneficiaire">
                                                                                                          <label for="">poste beneficier(e)</label>
                                                                                                          <input type="text" class="form-control" value="{{ $vente->poste }}" name="poste">
                                                                                                          <label for="">service</label>
                                                                                                          <input type="text" class="form-control" value="{{ $vente->service }}" name="service">
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>

                                                                                              <div class="card-footer bg-primary">

                                                                                              </div>
                                                                                              <div class="card">
                                                                                                  <div class="card-header bg-primary">
                                                                                                      <p class="text-light">sous couvert CMCU</p>
                                                                                                  </div>
                                                                                                  <div class="card-body">

                                                                                                      <td>



                                                                                                    <p>
                                                                                                        <label>
                                                                                                            <input type="checkbox"  id="check " name="stat" value="oui" />

                                                                                                            <span>OUI/YES</span>
                                                                                                        </label>
                                                                                                        </p>
                                                                                                      </td>&nbsp;&nbsp; &nbsp;&nbsp;
                                                                                                      <td>
                                                                                                        <p>
                                                                                                                <label>
                                                                                                          <input type="checkbox" id="check" name="stat" value="non">
                                                                                                           <span>NON/NO</span>
                                                                                                           </label>
                                                                                                          </p>
                                                                                                      </td>


                                                                                                  </div>
                                                                                              </div>
                                                                                              </form>
                                                                                          </div>

                                                                                          <script>
                                                                                              $(document).ready(function() {
                                                                                                  $(document).on('change', '.produit_name', function() {
                                                                                                      var prod_id = $(this).val();
                                                                                                      var a = $(this).parent();
                                                                                                      $.ajax({
                                                                                                          type: 'get',
                                                                                                          url: '{{ route('get.price') }}',
                                                                                                          data: {
                                                                                                              'id': prod_id
                                                                                                          },
                                                                                                          dataType: 'json',

                                                                                                          success: function(data) {
                                                                                                              // console.log("pv");
                                                                                                              // console.log(data);
                                                                                                              //  a.find('.pu').val(data.pv)
                                                                                                              //jquery('.pu').html(data);
                                                                                                              $(".pu").val(data.pv);
                                                                                                          },
                                                                                                          error: function() {


                                                                                                          }
                                                                                                      });
                                                                                                  });
                                                                                              });
                                                                                          </script>
                                                                                          <script>
                                                                                              //   function enable() {
                                                                                              //       var btn = document.getElementById('btn');
                                                                                              //       var check = document.getElementById('check');
                                                                                              //       if (check.checked) {
                                                                                              //           btn.removeAttribute("disabled");
                                                                                              //       } else {
                                                                                              //           btn.disabled = "true";
                                                                                              //       }
                                                                                              //   }

                                                                                              var checkboxes = $("input[type='checkbox']"),
                                                                                                  submitButt = $("input[type='submit']");

                                                                                              checkboxes.click(function() {
                                                                                                  submitButt.attr("disabled", !checkboxes.is(":checked"));
                                                                                              });
                                                                                          </script>

                                                                                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                                                          <script src="{{ asset('js/select2.min.js') }}"></script>
                                                                                          <script type="text/javascript">
                                                                                              var path = "{{ route('Autocomplete') }}";

                                                                                              $('#search').select2({
                                                                                                  placeholder: 'Select an user',
                                                                                                  ajax: {
                                                                                                      url: path,
                                                                                                      dataType: 'json',
                                                                                                      delay: 250,
                                                                                                      processResults: function(data) {
                                                                                                          return {
                                                                                                              results: $.map(data, function(item) {
                                                                                                                  return {
                                                                                                                      text: item.name,
                                                                                                                      id: item.id
                                                                                                                  }
                                                                                                              })
                                                                                                          };
                                                                                                      },
                                                                                                      cache: true
                                                                                                  }
                                                                                              });
                                                                                          </script>
                                                                                          <script>
                                                                                              $('#search').select2();
                                                                                          </script>
@endsection
