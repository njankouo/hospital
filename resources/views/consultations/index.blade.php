<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@extends('layouts.master')
@section('title','registre des consultations')
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
               <li class="breadcrumb-item"><a href="javascript:void(0)">Consultations</a></li>
               <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Liste Des Consultations</h4>
                  {{-- <a type="button" class="btn btn-primary" href="{{ route('save.consultation') }}"> Consultation <span
                     class="btn-icon-right"></span></a>--}}
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i>Consultation</button>
                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title">Formulaire Consultation</h5>
                              <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="row">
                                  <div class="col s6">
                                    <form method="post" action="{{ route('add.consultations') }}" id="step-form-horizontal" class="step-form-horizontal">
                                        @csrf
                                    <label>Suivi Par:</label>
                                    <input type="text" class="form-control" placeholder="responsable consultation" value="{{ auth()->user()->name }}" name="responsable">
                                    <label>Motifs De La Consultation</label>
                                    <input type="text" class="form-control" name="motif" placeholder="Motif Consultation">
                                    <label>Poids</label>
                                    <input type="text" class="form-control @error('poid') is-invalid
                                       @enderror" placeholder="Poid" name="poid">
                                    @error('poid')
                                    <span  class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label>Taille</label>
                                    <input type="text" class="form-control @error('taille') is-invalid
                                       @enderror" placeholder="Taille" name="taille">
                                    @error('taille')
                                    <span  class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label>Tension</label>
                                    <input type="text" class="form-control @error('tension') is-invalid
                                       @enderror" placeholder="Tension" name="tension">
                                    @error('tension')
                                    <span  class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label>Activite Personnelle</label>
                                    <input type="text" class="form-control @error('activite') is-invalid
                                       @enderror" placeholder="Activite Personnelle" name="activite">
                                    @error('activite')
                                    <span  class="text-danger">{{ $message }}</span>
                                    @enderror

                                 </div>
                         <div class="col s6">
                                    <label>Temperature </label>
                                    <input type="text" name="temperature" id="yourText" name="precision" class="form-control" >
                                    <label>Pression Arterielle </label>
                                    <input type="text" name="pression" id="yourText"  class="form-control" >
                                    <label>Activites Quotidiennes </label>
                                    <input type="text"  name="activite" class="form-control @error('activite') is-invalid
                                       @enderror" id="" >
                                    @error('activite')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    <label>Diagnostique</label>
                                    <input type="text" class="form-control @error('diagnostique') is-invalid
                                       @enderror" placeholder="Diagnostique" name="diagnostique">
                                    @error('diagnostique')
                                    <span  class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label>Le Patient A t'il (elle) Des Allergies ?</label>&nbsp;&nbsp;
                                    <br/>
                                    <input type="checkbox" name="allergie" id="yourBox" value="1"> OUI&nbsp;&nbsp;
                                    <input type="checkbox" name="allergie" id="yourcheck " value="0"> NON
                                    <br/><br/>
                                    <label>Preciser Ces Allergies </label>
                                    <input type="text" name="add_allergie" id="yourText" name="precision" class="form-control" disabled>

                                 </div>
                                 <div class="col s4">
                                    <label>Antecedents Medicaux</label>
                                    <textarea name="antecedant" id="" cols="2" rows="3" class="form-control"></textarea>
                                    @error('antecedant')
                                    <span  class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label>Antecedents Churirgicaux</label>

                                    <textarea name="antecedant_churirgicaux" id="" cols="2" rows="2" class="form-control"></textarea>
                                    @error('antecedant')
                                    <span  class="text-danger">{{ $message }}</span>

                                @enderror
                                <label>Antecedents Familliales</label>

                                <textarea name="antecedant_familliale" id="" cols="3" rows="3" class="form-control"></textarea>
                                @error('antecedant')
                                <span  class="text-danger">{{ $message }}</span>

                            @enderror
                            <label>Note</label>

                                <textarea name="note" id="" cols="2" rows="3" class="form-control"></textarea>
                                @error('note')
                                <span  class="text-danger">{{ $message }}</span>

                            @enderror
                                 </div>

                              </div>

                              <div class="row">
                              <div class="col-12">
                                <label style="font-weight:bold;font-style:italic;color:black">Selectionnez Le Patient</label>
                                <select class="form-control @error('patient_id') is-invalid
                                @enderror" name="patient_id">
                                    <option>Renseignez Le Patient En Consultation</option>
                                    @foreach ($patient as $patients)


                                    <option value="{{ $patients->id }}">{{ $patients->nom }}  {{ $patients->prenom }}</option>
                                    @endforeach
                                </select>

                                @error('patient_id')
                                <span  class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>

                                {{-- <div class="col-4">
                            <label>Montant</label>
                            <input type="text" class="form-control @error('activite') is-invalid
                                   @enderror" placeholder="Montant" name="montant" style="text-align: right" value="5500">

                                </div>
                                <div class="col-4">
                                 <label for="Versement">Versement</label>
                             <input type="number" class="form-control" name="versement" style="text-align: right">
                            </div> --}}
                        </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                           </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="example" class="display" style="min-width: 845px;text-align:center">
                        <thead>
                           <tr>
                            <th></th>
                              <th>Suivi Par:</th>
                              <th>Patients</th>
                              <th>Diagnostique</th>
                              <th>Date Consultation</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody style="text-align: center">
                           @foreach ($consultation as $consultations)
                           <tr>
                            <td style="cursor: pointer">
                                @if ($consultations->status==0)
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm{{ $consultations->id }}" style="-webkit-animation: pulse 1s infinite"><i class="fa fa-pencil fa-2x text-white" ></i></button>

                                @else
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm{{ $consultations->id }}" style="-webkit-animation: pulse 0.5s infinite"><i class="fa fa-eye fa-2x text-white" ></i></button>

                                @endif
                               </td>
                              <td>{{ $consultations->responsable }}</td>
                              <td>{{ $consultations->patient->nom }}</td>
                              <td>{{ $consultations->diagnostique }}</td>
                              <td>{{ $consultations->created_at->diffForHumans() }}</td>
                              <div class="modal fade bd-example-modal-sm{{ $consultations->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Terminer La Consultation De&nbsp;{{ $consultations->patient->nom }}&nbsp;{{ $consultations->patient->prenom }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{ route('update.consultation',['consultation'=>$consultations->id]) }}" method="post">

                                                @csrf
                                                <input type="hidden" value="put" name="_method">

                                                @if ($consultations->status==0)
                                                <label for="status">Valider Consultation</label>
                                                <input type="checkbox" name="status" value="1" class=" @error('status') is-invalid @enderror">
                                                @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                                @else
                                                    <h5 style="text-align: center;font-weight:bold;font-style:italic">Consultation Termin&eacute;</h5>
                                                @endif
                                        </div>

                                        <div class="modal-footer">
                                            @if($consultations->status==0)
                                                <button type="submit" class="btn btn-primary">Terminer</button>
                                            @else
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>

                                          @endif
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                              <td>
                                 <button  style="margin: 3%" type="button" class="text-white btn btn-rounded btn-primary" data-toggle="modal" data-target="#example-lg{{ $consultations->id }}" data-item-id="1"><span class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                 </span>voir</button>
                                 <a type="button" class="text-white btn btn-rounded btn-secondary" href="{{ route('add.prescription',$consultations->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-pencil color-info"></i>
                                 </span>Prescrire</a>
                              </td>
                           </tr>
                           <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg{{ $consultations->id }}">
                              <div class="modal-dialog modal-lg ">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title">INFORMATION DE LA CONSULTATION</h5>
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                          <div class="col-md-7">
                                             <h4>PATIENT : {{ $consultations->patient->nom }} &nbsp;{{ $consultations->patient->prenom }} </h4>
                                             <h4>TENSION : {{ $consultations->tension }} Mmhg</h4>
                                             <h4>POID : {{ $consultations->poid }} KG</h4>
                                             <h4>TAILLE : {{ $consultations->taille }} m</h4>
                                             <h4>ANTECEDANT : {{ $consultations->antecedant }}</h4>
                                             <h4>ACTIVITE QUOTDIENNE : {{ $consultations->activite }}</h4>
                                             <h4>IMC(Indice De Masse Corporelle) : <?php $tailles= (float)$consultations->taille * (float) $consultations->taille

                                             ?>
                                              {{ $consultations->poid/$tailles }}
                                            </h4>
                                          </div>
                                          <div class="col-md-5">
                                             <h4>MOTIFS CONSULTATIONS: {!! html_entity_decode( $consultations->motif ) !!}
                                             </h4>
                                             <h4>DIAGNOSTIQUE : {{ $consultations->diagnostique }}</h4>
                                             <h4>EST-IL ALLERGIQUE? :
                                                @if ($consultations->allergie==0)
                                                non
                                                @else
                                                oui
                                                @endif
                                             </h4>
                                             @if($consultations->allergie==0)
                                             @else
                                             <h4>ALLERGIE : {{ $consultations->add_allergie }}</h4>
                                             @endif
                                          </div>
                                          <div class="col-4"></div>
                                          <div class="col-7">
                                             <h6 style="text-decoration: underline">RESPONSABLE CONSULTATION : {{ $consultations->responsable }}</h6>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <h6>DATE DE CREATION : {{ $consultations->created_at->diffForHumans() }}</h6>
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
@stop
