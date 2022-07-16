@extends('layouts.master')

@section('contenu')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <a href="{{ route('group.facture') }}" class="btn btn-primary text-light" style="float: right;">
        <i class="fa fa-print"></i>
        generer la facture
    </a>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Produit</th>
                <th style="width:10%">pu</th>
                <th style="width:8%">qte</th>
                <th style="width:8%">unite</th>
                <th style="width:8%">remise</th>
                <th style="width:22%" class="text-center">total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total +=  $details['pu'] * $details['qte_sortie'] * (1 - $details['remise'] / 100) @endphp
                    <tr data-id="{{ $id }}">
                        <td>{{ $details['produit_id'] }}</td>
                        <td>{{ $details['pu'] }}</td>
                        <td>{{ $details['qte_sortie'] }}</td>
                        <td>{{ $details['unite'] }}</td>
                        <td>{{ $details['remise'] }}</td>
                        <td data-th="Subtotal" class="text-center">
                            {{ $details['pu'] * $details['qte_sortie'] * (1 - $details['remise'] / 100) }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Total {{ $total }}</strong></h3>
                </td>
            </tr>
            <tr>

            </tr>
        </tfoot>
    </table>
    <h3>les remises sont exprimés en pourcentage</h3>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("voulez vous retirer cette vente?")) {
                $.ajax({
                    url: '{{ route('remove.vente') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection

{{-- @section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection --}}
