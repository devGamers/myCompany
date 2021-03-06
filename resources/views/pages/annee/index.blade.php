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
            Choisir l'année
        </p>
        <div class="card-content">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('annee_choisi') }}" method="POST">
                    @csrf
                    <fieldset class="form-group position-relative has-icon-left">
                        <select class="select2 form-control" id="default-select" name="annee_choisi">
                            @foreach ($annee as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <div class="form-group text-center">
                        <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                            Continuer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
