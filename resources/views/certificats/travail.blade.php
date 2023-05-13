<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat M&eacute;dical D'arret de Travail</title>
</head>
<style>
p{
    word-spacing: 3px;
    line-height: 30px;
}
h5{
    text-align: center;
    font-weight:bold;

}
</style>
<body>
    <header>
<h5>
CERTIFICAT M&Eacute;DICAL D'ARRET DE TRAVAIL
</h5>
    </header>
    <hr style="background-color: blue">
    <h6 style="font-weight:bold;font-style:italic; text-align:center;margin:5px;">CENTRE M&Eacute;DICO-CHIRURGICAL D'UROLOGIE</h6>
    <h6 style="font-weight:bold;font-style:italic; text-align:center;margin:5px;">SITUÉ A DOUALA-CAMEROUN</h6>
    <h6 style="font-weight:bold;font-style:italic; text-align:center;margin:5px;">CONTACTS: +237................</h6>


    <main style="margin: 25px;">
        <p style="font-family: inherit;">
            Je soussigné(e) ............................., docteur en médecine, certifie par la présente que {{ $patient->nom }} &nbsp;{{ $patient->prenom }}, né(e) le {{ $patient->date }} et résidant à {{ $patient->adresse }}, est dans l'incapacité temporaire de travailler en raison d'une maladie ou d'un accident.

            Le patient a été examiné(e) le {{ \Carbon\Carbon::now() }} et présente les symptômes suivants : .............................................................. En conséquence, il/elle est dans l'impossibilité de travailler pour une durée de ................................................. à compter du ......................

            Le patient est autorisé(e) à reprendre son travail à partir du [date de fin de l'arrêt de travail] sous réserve que son état de santé le permette.

            Ce certificat est délivré à titre indicatif et ne peut en aucun cas engager la responsabilité du médecin.

        </p>
     <p>Fait à ........, le {{ \Carbon\Carbon::now() }}.</p>

    <p style="float: right">Signature et cachet du médecin.</p>
    </main>
    <footer>

    </footer>

</body>
</html>
