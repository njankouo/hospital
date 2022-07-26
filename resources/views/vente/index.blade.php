  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script>
      $(document).ready(function() {

          $('#example').DataTable();
      });
  </script>
  @extends('layouts.master')

  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
  @section('contenu')
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <p style="font-family: forte">créer une nouvelle vente</p>

                  </div>

                  <div class="card-body">

                      <form action="{{ route('vente.index') }}" method="POST" class="form-block">
                          @csrf

                          <div class="row">
                              <div class="form-row">

                                  <div class="col-6">
                                      <label for="">Date vente</label>
                                      <input type="date"
                                          class="my-2 form-control @error('date_vente') is-invalid @enderror" name="date"
                                          placeholder="Enter ...">
                                      @error('date_vente')
                                          <p>{{ $message }}</p>
                                      @enderror

                                  </div>
                                  <div class="col-6">
                                      <label for="">responsable de la vente</label>
                                      <select name="responsable" id=""
                                          class="form-control @error('responsable') is-invalid @enderror my-2">
                                          <option value="">...........</option>
                                          @foreach ($user as $users)
                                              <option value="{{ $users->id }}">{{ $users->nom }}</option>
                                          @endforeach
                                      </select>
                                      @error('responsable')
                                          <p>{{ $message }}</p>
                                      @enderror

                                  </div>
                              </div>

                              <div class="col-8 my-4">
                                  <button type="submit" class="btn btn-primary mx-1">save</button>

                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="card-footer bg-primary"></div>
              </div>

          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-title my-4 mx-3 p-2">
                      <h3 style="font-family: forte">liste des ventes</h3>
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
                  <div class=" card-body">

                      <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0"
                          width="100%">
                          <thead>
                              <tr>
                                  <th class="th-sm">code vente
                                  </th>
                                  <th class="th-sm">Date vente
                                  </th>
                                  {{-- <th class="th-sm">Nom du client
                                </th> --}}

                                  <th class="th-sm">Responsable de la vente
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
  @endsection
