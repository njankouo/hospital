<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Module Centre De Sante </li>
            <li><a class="" href="{{ route('home') }}" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Tableau De Bord</span></a>

            </li>
            <li class="nav-label">Gest. Utilisateurs</li>
            <li><a class="" href="{{ route('users') }}" ><i
                        class="fa fa-users"></i><span class="nav-text">Utilisateurs</span></a>

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
                      <li><a href="{{route('examen')}}">Examens Medicaux</a></li>
                      <li><a href="{{route('dossier')}}">Dossiers Medicaux</a></li>
                </ul>
            </li>
            <li class="nav-label">Ventes</li>
            {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="icon icon-shopping_cart_checkout"></i><span class="nav-text">Ventes Produits</span></a> --}}
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">   <span class="material-symbols-outlined">
                    shopping_cart_checkout
                    </span><span class="nav-text">Ventes Produits</span></a>
                <ul aria-expanded="false">
            <li><a href="{{ route('ventes') }}">Nouvelle Vente</a></li>
            <li><a href="{{ route('ventes.produits') }}">Details Des Ventes</a></li>
        </ul>
    </li>
            {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-plug"></i><span class="nav-text">Services</span></a>
                <ul aria-expanded="false">
                    <li><a href="./uc-select2.html">Liste Des Services</a></li>
                    <li><a href="{{ route('chambres') }}">Liste Des Chambres</a></li>
                </ul>
            </li> --}}


            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-form"></i><span class="nav-text">Chambres</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('chambres') }}">Liste Des Chambres</a></li>
                     </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-layout-25"></i><span class="nav-text">Consultations</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('consultations') }}">Consultations M&eacute;dicales</a></li>
                    <li><a href="{{ route('ordonance.view') }}">Ordonnances</a></li>
                   <li><a href="table-datatable-basic.html">Op&eacute;ration M&eacute;dicale</a></li>
                    <li><a href="{{ route('hospitalisation') }}">Hospitalisations</a></li>

                </ul>
            </li>

            <li class="nav-label">Caisse</li>
            <li><a class="" href="{{ route('caisse') }}" aria-expanded="false"><i
                        class="icon icon-single-copy-06"></i><span class="nav-text">Paiements</span></a>

            </li>


         <li><a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                <i class="fa fa-close"></i>
                                <span class="ml-2"> Deconnexion</span>

         </a>
        </li>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </ul>


    </div>


</div>
