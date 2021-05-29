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
                                                <th>Activité</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activite as $key => $value)
                                                <tr>
                                                    <td>{{ $value->libelle }}</td>
                                                    <td>
                                                        <button class="btn btn-outline-success btn-sm">
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
                            <h4 class="card-title">Choisir le mois</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    @foreach (getMois() as $key => $value )
                                        @php($numberMois = formatChiffre($key+1))
                                        <button type="button" class="btn mr-1 mb-1 {{ $numberMois == date('m') ? 'btn-info' : 'btn-outline-info' }}">
                                            {{ $value }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                Données comptables enregistrées
                            </h4>
                            <a href="{{ route('entree-sorties.create') }}" class="btn btn-bg-gradient-x-orange-yellow">Nouvelle</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered tableau">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Activité</th>
                                                <th width="15%">Entrée</th>
                                                <th width="15%">Sorties</th>
                                                <th width="30%">Description</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listes as $key => $liste )
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $liste->activite->libelle }}</td>
                                                    <td class="text-right">{{ formatNumber($liste->entree) }}</td>
                                                    <td class="text-right">{{ formatNumber($liste->sortie) }}</td>
                                                    <td data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{ $liste->description }}" data-bg-color="pink" data-placement="right">
                                                        {{ minText($liste->description) }}
                                                    </td>
                                                    <td>
                                                        <span class="dropdown">
                                                            <button id="btnSearchDrop12" type="button" class="btn btn-sm btn-icon btn-pure font-medium-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ft-more-vertical"></i>
                                                            </button>
                                                            <span aria-labelledby="btnSearchDrop12" class="dropdown-menu mt-1 dropdown-menu-right">
                                                                <a href="javascript:void(0);" class="dropdown-item">
                                                                    <i class="ft-eye info"></i> Visualiser
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item">
                                                                    <i class="ft-edit-2 warning"></i> Modifier
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item" onclick="delForm({{ $liste->id }}, 'delItem')">
                                                                    <i class="ft-trash-2 danger"></i> Supprimer
                                                                    <form id="delItem{{ $liste->id }}" method="POST" action="{{ route('entree-sorties.destroy', ['entree_sorty' => $liste]) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </a>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-gradient-directional-blue text-white">
                                                <th colspan="2" class="text-right">Total :</th>
                                                <th class="text-right">{{ formatChiffre($listes->sum('entree')) }}</th>
                                                <th class="text-right">{{ formatChiffre($listes->sum('sortie')) }}</th>
                                                <th class="text-right">Solde :</th>
                                                <th class="text-right">{{ formatChiffre($listes->sum('entree')-$listes->sum('sortie')) }}</th>
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
        const affiche = () => {
            
        }
    </script>
@endsection
