<div class="scrollbar-sidebar bg-indigo">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading" style="font-weight:bold;font-style:italic;color:beige">GESTION PHARMACIE
            </li>
            <li>
                <a class="mm-active" href="/" style="text-decoration:none">
                    <i class="	fa fa-dashboard fa-3x metismenu-icon pe-7s-display2"></i> &nbsp;
                    Dashboard
                </a>
            </li>

            @can('admin')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="	fa fa-bookmark-o fa-3x"></i> &nbsp; COMMANDES
                </li>
                <li>
                    <a style="color:cornflowerblue">
                        <i class="fa fa-plus-square"></i> &nbsp;
                        commandes produits

                    </a>
                    <ul>

                        <li>
                            <a href="{{ route('commande') }}" style="text-decoration:none;color:cornflowerblue">
                                <i class="metismenu-icon"></i> &nbsp;
                                commandes chez fournisseurs
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('liste.commande') }}" style="text-decoration:none;color:cornflowerblue">
                                <i class="metismenu-icon">
                                </i> &nbsp;details commandes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('livraison') }}" style="text-decoration:none;color:cornflowerblue">
                                <i class="metismenu-icon">
                                </i> &nbsp;livraisons
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- @can('admin') --}}
            <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                <i class="fa fa-tags fa-3x"></i> &nbsp;PRODUITS
            </li>
            {{-- @endcan
            @can('admin') --}}
            <li>
                <a href="{{ route('type.liste') }}" style="text-decoration: none;color:cornflowerblue">
                    <i class="	fa fa-external-link">
                    </i> &nbsp;Conditionnement
                </a>
            </li>
            {{-- @endcan
            @can('admin') --}}
            <li>
                <a href="{{ route('rayon.index') }}" style="text-decoration: none;color:cornflowerblue">
                    <i class="fa fa-medkit">
                    </i> &nbsp;Rayon Des Produits
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
                    </i> &nbsp;formes galeniques produits
                </a>
            </li>
            {{-- @endcan
            @can('admin') --}}
            <li>
                <a href="{{ route('famille.home') }}" style="text-decoration: none;color:cornflowerblue">
                    <i class="fa fa-area-chart">
                    </i> &nbsp;Famille des produits
                </a>
            </li>
            {{-- @endcan
            @can('utilisateur') --}}
            <li>
                <a href="{{ route('produit.list') }}" style="text-decoration: none;color:cornflowerblue">
                    <i class="fa fa-area-chart">
                    </i> &nbsp;stocks des produits
                </a>
            </li>
            {{-- @endcan
            @can('admin') --}}
            {{-- <li>
                    <a href="{{ route('produit.list') }}" style="text-decoration: none;color:cornflowerblue">
                        <i class="fa fa-area-chart">
                        </i>stocks des produits
                    </a>
                </li> --}}
            {{-- @endcan --}}

            {{-- @can('utilisateur')
                <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                    <i class="fa fa-cart-plus fa-3x"></i>Ventes
                </li>
            @endcan --}}
            {{-- @can('admin') --}}
            <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                <i class="fa fa-cart-plus fa-3x"></i> &nbsp;Sorties Des Produits
            </li>
            {{-- @endcan
            @can('admin') --}}
            <li>
                <a style="color:cornflowerblue;text-decoration: none" href="{{ route('vente') }}">
                    <i class="fa fa-handshake-o">
                    </i> &nbsp;Création Des Sorties
                </a>
            </li>
            {{-- @endcan
            @can('admin') --}}
            <li>
                <a style="color:cornflowerblue;text-decoration:none" href="{{ route('liste.vente') }}">
                    <i class="fa fa-ellipsis-h">
                    </i> &nbsp;Details Des Ventes
                </a>
            </li>
            {{-- @endcan
            @can('admin') --}}
            <li>
                <a style="color:cornflowerblue;text-decoration:none" href="{{ route('show.service') }}">
                    <i class="fa fa-ellipsis-h">
                    </i> &nbsp;Sorties Des Services
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @can('admin')
                <li>
                    <a style="color:cornflowerblue;text-decoration:none" href="{{ route('liste.vente') }}">
                        <i class="fa fa-ellipsis-h">
                        </i>Details des Ventes
                    </a>
                </li>
            @endcan --}}
            {{-- <li>
                <a style="color:cornflowerblue;text-decoration:none" href="">
                    <i class="fa fa-user-md">
                    </i>Ventes Suspendues
                </a>
            </li> --}}
            {{-- @can('admin') --}}
            <li>
                <a style="color:cornflowerblue;text-decoration:none" href="{{ route('chart') }}"> <i
                        class="fa fa-line-chart">
                    </i> &nbsp;Statistique des sorties
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @can('utilisateur')
                <li>
                    <a style="color:cornflowerblue;text-decoration:none" href="{{ route('chart') }}"> <i
                            class="fa fa-line-chart">
                        </i>Statistique des Ventes
                    </a>
                </li>
            @endcan --}}
            {{-- <li>
                <a style="color:cornflowerblue">
                    <i class="fa fa-user-md">
                    </i>Facture
                </a>
            </li> --}}
            {{-- @can('admin') --}}
            <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                <i class="	fa fa-child fa-3x"></i> &nbsp;CLIENTS
            </li>
            <li>
                <a href="{{ route('client.liste') }}" style="text-decoration:none;color:cornflowerblue">
                    <i class="fa fa-users">
                    </i> &nbsp;
                    nos Clients
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @can('utilisateur')
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
            @endcan --}}
            {{-- @endcan --}}
            {{-- @can('utilisateur') --}}


            {{-- @can('admin') --}}
            <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                <i class="fa fa-fire fa-2x"></i> &nbsp;Fournisseurs
            </li>
            <li>
                <a href="{{ route('contrat') }}" style="text-decoration:none;color:cornflowerblue">
                    <i class="fa fa-users">
                    </i> &nbsp;
                    Contrats
                </a>
                <a href="{{ route('fournisseur.liste') }}" style="text-decoration:none;color:cornflowerblue">
                    <i class="fa fa-users">
                    </i> &nbsp;
                    nos Fournisseurs
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @endcan --}}
            @can('admin')
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
                    <i class="fa fa-fire fa-2x"></i> Utilisateur
                </li>
                <li>
                    <a href="{{ route('role.liste') }}" style="text-decoration:none;color:cornflowerblue">
                        <i class="fa fa-users"></i>
                        nos Utilisateurs
                    </a>
                </li>
            @endcan

            {{-- @can('admin') --}}
            <li class="app-sidebar__heading" style="color: whitesmoke;font-style:italic">
                <i class="	fa fa-exclamation-circle fa-3x"></i>&nbsp;&nbsp;Service CMCU
            </li>
            <li>
                <a href="{{ route('service.index') }}" style="text-decoration:none;color:cornflowerblue">
                    <i class="fa fa-info-circle">
                    </i>
                    Info sur service
                </a>
            </li>
            {{-- @endcan --}}
        </ul>
    </div>
</div>
