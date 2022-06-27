@extends('layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@section('contenu')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-family: forte">créer une nouvelle vente</p>

                </div>

                <div class="card-body">

                    <form action="{{ route('vente.index') }}" method="POST" class="form-block">
                        @csrf
                        <div class="form-row" style="margin: 10px;">


                            <div class="col-6">
                                <label for="">Date vente</label>
                                <input type="date" class="my-2 form-control @error('date_vente') is-invalid @enderror"
                                    name="date" placeholder="Enter ...">
                                @error('date_vente')
                                    <p>{{ $message }}</p>
                                @enderror
                                <label for="">responsable de la vente</label>
                                <select name="responsable" id=""
                                    class="form-control @error('responsable') is-invalid @enderror">
                                    <option value="">...........</option>
                                    @foreach ($user as $users)
                                        <option value="{{ $users->id }}">{{ $users->nom }}</option>
                                    @endforeach
                                </select>
                                @error('responsable')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">

                                <label for="">Nom du client</label>
                                {{-- <select id="" class="my-2 form-control @error('client') is-invalid @enderror"
                                    name="client">
                                    <option value="">.....</option>
                                    @foreach ($client as $clients)
                                        <option value="{{ $clients->id }}">{{ $clients->nom }}</option>
                                    @endforeach
                                </select>
                                @error('client')
                                    <p>{{ $message }}</p>
                                @enderror --}}
                                <input type="text" id="name" name="name" class="form-control">
                                {{-- <label for=""> Code Commande</label>
                                <input type="text" class="my-2 form-control @error('code') is-invalid @enderror"
                                    id="inputSuccess" placeholder="Enter ..." name="code">
                                @error('code')
                                    <p>{{ $message }}</p>
                                @enderror --}}

                            </div>

                            <div class="col-6">

                            </div>
                            <div class="col-8 my-4">
                                <button type="submit" class="btn btn-primary mx-1">save</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-dark"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-4 mx-3 p-2">
                    <h3 style="font-family: forte">liste des ventes</h3>
                    @foreach ($produit as $produits)
                        @if ($produits->qtestock <= 0)
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                                <marquee behavior="" direction=""><strong>AVERTISSEMENTS!
                                        {{ $produits->designation }}
                                        En Rupture de stock veuillez passer la commande avant d'effectuer la vente
                                        de {{ $produits->designation }}


                                    </strong></marquee>

                            </div>
                        @endif
                    @endforeach
                </div>
                <div class=" card-body">

                    <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">code vente
                                </th>
                                <th class="th-sm">Date vente
                                </th>
                                <th class="th-sm">Nom du client
                                </th>

                                <th class="th-sm">Responsable de la vente
                                </th>

                                <th class="th-sm">Opération</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vente as $ventes)
                                <tr>
                                    <td>{{ $ventes->id }}</td>
                                    <td>{{ $ventes->date_vente }}</td>
                                    <td>{{ $ventes->client->nom }}</td>
                                    <td>{{ $ventes->user->nom }}</td>
                                    <td>
                                        <a href="{{ route('vente.produit', $ventes->id) }}}}"> <i
                                                class="fa fa-eye fa-2x text-info"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </tr>
                        <tfoot>

                            {{ $vente->links() }}
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").autocomplete({

                source: function(request, response) {
                    $.ajax({
                        url: "{{ url('search-from-db') }}",
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            var resp = $.map(data, function(obj) {
                                return obj.name;
                            });

                            response(resp);
                        }
                    });
                },
                minLength: 2
            });
        });
    </script>
@endsection
