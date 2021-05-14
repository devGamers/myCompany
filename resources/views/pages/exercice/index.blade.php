@extends('layouts.auth')

@section('authentification')
    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
        <div class="card-header border-0">
            <div class="text-center mb-1">
                <img src="{{ asset('storage/logo/logo.png') }}" alt="{{ config('app.name') }}">
            </div>
            <div class="font-large-1 text-center">
                {{ config('app.name') }}
            </div>
        </div>
        <p class="card-subtitle text-muted text-center font-small-3">
            Définir l'exercice. (Ce n'est qu'une marquette, cliquer juste sur continuer)
        </p>
        <div class="card-content">
            <div class="card-body">
                <form class="form-horizontal" action="">
                    <fieldset class="form-group position-relative has-icon-left">
                        <select class="select2 form-control" id="default-select">
                            <option value="1">01/01/2019 - 31/12/2019</option>
                            <option value="2">01/01/2020 - 31/12/2020</option>
                            <option value="3">03/05/2021 - 06/06/2021</option>
                        </select>
                    </fieldset>
                    <div class="form-group text-center">
                        <a class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1 text-white" href="{{ route('dashboard.comptabilite') }}">
                            Continuer
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
