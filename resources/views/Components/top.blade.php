<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        {{-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span> --}}
                        {{-- <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div> --}}
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                            <div class="pulse-css"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="list-unstyled">
                                <li class="media dropdown-item">
                                    <span class="success"><i class="ti-user"></i></span>
                                    <div class="media-body">
                                        <a href="#">
                                            <p><strong>ToTal </strong> Des <strong>Patients</strong> Hospitalis&eacute;
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">{{ \App\Models\Patient::count() }}</span>
                                </li>
                                <li class="media dropdown-item">
                                    <span class="primary"><i class="ti-shopping-cart"></i></span>
                                    <div class="media-body">
                                        <a href="#">
                                            <p><strong>Total </strong>Des Commandes Annul&eacute;es</p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                <li class="media dropdown-item">
                                    <span class="danger"><i class="ti-bookmark"></i></span>
                                    <div class="media-body">
                                        <a type="button"  href="{{ route('rdv.annule') }}">
                                            <p><strong>Rendez-Vous</strong>  <strong>Annul&eacute;es</strong>
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                <li class="media dropdown-item">
                                    <span class="primary"><i class="ti-heart"></i></span>
                                    <div class="media-body">
                                        <a href="#">
                                            <p><strong>Ventes</strong> Annul&eacute;es</p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                                {{-- <li class="media dropdown-item">
                                    <span class="success"><i class="ti-image"></i></span>
                                    <div class="media-body">
                                        <a href="#">
                                            <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li> --}}
                            </ul>
                            <a class="all-notification" href="#">Quitter <i
                                    class="ti-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>{{ Auth()->user()->name??'' }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile') }}" class="dropdown-item">
                                <i class="icon-user pulse-css"></i>

                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="./email-inbox.html" class="dropdown-item">
                                <i class="icon-envelope-open"></i>
                                <span class="ml-2">Inbox </span>
                            </a>




                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                                        <i class="icon-key"></i>
                                                        <span class="ml-2"> Deconnexion</span>

                                 </a>



                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
