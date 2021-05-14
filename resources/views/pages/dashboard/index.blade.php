@extends('layouts.page')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Dashboard</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Dahboard</a>
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
                                Dans quel module vous allez ?
                            </h4>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-4 col-lg-6 col-12">
                                    <div class="card bg-gradient-x-blue-green">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="align-self-top">
                                                        <i class="icon-users icon-opacity text-white font-large-4 float-left"></i>
                                                    </div>
                                                    <div class="media-body text-white text-right align-self-bottom">
                                                        <a href="{{ route('dashboard.agent') }}" class="text-white text-bold-700 btn btn-bg-gradient-x-blue-green">Accéder</a>
                                                        <span class="d-block mb-1 font-medium-1 mt-2">Gestion des travailleurs</span>
                                                        <h1 class="text-white mb-0">{{ formatChiffre($user) }}</h1>
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
                                                    <div class="media-body text-white text-right align-self-bottom">
                                                        <a href="{{ route('dashboard.comptabilite') }}" class="text-white text-bold-700 btn btn-bg-gradient-x-orange-yellow">Accéder</a>
                                                        <span class="d-block mb-1 font-medium-1 mt-2">Gestion des entrées et sorties</span>
                                                        <h1 class="text-white mb-0">{{ formatNumber($solde) }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Line Chart -->
        </section>

        <section id="minimal-statistics-bg">


        </section>

    </div>
@endsection
