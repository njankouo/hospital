<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                                        <th style="width: 20%">Responsable Rdv</th>
                                        <th style="width: 30%">Patient</th>
                                        <th style="width: 15%">Date Rdv</th>
                                        <th style="width: 15%">Status Rdv</th>
                                        <th style="width: 35%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($rdv as $rdvs)


                                    <tr>
                                        <td>{{$rdvs->responsable}}</td>
                                        <td>{{$rdvs->patient->nom}} {{$rdvs->patient->prenom}}</td>
                                        <td>{{$rdvs->date}}</td>
                                        <td>{{$rdvs->status}}</td>
                                        <td style="width: 45%">
                                            <a type="button" class="btn btn-rounded btn-primary" href=""><span class="btn-icon-left text-info"><i class="fa fa-edit color-info"></i>
                                            </span>editer</a>
                                            <a style="margin: 2%" type="button" class="btn btn-rounded btn-danger" href=""><span class="btn-icon-left text-info"><i class="fa fa-edit color-info"></i>
                                            </span>Annuler</a>
                                            <a style="margin: 2%" type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg{{ $rdvs->id }}" ><span class="btn-icon-left text-info"><i class="fa fa-whatsapp color-info"></i>
                                            </span>Message</a>

                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg{{ $rdvs->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Formulaire Des Rendez-Vous</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="basic-form">
                                                        <form method="POST" action="">

                                                            <div class="form-row">
                                                                <div class="col-sm-12">
                                                                    <label>Responsable Rdv</label>
                                                                    <input type="text" class="form-control" placeholder="Responsable Rdv..." name="responsable" value="{{auth()->user()->name}}">
                                                                </div>
                                                                 </div>
                                                            <br>

                                                    <div class="form-row">
                                                                    <div class="col-sm-6  mt-2 mt-sm-0">
                                                                        <label>Patient</label>
                                                                        <select id="single-select" data-select2-id="single-select" tabindex="-1" class="select2-hidden-accessible patient" aria-hidden="true" name="patient_id">

                                                                        <optgroup label="selectionnez le Patient">
                                                                                @foreach ($patient as $patients)


                                                                            <option value="{{ $patients->id }}">{{ $patients->nom }} {{ $patients->prenom }}</option>
                                                                            @endforeach
                                                                        </optgroup>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label for="telephone">Telephone Patient</label>
                                                                        <input type="text" class="form-control telephone" placeholder="telephone patient"  name="number" id="telephone">

                                                                    </div>

                                                                </div>

                                                    <div class="form-row">
                                                        <div class="col-sm-12 mt-2 mt-sm-0">
                                                            <label>Message</label>

                                                            <textarea name="message" class="form-control"></textarea>
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

                                                            <input type="text" class="form-control" placeholder="date rendez-vous" id="mdate" data-dtp="dtp_jxS5O" name="date">

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
