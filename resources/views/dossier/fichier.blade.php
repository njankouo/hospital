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
        <h5>Nom:&nbsp;{{ $patient->nom }}</h5>
        <h5>Prenom:&nbsp;{{ $patient->prenom }}</h5>
        <h5>Adresse:&nbsp;{{ $patient->adresse }}</h5>
        <h5>Telephone:&nbsp;{{ $patient->telephone }}</h5>
    </div>

</header>
        <h4>Dossier M&eacute;dical</h4>
        <hr style="border:1px solid blue;">
        <h6>Centre M&eacute;dico-chirurgical d'urologie</h6>
        <h4 style="text-align: center;font-weight:bold;text-decoration:underline">Ant&eacute;cedants</h4>
        <table class="content-table" style="text-align: center">
            <thead>
                <th>Ant&eacute;cedants Chirurgicaux</th>
                <th>Ant&eacute;cedants Familliaux</th>
                <th>Ant&eacute;cedants M&eacute;dicaux</th>
            </thead>
            <tbody>
                @foreach ($consultation as $consultations)
                <tr>
                    <td>{{ $consultations->antecedant_churirgicaux }}</td>

                    <td>{{ $consultations->antecedant_familliale}}</td>
                    <td>{{ $consultations->antecedant}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr style="border:1px solid blue;">
        <h5 style="text-align: center; text-decoration:underline">Consultations M&eacute;dicales</h5>
        <table  class="content-table" style="text-align: center">
            <thead>
                <th>Date Consultation</th>
                <th>Motifs Consultations</th>
                <th>Symptomes</th>
                <th>Traitement Actuel</th>
                <th>diagnostiques</th>
                <th>Notes</th>
                <th>Suivi Par:</th>
            </thead>
            <tbody>
                @foreach ($consultation as $consultations)
                <tr>
                    <td>{{ $consultations->created_at }}</td>
                    <td>{{ $consultations->motif }}</td>
                    <td>{{ $consultations->symptomes }}</td>
                    <td>{{ $consultations->medicaments }}</td>
                    <td>{{ $consultations->diagnotique }}</td>
                    <td>{{ $consultations->note }}</td>
                    <td>{{ $consultations->responsable }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr style="border:1px solid blue;">
        <h5 style="text-align: center; text-decoration:underline">Prescriptions M&eacute;dicales M&eacute;dical</h5>
        <table  class="content-table" style="text-align: center">
            <thead>
                <th>Date Prescription</th>
                <th>Prescrit Par:</th>
                <th>M&eacute;dicaments/dispositifs Prescrits</th>
            </thead>
            <tbody>
                @foreach ($prescription as $prescriptions)


                <tr>
                    <td>{{ $prescriptions->created_at }}</td>
                    <td>{{ $prescriptions->responsable}}</td>
                    <td>
                        @if (!empty($prescriptions->dispositif))
                            {{ $prescriptions->dispositif }}
                        @else
                            {{ $prescriptions->medicament }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr style="border:1px solid blue;">
        <h5 style="text-align: center; text-decoration:underline">Rendez-vous M&eacute;dicaux</h5>
        <table  class="content-table" style="text-align: center">
            <thead>
                <th>Date Rendez-Vous</th>
                <th>Suivi Par:</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($rdv as $rdvs)


                <tr>
                    <td>{{ $rdvs->date }}</td>
                    <td>{{ $rdvs->user->name}}</td>
                    <td>
                        @if ($rdvs->status==1)
                            rendez-vous honor&eacute;
                        @else
                        rendez-vous non honor&eacute;
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr style="border:1px solid blue;">
        @if ($patient->examen_count)
        <h5 style="text-align: center; text-decoration:underline">Examens M&eacute;dicaux</h5>
        <hr style="border:1px solid blue;">
        <table  class="content-table" style="text-align: center">
            <thead>
                <th>Examen M&eacute;dical</th>
                <th>Date Examen</th>
                <th>Suivi Par:</th>

            </thead>
            <tbody>
                @foreach ($examen as $examens)
                <tr>
                    <td>{{ $hospitalisations->datedebut}}</td>
                    <td>{{ $hospitalisations->datefin}}</td>
                    <td>{{ $hospitalisations->responsable}}</td>
                    <td>{{ $hospitalisations->note}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
                @else
                @endif
            </tbody>
        </table>
        <h5 style="text-align: center; text-decoration:underline">Hospitalisations </h5>
        <table  class="content-table" style="text-align: center">
            <thead>
                <th>Date Hospitalisation(s)</th>
                <th>Date Sortie</th>
                <th>Suivi Par:</th>
                <th>Motfs Hospitalisations</th>
            </thead>
            <tbody>
                @foreach ($hospitalisation as $hospitalisations)


                <tr>
                    <td>{{ $hospitalisations->datedebut}}</td>
                    <td>{{ $hospitalisations->datefin}}</td>
                    <td>{{ $hospitalisations->responsable}}</td>
                    <td>{{ $hospitalisations->note}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <footer>
            Copyright &copy; <?php echo date("Y");?>
        </footer>

</body>
</html>
