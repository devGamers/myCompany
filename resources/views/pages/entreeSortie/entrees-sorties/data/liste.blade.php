<div class="table-responsive">
    <table class="table table-striped table-bordered tableau">
        <thead>
            <tr>
                <th width="5%"></th>
                <th width="5%">Date</th>
                <th>Activité</th>
                <th colspan="2" class="text-center">Type</th>
                <th width="15%">Entrée</th>
                <th width="15%">Sorties</th>
                <th width="30%">Description</th>
                <th width="3%"></th>
            </tr>
            <tr>
                <th colspan="3"></th>
                <th>Entrée</th>
                <th>Dépense</th>
                <th colspan="4"></th>
            </tr>
        </thead>
        <tbody>
            @php($entrees = $listes->sum('entree'))
            @php($sorties = $listes->sum('sortie'))
            @php($solde = $listes->sum('entree')-$listes->sum('sortie'))
            @if ($mois_passe != false && $listes_mois_passe != false)
                <tr>
                    <td>0</td>
                    <td>{{ "01/".$mois_passe."/".annee() }}</td>
                    <td>{{ $activite }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="text-right">{{ formatNumber($listes_mois_passe->sum('entree')) }}</td>
                    <td class="text-right">{{ formatNumber($listes_mois_passe->sum('sortie')) }}</td>
                    <td data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Solde Initial" data-bg-color="pink" data-placement="right">
                        {{ minText("Solde Initial") }}
                    </td>
                    <td>-</td>
                </tr>
                @php($entrees += $listes_mois_passe->sum('entree'))
                @php($sorties += $listes_mois_passe->sum('sortie'))
                @php($solde += $listes_mois_passe->sum('entree')-$listes_mois_passe->sum('sortie'))
            @endif
            @foreach ($listes as $key => $liste )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ formatDate($liste->date) }}</td>
                    <td>{{ $liste->activite->libelle }}</td>
                    <td>{{ $liste->type_entrees_id ? $liste->type_entree->libelle : '-' }}</td>
                    <td>{{ $liste->type_depenses_id ? $liste->type_depense->libelle : '-' }}</td>
                    <td class="text-right">{{ $liste->entree == 0 ? '-' : formatNumber($liste->entree) }}</td>
                    <td class="text-right">{{ $liste->sortie == 0 ? '-' : formatNumber($liste->sortie) }}</td>
                    <td data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{ $liste->description }}" data-bg-color="pink" data-placement="right">
                        {{ minText($liste->description) }}
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="dropdown-item" onclick="delForm({{ $liste->id }}, 'delItem')">
                            <i class="ft-trash-2 danger"></i>
                            <form id="delItem{{ $liste->id }}" method="POST" action="{{ route('entree-sorties.destroy', ['entree_sorty' => $liste]) }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </a>
                        {{-- <span class="dropdown">
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
                        </span> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-gradient-directional-blue text-white">
                <th colspan="5" class="text-right">Total :</th>
                <th class="text-right">{{ formatNumber($entrees) }}</th>
                <th class="text-right">{{ formatNumber($sorties) }}</th>
                <th class="text-right">Solde :</th>
                <th class="text-right {{ $solde < 0 ? 'bg-danger' : 'bg-success' }}">{{ formatNumber($solde) }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    $(".tableau").DataTable({
        displayLength: 500,
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        "language": {
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": "Aucune données trouvées",
            "info": "Affichage _START_ sur _END_ à _TOTAL_ au total",
            "infoEmpty": "Aucune données dans le tableau",
            "infoFiltered": "(Filtrer sur _MAX_ données total)",
            "search": "Rechercher : ",
            "oPaginate": {
                "sNext": ">",
                "sPrevious": "<"
            }
        },
    }),
    $(
        ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
    ).addClass("btn btn-primary mr-1");
</script>
