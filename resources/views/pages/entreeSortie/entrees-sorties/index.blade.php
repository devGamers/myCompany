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
                            <a href="{{ route('entree-sorties.index') }}">Liste</a>
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
                                            <tr>
                                                <th>0</th>
                                                <td>Toutes les activités</td>
                                                <td>
                                                    <button onclick="filtre('activite', '0')"
                                                        class="btn btn-outline-success btn-sm activity" id="activity0">
                                                        <i class="ft-check"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @foreach ($activite as $key => $value)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $value->libelle }}</td>
                                                    <td>
                                                        <button onclick="filtre('activite', '{{ $value->id }}')"
                                                            class="btn btn-outline-success btn-sm activity" id="activity{{ $value->id }}">
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

                <input type="hidden" id="activite" value="0">
                <input type="hidden" id="mois" value="{{ date('m') }}">

                <div class="col-xl-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Choisir le mois</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    @foreach (getMois() as $key => $value )
                                        @php($numberMois = formatChiffre($key+1))
                                        <button type="button" onclick="filtre('mois', '{{ $numberMois }}')" id="mois{{ $numberMois }}"
                                            class="btn mr-1 mb-1 mois {{ $numberMois == date('m') ? 'btn-info' : 'btn-outline-info' }}"
                                            style="padding: 0.3rem 0.3rem;"
                                        >
                                            {{ $value }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title" id="text"></h4>
                            <a href="{{ route('entree-sorties.create') }}" class="btn btn-bg-gradient-x-orange-yellow">Nouvelle</a>
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

        const filtre = (type, val) => {
            if (type === 'mois') {
                $('.mois').attr('class', 'btn mr-1 mb-1 mois btn-outline-info')
                $('#mois' + val).removeClass('btn-outline-info').addClass('btn-info')
            }else{
                $('.activity').attr('class', 'activity btn btn-outline-success btn-sm')
                $('#activity' + val).removeClass('btn-outline-success').addClass('btn-success')
            }
            $('#'+type).val(val)
            affiche()
        }

        const affiche = () => {
            let activite = $('#activite').val(),
                mois = $('#mois').val(),
                url = "{{ route('entree-sorties.affiche', ['activite' => ':act', 'mois' => ':mois']) }}"

            url = url.replace(':act', activite)
            url = url.replace(':mois', mois)

            $('#activity' + activite).removeClass('btn-outline-success').addClass('btn-success')

            $('#text').text("Données d'entrée et de sortie de "+ listeMois()[parseInt(mois)-1] +" {{ annee() }}")

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

        $(document).ready(function() {
            affiche()
        })
    </script>
@endsection
