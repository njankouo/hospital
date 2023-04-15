<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@extends('layouts.master')

@section('title','liste des Chambres')

@section('contenu')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hey, Bienvenue!</h4>
                    <span class="ml-1">{{ Auth()->user()->name ?? '' }}</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Chambres</a></li>

                    <li class="breadcrumb-item active"><a href="{{route('home')}}">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Chambres Et Status Des Lits</h4>
                        {{-- <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#example-lg"><span class="btn-icon-left text-primary"><i class="fa fa-plus"></i>
                        </span>Chambres</button> --}}
                        <span><a  class="mr-4 btn btn-primary" data-toggle="modal" style="-webkit-animation: pulse 1s infinite"  data-target="#example-lg"><i class="fa fa-plus text-white"></i> </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px;text-align:center">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th >Numero</th>
                                        <th >Categorie</th>
                                        <th >Prix</th>
                                        {{-- <th>Nombre De Lit</th> --}}
                                        {{-- <th >Status</th> --}}

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cham as $chambre)
                                            <td>
                                                @if ($chambre->nbrelit>$chambre->hospitalisation_count)
                                                <a type="button" class="btn btn-success btn btn-rounded" style="-webkit-animation: pulse 1s infinite"  data-toggle="modal" data-target="#exampleModalpopover{{ $chambre->id }}"><i class="fa fa-fire  text-white" ></i></a>
                                                @elseif ($chambre->nbrelit=$chambre->hospitalisation_count)
                                                <a type="button" class="btn btn-danger btn btn-rounded" style="-webkit-animation: pulse 1s infinite"  data-toggle="modal" data-target="#exampleModalpopover{{ $chambre->id }}"><i class="fa fa-key  text-white" ></i></a>

                                                @endif


                                            </td>
                                             <td>{{$chambre->numero}}</td>
                                            <td>{{ $chambre->appreciation }}</td>
                                            <td>{{ $chambre->prix }}</td>


                                            <td>
                                                <i class="fa fa-pencil text-primary"></i>
                                             {{-- <a href="{{ route('soft.chambre',$chambre->id) }}"><i class="fa fa-trash text-danger m-2"></i></a>
                                            --}}
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModalpopover{{ $chambre->id }}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Information Sur La Chambre {{ $chambre->numero }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5><b>Nombre De Lit(s) Totaux: {{ $chambre->nbrelit }}</b></h5>
                                                        <h5><b>Nombre De Lit(s) Occup&eacute;(s): {{$chambre->hospitalisation_count }}</b></h5>

                                                        <h5><b>Nombre De Lit(s) Libre(s) : {{ $chambre->nbrelit-$chambre->hospitalisation_count }}</b></h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @endforeach

                                </tbody>

                            </table>
                            <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ajout Des Chambres</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('add.chambre') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="numero de chambre" name="numero">
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                                        <select id="inputState" class="form-control" name="appreciation">
                                                            <option selected="">Categorie de la chambre</option>

                                                            <option value="CLASSIQUE">CLASSIQUE</option>
                                                            <option value="VIP">VIP</option>
                                                            <option value="bloc">Bloc</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-4">
                                                        <select class="form-control" name="prix">
                                                            <option value="2500">2500</option>
                                                            <option value="5000">5000</option>
                                                            <option value="10000">10000</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mt-2 mt-sm-4">
                                                       <input type="number" class="form-control" name="nbre_lit" placeholder="entrer le nombre de lit">
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                               <button type="submit" class="btn btn-primary" >valider</button>

                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@stop
<script>
    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            positionClass: 'toast-top-right'
        }
        toastr.success("{{ session('info') }}");
    @endif
</script>
