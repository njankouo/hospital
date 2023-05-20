<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche examen medical</title>
</head>

<style>
    .card{
        border: 1px solid white;
        background-color: rgba(0, 0, 255, 0.747);
        border-radius: 10px;
        width: 50%;
        color: white;
    }
    h6{
        font-size:13px;
    }
</style>
<body>

<header>
    <div style="font-weight:bold" class="card">
        <h6>Nom: {{ $patient->patient->nom }}</h6>
        <h6>Adresse: {{ $patient->adresse }}</h6>
        <h6>Date Naissance: {{ $patient->date_naissance }}</h6>
    </div>
</header>

<main>
  <h5 style="text-align: center;font-weight:bold;text-decoration:underline">Resultat Examen M&eacute;dical</h5>

<table>
    <thead>
        <th>Date Examen</th>
        <th>Observation</th>
    </thead>
</table>

</main>

<footer></footer>

</body>
</html>
