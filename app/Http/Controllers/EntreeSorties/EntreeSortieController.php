<?php

namespace App\Http\Controllers\EntreeSorties;

use App\Activite;
use App\EntreeSortie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntreeSortieController extends Controller
{

    public function affiche(Request $request) {
        $activite = $request->activite;
        $mois = $request->mois;

        if ($activite == 0 && $mois == 0) {
            $listes = EntreeSortie::whereMonth('date', date('m'))->whereYear('date', annee())->latest()->get();
        }else{
            if ($activite != 0 && $mois != 0) {
                $listes = EntreeSortie::whereMonth('date', $mois)
                    ->whereActivitesId($activite)
                    ->whereYear('date', annee())
                    ->latest()->get();
            }else{
                if ($activite == 0) {
                    $listes = EntreeSortie::whereMonth('date', $mois)
                        ->whereYear('date', annee())
                        ->latest()->get();
                }else{
                    $listes = EntreeSortie::whereActivitesId($activite)
                        ->whereYear('date', annee())
                        ->latest()->get();
                }
            }
        }

        return view('pages.entreeSortie.entrees-sorties.data.liste', compact('listes'));
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

        return view('pages.entreeSortie.entrees-sorties.index', compact('activite', 'sideCompta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activite = Activite::latest()->get();
        $sideCompta = true;
        return view('pages.entreeSortie.entrees-sorties.create', compact('activite', 'sideCompta'));
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
            'date' => 'required',
            'type' => 'required',
            'activites_id' => 'required'
        ]);

        DB::beginTransaction();

        try {
            EntreeSortie::create($request->all());
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

        DB::commit();
        return redirect()->back()->with('success', "Nouvelle entrée/sortie ajoutée");
        //return redirect()->route('entree-sorties.index')->with('success', "Nouvelle entrée/sortie ajoutée");
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
