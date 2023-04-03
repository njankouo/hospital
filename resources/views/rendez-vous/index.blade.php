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

                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Rendez-Vous <span
            class="btn-icon-right"><i class="fa fa-plus"></i></span></button>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px;text-align:center">
                                <thead>
                                    <tr style="text-align: center">
                                        <th style="width: 30%">Responsable Rdv</th>
                                        <th style="width: 30%">Patient</th>
                                          <th style="width: 30%">Titre RDV</th>
                                        <th style="width: 25%">Date Rdv</th>

                                        <th style="width: 25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($rdv as $rdvs)


                                    <tr  data-toggle="modal" style="cursor:pointer">
                                        <td>{{$rdvs->responsable}}</td>
                                        <td>{{$rdvs->patient->nom}} {{$rdvs->patient->prenom}}</td>
                                        <td></td>
                                        <td>{{$rdvs->date}}</td>

                                        <td style="width: 45%">
                                            <a type="button" class="btn btn-rounded btn-primary" href=""><span class="btn-icon-left text-info"><i class="fa fa-edit color-info"></i>
                                            </span>editer</a>
                                            <a style="margin: 2%" type="button" class="btn btn-rounded btn-danger" href=""><span class="btn-icon-left text-info"><i class="fa fa-trash color-info"></i>
                                            </span>Annuler</a>


                                        </td>
                                    </tr>

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
