<label for="depense" id="type_action">Choisir le type</label>
<select class="select2 form-control" id="type_depense" name="type_depenses_id">
    <option value=""></option>
    @foreach ($listes as $liste)
        <option value="{{ $liste->id }}">{{ $liste->libelle }}</option>
    @endforeach
</select>

<script>
    //$(".select2").select2();
</script>
