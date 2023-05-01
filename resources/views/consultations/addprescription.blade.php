@extends('layouts.master')

@section('title','prescription medicale')

@section('contenu')
{{-- <div class="modal fade" id="consultation{{ $consultations->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body"> --}}
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
                                <li class="breadcrumb-item"><a href="{{ route('consultations') }}">Consultations</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Prescription</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Acceuil</a></li>
                             </ol>
                          </div>
                       </div>
                       <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-title">
                                   <h5 style="font-style: italic;font-weight:bold"> Prescription Pour {{ $consultations->patient->nom }} &nbsp;{{ $consultations->patient->prenom }}
                                </h5>
                                </div>

                                <div class="card-body">



                <form method="post" action="{{ route('add.presciption') }}">
                    @csrf

                <label for="patient">Code Patient</label>
                <input type="text" class="form-control" value="{{ $consultations->patient_id }}" readonly name="patient_id">
                <label for="responsable">Responsable Prescription</label>
                <input type="text" name="responsable" id="" class="form-control" name="responsable" value="{{ auth()->user()->name??'' }}">
                <label for="element">Element A Prescrire</label>
                <select  id="mySelect" class="form-control" onChange="check(this);">
                    <option selected>Prescription Medicale</option>
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
                    <select  name="medicament[]" multiple id="countries" >

                        <optgroup label="selectionnez les medicaments">


                        @foreach ($produit as $produits)
                        <option value="{{ $produits->designation }}<br/><br/>">{{ $produits->designation }}</option>
                       @endforeach
                        </optgroup>
                    </select>
                     <label for="reponsable">Posologie</label>

                     <select   id="dosage" multiple name="dosage[]">



                                        <option value="1 CPx3/j <br/><br/>">1 CPx3/j</option>
                                        <option value="1 CPx2/j <br/><br/>">1 CPx2/j</option>
                                        <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>
                                        <option value="1 GELx3/j <br/><br/>">1 GELx3/j</option>

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

            <div class="card-footer">

                <button type="submit" class="btn btn-primary" style="float: right;">Valider</button>
            </div>

        </form>
        {{-- </div> --}}
    </div>
</div>
</div>
</div>
</div>

</div>
    </div>
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@stop
