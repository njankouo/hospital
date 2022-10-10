@extends('layouts.master')

@section('title', 'visualiser le profile')

@section('contenu')
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg-4 "style="margin-left:25%">
                <div class="card profile-card-2">
                    <div class="card-img-block">
                        @if (Auth()->user()->sexe == 'masculin')
                            <img class="img-fluid rounded-circle" src="{{ asset('img/lion.png') }}" alt="Card image cap"
                                style="width:45%;height:60%;margin-left:110px">
                        @else<img class="img-fluid rounded-circle" src="{{ asset('img/lien.png') }}"
                                alt="Card image cap" style="width:45%;height:60%;margin-left:110px">
                        @endif

                    </div>


                    <div class="card-body border-top border-light">
                        <div class="media align-items-center">
                            <div>
                                <h4 style="font-style: italic">NOM: </h4>
                            </div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p>{{ Auth()->user()->nom ?? 'reconnectez-vous' }}</p>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div>
                                <h4 style="font-style: italic">PRENOM: </h4>
                            </div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p>{{ Auth()->user()->prenom ?? 'reconnectez-vous' }}</p>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div>
                                <h4 style="font-style: italic">ROLE: </h4>
                            </div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    {{ Auth()->user()->role->nom ?? 'reconnectez-vous' }}
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div>
                                <h4 style="font-style: italic">TELEPHONE: </h4>
                            </div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    {{ Auth()->user()->telephone1 ?? 'reconnectez-vous' }}
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div>
                                <h4 style="font-style: italic">SEXE: </h4>
                            </div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    {{ Auth()->user()->sexe ?? 'reconnectez-vous' }}
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer bg-primary"></div>
            </div>



        </div>



    </div>
@stop
