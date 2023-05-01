<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fichier De Consultation</title>
     <style>
        .card{
            border: 1px solid rgb(37, 8, 56);

        }
    </style>
</head>
<body>
    <div style="width:50%;border:2px">


<hr style="background-color: rgba(0, 0, 255, 0.904)">

  <h5 style="font-weight:bold;margin-left:3px">Nom: &nbsp;&nbsp;&nbsp;{{ $consultation->patient->nom }} &nbsp;{{ $consultation->patient->prenom }}</h5>
  <h5 style="font-weight:bold;margin-left:3px">Telephone:&nbsp;&nbsp;&nbsp; {{ $consultation->patient->telephone }} </h5>
  <h5 style="font-weight:bold;margin-left:3px">Adresse:&nbsp;&nbsp;&nbsp; {{ $consultation->patient->adresse }} </h5>
  <h5 style="font-weight:bold;margin-left:3px">Profession:&nbsp;&nbsp;&nbsp;{{ $consultation->patient->profession }} </h5>
<hr style="background-color: rgba(0, 0, 255, 0.822)">
</div>

<div style="width:50%;border:2px">
    <h5>Suivi Par:{{ $consultation->responsable }}</h5>
    <h5>Date:{{ $consultation->created_at}}</h5>
</div>
            <H3 style="font-weight: bold;text-align:center;">FICHE DE CONSULTATION</H3>

    <div class="card">


        <h3 style="font-weight: bold;text-align:center;">MOTIFS DE CONSULTATION</h3>


    </div>
    <h5 style="text-align: center;text-transform:uppercase;margin-top:3%">
        {{ $consultation->motif }}
    </h5>
    <div class="card" style="margin-top: 3%">


        <h3 style="font-weight: bold;text-align:center;">ANTECEDANTS</h3>


    </div>
    <h5 style="text-align: center">
        ANTECEDANTS FAMILLIAUX:&nbsp;{{ $consultation->antecedant_familliale }}

    </h5>
    <h5 style="text-align: center">
        ANTECEDANTS CHIRURGICAUX:&nbsp;{{ $consultation->antecedant_churirgicaux }}
    </h5>
    <h5 style="text-align: center">
        ANTECEDANTS MEDICAUX:&nbsp;{{ $consultation->antecedant }}
    </h5>
    <div class="card" style="margin-top:3%">
        <h3 style="text-align:center">SYMPTOMES ACTUELLES</h3>
    </div>
        <h5 style="text-align: center;font-weight:bold;text-transform:uppercase">{{ $consultation->symptomes }}</h5>
    <div class="card" style="margin-top:3%">
        <h3 style="text-align:center">MEDICAMENTS PRISES ACTUELLEMENT</h3>
    </div>
    <h5 style="text-align: center;font-weight:bold;text-transform:uppercase">{{ $consultation->medicaments }}</h5>
    <div class="card" style="margin-top:3%">
        <h3 style="text-align:center">RESULTATS D'EXAMENS ANTERIEURS</h3>
    </div>
   <h5 style="text-align: center;font-weight:bold;text-transform:uppercase">{{ $consultation->resultats }}</h5>
    <div class="card" style="margin-top:3%">
        <h3 style="text-align:center">DIAGNOSTIQUE</h3>
    </div>

    <h5 style="text-align: center;font-weight:bold;text-transform:uppercase">{{ $consultation->diagnostique }}</5>
</body>
</html>
