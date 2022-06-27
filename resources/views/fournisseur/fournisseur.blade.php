  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css
">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>

  <script
      src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js
                                                                                                                                                                                                          ">
  </script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

  @extends('layouts.master')
  @section('contenu')
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-title my-3 mx-3">
                      <h3 style="font-family:forte">listing des fournisseurs</h3>
                      <div style="margin-left: 55%" class="d-flex">
                          <a href="{{ route('fournisseur.create') }}" class="btn btn-dark">
                              <i class="fa fa-plus mx-2"></i>Nouveau fournisseur
                          </a>

                          <a href="{{ route('fournisseur.pdf') }}" class="btn btn-Warning mx-4">Format PDF</a>
                      </div>

                      <div class="card-body">
                          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                              <thead class="text-center">
                                  <tr>
                                      <th></th>
                                      <th style="width: 30%">Nom fournisseur</th>
                                      <th style="width: 20%">Prenom</th>
                                      <th style="width: 15%">Telephone</th>
                                      <th style="width: 20%">email</th>
                                      <th style="width: 20%">Operation</th>
                                  </tr>
                              </thead>
                              <tbody class="text-center">
                                  @foreach ($four as $fours)
                                      <tr>
                                          <td>
                                              @if ($fours->sexe == 0)
                                                  <img src="{{ asset('img/lien.png') }}" alt=""
                                                      style="width: 45px">
                                              @else
                                                  <img src="{{ asset('img/lion.png') }}" alt=""
                                                      style="width: 45px">
                                              @endif


                                          </td>
                                          <td>{{ $fours->nom }}</td>
                                          <td>{{ $fours->prenom }}</td>
                                          <td> {{ $fours->telephone1 }}</td>
                                          <td>{{ $fours->email }}</td>


                                          <td>
                                              {{-- <div class="dropdown dropup">
                                                  <button class="btn btn-primary dropdown-toggle" type="button"
                                                      data-toggle="dropdown">Operation in table
                                                      <span class="caret"></span></button>
                                                  <ul class="dropdown-menu mx-2">
                                                      <i class="fa fa-trash my-2 text-danger"></i>delete
                                                      <i class="fa fa-edit text-primary"></i> update

                                                  </ul>
                                              </div> --}}
                                          </td>

                                      </tr>
                                  @endforeach
                              </tbody>

                          </table>
                      </div>
                      <div class="card-footer">
                          {{ $four->links() }}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection
  <script>
      $(document).ready(function() {
          $('#example').DataTable({

              "processing": true,

              "serverSide": true,
              ajax: "{{ route('fournisseur.liste') }}",
              columns: [{
                      data: 'id',
                      name: 'id'
                  },
                  {
                      data: 'nom',
                      name: 'nom'
                  },
                  {
                      data: 'prenom',
                      name: 'prenom'
                  },
                  {
                      data: 'telephone1',
                      name: 'telephone1'
                  },
                  {
                      data: 'email',
                      name: 'email'
                  },
                  {
                      data: 'action',
                      name: 'action',
                      orderable: true,
                      searchable: true
                  },
              ]
          });


      });
  </script>
