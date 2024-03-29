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
                <div class="card-header">
                    <p style="font-family: forte">valider une nouvelle commande</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('command') }}" method="POST" class="form-block">
                        @csrf
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">Date Commande</label>
                                <input type="date" class="my-2 form-control @error('date') is-invalid @enderror"
                                    name="date" placeholder="Enter ..." value="{{ $commande->date_commande }}" readonly>
                                @error('date')
                                    <p>{{ $message }}</p>
                                @enderror
                                <label for="">Date Livraison</label>
                                <input type="date" class="my-2 form-control @error('dateLivraison') is-invalid @enderror"
                                    name="dateLivraison" value="{{ $commande->date_livraison }}" readonly>
                                @error('dateLivraison')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for=""> Code Commande</label>
                                <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                    id="inputSuccess" placeholder="Enter ..." name="code"
                                    value="{{ $commande->id }}"readonly>
                                @error('code')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-6">
                                <label for="">produits</label>
                                <select name="produit" id=""
                                    class="my-2 @error('produit') is-invalid @enderror produit"
                                    style="border-color: indigo">
                                    <option value="">.....</option>
                                    @foreach ($produit as $produits)
                                        <option value="{{ $produits->id }}">{{ $produits->designation }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('produit')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col s6">
                                <label for="">Fournisseur</label>
                                <select id="" class="my-2  @error('fournisseur') is-invalid @enderror"
                                    name="fournisseur" value="{{ $commande->fournisseur_id }}" readonly>
                                    <option value="">.....</option>
                                    @foreach ($fournisseur as $fournisseurs)
                                        @if ($commande->fournisseur_id == $fournisseurs->id)
                                            <option value="{{ $fournisseurs->nom }}" selected>{{ $fournisseurs->nom }}
                                            @else
                                            <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('fournisseur')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">unite </label>
                                <select name="unite" id="" class="@error('unite') is-invalid @enderror">
                                    <option value="">.....</option>
                                    @foreach ($type as $types)
                                        <option value="{{ $types->nom }}">{{ $types->nom }}</option>
                                    @endforeach

                                </select>
                                @error('unite')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="col-6">
                                <label for="">****tva</label>
                                <input type="number" class="my-2 form-control" value="{{ $commande->id }}"
                                    name="tva" style="border-color: indigo">
                                @error('produit')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-6">
                                <label for="">prix unitaire </label>
                                <input type="number" class="form-control @error('pu')  @enderror pu" name="pu"
                                    style="border-color: indigo">
                                @error('pu')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">quantite</label>
                                <input type="number" class="form-control @error('qte')  @enderror" name="qte"
                                    style="border-color: indigo">
                                @error('qte')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for=""> Mode de reglement</label>
                                <select class="" name="mode">
                                    <optgroup label="choose paiement">
                                        <option value="">.....</option>
                                        <option value="mobile">mobile(MTN/ORANGE...)</option>
                                        <option value="espece">espèce</option>
                                        <option value="autre">autre....</option>
                                    </optgroup>
                                </select>

                            </div>
                            <div class="col-6">
                                <label for="">status commande</label>
                                <input type="text" class="form-control my-2 @error('status') is-invalid @enderror"
                                    name="status" value="encours" readonly>
                                @error('status')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-8 my-4">
                                <button type="submit" class="btn btn-primary mx-1">valider la commande</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-dark"></div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.produit', function() {
                var prod_id = $(this).val();
                var a = $(this).parent();
                $.ajax({
                    type: 'get',
                    url: "{{ route('charger.price') }}",

                    data: {
                        'id': prod_id
                    },
                    dataType: 'json',

                    success: function(data) {
                        // console.log("pv");
                        // console.log(data);
                        //  a.find('.pu').val(data.pv)
                        //jquery('.pu').html(data);
                        $(".pu").val(data.pu);
                    },
                    error: function() {


                    }
                });
            });
        });

        $(document).ready(function() {
            $('.datepicker').datepicker();

        });
    </script>
@endsection
