<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dossier M&eacute;dical</title>
</head>
<style>
    .card{
        border: 1px solid white;
        border-radius: 5px;
        margin: 5px;
        width: 50%;
        background-color: rgba(0, 0, 255, 0.658);
        color: white;
    }

    h5{
        margin: 15px;
    }
    h4{
        text-align: center;
        font-weight:bold;

    }
    h6{
        font-weight:bold;
        text-align: center;
        font-style: italic;
        margin-top: none;
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

</style>
<body>

    <div class="card">
        <h5>Nom:&nbsp;{{ $patient->nom }}</h5>
        <h5>Prenom:&nbsp;{{ $patient->prenom }}</h5>
        <h5>Adresse:&nbsp;{{ $patient->adresse }}</h5>
        <h5>Telephone:&nbsp;{{ $patient->telephone }}</h5>
    </div>

        <h4>Dossier M&eacute;dical</h4>
        <hr style="border:1px solid blue;">
        <h6>Centre M&eacute;dico-chirurgical d'urologie</h6>
        <h4 style="text-align: center;font-weight:bold;text-decoration:underline">Ant&eacute;cedants</h4>
        <table class="content-table">
            <thead>
                <th>Ant&eacute;cedants Chirurgical</th>
                <th>Ant&eacute;cedants Familliaux</th>
                <th>Ant&eacute;cedants M&eacute;dicaux</th>
            </thead>
            <tbody>
                <tr>

                     {{-- <td>{{ $patient->consultation->antecedant_churirgicaux }}</td> --}}




                </tr>
            </tbody>
        </table>
</body>
</html>
