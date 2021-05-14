<?php

namespace App\Http\Controllers;

use App\Activite;
use App\EntreeSortie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntreeSortiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activite = Activite::latest()->get();
        $sideCompta = true;
        $listes = EntreeSortie::whereMonth('date', date('m'))->whereYear('date', date('Y'))->latest()->get();
        //dd($entreeSortie[0]->activite);
        return view('pages.entrees-sorties.index', compact('activite', 'sideCompta', 'listes'));
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
        return view('pages.entrees-sorties.create', compact('activite', 'sideCompta'));
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
            'entree' => 'required',
            'sortie' => 'required',
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
        return redirect()->route('entree-sorties.index')->with('success', "Nouvelle entrée/sortie ajoutée");
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
