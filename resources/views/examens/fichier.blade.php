<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche examen medical</title>
</head>

<style>

    h6{
        font-size:13px;
        line-height: 5px;
    }

    * {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 700px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

</style>
<body>

<header>
    <div style="font-weight:bold" class="card">
        <h6>Nom: {{ $patient->patient->nom }}&nbsp; {{ $patient->patient->prenom }}</h6>
        <h6>Nom: {{ $patient->patient->adresse }}</h6>
        <h6>Nom: {{ $patient->patient->telephone }}</h6>
    </div>
</header>
<hr style="background-color: #009879; ">
<main>
  <h5 style="text-align: center;font-weight:bold;text-decoration:underline">Informations Examens M&eacute;dical</h5>

<table  class="content-table" style="text-align: center">
    <thead>
        <th>Date Examen</th>
        <th>Examen M&eacute;dical</th>
        <th>Prescrit Par</th>
    </thead>
    <tbody>
        <tr>
            <td>{{ $patient->date_examen }}</td>
            <td>{{ $patient->examen }}</td>
            <td>{{ $patient->responsable }}</td>
        </tr>
    </tbody>
</table>

<table  class="content-table" style="text-align: center">
    <thead>

        <th>Observations Apres examens</th>
    </thead>
    <tbody>
        <tr>

            <td>{{ $patient->observation }}</td>
        </tr>
    </tbody>
</table>

<table  class="content-table" style="text-align: center">
    <thead>

        <th>Traitements Recommand&eacute;s Apres examens</th>
    </thead>
    <tbody>
        <tr>

            <td>{{ $patient->traitement }}</td>
        </tr>
    </tbody>
</table>
</main>

<footer>
    <h5 style="float:right;font-weight:bold">Examen R&eacute;alis&eacute; par:</h5>
</footer>

</body>
</html>
