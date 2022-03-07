<div class="scrollbar-sidebar bg-indigo">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a class="mm-active" href="/">
                    <i class="fas fa-home metismenu-icon pe-7s-display2"></i>
                    Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">COMMANDES</li>
            <li>
                <a>
                    <i class="fa fa-plus-square"></i>
                    commandes produits

                </a>
                <ul>
                    <li>
                        <a href="">
                            <i class="metismenu-icon"></i>
                            Buttons
                        </a>
                    </li>
                    <li>
                        <a href="elements-navigation.html">
                            <i class="metismenu-icon">
                            </i>Navigation Menus
                        </a>
                    </li>
                    <li>
                        <a href="elements-utilities.html">
                            <i class="metismenu-icon">
                            </i>Utilities
                        </a>
                    </li>
                </ul>
            </li>


            <li class="app-sidebar__heading">Utilisateur</li>
            <li>
                <a href="{{ route('role.liste') }}">
                    <i class="fas fa-users metismenu-icon pe-7s-display2"></i>
                    nos Utilisateurs
                </a>
            </li>
            <li class="app-sidebar__heading">PRODUITS</li>
            <li>
                <a href="{{ route('type.liste') }}" style="text-decoration: none">
                    <i class="fa fa-medkit">
                    </i>type produits
                </a>
            </li>
            <li>
                <a href="{{ route('categorie.liste') }}" style="text-decoration: none">
                    <i class="fa fa-medkit">
                    </i>categorie de produits
                </a>
            </li>
            <li>
                <a href="{{ route('produit.list') }}" style="text-decoration: none">
                    <i class="fa fa-medkit">
                    </i>nos produits
                </a>
            </li>
            <li>
                <a>
                    <i class="fa fa-area-chart">
                    </i>stocks des produits
                </a>
            </li>
            <li>
                <a>
                    <i class="fa fa-dollar">
                    </i>Tarification des produits
                </a>
            </li>
            <li class="app-sidebar__heading">PAIEMENTS</li>
            <li>
                <a>
                    <i class="fa fa-user-md">
                    </i>Achats Des produits
                </a>
            </li>
            <li class="app-sidebar__heading">CLIENTS</li>
            <li>
                <a href="{{ route('client.liste') }}" style="text-decoration:none">
                    <i class="fas fa-users">
                    </i>
                    nos Clients
                </a>
            </li>
            <li class="app-sidebar__heading">Fournisseurs</li>
            <li>
                <a href="{{ route('fournisseur.liste') }}" style="text-decoration:none">
                    <i class="fas fa-users">
                    </i>
                    nos Fournisseurs
                </a>
            </li>
        </ul>
    </div>
</div>
