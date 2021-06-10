<?php

namespace App\Http\Controllers\EntreeSorties;

use App\Activite;
use App\TypeEntree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TypeEntreeController extends Controller
{
    public function affiche(Request $request)
    {
        $activite = $request->activite;

        if ($activite == 0) {
            $listes = TypeEntree::latest()->get();
        }else{
            $listes = Activite::find($activite)->type_entrees;
        }

        return view('pages.entreeSortie.type-entree.data.liste', compact('listes'));
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
        return view('pages.entreeSortie.type-entree.index', compact('activite', 'sideCompta'));
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
            TypeEntree::create($request->all());
            insertLog("Enregistrement du type d'entree " . $request->libelle . " de l'activité " . $act->libelle);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
        return redirect()->back()->with('success', "Nouveau type d'entrée ajouté");
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
    public function edit(TypeEntree $type_entree)
    {
        $activite = Activite::latest()->get();
        $sideCompta = true;
        return view('pages.entreeSortie.type-entree.edit', compact('activite', 'sideCompta', 'type_entree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeEntree $type_entree)
    {
        $this->validate($request, [
            'libelle' => [
                'required',
                Rule::unique('type_entrees')->ignore($type_entree->id)
            ],
            'activites_id' => 'required'
        ]);

        DB::beginTransaction();

        try {
            insertLog("Modification du type d'entrée " . $type_entree->libelle . " en : " . $request->libelle);
            $type_entree->update($request->all());
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
        return redirect()->route('type-entree.index')->with('success', "Type d'entrée modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeEntree $type_entree)
    {
        if ($type_entree->entreeSorties->count() > 0) {
            return redirect()->back()->with('warning', "Impossible de supprimer ce type d'entrée car il possède des données");
        }else{
            insertLog("Suppression du type d'entrée " . $type_entree->libelle);
            $type_entree->delete();
            return redirect()->back()->with('success', "Type d'entrée supprimé.");
        }
    }
}
