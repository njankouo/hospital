<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pharmacie Application</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/icon.css') }}">
    <link rel="stylesheet"
        href="https://pixinvent.com/materialize-material-design-admin-template/app-assets/vendors/vendors.min.css">
    <style>
        .loader {
            position: fixed;

            height: 100%;
            width: 100%;
            padding-left: 10%;
            margin: 0 auto;
            z-index: 99999;
            padding-top: 60%;
        }
    </style>

    <style>
        body {
            cursor: pointer;
        }
    </style>

<body>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu bg-indigo">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <x-nav />
            <div class="ui-theme-settings">
                <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                    <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
                </button>
                <div class="theme-settings__inner">
                    <div class="scrollbar-container">
                        <div class="theme-settings__options-wrapper">
                            <h3 class="themeoptions-heading">

                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                    data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>

                    <x-aside />
                </div>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">

                                </div>
                                {{-- <div class="loader">


                                    <img src="{{ asset('img/bureau.gif') }}" alt="">
                                </div> --}}
                                {{-- <div class="page-title-actions">

                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-cog fa-w-20"></i>
                                            </span>
                                            parametre
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="" class="nav-link">
                                                        <i class="fa fa-eye"></i>
                                                        <span>
                                                            profile
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="" class="nav-link">
                                                        <i class="fa fa-edit"></i>
                                                        <span>
                                                            update profil
                                                        </span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        @yield('contenu')

                    </div>
                </div>


                <script src="{{ asset('js/materialize.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
                <script src="{{ mix('js/app.js') }}"></script>

                {{-- <script>
                    $(function() {

                        setTimeout(() => {
                            $(".loader").fadeOut(500);
                        }, 300);
                    })
                </script> --}}
                @include('sweetalert::alert')
                <script>
                    // Or with jQuery

                    $(document).ready(function() {
                        $('select').formSelect();
                    });
                </script>
</body>

</html>
