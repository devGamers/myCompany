<?php

namespace App\Http\Controllers;

use App\Comptabilite;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        if (auth()->user()->profil->libelle === 'Administrateur') {
            //return redirect()->route('dashboard.comptabilite');
            $user = User::count();
            $entree = Comptabilite::sum('entree');
            $sortie = Comptabilite::sum('sortie');
            $solde = $entree - $sortie;
            $noSidebar = true;
            return view('pages.dashboard.index', compact('user', 'solde', 'noSidebar'));
        }else{

        }
    }

    public function agent()
    {
        return view('pages.dashboard.agent');
    }

    public function comptabilite()
    {
        $sideCompta = true;
        return view('pages.dashboard.comptabilite', compact('sideCompta'));
    }

    // public function exercice()
    // {
    //     return view('pages.exercice.index');
    // }
}
