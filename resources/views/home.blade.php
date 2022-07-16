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
            {{-- @elseif ($produits->date_peremption < $produits->date_fabrication)
            <div class="row">

                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>alert!</strong> {{ $produits->designation }} est arrivé à expiration veuillez remplacer


                </div> --}}
        @endif
    @endforeach

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Produits</div>
                        <div class="widget-subheading">inventaire</div>
                    </div>
                    <div class="widget-content-right mx-3">
                        <div class="widget-numbers text-white "><span>{{ $produit->count() }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Clients</div>
                        <div class="widget-subheading">Total Clients </div>
                    </div>
                    <div class="widget-content-right mx-3">
                        <div class="widget-numbers text-white"><span>{{ $client->count() }}</span></div>
                    </div>
                </div>
            </div>
        </div>
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
        @can('admin')
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-primary">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">nombre total utilisateurs</div>
                            <div class="fa fa-users fa-2x">users</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $user->count() }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-warning">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Produit commandés</div>
                        <div class="fa fa-list fa-2x"></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $commande->count() }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>$14M</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endcan --}}
@endsection
