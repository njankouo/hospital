<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produits En Stock</title>
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

    <h4 style="text-align: center;text-decoration:underline"> Liste Des Prduits Pharmaceutiques En Stock</h4>
    <p style="color:dimgrey;margin:1%;text-align:right"></p>
    <section>
        <table class="content-table" style="text-align: center">
            <thead>
              <tr>

                <th >Designation</th>
                <th>Equivalence</th>

                <th>Qte seuil</th>
                <th>Qte Stock</th>
                <th >Conditionnement</th>
                <th>Prix Unitaire</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($produit as $produits)


                <tr>



                    <td>{{ $produits->designation }}</td>
                    <td>{{ $produits->equivalence }}</td>
                    <td>{{ $produits->qteSeuil }}</td>
                    <td>{{ $produits->qteStock }}</td>
                    <td>{{ $produits->conditionnement->libelle }}</td>
                    <td>
                       {{ $produits->pu }}
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>

       <p style="text-align: right;color:dimgrey;"> Imprim&eacute; Par :{{ auth()->user()->name }}</p>
    </section>
<footer style="margin-bottom: 0">

</footer>
</body>
</html>
