@extends('layouts.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/charts/chartist.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/charts/chartist-plugin-tooltip.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/charts/chartist.min.css') }}"/>
@endsection

@section('content')

    <div class="content-header row"></div>

    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-sm-12 col-xl-8">
                    <div class="media d-flex m-1 ">
                        <div class="align-left p-1">
                            <a href="#" class="profile-image">
                                <img src="{{ asset('storage/user.png') }}" class="rounded-circle img-border height-100" alt="Card image">
                            </a>
                        </div>
                        <div class="media-body text-left  mt-1">
                            <h3 class="font-large-1 white">AGUIAR Orphée
                                <span class="font-medium-1 white">(Superviseur)</span>
                            </h3>
                            <p class="white"><i class="ft-map-pin white"> </i> Calavi</p>
                            <p class="white">
                                <i class="ft-phone-call white"> </i> (+229) 66-42-20-26
                                <i class="ft-calendar white"> </i> 05/11/1998
                                <i class="ft-user white"> </i> orphee
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-5 col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title-wrap bar-primary">
                            <div class="card-title text-info">Sécrétariat et Contrôle</div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pt-0 pb-1">
                            <ul>
                                <li>
                                    <strong>Traçabilité</strong>
                                    <strong class="pull-right text-primary mr-2">200</strong>
                                </li>
                                <li>
                                    <strong>Contre Performance</strong>
                                    <strong class="pull-right text-warning mr-2">10</strong>
                                </li>
                                <li>
                                    <strong>Abattement sur salaire</strong>
                                    <strong class="pull-right text-danger mr-2">5 000</strong>
                                </li>
                                <li>
                                    <strong>Pointage</strong>
                                    <strong class="pull-right text-danger mr-2">0</strong>
                                </li>
                                <li>
                                    <strong>Prime</strong>
                                    <strong class="pull-right text-primary mr-2">20 000</strong>
                                </li>
                                <li>
                                    <strong>Salaire Fixe</strong>
                                    <strong class="pull-right text-primary mr-2">15 000</strong>
                                </li>
                                <li>
                                    <strong>Salaire</strong>
                                    <strong class="pull-right text-success mr-2">30 000</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title-wrap bar-primary">
                            <div class="card-title text-info">Personne ressource</div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pt-0 pb-1">
                            <ul class="list-unstyled ml-2">
                                <li>
                                    <i class="ft-user"> </i>
                                    <strong>AGBESSI Justine</strong>
                                </li>
                                <li>
                                    <i class="ft-phone-call"> </i>
                                    <strong>(229) 66-36-05-16</strong>
                                </li>
                                <li>
                                    <i class="ft-map-pin"> </i>
                                    <strong>Calavi</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-7 col-md-12">
                <!--Project Timeline div starts-->
                <div id="timeline">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="card-title-wrap bar-primary">
                                <div class="card-title">Réalisation pour l'exercice en cours</div>
                                <div class="pt-1 d-flex justify-content-between">
                                    <button class="btn text-white" style="background-color: #00a5a8">Traçabilité</button>
                                    <button class="btn text-white" style="background-color: #ff7d4d">Contre Performance</button>
                                    <button class="btn text-white" style="background-color: #f25e75">Abattement sur Salaire</button>
                                    <button class="btn text-white" style="background-color: #5175e0">Pointage</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-xl-7 col-lg-12 card-content">
                                    <div class="card-body pr-0 pl-0">
                                        <p class="card-text">
                                            Pour chaque mois de l'exercice
                                        </p>
                                        <div id="mois" class="height-300"></div>
                                    </div>
                                </div>

                                <div class="col-xl-5 col-lg-12 card-content">
                                    <div class="card-body pr-0 pl-0">
                                        <p class="card-text">Pour chaque jour de la semaine en cours</p>
                                        <div id="jours" class="height-300"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title-wrap bar-primary">
                            <div class="card-title text-info">Traçabilité</div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pt-0 pb-1">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered smallTableau">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>Poste</th>
                                            <th>Valeur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>05/11/2020</td>
                                            <td>Repassage</td>
                                            <td class="text-right">100</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>06/11/2020</td>
                                            <td>Lavage</td>
                                            <td class="text-right">100</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Total :</th>
                                            <th class="text-right">200</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title-wrap bar-primary">
                            <div class="card-title text-warning">Contre Performance</div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pt-0 pb-1">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered smallTableau">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>Poste</th>
                                            <th>Motif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>05/11/2020</td>
                                            <td>Repassage</td>
                                            <td>Habit mal fait</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>06/11/2020</td>
                                            <td>Lavage</td>
                                            <td>Salle</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title-wrap bar-primary">
                            <div class="card-title text-danger">Abattement sur Salaire</div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pt-0 pb-1">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered smallTableau">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>Poste</th>
                                            <th>Type</th>
                                            <th>Motif</th>
                                            <th>Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>05/11/2020</td>
                                            <td>Repassage</td>
                                            <td>Acompte</td>
                                            <td>Avance sur Salaire</td>
                                            <td class="text-right">3 000</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>06/11/2020</td>
                                            <td>Lavage</td>
                                            <td>Fautes commises</td>
                                            <td>Dégât</td>
                                            <td class="text-right">2 000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" class="text-right">Total :</th>
                                            <th class="text-right">5 000</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="card-title-wrap bar-primary">
                            <div class="card-title text-danger">Pointage</div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pt-0 pb-1">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered smallTableau">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>Poste</th>
                                            <th>Motif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>05/11/2020</td>
                                            <td>Repassage</td>
                                            <td>Habit mal fait</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>06/11/2020</td>
                                            <td>Lavage</td>
                                            <td>Salle</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/charts/chartist.min.js') }}"></script>
    <script src="{{ asset('js/charts/chartist-plugin-tooltip.min.js') }}"></script>

    <script>
        $('#menu_dashboard').addClass('active');
        $('#menu_dashboard_agent').addClass('active');

        $(window).on("load", function () {
            new Chartist.Line(
                "#mois",
                {
                    labels: ["Jan", "Fev", "Mars", "Avr", "Mai", "Jui", "Jul", 'Aoû', "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [12, 9, 7, 8, 5, 12, 9, 7, 8, 5, 20, 13], // tracabilité
                        [2, 1, 3.5, 7, 3, 25, 10, 5, 18, 14, 10, 80], //contre performance
                        [20, 10, 5, 70, 30, 2, 5, 50, 8, 3, 1, 60], //abattement
                        [1, 20, 30, 45, 50, 6, 10, 7, 8, 9, 10, 30], // pointage
                    ],
                },
                {
                    fullWidth: !0,
                    chartPadding: { right: 40 },
                    plugins: [Chartist.plugins.tooltip({ appendToBody: !0 })],
                }
            ),
            new Chartist.Line(
                "#jours",
                {
                    labels: ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
                    series: [
                        [12, 9, 7, 8, 5, 12, 9],
                        [2, 1, 3.5, 7, 3, 25, 10],
                        [20, 5, 50, 8, 3, 1, 60],
                        [1, 20, 30, 45, 50, 10, 30],
                    ],
                },
                {
                    fullWidth: !0,
                    chartPadding: { right: 40 },
                    plugins: [Chartist.plugins.tooltip({ appendToBody: !0 })],
                }
            )
        });
    </script>
@endsection
