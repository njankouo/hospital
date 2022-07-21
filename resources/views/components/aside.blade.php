<div class="scrollbar-sidebar bg-indigo">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading" style="font-weight:bold;font-style:italic;color:beige">GESTION PHARMACIE
            </li>
            <li>
                <a class="mm-active" href="/" style="text-decoration:none">
                    <i class="	fa fa-dashboard fa-3x metismenu-icon pe-7s-display2"></i>
                    Dashboard
                </a>
            </li>

            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-bookmark-o fa-3x"></i> COMMANDES
                </li>
                <li>
                    <a style="color:cornflowerblue">
                        <i class="fa fa-plus-square"></i>
                        commandes produits

                    </a>
                    <ul>

                        <li>
                            <a href="{{ route('commande') }}" style="text-decoration:none;color:cornflowerblue">
                                <i class="metismenu-icon"></i>
                                commandes chez fournisseurs
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('liste.commande') }}" style="text-decoration:none;color:cornflowerblue">
                                <i class="metismenu-icon">
                                </i>details commandes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('livraison') }}" style="text-decoration:none;color:cornflowerblue">
                                <i class="metismenu-icon">
                                </i>livraisons
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="fa fa-fire fa-2x"></i> Utilisateur
                </li>
                <li>
                    <a href="{{ route('role.liste') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-users"></i>
                        nos Utilisateurs
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="fa fa-tags fa-3x"></i>PRODUITS
                </li>
            @endcan
            @can('utilisateur')
                <li>
                    <a href="{{ route('type.liste') }}" style="text-decoration: none;color:cornflowerblue">
                        <i class="	fa fa-external-link">
                        </i>Conditionnement
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li>
                    <a href="{{ route('rayon.index') }}" style="text-decoration: none;color:cornflowerblue">
                        <i class="fa fa-medkit">
                        </i>Rayon Des Produits
                    </a>
                </li>
                {{-- <li>
                <a href="{{ route('type.liste') }}" style="text-decoration: none;color:cornflowerblue">
                    <i class="fa fa-medkit">
                    </i>type produits
                </a>
            </li> --}}
                <li>
                    <a href="{{ route('categorie.liste') }}" style="text-decoration: none;color:cornflowerblue">
                        <i class="fa fa-medkit">
                        </i>forme galelique produits
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li>
                    <a href="{{ route('produit.list') }}" style="text-decoration: none;color:cornflowerblue">
                        <i class="fa fa-area-chart">
                        </i>stocks des produits
                    </a>
                </li>
            @endcan
            @can('admin')
                <li>
                    <a href="{{ route('produit.list') }}" style="text-decoration: none;color:cornflowerblue">
                        <i class="fa fa-area-chart">
                        </i>stocks des produits
                    </a>
                </li>
            @endcan

            @can('utilisateur')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="fa fa-cart-plus fa-3x"></i>Ventes
                </li>
            @endcan
            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="fa fa-cart-plus fa-3x"></i>Ventes
                </li>
            @endcan
            @can('utilisateur')
                <li>
                    <a style="color:cornflowerblue;text-decoration: none" href="{{ route('vente') }}">
                        <i class="fa fa-handshake-o">
                        </i>Ventes Des produits
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li>
                    <a style="color:cornflowerblue;text-decoration:none" href="{{ route('liste.vente') }}">
                        <i class="fa fa-ellipsis-h">
                        </i>Details des Ventes
                    </a>
                </li>
            @endcan
            @can('admin')
                <li>
                    <a style="color:cornflowerblue;text-decoration:none" href="{{ route('liste.vente') }}">
                        <i class="fa fa-ellipsis-h">
                        </i>Details des Ventes
                    </a>
                </li>
            @endcan
            {{-- <li>
                <a style="color:cornflowerblue;text-decoration:none" href="">
                    <i class="fa fa-user-md">
                    </i>Ventes Suspendues
                </a>
            </li> --}}
            @can('admin')
                <li>
                    <a style="color:cornflowerblue;text-decoration:none" href="{{ route('chart') }}"> <i
                            class="fa fa-line-chart">
                        </i>Statistique des Ventes
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li>
                    <a style="color:cornflowerblue;text-decoration:none" href="{{ route('chart') }}"> <i
                            class="fa fa-line-chart">
                        </i>Statistique des Ventes
                    </a>
                </li>
            @endcan
            {{-- <li>
                <a style="color:cornflowerblue">
                    <i class="fa fa-user-md">
                    </i>Facture
                </a>
            </li> --}}
            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-child fa-3x"></i>CLIENTS
                </li>
                <li>
                    <a href="{{ route('client.liste') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-users">
                        </i>
                        nos Clients
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-child fa-3x"></i>CLIENTS
                </li>
                <li>
                    <a href="{{ route('client.liste') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-users">
                        </i>
                        nos Clients
                    </a>
                </li>
            @endcan
            {{-- @endcan --}}
            {{-- @can('utilisateur') --}}


            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="fa fa-fire fa-2x"></i>Fournisseurs
                </li>
                <li>
                    <a href="{{ route('contrat') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-users">
                        </i>
                        Contrats
                    </a>
                    <a href="{{ route('fournisseur.liste') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-users">
                        </i>
                        nos Fournisseurs
                    </a>
                </li>
            @endcan
            {{-- @endcan --}}
            @can('utilisateur')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-server fa-3x"></i>&nbsp;&nbsp;Caisses
                </li>
                <li>
                    <a href="{{ route('caisse.index') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-industry">
                        </i>
                        Etats Des Caisses
                    </a>
                </li>
            @endcan
            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-exclamation-circle fa-3x"></i>&nbsp;&nbsp;aide
                </li>
                <li>
                    <a href="{{ route('infos') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-info-circle">
                        </i>
                        Info application
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-exclamation-circle fa-3x"></i>&nbsp;&nbsp;aide
                </li>
                <li>
                    <a href="{{ route('infos') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-info-circle">
                        </i>
                        Info application
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
