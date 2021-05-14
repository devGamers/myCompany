@extends('layouts.auth')

@section('authentification')
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
        <div class="card-header border-0">
            <div class="text-center mb-1">
                <img src="{{ asset('storage/logo/logo.png') }}" alt="{{ config('app.name') }}">
            </div>
            <div class="font-large-1  text-center">
                Mot de passe oublié
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form-horizontal" action="" novalidate>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control round" id="user-email" placeholder="Email" required>
                        <div class="form-control-position">
                            <i class="ft-mail"></i>
                        </div>
                    </fieldset>
                    <div class="form-group text-center">
                        <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer border-0 p-0">
            <p class="float-sm-center text-center">
                <a href="{{ url('/') }}" class="card-link">Retour</a>
            </p>
        </div>
    </div>
@endsection
