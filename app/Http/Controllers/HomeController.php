<?php

namespace App\Http\Controllers;

use App\EntreeSortie;
use App\Parametre;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        if (auth()->user()->profil->libelle === 'Administrateur') {
            $user = User::count();
            $entree = EntreeSortie::sum('entree');
            $sortie = EntreeSortie::sum('sortie');
            $solde = $entree - $sortie;
            $noSidebar = true;
            return view('pages.dashboard.index', compact('user', 'solde', 'noSidebar'));
        }else{

        }
    }

    public function annee_choisi(Request $request)
    {
        session(['annee' => $request->annee_choisi]);
        return redirect()->route('home');
    }

    public function annee()
    {
        $parametre = Parametre::first();
        $annee = [];
        $year = date('Y');
        for ($i=0; $i < $parametre->nbrAnnee; $i++) {
            array_push($annee, $year-$i);
        }
        return view('pages.annee.index', compact('annee'));
    }

    public function parametre()
    {
        $parametre = Parametre::first();
        $noSidebar = true;
        return view('pages.dashboard.parametre', compact('parametre', 'noSidebar'));
    }

    public function travailleur()
    {
        return view('pages.dashboard.travailleur');
    }

    public function entreeSortie()
    {
        $sideCompta = true;
        return view('pages.dashboard.entreeSortie', compact('sideCompta'));
    }

    // public function exercice()
    // {
    //     return view('pages.exercice.index');
    // }
}
