@extends('layouts.page')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Gestion des paramètres généraux</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Paramètres</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">

        <section id="chartist-line-charts">
            <!-- Line Chart -->
            <div class="row">
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-content d-flex align-items-center flex-column">

                            <div class="card-header">
                                <h4 class="card-title">
                                    Nombre d'année à afficher
                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <form class="form" action="{{ route('parametre.update', ['parametre' => $parametre]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="">Valuer actuelle</label>
                                                <input type="number" class="form-control" name="nbrAnnee" value="{{ $parametre->nbrAnnee }}" required min="1">
                                            </div>
                                        </div>
                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-outline-primary">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('js')
    <script>
        @error('nbrAnnee')
            notify('warning', "Renseignez le nombre d'année à afficher et la valeur minimale est 1");
        @enderror
    </script>
@endsection
