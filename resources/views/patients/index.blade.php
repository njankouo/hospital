<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@extends('layouts.master')


@section('title','liste des Patients')

@section('contenu')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hey, Bienvenue!</h4>
                    <span class="ml-1">{{ Auth()->user()->name ?? ''}}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Patients</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Formulaire Des Patients</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="basic-form">
                            <form method="POST" action="{{ route('add.patients') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder=" Nom Patients..." name="nom">
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <input type="text" class="form-control" placeholder="Prenom Patients..." name="prenom">
                                    </div>
                                </div>
                                <br>
                                    <div class=" form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="Lieu Naissance Patients..." name="lieu">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="tel" class="form-control" placeholder="Telephone Patients..." name="telephone">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-sm-12 mt-2 mt-sm-0">
                                            <select id="inputState" class="form-control" name="sexe">
                                                <option selected="">Selectionnez Le Sexe</option>
                                                <option value="1">Masculin</option>
                                                <option value="0">Feminin </option>

                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="adresse Patients..." name="adresse">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="date de naissance exp: 04/04/1889" name="date">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="Profession Patients..." name="profession">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder=" Personne a prevenir..." name="prevenir">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="telephone presonne a prevenir..." name="tel" >
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="Nom assurance..." name="assurance">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <input type="text" class="form-control" placeholder="Numero assurance..." name="numAssurance">
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <input type="text" class="form-control" placeholder="groupe sanguin..." name="groupe">
                                    </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="Etat Civil..." name="etat">
                                        </div>
                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                            <input type="text" class="form-control" placeholder="Age..." name="age">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Patients</h4>

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Patients <span
            class="btn-icon-right"><i class="fa fa-plus"></i></span></button>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table table-hover" style="min-width: 845px">
                                <thead>
                                    <tr style="text-align: center">
                                        <th >Nom</th>
                                        <th >Prenom</th>

                                        <th >Telephone</th>
                                        {{-- <th >Nom Assurance</th>
                                        <th >Numero Assurance</th> --}}
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patient as $patients)

                                    <tr style="text-align: center">

                                        <td>{{ $patients->nom }}</td>

                                        <td>{{ $patients->prenom }}</td>


                                            <td>
                                                {{ $patients->telephone }}
                                            </td>



                                           {{-- <td>
                                            {{ $patients->assurance }}
                                           </td>
                                           <td>
                                            {{ $patients->numAssurance }}
                                           </td> --}}

                                           <td>
                                            <a  style ="margin:2%" type="button" class="text-white btn btn-rounded btn-info" href="{{ route('update.patient',$patients->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-edit color-info"></i>
                                            </span>editer</a>

                                            <button type="button" class="text-white btn btn-rounded btn-primary" data-toggle="modal" data-target="#example-lg{{ $patients->id }}" data-item-id="1"><span class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                            </span>voir</button>

                                            <a type="button" class="text-white btn btn-rounded btn-secondary" style ="margin:2%" href="{{ route('dossier.patient',$patients->id) }}" ><span class="btn-icon-left text-info"><i class="fa fa-file color-secondary"></i>
                                            </span>dossier</a>
                                        </td>
                                    </tr>

                                    <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg{{ $patients->id }}">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">INFORMATION DU PATIENT</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>NOM : {{ $patients->nom }} </h4>
                                                            <h4>Prenom : {{ $patients->prenom }}</h4>
                                                            <h4>Email : {{ $patients->email }}</h4>
                                                            <h4>Adresse : {{ $patients->adresse }}</h4>
                                                            <h4>Telephone : {{ $patients->telephone }}</h4>
                                                            <h4>Profession : {{ $patients->profession }}</h4>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Nom Assurance : {{ $patients->assurance }}</h4>
                                                            <h4>Numero Assurance : {{ $patients->numAssurance }}</h4>
                                                            <h4>Date De Naissance : {{ $patients->date }}</h4>
                                                            <h4>Lieu De Naissance : {{ $patients->lieu }}</h4>
                                                            <h4>Personne a Contacter : {{ $patients->prevenir }}</h4>
                                                            <h4>Telephone Personne a Contacter : {{ $patients->tel }}</h4>

                                                        </div>
                                                        <div class="col-4"></div>
                                                        <div class="col-4">
                                                            <img src="{{ asset('images/avatar/1.png') }}"/>
                                                                 </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <h6>DATE DE CREATION : {{ $patients->created_at->diffForHumans() }}</h6>

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


