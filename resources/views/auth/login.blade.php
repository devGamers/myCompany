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
        {{-- <p class="card-subtitle text-muted text-center font-small-3 ">
            Cliquer juste sur se connecter. (Ce n'est qu'une marquette)
        </p> --}}
        <div class="card-content">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                    @csrf
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control round" id="user-name" name="username" placeholder="Nom d'utilisateur" required>
                        <div class="form-control-position">
                            <i class="ft-user"></i>
                        </div>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control round" id="user-password" name="password" placeholder="Mot de passe" required>
                        <div class="form-control-position">
                            <i class="ft-lock"></i>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right">
                            <a href="{{ route('password.request') }}" class="card-link">Mot de passe oublié</a>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Se connecter</button>
                    </div>
                </form>
            </div>
            {{-- <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2 "></p>

            <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                <span>Aperçu du message d'erreur d'authentification
                    <a class="card-link" href="javascript:void(0);" id="message" onclick="simpleAlert('title', 'text', 'error')">Cliqez ici</a>
                </span>
            </p> --}}
        </div>
    </div>
@endsection

@section('js')
    <script>
        @error('username')
            notify('error', 'Authentification échouée');
        @enderror
    </script>
@endsection
