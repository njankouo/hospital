<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


@extends('layouts.master')

@section('title','gestion des RDV')

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
                    <li class="breadcrumb-item"><a href="#">Rendez-Vous</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Rendez-Vous</h4>
            <a type="button" class="btn btn-primary" style="-webkit-animation: pulse 1s infinite"  data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus fa-2x text-white" ></i></a>


                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px;text-align:center">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>Status Rdv</th>
                                        <th >Responsable Rdv</th>
                                        <th>Patient</th>
                                          <th>Titre RDV</th>
                                        <th >Date Rdv</th>

                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($rdv as $rdvs)


                                    <tr  data-toggle="modal" style="cursor:pointer">
                                        <td>
                                            @if ($rdvs->status==1)
                                            <i class="fa fa-close text-danger"></i>
                                            @else
                                            <i class="fa fa-check text-success"></i>
                                            @endif
                                        </td>
                                        <td>{{$rdvs->responsable}}</td>
                                        <td>{{$rdvs->patient->nom}} {{$rdvs->patient->prenom}}</td>
                                        <td>{{ $rdvs->titre }}</td>
                                        <td>{{$rdvs->date}}</td>

                                        <td>
                                            <span><a  class="mr-4"  data-placement="top" title="Archiver" data-toggle="modal" data-target="#exampleModalCenter{{ $rdvs->id }}"><i class="fa fa-pencil text-primary"></i> </a>
                                                <a href="javascript:void()" data-toggle="tooltip" data-placement="top" title="Message"><i class="fa fa-telegram text-success"></i></a></span>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalCenter{{ $rdvs->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Archiver Rendez-Vous</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                        @if($rdvs->status==1)
                                                        <form action="{{route('update.rdv',['rdv'=>$rdvs->id])  }}" method="post">

                                                            @csrf
                                                            <input type="hidden" name="_method" value="put">
                                                            <label for="rdv">Rendez-Vous Honor&eacute;</label>
                                                            <input type="checkbox" name="status" id="" value="0">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </form>
                                                    @else
                                                    <h5 style="text-align: center">Le Patient {{ $rdvs->patient->nom }}&nbsp;{{ $rdvs->patient->prenom }} A honor&eacute; son Rendez-vous</h5>
                                                      @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Formulaire Des Rendez-Vous</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="basic-form">
                                                <form method="POST" action="{{ route('add.rdv') }}">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-sm-6">
                                                            <label>Responsable Rdv</label>
                                                            <input type="text" class="form-control" placeholder="Responsable Rdv..." name="responsable" value="{{auth()->user()->name}}">
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <label>Date Rdv</label>

                                                        <input type="datetime-local" id="date-format" class="form-control" placeholder="Date RDV" name="date">
                                                    </div>
                                                    </div>
                                                    <br>

                                            <div class="form-row">
                                                            <div class="col-sm-6  mt-2 mt-sm-0">
                                                                <label>Patient</label>
                                                                <select class="multi-select select2-hidden-accessible patient" name="patient_id" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true" id="patient">
                                                                    <optgroup label="selectionnez le Patient">
                                                                        @foreach ($patient as $patients)


                                                                    <option value="{{ $patients->id }}">{{ $patients->nom }} {{ $patients->prenom }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="telephone">Telephone Patient</label>
                                                                <input type="text" class="form-control telephone" placeholder="telephone patient"  name="phone" id="telephone">

                                                            </div>

                                                        </div>
                                                        <br>
                                            <div class="form-row">
                                                <div class="col-sm-6  mt-2 mt-sm-0">
                                                    <label for="">Fin RDV</label>
                                                    <input type="datetime-local" id="date-format" class="form-control" placeholder="Date Fin RDV" name="end_date">

                                                </div>
                                                <div class="col-sm-6  mt-2 mt-sm-0">
                                                      <label for="">Titre RDV</label>
                                                <input type="text"  class="form-control" placeholder="Titre RDV" name="titre">

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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
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
    $(document).ready(function() {
        $(document).on('change', '.patient', function() {
            var prod = $(this).val();
            var a = $(this).parent();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });


            $.ajax({
                type: "GET",
                url: "{{ route('charger.telephone') }}",
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
                    $(".telephone").val(data.tel);
                },
                error: function() {
                   // alert('none');

                }
            });
        });
    });
    </script>
