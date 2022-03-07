  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-title my-3 mx-3">
                  <h3 style="font-family:forte">listing des Clients</h3>
                  <div style="margin-left: 85%">
                      <a href="" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-xl">
                          <i class="fas fa-plus fa-2x"></i>New Client
                      </a>
                  </div>

                  <div class="card-body">
                      <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Nom Du client</th>
                                  <th>Prenom</th>
                                  <th>Numero De Telephone</th>
                                  <th>Sexe</th>
                                  <th>Operation</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($client as $clients)
                                  <tr>
                                      <td>{{ $clients->nom }}</td>
                                      <td>{{ $clients->prenom }}</td>
                                      <td>{{ $clients->telephone }}</td>
                                      <td>
                                          @if ($clients->sexe == 0)
                                              <img src="{{ asset('img/lien.png') }}" alt="" style="width:45px">
                                          @else
                                              <img src="{{ asset('img/lion.png') }}" alt="" style="width:45px">
                                          @endif

                                      </td>

                                      <td>
                                          <div class="dropdown dropup">
                                              <button class="btn btn-primary dropdown-toggle" type="button"
                                                  data-toggle="dropdown">Operation in table
                                                  <span class="caret"></span></button>
                                              <ul class="dropdown-menu">
                                                  <a href="#" class="btn btn-danger">delete</a>
                                                  <a href="#" class="btn btn-primary">update</a>

                                              </ul>
                                          </div>
                                      </td>

                                  </tr>
                              @endforeach
                          </tbody>

                      </table>
                  </div>
                  <div class="card-footer">
                      {{ $client->links() }}
                  </div>
              </div>
          </div>
      </div>
  </div>
