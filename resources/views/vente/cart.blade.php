@extends('layouts.master')


@section('contenu')
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif

                    <div class="flex-1">

                        <div class="card">
                            <div class="card-title">
                                <div>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-primary my-4" style="float: right;margin-right:15px;">vider
                                            le tableau</button>
                                    </form>
                                </div>
                                <a class="btn btn-primary my-4 text-light mx-2" href="{{ route('group.facture') }}">
                                    <i class="fa fa-print"></i> Grenerer la facture
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="w-full text-sm lg:text-base table table-bordered" cellspacing="0">
                                    <thead>
                                        <tr class="h-12 uppercase">

                                            <th class="text-left">produit</th>
                                            <th class="pl-5 text-left lg:text-right lg:pl-0">
                                                QTE
                                            </th>
                                            <th class="pl-5 text-left lg:text-right lg:pl-0">
                                                UNITE
                                            </th>
                                            <th class="hidden text-right md:table-cell"> pu</th>
                                            <th class="hidden text-right md:table-cell"> remise</th>
                                            <th class="hidden text-right md:table-cell"> Total </th>
                                            <th class="hidden text-right md:table-cell"> supprimer </th>
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
                                                        <p class="mb-2 md:ml-4">{{ $item->price }}</p>

                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <p class="mb-2 md:ml-4">{{ $item->attributes->remise }}</p>

                                                    </a>
                                                </td>

                                                <td class="hidden text-right md:table-cell">
                                                    <span class="text-sm font-medium lg:text-base">


                                                        {{ $item->price * $item->quantity * (1 - $item->attributes->remise / 100) }}
                                                    </span>
                                                </td>
                                                <td class="hidden text-right md:table-cell">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button
                                                            class="px-4 py-2 text-white bg-red-600 btn btn-danger">x</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="card-footer bg-primary">
                            {{-- <div>
                                <p class="text-light"> Total: {{ Cart::getTotal() }}</p>
                            </div> --}}

                            <div>
                                <p class="text-light">LE MONTANT TOTAL DE CETTE FACTURE EST DE:
                                    {{ $total }} FRANC
                                    CFA</p>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
