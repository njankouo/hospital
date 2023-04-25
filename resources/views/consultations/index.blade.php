<script>
    function check(elem){
        if(elem.selectedIndex==2){
            document.getElementById('other-medoc').style.display='none';
            document.getElementById("other-div").style.display='block';
        }
        if(elem.selectedIndex==1){
            document.getElementById("other-div").style.display='none';
            document.getElementById('other-medoc').style.display='block';
        }
    }
</script>

<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    i:hover{
       transform:scale(1.5);
    }
 </style>
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
                  {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i>Consultation</button>
                  --}}
                  <a type="button" class="btn btn-primary" style="-webkit-animation: pulse 1s infinite"  data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus fa-2x text-white" ></i></a>

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
                                    <input type="text" class="form-control" placeholder="responsable consultation" value="{{ auth()->user()->name??'' }}" name="responsable">
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
                                    <input type="radio" name="allergie" id="yourBox" value="1"> OUI&nbsp;&nbsp;
                                    <input type="radio" name="allergie" id="yourcheck " value="0"> NON
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

                                <a type="button" href="{{ route('update.consultation',$consultations->id) }}" class="btn btn-secondary btn btn-rounded">
                                <i class="fa fa-archive"></i></a>

                               </td>
                              <td>{{ $consultations->responsable }}</td>
                              <td>{{ $consultations->patient->nom }}</td>
                              <td>{{ $consultations->diagnostique }}</td>
                              <td>{{ $consultations->created_at->diffForHumans() }}</td>

                              <td>
                                 {{-- <button  style="margin: 3%" type="button" class="text-white btn btn-rounded btn-primary" data-toggle="modal" data-target="#example-lg{{ $consultations->id }}" data-item-id="1"><span class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                 </span>voir</button> --}}
                                 <button type="button"   class="btn btn-rounded text-white btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $consultations->id }}"><i class="fa fa-eye text-white"></i> </button>
                                 <button type="button"   class="btn btn-rounded text-white btn-warning" data-toggle="modal" data-target="#exampleModalCenter{{ $consultations->id }}"><i class="fa fa-calendar text-white"></i> </button>

                                 {{-- <a type="button" class="text-white btn btn-rounded btn-secondary" href="{{ route('add.prescription',$consultations->id) }}"><span class="btn-icon-left text-info"><i class="fa fa-pencil color-info"></i>
                                 </span>Prescrire</a> --}}
                                 <button  type="button"  class="btn btn-rounded btn-secondary" data-toggle="modal" data-target="#exampleModalpopover{{ $consultations->id }}"><i class="fa fa-book text-white"></i> </button>
                                 <a  class="btn btn-rounded btn-warning" href="{{ route('fichier.consultation',$consultations->id) }}"  data-toggle="tooltip" data-placement="top" title="fichier consultation"><i class="fa fa-file text-white"></i> </a>

                              </td>
                           </tr>
                           <div class="modal fade" id="exampleModalCenter{{ $consultations->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Definir Un RDV Pour:{{ $consultations->patient->nom }} &nbsp;{{ $consultations->patient->prenom }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('rdv.consultation') }}" method="post">
                                            @csrf
                                        <label for="date">Date RDV</label>
                                        <input type="datetime-local" name="date" id="date" class="form-control">
                                        <label for="end">Fin RDV</label>
                                        <input type="datetime-local" class="form-control" name="end_date">
                                        <label for="motif">Motif</label>
                                        <input type="text" name="motif" class="form-control" placeholder="motif du Rdv...">
                                        <label for="responsable">Suivi Par</label>
                                        <input type="text" value="{{ auth()->user()->name ??''}}" class="form-control" readonly name="responsable">
                                        <label for="code">Code Consultation</label>
                                        <input type="text" name="code" id="" class="form-control" value="{{ $consultations->id }}" readonly>
                                        <label for="code_patient">Code Patient</label>
                                        <input type="text" class="form-control" name="patient_id" value="{{ $consultations->patient_id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                           <div class="modal fade" id="exampleModalpopover{{ $consultations->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Prescription Pour {{ $consultations->patient->nom }} &nbsp;{{ $consultations->patient->prenom }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('add.presciption') }}"  enctype="multipart/form-data">
                                            @csrf

                                        <label for="patient">Code Patient</label>
                                        <input type="text" class="form-control" value="{{ $consultations->patient_id }}" readonly name="patient_id">
                                        <label for="responsable">Responsable Prescription</label>
                                        <input type="text" name="responsable" id="" class="form-control" name="responsable" value="{{ auth()->user()->name??'' }}">
                                        <label for="element">Element A Prescrire</label>
                                        <select  id="mySelect" class="form-control" onChange="check(this);">
                                            <option>Prescription Medicale</option>
                                            <option value="medecin">Prescription Medicament</option>
                                            <option value="autre">Autre</option>
                                            <option value="examen medicaux">Prescription Examen Medicaux</option>
                                            <option value="therapie">Prescription De Thérapie</option>
                                            <option value="Regime Alimentaire">Prescription Regime Alimentaire</option>
                                        </select>
                                        <div id="other-div" style="display: none">
                                            <label for="dispositif">Dispositif</label>
                                            <input type="text" class="form-control" name="dispositif" placeholder="Preciser Le Dispositif A Prescrire...">
                                        </div>

                                        <div id="other-medoc" style="display: none">
                                            <label for="Medicament">Medicaments</label>
                                            <select class="multi-select select2-hidden-accessible" name="medicament[]" multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true" >

                                                <optgroup label="selectionnez les medicaments">
                                                    @foreach ($produit as $produits)


                                                <option value="{{ $produits->designation }}<br/><br/>">{{ $produits->designation }}</option>
                                                @endforeach

                                                <label for="reponsable">Posologie</label>

                                                <select multiple>

                                                        <optgroup label="Selectionnez la posologie" >
                                                                <option value="1 CPx3/j <br/><br/>">1 CPx3/j</option>
                                                                <option value="1 CPx2/j <br/><br/>">1 CPx2/j</option>
                                                                <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                                                <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                                            </optgroup>
                                                        </select>



                                                <label for="qte">Quantite</label>
                                                <select id="remain-open" data-select2-id="remain-open" tabindex="-1" class="multi-select select2-hidden-accessible" aria-hidden="true" multiple name="qte[]">

                                                    <option value="1 BOITE<br/><br/>">1 BOITE</option>
                                                    <option value="2 BOITE<br/><br/>">2 BOITE</option>
                                                    <option value="3 BOITE<br/><br/>">3 BOITE</option>
                                                </select>
                                        </div>
                                        <label for="code">Code Consultation</label>
                                        <input type="text" value="{{ $consultations->id }}" class="form-control" readonly>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                    </div>

                                </form>
                                </div>
                            </div>
                        </div>
                           <div class="modal fade" id="exampleModalLong{{ $consultations->id }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Consulation {{ $consultations->patient->nom }} &nbsp;{{ $consultations->patient->prenom }}</h5>
                                          <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="card"  style="border: white;background-color:rgb(118, 181, 184)">
                                          <div class="card-body text-center text-white">Coordonn&eacute;es  Personnelles</div>

                                        </div>
                                        <div class="col-12">
                                      <b> Nom:&nbsp;{{ $consultations->patient->nom }}</b>
                                      <br>
                                      <b> Date De Naissance:&nbsp;{{ $consultations->patient->date }}</b>
                                      <br>
                                      <b> Adresse:&nbsp;{{ $consultations->patient->adresse }}</b>
                                      <br>
                                      <b> Telephone:&nbsp;{{ $consultations->patient->telephone }}</b>
                                      <br>
                                      <b> Profession:&nbsp;{{ $consultations->patient->profession }}</b>
                                      <br>
                                      <b> Sexe:&nbsp;
                                         @if ( $consultations->patient->sexe==1)
                                        Masculin

                                      @else
                                      Feminin
                                      @endif
                                    </b>
                                      </div>
                                      <div class="card"  style="border: white;background-color:rgb(118, 181, 184)">
                                        <div class="card-body text-center text-white">Ant&eacute;c&eacute;dants</div>
                                    </div>
                                        <div class="col-12">
                                            <b>Antecedants Churirgicaux: {{ $consultations->antecedant_churirgicaux }}</b>
                                            <br>
                                            <b>Antecedants Medicaux:{{ $consultations->antecedant }}</b>
                                            <br>
                                            <b>Antecedants Familliaux: {{$consultations->antecedant_familliale }}</b>
                                        </div>
                                        <div class="card"  style="border: white;background-color:rgb(118, 181, 184)">
                                            <div class="card-body text-center text-white">Informations Supplementaires</div>
                                        </div>
                                        <div class="row">
                                        <div class="col-6">
                                            <b>Allergies: {{ $consultations->add_allergie }}</b>
                                            <br>
                                            <b>Poid: {{ $consultations->poid }} Kg</b>
                                        </div>
                                            <div class="col-6">
                                                <b>Taille: {{ $consultations->taille }}  Cm</b>
                                            <br>
                                            <b>Tension: {{ $consultations->tension }}</b>
                                            <br>
                                            <b>IMC(Indice De Masse Corporelle) : <?php $tailles= (float)$consultations->taille * (float) $consultations->taille

                                                ?>
                                                 {{ $consultations->poid/$tailles }}</b>
                                        </div>
                                          </div>
                                          <div class="card"  style="border: white;background-color:rgb(118, 181, 184)">
                                            <div class="card-body text-center text-white">Observation</div>
                                        </div>
                                        <div class="col-12">
                                            <b>{{ $consultations->note }}</b>
                                        </div>
                                    </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

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
    <script>
        document.getElementById('yourBox').onchange = function() {
        document.getElementById('yourText').disabled = !this.checked;
        document.getElementById('yourcheck').disabled = this.checked;
    };

    </script>

@stop
