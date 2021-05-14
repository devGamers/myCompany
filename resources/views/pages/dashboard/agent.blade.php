@extends('layouts.page')


@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Agent</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Dahboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.agent') }}">Agent</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="file-export">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Situation de chaque agent pour l'exercice en cours</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered tableau">
                                        <thead>
                                            <tr>
                                                <th>Agent</th>
                                                <th>Traçablité</th>
                                                <th>Contre Perfor.</th>
                                                <th>Abt. sur Salaire</th>
                                                <th>Pointage</th>
                                                <th>Prime</th>
                                                <th>Salaire</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>200</td>
                                                <td>50</td>
                                                <td>100</td>
                                                <td>0</td>
                                                <td>150</td>
                                                <td>200</td>
                                                <td>
                                                    <a href="{{ route('agent.show', ['agent' => 1]) }}" class="btn btn-outline-success">
                                                        <i class="ft-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>200</td>
                                                <td>50</td>
                                                <td>100</td>
                                                <td>0</td>
                                                <td>150</td>
                                                <td>200</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-success"><i class="ft-eye"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>200</td>
                                                <td>50</td>
                                                <td>100</td>
                                                <td>0</td>
                                                <td>150</td>
                                                <td>200</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-success"><i class="ft-eye"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Agent</th>
                                                <th>Traçablité</th>
                                                <th>Contre Perfor.</th>
                                                <th>Abt. sur Salaire</th>
                                                <th>Pointage</th>
                                                <th>Prime</th>
                                                <th>Salaire</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
        $('#menu_dashboard').addClass('active');
        $('#menu_dashboard_agent').addClass('active');
    </script>
@endsection
