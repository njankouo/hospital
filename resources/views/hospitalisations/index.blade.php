@extends('layouts.master')

@section('title','hospitalisation des patients')
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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Hospitalisations</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patients Hospitalis&eacute;s</h4>

                           <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#example-lg" data-item-id="1"> Hospitalisation <span
                               class="btn-icon-right"><i class="fa fa-plus"></i></span></a>

                                       </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Suivi Par:</th>
                                        <th>Patients</th>
                                        <th>Chambre</th>
                                        <th>Date Debut</th>
                                        <th>Date Fin</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @foreach ($hospitalisation as $hospitalisations)


                                    <tr>
                                        <td>{{ $hospitalisations->responsable }}</td>
                                        <td>
                                            @if ($hospitalisations->patient_id==0)
                                                <i class="fa fa-cancel text-danger"></i>
                                                @else
                                                <a href="javascript:void()" class="badge badge-rounded badge-light">{{ $hospitalisations->patient->nom }} &nbsp;{{ $hospitalisations->patient->prenom }}</a>
                                            @endif
                                        </td>
                                        <td>


                                            @if ($hospitalisations->chambre_id==1)
                                            <a href="javascript:void()" class="badge badge-rounded badge-outline-danger">lib&eacute;r&eacute;</a>
                                            @else
                                            {{  $hospitalisations->chambre->numero}}
                                            @endif
                                        </td>
                                        <td>{{ $hospitalisations->datedebut }}</td>
                                        <td>{{ $hospitalisations->datefin }}</td>
                                        <td> {!! html_entity_decode( $hospitalisations->note ) !!}</td>
                                        <td>
                                            @if (!empty($hospitalisations->patient_id))
                                             @else
                                             <a type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target="#exampleModalCenter{{ $hospitalisations->id }}"><i class="fa fa-cog text-white"></i> </a>

                                            @endif

                                            <a type="button" class="btn btn-rounded btn-danger" href="{{ route('soft.hospitalisation',$hospitalisations->id) }}"><i class="fa fa-trash text-white"></i> </a>

                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{ $hospitalisations->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Valider l'hospitalisation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{ route('edition.hospitalisation', ['hospitalisation' => $hospitalisations->id]) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="put">
                                                <div class="modal-body">

                                                    <label for="">Selectionnez Le Patient Hospitalis&eacute;</label>
                                                  <select name="patient_id" id="" class="form-control">
                                                    @foreach ($patient as $patients)
                                                   <option value=""></option>
                                                   <option value="{{ $patients->id }}">{{ $patients->nom }} &nbsp;{{ $patients->prenom }}</option>
                                                    @endforeach
                                                  </select>



                                                  </div>
                                                <div class="modal-footer">
                                                    @if ($hospitalisations->chambre_id==1)
                                                    <button type="button" class="btn btn-primary modal-dismiss">fermer</button>

                                                    @else
                                                    <button type="submit" class="btn btn-primary">Valider</button>

                                                    @endif
                                                     </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg">
                                        <div class="modal-dialog modal-centered ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Formulaire Hospitalisation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="basic-form">
                                                        <form method="post" action="{{ route('add.hospitalisation') }}">
                                                            @csrf


                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label for="chambre">Chambre</label>
                                                                    <select  name="chambre_id" class="form-control">

                                                                        @foreach ($chambre as $chambres)
                                                                            <option value="{{$chambres->id}}">{{ $chambres->numero }}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                                <br>
                                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                                    <label id="date_debut">Date Debut</label>
                                                                    <input type="date" class="form-control" placeholder="Date Debut" id="mdate" data-dtp="dtp_kxSjs" name="datedebut">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label id="date_fin">Date Sortie</label>
                                                                    <input type="date" class="form-control" placeholder="Date Fin" id="min-date" data-dtp="dtp_BPiE8 " name="datefin">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label id="date_fin">Suivie Par:</label>
                                                                    <input type="text" class="form-control" placeholder="Suivie Par:"  name="responsable" value="{{ Auth()->user()->name }}">
                                                                </div>
                                                                <br>
                                                                <div class="col-sm-12 mt-2 mt-sm-0">
                                                                    <label for="note">Motifs Hospitalisation</label>
                                                                 <textarea name="note" id="" cols="5" rows="5" class="form-control"></textarea>
                                                                </div>
                                                            </div>

                                                    </div>
                                                </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                            </form>

                                                </div>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
