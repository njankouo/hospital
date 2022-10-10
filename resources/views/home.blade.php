{{-- @extends('layouts.app') --}}

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<link rel="stylesheet" href="{{ asset('css/icon.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(2500000, 0).slideUp(400, function() {
            $(this).remove();
        });
    }, 4000);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
@extends('layouts.master')
@section('contenu')
    @can('admin')
        @foreach ($contrat as $contrats)
            @if ($contrats->date_debut >= $contrats->date_fin)
                <div class="row">

                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>alert!</strong> le contrat du fournisseur {{ $contrats->fournisseur->nom }}
                        est arrivé à
                        expriration!
                    </div>
                </div>
            @endif
        @endforeach
    @endcan
    @can('admin')
        @foreach ($produit as $produits)
            @if ($produits->qtestock < $produits->stock_seuil)
                <div class="row">

                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>alert!</strong> la quantité en stock {{ $produits->designation }} est très basse
                        veuillez passer la commande

                    </div>
                </div>
            @endif
        @endforeach
        @foreach ($produit as $produits)
            @if ($produits->date_peremption < $produits->date_fabrication)
                <div class="row">

                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>alert!</strong> {{ $produits->designation }} est arrivé à expiration veuillez remplacer


                    </div>
            @endif
        @endforeach
    @endcan

    @can('admin')
        {{-- @foreach ($produit as $produits)
            @if ($produits->qtestock < $produits->stock_seuil)
                <div class="row">

                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>alert!</strong> la quantité en stock {{ $produits->designation }} est très basse
                        veuillez passer la commande

                    </div>
                </div>
            @endif
        @endforeach --}}
        @foreach ($produit as $produits)
            @if ($produits->date_peremption < $produits->date_fabrication)
                <div class="row">

                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>alert!</strong> {{ $produits->designation }} est arrivé à expiration veuillez remplacer


                    </div>
            @endif
        @endforeach
    @endcan
    @can('admin')
        <div class="row">

            <div id="card-stats" class="pt-0">
                <div class="row">
                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card orange gradient-45deg-light-blue-cyan gradient-shadow min-height-100 black-text animate fadeLeft">
                            <div class="padding-4">
                                <div class="row">
                                    <div class="col s7 m7">
                                        <i class="material-icons background-round mt-5">crop_free
                                        </i>
                                        <p>Totals</p>
                                    </div>
                                    <div class="col s5 m5 right-align">
                                        <h5 class="mb-0 white-text">{{ $produit->count() }}</h5>
                                        <p class="no-margin">Produits</p>
                                        <p>inventaire</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card blue gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                            <div class="padding-4">
                                <div class="row">
                                    <div class="col s7 m7">
                                        <i class="material-icons background-round mt-5">perm_identity</i>
                                        <p>Clients</p>
                                    </div>
                                    <div class="col s5 m5 right-align">
                                        <h5 class="mb-0 white-text">{{ $client->count() }}</h5>
                                        <p class="no-margin">totals</p>
                                        <p>Nombre Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card indigo gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                            <div class="padding-4">
                                <div class="row">
                                    <div class="col s7 m7">
                                        <i class="material-icons background-round mt-5">timeline</i>
                                        <p>Services</p>
                                    </div>
                                    <div class="col s5 m5 right-align">
                                        <h5 class="mb-0 white-text">{{ $service->count() }}</h5>
                                        <p class="no-margin">Totals</p>
                                        <p>Nombre Services</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card green gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                            <div class="padding-4">
                                <div class="row">
                                    <div class="col s7 m7">
                                        <i class="material-icons background-round mt-5">portrait</i>
                                        <p>Utilisateurs</p>
                                    </div>
                                    <div class="col s5 m5 right-align">
                                        <h5 class="mb-0 white-text">{{ $user->count() }}</h5>
                                        <p class="no-margin">Total</p>
                                        <p>Nombre Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        {{-- <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total ventes</div>
                        <div class="widget-subheading">vente effectuées</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $vente->count() }}</span></div>
                    </div>
                </div>
            </div>
        </div> --}}

    @endsection
