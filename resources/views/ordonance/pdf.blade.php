<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordonance Medicale Ou Prescription M&eacute;dicales</title>
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
    {{-- <section style="width:100%;height:3%">
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
    </section> --}}
    <header>

    <h6>Nom: {{ $ordonance->patient->nom }}</h6>
    <h6>Telephone: {{ $ordonance->patient->telephone }}</h6>
    <h6>Adresse: {{ $ordonance->patient->adresse }}</h6>

        @if (isset($ordonance->examen))
        <h4 style="text-align: center;text-decoration:underline">
            Examen M&eacute;dical
        </h4>
        @else
        <h4 style="text-align: center;text-decoration:underline">
            Ordonance M&eacute;dicale
        </h4>
        @endif
<hr style="background-color: blue">
<h6 style="text-align: center;font-weight:bold;font-style:italic;margin:0px">centre m&eacute;dico-chirurgical d'urologie</h6>
<h6 style="text-align: center;font-weight:bold;font-style:italic;margin:0px">Douala-Cameroun</h6>
<h6 style="text-align: center;font-weight:bold;font-style:italic;margin:0px">+237 .........</h6>


    {{-- {!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!} --}}
</header>
    <section>

        @if (isset($ordonance->examen))
        <div style="text-align:center">
        <h5>Type D'examen M&eacute;dical: {{ $ordonance->examen }}</h5>
   </div>
        @else
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
        @endif


       <p style="text-align: right;color:black; font-weight:bold"> Prescrite Par :{{ $ordonance->responsable }}</p>
    </section>
<footer style="margin-bottom: 0">
    <p style="color:dimgrey;">{{ Carbon\Carbon::now() }}</p>


</footer>
</body>
</html>
