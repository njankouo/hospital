
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
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-time text-success border-success"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Patients</div>
                                <div class="stat-digit"> {{ App\Models\Patient::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-user text-primary border-primary"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Utilisateurs</div>
                                <div class="stat-digit">{{App\Models\User::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-layout-grid2 text-pink border-pink"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Rendez-Vous</div>
                                <div class="stat-digit">{{ \App\Models\RDV::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-one card-body">
                            <div class="stat-icon d-inline-block">
                                <i class="ti-link text-danger border-danger"></i>
                            </div>
                            <div class="stat-content d-inline-block">
                                <div class="stat-text">Produits phar..</div>
                                <div class="stat-digit">{{ App\Models\Produit::count() }}</div>
                            </div>
                        </div>
                    </div>
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

