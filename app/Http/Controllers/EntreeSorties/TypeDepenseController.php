<?php

namespace App\Http\Controllers\EntreeSorties;

use App\Activite;
use App\TypeDepense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TypeDepenseController extends Controller
{

    public function affiche(Request $request)
    {
        $activite = $request->activite;

        if ($activite == 0) {
            $listes = TypeDepense::latest()->get();
        }else{
            $listes = Activite::find($activite)->type_depenses;
        }

        return view('pages.entreeSortie.type-depense.data.liste', compact('listes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activite = Activite::latest()->get();
        $sideCompta = true;
        return view('pages.entreeSortie.type-depense.index', compact('activite', 'sideCompta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'libelle' => 'required|unique:type_depenses',
            'activites_id' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $act = Activite::find($request->activites_id);
            TypeDepense::create($request->all());
            insertLog("Enregistrement du type de dépense " . $request->libelle . " de l'activité " . $act->libelle);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
        return redirect()->back()->with('success', "Nouveau type de dépense ajoutée");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDepense $type_depense)
    {
        $activite = Activite::latest()->get();
        $sideCompta = true;
        return view('pages.entreeSortie.type-depense.edit', compact('activite', 'sideCompta', 'type_depense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDepense $type_depense)
    {
        $this->validate($request, [
            'libelle' => [
                'required',
                Rule::unique('type_depenses')->ignore($type_depense->id)
            ],
            'activites_id' => 'required'
        ]);

        DB::beginTransaction();

        try {
            insertLog("Modification du type de dépense " . $type_depense->libelle . " en : " . $request->libelle);
            $type_depense->update($request->all());
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
        return redirect()->route('type-depense.index')->with('success', "Type de dépense modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDepense $type_depense)
    {
        if ($type_depense->entreeSorties->count() > 0) {
            return redirect()->back()->with('warning', "Impossible de supprimer ce type de dépense car il possède des données");
        }else{
            insertLog("Suppression du type de dépense " . $type_depense->libelle);
            $type_depense->delete();
            return redirect()->back()->with('success', "Type de dépense supprimé.");
        }
    }
}
