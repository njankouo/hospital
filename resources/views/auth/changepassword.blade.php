@extends('layouts.master')

@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-title bg-primary text-light">

                                        <h4><i class="fa fa-cog fa-2x p-2"></i> Changer Le Mot De Passe</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('changePassword') }}">
                                            {{ csrf_field() }}

                                            <div
                                                class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-md-12 control-label">Encien Mot De
                                                    Passe</label>

                                                <div class="col-md-12">
                                                    <input id="current-password" type="password" class="form-control"
                                                        name="current-password" required>

                                                    @if ($errors->has('current-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('current-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-md-4 control-label">Nouveau mot de
                                                    passe
                                                </label>

                                                <div class="col-md-12">
                                                    <input id="new-password" type="password" class="form-control"
                                                        name="new-password" required>

                                                    @if ($errors->has('new-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="new-password-confirm" class="col-md-12 control-label">Confirmer
                                                    Mot De Passe
                                                </label>

                                                <div class="col-md-12">
                                                    <input id="new-password-confirm" type="password" class="form-control"
                                                        name="new-password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Change Password
                                                    </button>
                                                </div>
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
@endsection
