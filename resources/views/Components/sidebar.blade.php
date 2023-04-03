<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
            <li class="nav-label">Gest. Produits</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Produits En Stock</span></a>
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

                    <li><a href="{{route('rdv.view')}}">Rendez-Vous</a></li>
                      <li><a href="{{route('examen')}}">Autres Examens</a></li>
                </ul>
            </li>
            <li class="nav-label">Ventes</li>
            {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="icon icon-shopping_cart_checkout"></i><span class="nav-text">Ventes Produits</span></a> --}}
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">   <span class="material-symbols-outlined">
                    shopping_cart_checkout
                    </span><span class="nav-text">Ventes Produits</span></a>
                <ul aria-expanded="false">
            <li><a href="{{ route('ventes') }}">Liste Des Ventes</a></li>

        </ul>
    </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-plug"></i><span class="nav-text">Services</span></a>
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
                        class="icon icon-single-copy-06"></i><span class="nav-text">Payements</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('caisse') }}">Paiements Consultations </a></li>
                    <li><a href=""></a></li>
                </ul>
            </li>
            <i class="icon icon-exit"></i> <li class="nav-label">Deconnexion</li>
        </ul>


    </div>


</div>
