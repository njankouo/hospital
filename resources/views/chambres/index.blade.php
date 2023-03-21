<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('js/jquery.typeahead.min.js') }}"></script>

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

                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Acceuil</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste Des Chambres</h4>
                        <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#example-lg"><span class="btn-icon-left text-primary"><i class="fa fa-plus"></i>
                        </span>Chambres</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr style="text-align: center">

                                        <th >Numer De Chambre</th>
                                        <th >Status</th>
                                        <th >Appreciation</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chambre as $chambres)
                                    @if ($chambres->id==1)
                                        @else
                                        <tr style="text-align: center;">

                                            <td>{{ $chambres->numero }}</td>
                                            <td>
                                                @if ($chambres->appreciation==0)
                                                <a href="javascript:void()" class="badge badge-rounded badge-outline-info">CLASSIQUE</a>
                                                    @else
                                                    <a href="javascript:void()" class="badge badge-rounded badge-outline-primary">VIP</a>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($hospitalisation as $hospitalisations)
                                                @if($chambres->id==$hospitalisations->chambre_id)
                                                <a href="javascript:void()" class="badge badge-rounded badge-outline-danger">occup&eacute;</a>
                                                @endif
                                                @endforeach

                                            </td>

                                        </tr>
                                    @endif

                                    @endforeach

                                </tbody>

                            </table>
                            <div data-backdrop="false" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="example-lg">
                                <div class="modal-dialog modal-lg ">
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
                                                            <option selected="">Appreciation de la chambre</option>

                                                            <option value="0">CLASSIQUE</option>
                                                            <option value="1">VIP</option>
                                                        </select>
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
