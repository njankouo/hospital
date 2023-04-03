@extends('layouts.master')

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
                    <h4 class="card-title">Liste Des Patients</h4>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table table-hover" style="min-width: 845px">
                            <thead>
                                <tr style="text-align: center">
                                    <th >Nom et Prenom</th>
                                 
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patient as $patients)

                                <tr style="text-align: center">

                                    <td>{{ $patients->nom }}  {{ $patients->nom }}</td>
     
                                       <td>
                                        <a  style ="margin:2%" type="button" class="text-white btn btn-rounded btn-primary" href="{{ route('examen.info',$patients->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-eye color-primary"></i>
                                        </span>Option</a>

                                       
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