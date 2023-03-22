
@extends('layouts.app')

@section('contenu')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css"/>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Utilisateurs </div>
                            <div class="stat-digit"> {{App\Models\User::count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Produits Pharmaceutiques</div>
                            <div class="stat-digit">{{ App\Models\Produit::count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Chambres</div>
                            <div class="stat-digit"> {{ \App\Models\Chambre::count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Patients</div>
                            <div class="stat-digit"> {{ App\Models\Patient::count() }}</div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>


            {{-- @foreach ($produit as $produits)
@if($produits->qteStock<=$produits->qteSeuil)
<div class="alert alert-danger"><strong>Alert!</strong> {{ $produits->designation }} en rupture de stock</div>
@endif
@endforeach --}}
            <!-- /# column -->
        </div>
   <div class="row">
                  <div class="col-12">
                        
                                <div id="calendar" >
                                  
                                </div>
                           
                            </div>

   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/lang-all.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime: '8:00:00',
            slotMaxTime: '19:00:00',
            locale: 'fr',
            navLinks: true,
            editable: true,
          
            events: @json($events),
        });
        calendar.render();
    });
</script>


@endsection

