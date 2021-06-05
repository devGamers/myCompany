@extends('layouts.page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/charts/chartist.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/charts/chartist-plugin-tooltip.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/charts/chartist.min.css') }}"/>
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Gestion des entrées et sorties</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Dahboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.entree-sortie') }}">Entrées Sorties</a>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Evolution des <span style="color: #00a5a8">entrées</span> et des
                                <span style="color: #ff7d4d">sorties</span>
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-7 col-lg-12 card-content collapse show">
                                <div class="card-body">
                                    <p class="card-text">
                                        Pour chaque mois de l'exercice
                                    </p>
                                    <div id="mois" class="height-300"></div>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-12 card-content collapse show">
                                <div class="card-body">
                                    <p class="card-text">Pour chaque jour de la semaine en cours</p>
                                    <div id="jours" class="height-300"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Line Chart -->
        </section>

        <section id="minimal-statistics-bg">
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card bg-gradient-x-blue-green">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-top">
                                        <i class="icon-login icon-opacity text-white font-large-4 float-left"></i>
                                    </div>
                                    <div class="media-body text-white text-right align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Total Entrée</span>
                                        <h1 class="text-white mb-0">500 000</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card bg-gradient-directional-danger">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-white text-left align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Total Dépense</span>
                                        <h1 class="text-white mb-0">50 000</h1>
                                    </div>
                                    <div class="align-self-top">
                                        <i class="icon-logout icon-opacity text-white font-large-4 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card bg-gradient-x-orange-yellow">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-top">
                                        <i class="icon-wallet icon-opacity text-white font-large-4 float-left"></i>
                                    </div>
                                    <div class="media-body text-white text-right align-self-bottom mt-3">
                                        <span class="d-block mb-1 font-medium-1">Solde</span>
                                        <h1 class="text-white mb-0">450 000</h1>
                                    </div>
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
    <script src="{{ asset('js/charts/chartist.min.js') }}"></script>
    <script src="{{ asset('js/charts/chartist-plugin-tooltip.min.js') }}"></script>
    {{-- <script src="{{ asset('js/charts/line.min.js') }}"></script> --}}
    <script>
        $('#menu_dashboard').addClass('active');
        $('#menu_dashboard_comptabilite').addClass('active');

        $(window).on("load", function () {
            new Chartist.Line(
                "#mois",
                {
                    labels: ["Jan", "Fev", "Mars", "Avr", "Mai", "Jui", "Jul", 'Aoû', "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [12, 9, 7, 8, 5, 12, 9, 7, 8, 5, 20, 13],
                        [2, 1, 3.5, 7, 3, 25, 10, 5, 18, 14, 10],
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
