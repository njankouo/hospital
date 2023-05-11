@extends('layouts.master')

@section('title','dossier medicaux')

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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dossier M&eacute;dicaux</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
             </ol>
          </div>
       </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-title">
                        <h5 style="font-weight: bold;margin:10px;">Liste Des Dossiers M&eacute;dicaux</h5>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px;text-align:center">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>Patient</th>
                                          <th>Age</th>
                                        <th >Date Cr&eacute;ation</th>

                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patient as $patients)


                                    <tr>
                                        <td>{{ $patients->nom }}</td>
                                        <td>{{ $patients->age }}</td>
                                        <td>{{ $patients->created_at->DiffForHumans() }}</td>
                                        <td>
                                         <a href="{{ route('dossier.medical',$patients->id) }}"class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                         <a href=""class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                         <a href="{{ route('download',$patients->id) }}"class="btn btn-warning"><i class="fa fa-download"></i></a>

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
