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
       <div class="card">
        <div class="card-header">
            <h4 class="card-title">Patient: {{$patient->nom}}&nbsp;{{$patient->prenom}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3">
                    <div class="nav flex-column nav-pills">
                        <a href="#v-pills-home" data-toggle="pill" class="nav-link show">BILAN </a>
                        <a href="#v-pills-profile" data-toggle="pill" class="nav-link">RADIOLOGIE</a>
                        <a href="#v-pills-messages" data-toggle="pill" class="nav-link active">CERTIFICATS MEDICAUX</a>
                        {{-- <a href="#v-pills-settings" data-toggle="pill" class="nav-link active">PAIEMENTS</a> --}}
                    </div>
                </div>
                <div class="col-xl-9">

                    <div class="tab-content">

                        <div id="v-pills-home" class="tab-pane fade">
                            <button type="button" class="btn btn-rounded btn-secondary m-2" style="float: right"><span class="btn-icon-left text-secondary"><i class="fa fa-plus color-secondary"></i> </span>Bilan</button>
                                 <table id="example" class="display table table-hover" style="text-align:center">
                            <thead>
                                    <tr role="row">

                                        <th>Ligne Bilan</th>
                                        <th>Date Bilan</th>
                                        <th>Action</th>
                                        </thead>
                                <tbody>

                            <tr >


                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                      </tbody>


                            </table>
                        </div>
                        <div id="v-pills-profile" class="tab-pane fade">

                        </div>
                        <div id="v-pills-messages" class="tab-pane fade">
                            <i class="fa fa-printer"></i>
                        </div>
                        {{-- <div id="v-pills-settings" class="tab-pane fade active show">
                            <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet
                                qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@stop
