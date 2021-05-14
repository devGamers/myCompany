@extends('layouts.page')


@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Entrées et Sorties</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Entrées et Sorties</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('entree-sorties.create') }}">Nouvelle</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="file-export">
            <div class="row">
                <div class="col-xl-4 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                Choisir l'activité
                            </h4>
                            <a href="{{ route('activite.index') }}" class="btn btn-bg-gradient-x-orange-yellow">Nouvelle</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard pt-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered simpleTableau">
                                        <thead>
                                            <tr>
                                                <th>Activité</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activite as $key => $value)
                                                <tr>
                                                    <td>{{ $value->libelle }}</td>
                                                    <td>
                                                        <button class="activity btn btn-outline-success btn-sm" id="btn{{ $value->id }}" onclick="chooseActivity({{ $value->id }})">
                                                            <i class="ft-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                Remplir le formulaire
                            </h4>
                            <a href="{{ route('entree-sorties.index') }}" class="btn btn-bg-gradient-x-purple-blue">Retour à la liste</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <form action="{{ route('entree-sorties.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="activite" name="activites_id">
                                    <div class="row">
                                        <div class="col-xl-4 col-12 form-group">
                                            <label for="date">Date <span class="text-danger">*</span></label>
                                            <input type="date" name="date" id="date" class="form-control" required max="{{ aujourdhui() }}">
                                        </div>
                                        <div class="col-xl-4 col-12 form-group">
                                            <label for="entree">Entrée <span class="text-danger">*</span></label>
                                            <input type="text" name="entree" id="entree" class="form-control key" required>
                                        </div>
                                        <div class="col-xl-4 col-12 form-group">
                                            <label for="sortie">Sortie <span class="text-danger">*</span></label>
                                            <input type="text" name="sortie" id="sortie" class="form-control key" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                        </div>

                                        <div class="col-12 form-group">
                                            <button class="btn btn-bg-gradient-x-blue-green" type="button" id="valider">Enregistrer</button>
                                            <button class="btn btn-bg-gradient-x-orange-yellow pull-right" type="reset">Annuler</button>
                                        </div>
                                    </div>
                                </form>
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
        @error('libelle')
            notify('warning', 'Cette activité existe déjà.');
        @enderror

        $('#valider').click(() => {
            if ($('#activite').val() === "") {
                notify('warning', 'Veuillez choisir une activité');
            }else{
                $('#valider').attr('type', 'submit')
            }
        })

        const chooseActivity = id => {
            $('.activity').attr('class', 'activity btn btn-outline-success btn-sm')
            $('#btn' + id).removeClass('btn-outline-success').addClass('btn-success')
            $('#activite').val(id)
        };
    </script>
@endsection
