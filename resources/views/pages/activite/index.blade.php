@extends('layouts.page')


@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Activité</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Comptabilté</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('activite.index') }}">Activité</a>
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
                            <h4 class="card-title">
                                <button class="btn btn-bg-gradient-x-orange-yellow" onclick="showModal('', 'new')">Nouvelle</button>
                            </h4>
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
                                                <th width="5%"></th>
                                                <th>Activité</th>
                                                <th width="10%">Total mvt</th>
                                                <th width="10%">Total entrée</th>
                                                <th width="10%">Total sorties</th>
                                                <th width="10%">Solde</th>
                                                <th width="3%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activite as $key => $value)
                                                @php
                                                    $entree = $value->entreeSorties->sum('entree');
                                                    $sortie = $value->entreeSorties->sum('sortie')
                                                @endphp
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $value->libelle }}</td>
                                                    <td>{{ formatChiffre($value->entreeSorties->count()) }}</td>
                                                    <td>{{ formatNumber($entree) }}</td>
                                                    <td>{{ formatNumber($sortie) }}</td>
                                                    <td>{{ formatNumber($entree-$sortie) }}</td>
                                                    <td>
                                                        <span class="dropdown">
                                                            <button id="btnSearchDrop12" type="button" class="btn btn-sm btn-icon btn-pure font-medium-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ft-more-vertical"></i>
                                                            </button>
                                                            <span aria-labelledby="btnSearchDrop12" class="dropdown-menu mt-1 dropdown-menu-right">
                                                                <a href="javascript:void(0);" class="dropdown-item">
                                                                    <i class="ft-eye info"></i> Visualiser
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item" onclick="showModal({{ $value->id }}, 'update')">
                                                                    <i class="ft-edit-2 warning"></i> Modifier
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item" onclick="delForm({{ $value->id }}, 'delItem')">
                                                                    <i class="ft-trash-2 danger"></i> Supprimer
                                                                    <form id="delItem{{ $value->id }}" method="POST" action="{{ route('activite.destroy', ['activite' => $value]) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </a>
                                                            </span>
                                                        </span>
                                                    </td>
                                                    <div class="modal fade text-left" id="update{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modifiée Activité</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="{{ route('activite.update', ['activite' => $value]) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="libelle" class="col-form-label">Libellé</label>
                                                                            <input type="text" class="form-control" id="libelle" name="libelle" required value="{{ $value->libelle }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                        <button class="btn btn-primary">Modifier</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Activité</th>
                                                <th>Total mvt</th>
                                                <th>Total entrée</th>
                                                <th>Total sorties</th>
                                                <th>Solde</th>
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

    <div class="modal fade text-left" id="new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle Activité</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('activite.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="libelle" class="col-form-label">Libellé</label>
                            <input type="text" class="form-control" id="libelle" name="libelle" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @error('libelle')
            notify('warning', 'Cette activité existe déjà.');
        @enderror
    </script>
@endsection
