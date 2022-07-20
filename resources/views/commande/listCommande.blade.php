<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    text: 'Impirmer le document',
                    exportOptions: {
                        modifier: {
                            selected: null
                        }
                    }
                },
                {
                    extend: 'print',
                    text: 'Imprimer les elements selectionnés'
                }
            ],
            select: true
        });
    });
</script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="h{{ asset('js/dataTables.select.min.js') }}"></script>
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
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des commandes effectuées</h3>

                </div>
                <div class=" card-body">
                    <a href="{{ route('cart') }} " class="btn btn bg-primary text-light"
                        style="float: right;margin-bottom:10px">
                        <i class="fa fa-cloud-upload text-light"></i>
                        Commandes Groupés
                    </a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="th-sm">code commande
                                </th>
                                <th class="th-sm">produit
                                </th>
                                <th class="th-sm">quantite

                                </th>
                                <th class="th-sm">unite

                                </th>
                                <th class="th-sm">pu</th>

                                <th class="th-sm">Date Commande
                                </th>
                                <th class="th-sm">Date Livraison
                                </th>
                                <th class="th-sm">Remise
                                </th>
                                <th class="th-sm">Reglement
                                </th>
                                <th class="th-sm">Status
                                </th>
                                <th class="th-sm">fournisseur
                                </th>



                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($command as $commandes)
                                @if ($commandes->status == 'validé')
                                @else
                                    <tr>
                                        <td>{{ $commandes->commande_id }}</td>
                                        <td>{{ $commandes->produit->designation }}</td>
                                        <td>{{ $commandes->qte }}</td>
                                        <td>{{ $commandes->unite }}</td>
                                        <td>{{ $commandes->pu }}</td>
                                        <td>{{ $commandes->date_commande }}</td>
                                        <td>{{ $commandes->date_livraison }}</td>
                                        <td>{{ $commandes->remise }}%</td>
                                        <td>{{ $commandes->reglement }}</td>
                                        <td>{{ $commandes->status }}</td>
                                        <td>{{ $commandes->fournisseur }}</td>

                                        <td>
                                            {{-- <a class="btn btn" href="{{ route('bon.commande', $commandes->id) }}"><i
                                                    class="fa fa-eye fa-2x text-info"></i></a> --}}
                                            <a href="{{ route('edit.commande', $commandes->id) }}" class="btn btn">
                                                <i class="fa fa-pencil fa-2x"></i>
                                            </a>
                                            {{-- <a href="{{ route('add.to.cart', $commandes->id) }}" class="btn btn">
                                                <i class="fa fa-cart-plus fa-2x text-warning"></i>
                                            </a> --}}
                                            <form action="{{ route('cart.add') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $commandes->id }}" name="id">
                                                <input type="hidden" value="{{ $commandes->produit->designation }}"
                                                    name="name">
                                                <input type="hidden" value="{{ $commandes->pu }}" name="pu">
                                                <input type="hidden" value="{{ $commandes->remise }}" name="remise">
                                                <input type="hidden" value="{{ $commandes->qte }}" name="qte">
                                                <input type="hidden" value="{{ $commandes->unite }}" name="unite">
                                                <input type="hidden" value="{{ $commandes->reglement }}"
                                                    name="reglement">
                                                <button
                                                    class="px-4 py-2 text-light bg-blue-800 rounded btn btn-primary">ajouter
                                                    facture
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
