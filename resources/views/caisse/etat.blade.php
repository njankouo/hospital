<!DOCTYPE html>
<html lang="en">

<head>
    <title>ETATS DES VENTES JOURNALIERES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-size: 15px
        }

        thead>tr>th {
            text-align: center;
            padding: 5px;
        }



        .container {
            border: 1px solid #000;
        }

        .logo {
            width: 18%;
            margin-right: 2%;
            height: 33%;
            margin-top: 10px;
        }

        #inventory-invoice {
            padding: 20px;
        }

        #inventory-invoice a {
            text-decoration: none ! important;
        }



        .invoice header {
            padding: 10px 0;
            margin-bottom: 8px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            text-align: center;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 30px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 90%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 10px
        }

        .invoice table td,
        .invoice table th {
            padding: 10px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 300;
            font-size: 10px;
            border: 1px solid #fff;
        }

        .invoice table td {
            border: 1px solid #fff;
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 300;
            color: #3989c6;
            font-size: 5px;
        }


        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.2em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 90%;
            text-align: center;
            color: #777;
            font-size: 6px;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row text-center">

            <img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents('img/logo.jpg')); ?>" style="float: right;" class="logo">

            <h6><strong>CENTRE MEDICO-CHIRURGICAL D'UROLOGIE</strong></h6>
            <h6>VALLEE MANGA BELL DOUALA-BALI</h6>
            <h6>TEL: (+ 237) 233 423 389 / 674 068 988 / 698 873 945</h6>
            <h6>
                DATE DELIVRANCE: {{ \Carbon\Carbon::now() }}
            </h6>
        </div>


        <div id="inventory-invoice">

            <div class="invoice overflow-auto">
                <div>
                    <h4 style="text-align: center;margin-top:0px;"> ETATS DES VENTES:
                        {{ $carbon->format('Y-m-d') }}</h4>

                    <main>

                        <hr>
                        <table class="table my-4 text-center" id="example"
                            style="margin-left: 35px;text-align:center">
                            <thead class="text-dark">
                                <tr>



                                    <th>DESIGNATION</th>
                                    <th>QTE</th>
                                    <th>UNITE</th>
                                    <th>PU</th>
                                    <th>REMISE</th>
                                    <th>CLIENT</th>
                                    <th>REGLEMENT</th>
                                    <th>MONTANT TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total=0 @endphp
                                @foreach ($etat as $etats)
                                    @if ($etats->date_vente != $carbon->format('Y-m-d'))
                                    @elseif($etats->stat == 'non')
                                        @php $total+= $etats->pu * $etats->qte_sortie * (1 - $etats->remise / 100) @endphp
                                        <tr>


                                            <td>{{ $etats->produit->designation }}</td>
                                            <td>{{ $etats->qte_sortie }}</td>
                                            <td>{{ $etats->unite }}</td>
                                            <td>{{ $etats->pu }}</td>
                                            <td>{{ $etats->remise }}</td>
                                            <td>{{ $etats->client }}</td>
                                            <td>{{ $etats->reglement }}</td>
                                            <td>
                                                {{ $etats->pu * $etats->qte_sortie * (1 - $etats->remise / 100) }}

                                            </td>


                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <p
                                        style="text-color:black;float: right;font-style:italic;text-decoration:underline">
                                        LE MONTANT TOTAL EST

                                        : {{ $total }}</p>
                                </tr><br><br>
                                <tr>
                                    <p style="float: left;font-style:italic"> LE MONTANT EST
                                        EXPRIMé EN FCFA
                                    </p>
                                </tr>

                            </tfoot>
                            </tbody>
                        </table>

                    </main>



                    <footer style="font-size: 8px">
                        Centre Medico-churirgical d'urologie situé a la Vallée Douala Manga Bell
                        Douala-Bali.
                        TEL: (+ 237) 233 423 389 / 674 068 988 / 698 873 945.
                        SITE WEB: http://www.cmcu-cm.com
                    </footer>
                </div>
            </div>
        </div>




</body>

</html>
