  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script>
      $(document).ready(function() {

          $('#example').DataTable();
      });
  </script>
  @extends('layouts.master')
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
  @section('contenu')
      <div class="row">
          <div class="col-6">
              <div class="card">
                  <div class="card-header">
                      <p style="font-family: forte">créer une nouvelle sortie</p>

                  </div>

                  <div class="card-body">

                      <form action="{{ route('vente.index') }}" method="POST" class="form-block">
                          @csrf

                          <div class="row">
                              <div class="form-row">

                                  <div class="input-field col-12">
                                      <label for="">Date sortie</label>
                                      <input type="date"
                                          class="my-2 form-control @error('date_vente') is-invalid @enderror" name="date"
                                          placeholder="Enter ...">
                                      @error('date_vente')
                                          <p>{{ $message }}</p>
                                      @enderror

                                  </div>
                              </div>
                              <div class="row">
                                  <div class="input-field col-12">

                                      <select name="responsable" id=""
                                          class=" @error('responsable') is-invalid @enderror my-2" multiple>

                                          @foreach ($user as $users)
                                              <option value="{{ $users->id }}">{{ $users->nom }}</option>
                                          @endforeach
                                      </select>
                                      <label for="">responsable de la sortie</label>
                                      @error('responsable')
                                          <p>{{ $message }}</p>
                                      @enderror

                                  </div>

                                  <div class="col-8 my-4">
                                      <button type="submit" class="btn btn-primary mx-1">enregistrer</button>

                                  </div>
                              </div>

                          </div>

                  </div>

              </div>
              <div class="card-action bg-primary p-3"></div>
          </div>
          <div class="col-6">
              <div class="card">
                  <div class="card-header">
                      <p style="font-family: forte">Reservé aux Sorties Internes</p>
                  </div>
                  <div class="card-body">
                      <div class="input-field col-12">
                          <label for="">Beneficiaire</label>
                          <input type="text" class="form-control" name="beneficiaire">
                      </div>

                      <div class="col-12">
                          <label for="">Service</label>
                          <select name="service" id="">
                              <optgroup label="selectionnez leservice concerné">
                                  < @foreach ($service as $services)
                                      <option value="{{ $services->nom }}">{{ $services->nom }}</option>
                                      @endforeach

                              </optgroup>
                          </select>
                      </div>
                      <div class="input-field col-12">
                          <label for="">poste du beneficier(e)</label>
                          <input type="text" name="poste" class="form-control">
                      </div>
                  </div>
                  </form>
                  <div class="card-action bg-primary">

                  </div>

              </div>
          </div>
      </div>


      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-content my-4 mx-3 p-2">
                      <h3 style="font-family: forte">liste des sorties crées</h3>
                      @foreach ($produit as $produits)
                          @if ($produits->qtestock <= 0)
                              <div class="alert alert-danger alert-dismissible">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                  <marquee behavior="" direction=""><strong>AVERTISSEMENTS!
                                          {{ $produits->designation }}
                                          En Rupture de stock veuillez passer la commande avant d'effectuer la vente
                                          de {{ $produits->designation }}


                                      </strong></marquee>

                              </div>
                          @endif
                      @endforeach
                  </div>
                  <div class=" card-content">

                      <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0"
                          width="100%">
                          <thead>
                              <tr>
                                  <th class="th-sm">code sortie
                                  </th>
                                  <th class="th-sm">Date sortie
                                  </th>
                                  {{-- <th class="th-sm">Nom du client
                                </th> --}}

                                  <th class="th-sm">Responsable de la sortie
                                  </th>
                                  <th class="th-sm">Beneficier(e)
                                  </th>
                                  <th class="th-sm">Service
                                  </th>

                                  <th class="th-sm">poste beneifier(e)
                                  </th>

                                  <th class="th-sm">Opération</th>
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($vente as $ventes)
                                  @if ($ventes->date_vente != $carbon->format('Y-m-d'))
                                  @else
                                      <tr>
                                          <td>{{ $ventes->id }}</td>
                                          <td>{{ $ventes->date_vente }}</td>
                                          {{-- <td>{{ $ventes->client->nom }}</td> --}}
                                          <td>{{ $ventes->user->nom }}</td>
                                          <td>{{ $ventes->beneficiaire }}</td>
                                          <td>{{ $ventes->service }}</td>
                                          <td>{{ $ventes->poste }}</td>
                                          <td>
                                              <a href="{{ route('vente.produit', $ventes->id) }}}}"> <i
                                                      class="fa fa-eye fa-2x text-info"></i></a>
                                          </td>
                                      </tr>
                                  @endif
                              @endforeach
                          </tbody>
                          </tr>
                          <tfoot>


                          </tfoot>
                      </table>

                  </div>
              </div>
          </div>
      </div>
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
  @endsection
