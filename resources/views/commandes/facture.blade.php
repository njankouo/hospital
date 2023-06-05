<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
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
footer {
                position: fixed;
                bottom: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }
            td{
                padding: 10px;
            }
</style>
<body>

    <header style="display:flex; align-items: stretch;">
    <div class="card">
        <h5>Centre M&eacute;dico-chirurgical d'urologie</h5>
        <h5>Urologie@gmail.com</h5>
        <h5>6999........./677777....</h5>
        <h5>Douala-Cameroun</h5>
    </div>

</header>
        <h4 style="font-weight:bold">Bon De Commande</h4>
        <hr style="border:1px solid blue;">
        <h6>Centre M&eacute;dico-chirurgical d'urologie</h6>
        <h4 style="text-align: center;font-weight:bold;text-decoration:underline"></h4>
        <table class="content-table" style="text-align: center">
            <thead>
                <th>Désignation</th>
                <th>Quantite</th>
                <th>Conditionnement</th>
                <th>Prix Unitaire</th>
            </thead>
            <tbody>

            <tr>
                {{-- <?php  dd($proforma)?> --}}



                <td>{{ $proforma->produit->designation }}</td>
                <td>{{ $proforma->qte }}</td>
                <td>{{ $proforma->conditionnement_id }}</td>
                <td>{{ $proforma->pu }}</td>
            </tr>

            </tbody>
        </table>
         <hr style="border:1px solid blue;">

        <footer>
            Copyright &copy; <?php echo date("Y");?>
        </footer>

</body>
</html>
