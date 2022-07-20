@extends('layouts.master')

@section('contenu')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">


            <div class="card">
                <div class="card-title">
                    <a href="{{ route('facture.group') }}" class="btn btn-primary text-light my-4 mx-4"
                        style="float: right;">
                        <i class="fa fa-print"></i>
                        generer bon de commande
                    </a>
                    <form action="{{ route('clear.commande') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger text-light my-4 mx-2">
                            <i class=" fa fa-fire"></i> vider le tableau

                        </button>
                    </form>
                </div>
                <div class="card-body">


                    <table id="cart" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%">Produit</th>
                                <th style="width:10%">pu</th>
                                <th style="width:8%">qte</th>
                                <th style="width:8%">unite</th>
                                <th style="width:8%">remise</th>
                                <th style="width:8%">reglement</th>
                                <th style="width:22%" class="text-center">total</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $total = 0 @endphp
                            @foreach ($cartItems as $item)
                                @php $total +=  $item->price * $item->quantity * (1 - $item->attributes->remise / 100)  @endphp

                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                        </a>
                                    </td>
                                    <td class="hidden pb-4 md:table-cell">
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->price }}</p>

                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->quantity }}</p>

                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->attributes->unite }}</p>

                                        </a>
                                    </td>

                                    <td>
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->attributes->remise }}</p>

                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <p class="mb-2 md:ml-4">{{ $item->attributes->reglement }}</p>

                                        </a>
                                    </td>

                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm font-medium lg:text-base">


                                            {{ $item->price * $item->quantity * (1 - $item->attributes->remise / 100) }}
                                        </span>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>

                        <tr>
                            <td colspan="7" class="text-right">
                                <a href="{{ route('liste.commande') }}" class="btn btn-warning"><i
                                        class="fa fa-angle-left"></i>
                                    placer encore la
                                    commande
                                </a>

                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer bg-primary">
                    <h3 class="text-light"><strong>Total :{{ $total }}</strong></h3>
                </div>
            </div>

        </div>
    </div>
    <h3>les remises sont exprimés en pourcentage</h3>
@endsection
