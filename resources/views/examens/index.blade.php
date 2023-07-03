
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@extends('layouts.master')
<script
src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
></script>

@section('title','Autres Examens')

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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Bilan / Radiologie</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
             </ol>
          </div>
       </div>
       <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste Des Examens M&eacute;dicaux</h4>



                   <a  class="mr-4 btn btn-primary" data-toggle="modal" style="-webkit-animation: pulse 1s infinite"  data-target=".bd-example-modal-lg">Nouvel Examen Médical</a>


                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Examen M&eacute;dical</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="basic-form">
                                    <form method="POST" action="{{route('new.examen')}}">
                                        @csrf
                                        <div class="form-row">
                                        {{-- <div class="col-6">

                                            <label for="code_consultation">Code Consultation</label>
                                            <select name="consultation_id" id="" class="form-control">
                                                @foreach ($consultation as $consultations)


                                                <option value="{{ $consultations->id }}">{{ $consultations->id }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="col-12">
                                            <label for="code_prescription">Code prescription</label>
                                            <select name="prescription_id" id="mySelect2" class="form-control code" required>
                                                <option>Selectionnez le code De Prescription pour examen médical</option>
                                                @foreach ($prescription as $prescriptions)
                                                    @if ($prescriptions->examen!=null)
                                                <option value="{{ $prescriptions->id }}">{{ $prescriptions->id }}</option>
                                                @endif
                                                @endforeach
                                            </select>

                                        </div>
                                        </div>
                                        <hr style="background-color: blue">
                                        <h6 style="text-align: center;font-weight:bold;font-style:italic">Informations Prescriptions M&eacute;dicale</h6>
                                        <div class="form-row">
                                            <div class="col-sm-6">
                                                <label for="Nom">Nom Patient</label>
                                                <select name="patient_id" id="patient" class="form-control patient" name="patient_id" required>
                                                    <option>Renseignez Le Patient</option>
                                                    @foreach ($patients as $req)
                                                    <option value="{{ $req->id }}">{{ $req->nom }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                <label for="examen">Examen Medical</label>
                                                <select name="examen" id="examen" class="form-control examen" required>
                                                    <option> Selectionnez l'examen M&eacute;dical</option>
                                                    <option value="Analyse médicale">Analyse Médicale</option>
                                                    <option value="Radiographie">Radiographie</option>
                                                    <option value="Echographie">Echographie</option>
                                                    <option value="IRM">IRM</option>
                                                </select>
                                                {{-- <input type="text" class="form-control examen" placeholder="Examen Medical..." name="examen" id="examen" required>
                                             --}}
                                            </div>
                                            <br>
                                            <div class="col-sm-12 mt-2 mt-sm-0">
                                                <label for="adresse">Prescrit Par:</label>
                                                <input type="text" class="form-control responsable" placeholder="prescrit par..." name="responsable" id="responsable" required>
                                            </div>
                                            {{-- <br>
                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                <label for="adresse">Date Naissance</label>
                                                <input type="text" class="form-control date" placeholder="date naissance..." name="date_naissance">
                                            </div>
                                            <br> --}}
                                            <div class="col-sm-12 mt-2 mt-sm-0">
                                                <label for="adresse">Date Examen</label>
                                                <input type="text" class="form-control" placeholder="date examen..." name="date_examen" value="{{ Carbon\Carbon::now() }}" id="date" required>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table table-hover" style="min-width: 845px">
                            <thead>
                                <tr style="text-align: center">
                                    <th >Code Patient</th>
                                    <th>Examen Prescit Par:</th>
                                    <th >Nom et Prenom</th>
                                    <th>Examen Prescrit</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($examen as $examens)


                                <tr style="text-align: center">
                                    <td>

                                        {{ $examens->patient_id }}</td>
                                    <td>{{ $examens->responsable }}</td>
                                    <td>{{ $examens->patient->nom }}</td>
                                    <td>
                                         <span class="badge badge-info text-white">
                                        {{ $examens->examen }}
                                    </span>
                                    </td>
                                    <td>
                                        @if ($examens->observation==null)
                                            <span class="badge badge-danger">Résultat en Attente</span>
                                            @else
                                            <i class="fa fa-check-circle fa-2x text-success"></i>
                                        @endif
                                    </td>
                                       <td>
                                        @if ($examens->observation==null)
                                        <a  href="{{ route('examen.info',$examens->id) }}" class="btn btn-danger"> <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
                                     @endif
                                        @if (isset($examens->observation))
                                     <a  href="{{ route('examen.pdf',$examens->id) }}" class="btn btn-primary"> <i class="fa fa-download text-light fa-2x"></i></a>
                                     @endif
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('success') }}");
  @endif
  </script>
@stop

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('change', '.code', function() {
            var prod = $(this).val();
            var a = $(this).parent();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });


            $.ajax({
                type: "GET",
                url: "{{ route('generate') }}",
                "timeout": 5000,
                data: {
                    'id': prod
                },
                dataType: 'json',

                success: function(data) {
                  console.log(data);
                  // console.log(data.telephone);
                   //  a.find('.pu').val(data.pv)
                   // query('.pu').html(data);
                   $(".responsable").val(data.responsable);
                    $(".patient").val(data.patient_id);
                    $("#examen").val(data.examen);
                },
                error: function() {
                   // alert('none');

                }
            });
        });
    });
    </script>
<script>
  //  $('#mySelect2').select2();
  //  document.getElementById('mySelect2').select2();
    $(document).ready(function () {
  $('#mySelect2').select2();
});
</script>



