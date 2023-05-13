<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat M&eacute;dical D'aptitude</title>
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
CERTIFICAT M&Eacute;DICAL D'APTITUDE
</h5>
    </header>
    <hr style="background-color: blue">
    <h6 style="font-weight:bold;font-style:italic; text-align:center;margin:5px;">CENTRE M&Eacute;DICO-CHIRURGICAL D'UROLOGIE</h6>
    <h6 style="font-weight:bold;font-style:italic; text-align:center;margin:5px;">SITUÉ A DOUALA-CAMEROUN</h6>
    <h6 style="font-weight:bold;font-style:italic; text-align:center;margin:5px;">CONTACTS: +237................</h6>


    <main style="margin: 25px;">
        <p style="font-family: inherit;">
        Je soussigné(e) ....................................., docteur en médecine, certifie par la présente que {{ $patient->nom }} &nbsp;{{ $patient->prenom }}, né(e) le {{ $patient->date }} et résidant à {{ $patient->adresse }}, est apte à pratiquer l'activité physique ou sportive suivante : ...................................

        Après examen médical complet, je n'ai relevé aucune contre-indication à la pratique de cette activité. Le patient présente un état de santé satisfaisant et est en mesure de pratiquer cette activité en toute sécurité.

        Ce certificat est valable pour une durée de ................................. à compter de la date de sa délivrance.
    </p>
     <p>Fait à ........, le {{ \Carbon\Carbon::now() }}.</p>

    <p style="float: right">Signature et cachet du médecin.</p>
    </main>
    <footer>

    </footer>

</body>
</html>
