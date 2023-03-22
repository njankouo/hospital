<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordonance Medicale</title>
    <style>


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
</head>
<body>
    <section style="width:100%;height:3%">
     Hopital Central
     <img src="{{ public_path('images/images.png') }}" style="width: 100px; height: 100px;float:right">

    </section>
    <section style="width:50%;height:3%">
        Adresse: Foulassi
       </section>
       <section style="width:50%;height:3%">
        E-mail: Hopital@Foulassi.com
       </section>
    <section style="width:50%;height:3%">
     BP:63
    </section>

    <h4 style="text-align: center;text-decoration:underline"> ORDONANCE MEDICALE</h4>
    <p style="color:dimgrey;margin:1%;text-align:right">{{ $ordonance->patient->nom }} &nbsp;{{ $ordonance->patient->prenom }}</p>
    <section>
        <table class="content-table" style="text-align: center">
            <thead>
              <tr>

                <th>Medicaments</th>
                <th>Quantite</th>
                <th>Posologie</th>

              </tr>
            </thead>
            <tbody>
              <tr>

                <td>{!! html_entity_decode($ordonance->medicament) !!}</td>
                <td>{!! html_entity_decode($ordonance->qte) !!}</td>
                <td>{!! html_entity_decode($ordonance->dosage) !!}</td>

              </tr>
            </tbody>
        </table>

       <p style="text-align: right;color:dimgrey;"> Prescrite Par :{{ $ordonance->responsable }}</p>
    </section>
<footer style="margin-bottom: 0">
    <p style="color:dimgrey;">{{ Carbon\Carbon::now() }}</p>
</footer>
</body>
</html>
