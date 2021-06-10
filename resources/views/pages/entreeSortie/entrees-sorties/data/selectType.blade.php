<div id="blockSortie" style="display: none">
    <label for="depense" id="type_action">Type de sortie</label>
    <select class="select2 form-control" id="type_depense" name="type_depenses_id">
        <option value=""></option>
        @foreach ($depense as $liste)
            <option value="{{ $liste->id }}">{{ $liste->libelle }}</option>
        @endforeach
    </select>
</div>

<div id="blockEntree" style="display: none">
    <label for="entree" id="type_action">Type d'entrée</label>
    <select class="select2 form-control" id="type_entree" name="type_entrees_id">
        <option value=""></option>
        @foreach ($entree as $liste)
            <option value="{{ $liste->id }}">{{ $liste->libelle }}</option>
        @endforeach
    </select>
</div>
