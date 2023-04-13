

  <link rel="stylesheet" href="./vendor/toastr/css/toastr.min.css">
  <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  @extends('layouts.master')


  @section('title','liste des Familles Produits Pharmaceutiques')

  @section('contenu')

  <div class="content-body">
      <div class="container-fluid">
          <div class="row page-titles mx-0">
              <div class="col-sm-6 p-md-0">
                  <div class="welcome-text">
                      <h4>Hey, Bienvenue!</h4>
                      <span class="ml-1">{{ Auth()->user()->name ??'' }}</span>
                  </div>
              </div>
              <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Familles Produits</a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                  </ol>
              </div>
          </div>
          <!-- row -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Formulaire Des Familles Produits</h5>
                          <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <div class="basic-form">
                              <form method="POST" action="{{ route('add.famille') }}">
                                 @csrf
                                  <div class="form-row">

                                      <div class="col-sm-12 mt-2 mt-sm-0">
                                        <label for="">Ajouter La Famille Du Produit</label>
                                          <input type="text" class="form-control" placeholder="Libelle..." name="libelle">
                                      </div>
                                  </div>
                                  <br>



                                  </div>


                          </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                          <button type="submit" class="btn btn-primary">Valider</button>
                      </div>
                     </form>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Familles Produits </h4>

          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Familles Produits  <span
             class="btn-icon-right"><i class="fa fa-plus"></i></span></button> --}}
             <span><a  class="mr-4 btn btn-primary" data-toggle="modal" style="-webkit-animation: pulse 1s infinite"  data-target=".bd-example-modal-lg"><i class="fa fa-plus text-white"></i> </a>

                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table id="example" class="display" style="min-width: 845px;text-align:center">
                                  <thead>
                                      <tr>
                                         <th>#</th>
                                          <th>Libelle</th>
                                          <th >Action</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                   @foreach ($famille as $familles)


                                      <tr>
                                          <td>{{ $familles->id }}</td>
                                          <td>{{ $familles->libelle }}</td>

                                     <td>

                                        <a type="button" class="btn btn-rounded btn-danger" href=""><i class="fa fa-trash text-white"></i> </a>

                                     </td>
                                      </tr>
                                      @endforeach


                                  </tbody>

                              </table>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  @stop


