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
            $mois_passe = false;
            $listes_mois_passe = false;
            $listes = EntreeSortie::whereMonth('date', date('m'))->whereYear('date', annee())->latest()->get();
        }else{
            $mois_passe = (int) $mois - 1;
            $mois_passe = "0". $mois_passe;

            if ($activite != 0 && $mois != 0) {
                $listes_mois_passe = EntreeSortie::whereMonth('date', $mois_passe)
                    ->whereActivitesId($activite)
                    ->whereYear('date', annee())
                    ->latest()->get();

                $listes = EntreeSortie::whereMonth('date', $mois)
                    ->whereActivitesId($activite)
                    ->whereYear('date', annee())
                    ->latest()->get();
            }else{
                if ($activite == 0) {
                    $listes_mois_passe = EntreeSortie::whereMonth('date', $mois_passe)
                        ->whereYear('date', annee())
                        ->latest()->get();

                    $listes = EntreeSortie::whereMonth('date', $mois)
                        ->whereYear('date', annee())
                        ->latest()->get();
                }else{
                    $listes_mois_passe = false;
                    $listes = EntreeSortie::whereActivitesId($activite)
                        ->whereYear('date', annee())
                        ->latest()->get();
                }
            }
        }

        $activite = $activite == 0 ? "Toutes les activités" : Activite::find($activite)->libelle;

        return view('pages.entreeSortie.entrees-sorties.data.liste', compact('listes', 'listes_mois_passe', 'mois_passe', 'activite'));
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
    public function destroy(EntreeSortie $entree_sorty)
    {
        $activite = Activite::find($entree_sorty->activites_id);
        $text = "Suppression de ";
        $text .= $entree_sorty->entree == 0 ? " de la sortie de " . $entree_sorty->sortie : " de l'entrée de " . $entree_sorty->entree;
        $text .= " du " . formatDate($entree_sorty->date) . " de l'activité " . $activite->libelle;
        $text .= "\nDescription du mouvement : " . $entree_sorty->description;
        insertLog($text, 2);
        $entree_sorty->delete();
        return redirect()->back()->with('success', "Suppression effectuée.");
    }
}
