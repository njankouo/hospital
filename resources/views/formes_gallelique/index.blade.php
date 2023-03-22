

  <link rel="stylesheet" href="./vendor/toastr/css/toastr.min.css">
 <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <link rel="stylesheet" type="text/css"
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script>
    @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('info') }}");
  @endif

</script>
 @extends('layouts.master')


 @section('title','liste des Formes Galleliques')

 @section('contenu')

 <div class="content-body">
     <div class="container-fluid">
         <div class="row page-titles mx-0">
             <div class="col-sm-6 p-md-0">
                 <div class="welcome-text">
                     <h4>Hey, Bienvenue!</h4>
                     <span class="ml-1">{{ Auth()->user()->name ?? '' }}</span>
                 </div>
             </div>
             <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0)">Formes Galleliques</a></li>
                     <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospital</a></li>
                 </ol>
             </div>
         </div>
         <!-- row -->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">Formulaire Des Formes Galleliques</h5>
                         <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                         <div class="basic-form">
                             <form method="POST" action="{{ route('add.forme') }}">
                                @csrf
                                 <div class="form-row">

                                     <div class="col-sm-12 mt-2 mt-sm-0">
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
                         <h4 class="card-title">Liste Des Formes Galleliques</h4>

         <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Forme  Gallelique  <span
            class="btn-icon-right"><i class="fa fa-plus"></i></span></button>

                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="example" class="display" style="min-width: 845px">
                                 <thead>
                                     <tr>
                                        <th>#</th>
                                         <th>Libelle</th>
                                         <th style="text-align: center">Action</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($forme as $formes)


                                     <tr>
                                         <td>{{ $formes->id }}</td>
                                         <td>{{ $formes->libelle }}</td>

                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-rounded btn-danger"><span
                                            class="btn-icon-left text-danger"><i class="fa fa-remove color-danger"></i>
                                        </span>supprimer</button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-rounded btn-info"><span
                                            class="btn-icon-left text-info"><i class="fa fa-edit color-danger"></i>
                                        </span>mise a jour</button>
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
 <script src="./vendor/toastr/js/toastr.min.js"></script>

 <!-- All init script -->
 <script src="./js/plugins-init/toastr-init.js"></script>


