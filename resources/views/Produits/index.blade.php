<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


 @extends('layouts.master')


 @section('title','liste des Produits Ppharmaceutiques')

 @section('contenu')

 <div class="content-body">
     <div class="container-fluid">
         <div class="row page-titles mx-0">
             <div class="col-sm-6 p-md-0">
                 <div class="welcome-text">
                     <h4>Hey, Bienvenue!</h4>
                     <span class="ml-1">{{ Auth()->user()->name ??''}}</span>
                 </div>
             </div>
             <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                 <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                     <li class="breadcrumb-item"><a href="javascript:void(0)">Produits Pharmaceutiques</a></li>

                 </ol>
             </div>
         </div>
         <!-- row -->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
             <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">Formulaire Des Produits Pharmaceutiques</h5>
                         <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                         <div class="basic-form">
                             <form method="post" action="{{ route('add.product') }}">
                                @csrf
                                 <div class="form-row">
                                     <div class="col-sm-6">
                                         <input type="text" class="form-control" placeholder="Designation..." name="designation">
                                     </div>
                                     <div class="col-sm-6 mt-2 mt-sm-0">
                                         <input type="text" class="form-control" placeholder="Equivalence..." name="equivalence">
                                     </div>
                                 </div>
                                 <br>
                                     <div class=" form-row">
                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                             <input type="number" class="form-control" placeholder="Prix Unitaire..." name="pu">
                                         </div>
                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                             <input type="text" class="form-control" placeholder="qte stock..." name="qteStock">
                                         </div>
                                     </div>
                                     <br>
                                     <div class=" form-row">
                                        <div class="col-sm-12 mt-2 mt-sm-0">
                                            <input type="number" class="form-control" placeholder="Qte Seuil..." name="qteSeuil">
                                        </div>

                                    </div>
                                     <br>
                                     <div class="form-row">
                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                             <select id="inputState" class="form-control" name="famille_id">
                                                 <option selected="">Selectionnez La Famille Du produit</option>
                                                 @foreach ($famille as $familles)
                                                 <option value="{{ $familles->id }}">{{ $familles->libelle }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                             <select id="inputState" class="form-control" name="conditionnement_id">
                                                <option selected="">Selectionnez Le conditionnement</option>
                                                @foreach ($conditionnement as $conditionnements)


                                                <option value="{{ $conditionnements->id }}">{{ $conditionnements->libelle }}</option>

                                                @endforeach
                                            </select>
                                         </div>
                                     </div>
                                     <br>
                                     <div class="form-row">
                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                             <select id="inputState" class="form-control" name="forme_id">
                                                 <option selected="">Selectionnez La Forme Gallelique</option>
                                                 @foreach ($forme as $formes )
                                                 <option value="{{$formes->id  }}">{{ $formes->libelle }}</option>
                                                 @endforeach



                                             </select>
                                         </div>

                                         <div class="col-sm-6 mt-2 mt-sm-0">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file" onchange="previewFile(this)" name="file">
                                                <label class="custom-file-label">Image Produit</label>
                                            </div>
                                         </div>
                                         <br>
                                         <div class="form-row">
                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                            <fieldset class="text-light">
                                                <img id="previewImg" alt="" style="width:70%; height:auto;" class="my-4">
                                            </fieldset>
                                         </div>
                                         </div>
                                     </div>


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
         <a type="button" class="btn btn-secondary" style="margin:5px" href="{{ route('produit.pdf') }}" > Imprimer <span
            class="btn-icon-right"><i class="fa fa-download"></i></span></a>
         <div class="row">

             <div class="col-12">

                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Liste Des Produits Pharmaceutiques</h4>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Produit <span
                                class="btn-icon-right"><i class="fa fa-plus"></i></span></button>

                                        </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="example"  style="text-align:center" class="table table-hover verticle-middle table-responsive-sm">
                                 <thead>
                                     <tr>
                                         <th style="width: 20%">Designation</th>
                                         <th style="width: 10%">Equivalence</th>

                                         <th style="width: 10%">Qte seuil</th>
                                         <th style="width: 10%">Qte Stock</th>
                                         <th style="width: 20%">Conditionnement</th>
                                         <th style="width: 10%">Prix Unitaire</th>
                                         <th style="width: 20%">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($produit as $produits)


                                     <tr>



                                         <td>{{ $produits->designation }}</td>
                                         <td>{{ $produits->equivalence }}</td>
                                         <td>{{ $produits->qteSeuil }}</td>
                                         <td>{{ $produits->qteStock }}</td>
                                         <td>{{ $produits->conditionnement->libelle }}</td>
                                         <td>
                                            {{ $produits->pu }}
                                         </td>
                                         <td>

                                            <span>
                                                <a href="{{ route('edit.produit',$produits->id) }}" class="mr-4" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn" ><i class="fa fa-pencil color-muted"></i> </a>
                                             </span>

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


 <!-- All init script -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('message'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('message') }}");
  @endif
  </script>

 <script>
    function previewFile(input) {
        var file = $('input[type=file]').get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewImg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
 @stop


