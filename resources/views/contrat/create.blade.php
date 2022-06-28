@extends('layouts.master')
@section('contenu')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-title d-flex bg-primary text-light">

                    <i class="fa fa-list fa-2x my-2 mx-1"></i>
                    <h3 style="font-size:20px;font-family:forte" class="p-3"> creation contrat</h3>
                </div>
                <div class="card body">
                    @if (session('success'))
                        <div class="col-sm-12">
                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <form action="{{ route('contrat.create') }}" method="POST" class="form-block">
                            @csrf
                            <div class="form-row" style="margin: 10px;">


                                <div class="col-6">
                                    <label for="">fournisseur</label>
                                    <select name="fournisseur_id" id=""
                                        class="form-control @error('fournisseur_id') is-invalid @enderror">
                                        <option value="">....</option>
                                        @foreach ($fournisseur as $fournisseurs)
                                            @if ($fournisseurs->status == 'actif')
                                                <option value="{{ $fournisseurs->id }}">{{ $fournisseurs->nom }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('fournisseur_id')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">Mode Reglement</label>
                                    <select name="reglement" id=""
                                        class="form-control my-2 @error('reglement') is-invalid @enderror">
                                        <option value="" disabled>select mode reglement</option>
                                        <option value=""></option>
                                        <option value="mobile">Mobile(orange money/mobile money)</option>
                                        <option value="espece">espece</option>
                                        <option value="carte bancaire">carte bancaire</option>
                                    </select>
                                    @error('reglement')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6">

                                    <label for="">date debut contrat</label>
                                    <input type="date" class="form-control @error('date_debut') is-invalid @enderror"
                                        name="date_debut">
                                    @error('date_debut')
                                        <p>{{ $message }}</p>
                                    @enderror
                                    <label for="">date fin contrat</label>
                                    <input type="date" class="form-control @error('date_fin') is-invalid @enderror"
                                        name="date_fin">
                                    @error('date_fin')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="">fichier image (optionel)</label>
                                    <input onchange="previewFile(this)" type="file" class="form-control my-2 "
                                        name="image" placeholder="...">
                                </div>
                                <div class="col-6">

                                </div>
                                <div class="col-8 my-4">
                                    <button type="submit" class="btn btn-primary mx-1">save</button>
                                    <a class="btn btn-danger mx-1" href="{{ route('contrat') }}">retour au liste
                                        du contrat</a>
                                </div>
                            </div>

                    </div>

                </div>
                <div class="card-footer bg-primary"></div>
            </div>

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 style="font-size:20px;font-family:forte" class="p-3 text-light">fichier du
                        contrat (optionnel)</h3>
                </div>
                <div class="card-body">
                    <fieldset>
                        <img id="previewImg" alt="" style="width:50%;height:25%; height:auto;" class="my-4">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script>
        function previewFile(input) {
            var file = $('input[type=file]').get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
@endsection
