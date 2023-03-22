<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Module Centre De Sante </li>
            <li><a class="has-arrow" href="{{ route('home') }}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Tableau De Bord</span></a>

            </li>
            <li class="nav-label">Gest. Utilisateurs</li>
            <li><a class="has-arrow" href="{{ route('users') }}" ><i
                        class="icon icon-app-store"></i><span class="nav-text">Utilisateurs</span></a>

            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Produits Pharmaceutiques</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('formes') }}">formes Galleliques</a></li>
                    <li><a href="{{ route('conditionnements') }}">Conditionnements</a></li>
                    <li><a href="{{ route('familles') }}">Famille Des Produits</a></li>
                    <li><a href="{{ route('produits') }}">Produits</a></li>
                    <li><a href="{{ Route('commandes') }}">Commandes</a></li>
                    <li><a href="{{ route('add.livraisons') }}">Livraisons</a></li>
                </ul>
            </li>
            <li class="nav-label">Patients</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-world-2"></i><span class="nav-text">Gest. Patients</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('patient') }}">Liste Des Patients</a></li>
                    {{-- <li><a href="./ui-alert.html">Dossiers Pateints</a></li> --}}
                    <li><a href="{{route('rdv.view')}}">Rendez-Vous</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-plug"></i><span class="nav-text">Services Centre Sante</span></a>
                <ul aria-expanded="false">
                    <li><a href="./uc-select2.html">Liste Des Services</a></li>
                    <li><a href="{{ route('chambres') }}">Liste Des Chambres</a></li>
                </ul>
            </li>


            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-form"></i><span class="nav-text">Chambres</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('chambres') }}">Liste Des Chambres</a></li>
                     </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-layout-25"></i><span class="nav-text">Consultations</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('consultations') }}">Liste Des Consultations</a></li>
                    <li><a href="{{ route('ordonance.view') }}">Ordonnances</a></li>
                    <li><a href="table-datatable-basic.html">Examens</a></li>
                    <li><a href="{{ route('hospitalisation') }}">Hospitalisations</a></li>

                </ul>
            </li>

            <li class="nav-label">Caisse</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-single-copy-06"></i><span class="nav-text">Plages Horaires</span></a>
                <ul aria-expanded="false">
                    <li><a href="./page-register.html">Register</a></li>
                    <li><a href="./page-login.html">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="./page-error-400.html">Error 400</a></li>
                            <li><a href="./page-error-403.html">Error 403</a></li>
                            <li><a href="./page-error-404.html">Error 404</a></li>
                            <li><a href="./page-error-500.html">Error 500</a></li>
                            <li><a href="./page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
