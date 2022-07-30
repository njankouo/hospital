<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>


<div class="app-header__content">
    <div class="app-header-left">
        <div class="search-wrapper">
            <div class="input-holder">
                <input type="text" class="search-input" placeholder="Type to search">
                <button class="search-icon"><span></span></button>
            </div>
            <button class="close"></button>
        </div>
        <ul class="header-menu nav">
            @can('admin')
                <li class="nav-item">
                    <a href="{{ route('chart') }}" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                        Statistics
                    </a>
                </li>
            @endcan
            {{-- <li class="btn-group nav-item">
                <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-link-icon fa fa-edit"></i>
                    Projects
                </a>
            </li> --}}
            @can('admin')
                <li class="dropdown nav-item">
                    <a href="{{ route('changePassword') }}" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>
            @endcan
            @can('utilisateur')
                <li class="dropdown nav-item">
                    <a href="{{ route('changePassword') }}" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>
            @endcan
            <li class="dropdown nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-link-icon fa fa-diamond"></i>
                    {{ auth()->user()->role->nom ?? 'vous n\'avez aucun role affecté' }}
                </a>
            </li>
        </ul>
    </div>

    <div class="app-header-right">
        <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                <img width="42" class="rounded" src="{{ asset('img/pharma.jpg') }}" alt="">
                                <i class="fa fa-angle-down ml-2 opacity-8 text-light"></i>
                            </a>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu dropdown-menu-right">
                                <h6 tabindex="-1" class="dropdown-header">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        deconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left  ml-3 header-user-info">
                        <div class="widget-heading nav-link">
                            {{ auth()->user()->nom ?? 'qui ete vous?' }}

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
