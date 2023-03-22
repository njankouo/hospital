
@extends('layouts.master')


@section('title','liste des utilisateurs')

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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Utilisateurs</a></li>

                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Utilisateurs</h4>

                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Utilisateur <span
                             class="btn-icon-right"><i class="fa fa-plus"></i></span></button>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr style="text-align: center">
                                        <th style="width: 20%">Nom</th>
                                        <th style="width: 30%">Email</th>
                                        <th style="width: 15%">Sexe</th>
                                        <th style="width: 35%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                    <tr style="text-align: center">
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            @if($users->sexe==1)
                                            <img src="{{ asset('images/avatar/1.png') }}" alt="avartar" style="width: 35px;height:35px">
                                                @else
                                                <img src="{{ asset('images/avatar/2.png') }}" alt="avartar" >
                                            @endif
                                        </td>
                                        <td>
                                            @if ($users->password==null)


                                            <a type="button" class="btn btn-rounded btn-info" href="{{ route('users.edit',$users->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-edit color-info"></i>
                                            </span>completer</a>
                                            @else
                                            <a type="button" class="btn btn-rounded btn-primary" href="{{ route('users.edit',$users->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-edit color-info"></i>
                                            </span>editer</a>
                                            @endif


                                        </td>

                                    </tr>
                                    @endforeach



                                </tbody>

                            </table>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Formulaire Des Utilisateurs</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="basic-form">
                                                <form method="POST" action="{{ route('add.users') }}">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder=" Nom Utilisateur..." name="name">
                                                        </div>
                                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                                            <input type="text" class="form-control" placeholder="Prenom Utilisateur..." name="prenom">
                                                        </div>
                                                    </div>
                                                    <br>
                                                        <div class=" form-row">
                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                <input type="email" class="form-control" placeholder="Email Utilisateur..." name="email">
                                                            </div>
                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                <input type="tel" class="form-control" placeholder="Telephone Utilisateur..." name="telephone">
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
                                                                <input type="text" class="form-control" placeholder="poste Utilisateur..." name="poste">
                                                            </div>
                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                <input type="text" class="form-control" placeholder="Specialite Utilisateur..." name="specialite">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-row">
                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                <input type="text" class="form-control" name="date" placeholder="date de naissance" id="mdate" data-dtp="dtp_1g5Ns">
                                                            </div>
                                                            <div class="col-sm-6 mt-2 mt-sm-0">
                                                                <input type="text" class="form-control" placeholder="Lieu naissance Utilisateur..." name="lieu">
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


