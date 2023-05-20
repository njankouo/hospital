<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@extends('layouts.master')

@section('title','gestion des options')

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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Bilan / Radiologie / Certificats Medicaux</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
             </ol>
          </div>
       </div>
       <div class="container">
       <div class="card">
        <div class="card-header bg-primary">
            <h4 class="text-light">
             Patient: {{$patient->patient->nom}}&nbsp;{{$patient->patient->prenom}}
            </h4>
            <a  href="{{ route('examen.pdf',$patient->id) }}" class="btn btn-primary"> <i class="fa fa-download text-light fa-2x"></i></a>

        </div>
    </div>
        </div>
        <div class="row">
    <div class="col-7">
             <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
            <form method="POST" action="{{route('add.examen')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="code">Code Patient</label>
                  <input type="text" class="form-control" id="code" value="{{$patient->patient_id}}"readonly name="patient_id"/>
                  <label for="date">Date Naissance</label>
                  <input type="text" class="form-control" id="date" value="{{ $patient->patient->date }}" name="date_naissance" readonly/>
                  <label for="date">Adresse</label>
                  <input type="text" class="form-control" id="date" value="{{ $patient->patient->adresse }}" name="adresse" readonly/>
                  <label for="date">Date Examen</label>
                  <input type="text" class="form-control" id="date" value="{{\Carbon\Carbon::now()}}" name="date_examen" readonly/>
                  <label for="file">fichier Examen</label>
                  <input type="file" class="form-control"  onchange="previewFile(this)" name="file"/>
                  <label for="code">Code Enregistrement</label>
                  <input type="text" class="form-control" value="{{ $patient->id }}" name="consultation_id" readonly/>

                </div>

                <button type="submit" class="btn btn-primary" style="float:right">Valider</button>

        </div>
    </div>
    <div class="card-footer bg-primary"></div>

    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h6 style="text-align: center">
                    Resultat Examen M&eacute;dical {{ $patient->examen }}
                </h6>
            </div>

            <div class="card-body">
                <section>
                  <center><img src="{{asset('images/téléchargement.png')}}" alt="" id="previewImg" class="img-responsive" width="55%" height="85%"></center>
                    <div class="idMyModal modal">
                        <span class="close">&times;</span>
                        <img class="modal-content">
                      </div>
                </section>
                <label for="observations">Observations</label>
                <textarea class="form-control" placeholder="resultats des examens" name="observation"></textarea>
                <label id="traitements_recommande">Traitements Recommandés</label>
                 <textarea class="form-control" name="recommandation" class="form-control" placeholder="traitements recommandés"></textarea>
            </div>
        </div>
    </form>
    </div>
    </div>
</div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
