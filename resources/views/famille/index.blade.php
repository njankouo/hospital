@extends('layouts.master')
@section('title', 'liste des familles de produit')
@section('contenu')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title my-3 mx-3">
                    <h3 style="font-family:forte">liste des Familles Produits</h3>
                    <div style="margin-left: 80%">
                        <a class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-xl">
                            <i class="fa fa-plus"></i>Nouvelle Famille
                        </a>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                            <thead class="text-center">
                                <tr>

                                    <th style="width: 30%">ID</th>
                                    <th style="width: 20%">libelle</th>
                                    <th style="width: 20%">operation</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($famille as $familles)
                                    <tr>
                                        <td>{{ $familles->id }}</td>
                                        <td>{{ $familles->libelle }}</td>
                                        @if (count($familles->produit))
                                        @else
                                            <td>
                                                <form action="{{ route('famille.delete', $familles->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                    <a class="btn btn-danger  show_confirm" data-toggle="tooltip"
                                                        title='Delete'> <i class="fa fa-trash fa-2x"></i>
                                                    </a>
                                                </form>


                                            </td>
                                        @endif

                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        {{-- {{ $type->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `voulez-vous retirer  de la liste`,
                    text: "Des Familles de produit?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

@stop
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="false" id="staticBackdrop" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">

            <div class="card">
                <div class="card-title d-flex bg-primary text-light p-2">

                    <i class="fa fa-users fa-2x"></i>
                    <h3 style="font-size:20px;font-family:forte"> Nouvelle Famille Produit</h3>
                </div>
                <div class="card body">

                    <form action="{{ route('famille.create') }}" method="POST" class="form-block">
                        @csrf
                        <div class="row" style="margin: 10px;">


                            <div class="col-12">
                                <label for="">libelle</label>
                                <input type="text" class="my-2 form-control @error('libelle') is-invalid @enderror"
                                    name="libelle" placeholder="Enter ..." required>
                                @error('libelle')
                                    <p>{{ $message }}</p>
                                @enderror



                                <div class="col-8 my-4">
                                    <button type="submit" class="btn btn-primary mx-1">save</button>
                                    <a class="btn btn-danger mx-1" data-dismiss="modal">close</a>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="card-footer bg-primary"></div>
            </div>
        </div>
    </div>
</div>
</div>
