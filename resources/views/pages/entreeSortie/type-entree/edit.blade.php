@extends('layouts.page')


@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Modification de type d'entrée</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Entrées Sorties</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('type-entree.index') }}">Type d'entrée</a>
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
                                                <th width="3%"></th>
                                                <th>Activité</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activite as $key => $value)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $value->libelle }}</td>
                                                    <td>
                                                        <button onclick="filtre({{ $value->id }})"
                                                            class="btn btn-sm activity"
                                                                id="activity{{ $value->id }}">
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
                        <div class="card-header">
                            <h4 class="card-title">Type d'entrée</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="d-flex justify-content-center" method="POST" action="{{ route('type-entree.update', ['type_entree' => $type_entree]) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="activite" value="{{ $type_entree->activites_id }}" name="activites_id">
                                    <input type="text" name="libelle" value="{{ $type_entree->libelle }}" class="form-control" required />
                                    <button class="btn btn-bg-gradient-x-blue-green">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Liste des types d'entrée</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard" id="liste"></div>
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
            notify('warning', "Ce type d'entrée existe déjà.");
        @enderror

        @error('activites_id')
            notify('warning', 'Choisir une activité.');
        @enderror

        const filtre = (val) => {
            $('.activity').attr('class', 'activity btn btn-outline-success btn-sm')
            $('#activity' + val).removeClass('btn-outline-success').addClass('btn-success')
            $('#activite').val(val)
            affiche()
        };

        const affiche = () => {
            let activite = $('#activite').val(),
                url = "{{ route('type-depense.affiche', ['activite' => ':act']) }}"

            url = url.replace(':act', activite)

            $('#activity' + activite).removeClass('btn-outline-success').addClass('btn-success')

            $.ajax({
                type : 'POST',
                url : url,
                beforeSend : function () {
                    notify('warning', "Chargement...");
                },
                success: function (response) { //alert('response');
                    toastr.clear()
                    $('#liste').html(response);
                },
                error: function (response) {
                    notify('error', "Une erreur s'est produite. Contactez le concepteur.");
                }
            })
        }
        affiche();
    </script>
@endsection
