<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script src="{{ asset('js/toastr.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
@if (Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('flash_message') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-title my-3 mx-3">
                <h3 style="font-family:forte">liste des Clients</h3>
                <div style="margin-right: 85%">
                    <a href="{{ route('client.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus fa-x"></i>Nouveaux
                    </a>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom </th>
                                <th>Prenom</th>
                                <th>Telephone</th>
                                <th>Sexe</th>
                                <th>date de creation</th>
                                {{-- <th>Operation</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($client as $clients)
                                <tr>
                                    <td>

                                        <span class="badge badge-info">actif</span>
                                    </td>
                                    <td>{{ $clients->nom }}</td>
                                    <td>{{ $clients->prenom }}</td>
                                    <td>{{ $clients->telephone }}</td>
                                    <td>
                                        @if ($clients->sexe == 0)
                                            <img src="{{ asset('img/lien.png') }}" alt="" style="width:45px">
                                        @else
                                            <img src="{{ asset('img/lion.png') }}" alt="" style="width:45px">
                                        @endif

                                    </td>
                                    <td>{{ $clients->created_at->diffForHumans() }}</td>
                                    {{-- <td>
                                        <div class="dropdown dropup">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-toggle="dropdown">Operation in table
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <a href="#" class="btn btn-danger">delete</a>
                                                <a href="#" class="btn btn-primary">update</a>

                                            </ul>
                                        </div>
                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="card-footer bg-primary">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('message') }}");
    @endif
</script>
