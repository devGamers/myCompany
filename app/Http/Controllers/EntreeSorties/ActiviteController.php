<?php

namespace App\Http\Controllers\EntreeSorties;

use App\Activite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ActiviteController extends Controller
{

    public function activite_type(Request $request)
    {
        $depense = Activite::find($request->activite)->type_depenses;
        $entree = Activite::find($request->activite)->type_entrees;
        return view('pages.entreeSortie.entrees-sorties.data.selectType', compact('depense', 'entree'));
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
        return view('pages.entreeSortie.activite.index', compact('activite', 'sideCompta'));
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
            'libelle' => 'required|unique:activites'
        ]);

        DB::beginTransaction();

        try {
            Activite::create($request->all());
            insertLog("Enregistrement de l'activité " . $request->libelle);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
        return redirect()->back()->with('success', "Nouvelle activité ajoutée");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activite $activite)
    {
        $this->validate($request, [
            'libelle' => [
                'required',
                Rule::unique('activites')->ignore($activite->id)
            ]
        ]);

        DB::beginTransaction();

        try {
            insertLog("Modification de l'activité " . $activite->libelle . " en : " . $request->libelle);
            $activite->update($request->all());
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }
        DB::commit();
        return redirect()->back()->with('success', "Activité modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activite $activite)
    {
        if ($activite->comptabilites->count() > 0) {
            return redirect()->back()->with('warning', "Impossible de supprimer cette activité car elle possède des données");
        }else{
            insertLog("Suppression de l'activité " . $activite->libelle);
            $activite->delete();
            return redirect()->back()->with('success', "Activité supprimée.");
        }
    }
}
