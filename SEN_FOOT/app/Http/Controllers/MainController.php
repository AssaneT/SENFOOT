<?php

namespace App\Http\Controllers;

use App\Models\But;
use App\Models\Post;
use App\Models\Equipe;
use App\Models\Matche;
use App\Models\Effectif;
use App\Models\Formation;
use App\Models\Titulaire;
use App\Models\Classement;
use App\Models\Championnat;
use App\Models\Competition;
use App\Models\Statistique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //  Utilisez ce controleur comme celle des utilisateurs du site
    public function index(){

        $matches = Matche::all();

        $equipes = Equipe::all();

        $championnats = Championnat::all();

        return view('index', [
            'matches'=>$matches,
            'equipes'=>$equipes,
            'championnats'=>$championnats
        ]);
    }

    public function club(){

        $equipes = Equipe::all();

        $championnats = Championnat::all();

        $competitions = Competition::all();

        return view('clubs',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions
        ]);
    }

    public function voirClub($id_equipe){

        $equip = Equipe::find($id_equipe);

        $equipes = Equipe::find($id_equipe);

        $championnats = Championnat::all();

        $competitions = Competition::all();

        $effectifs = Effectif::all();

        return view('voirClub',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions,
            'effectifs'=>$effectifs,
            'equip' => $equip
        ]);
    }

    public function clubCalendrier($id_equipe){

        $equip = Equipe::find($id_equipe);

        $championnats = Championnat::all();

        $competitions = Competition::all();

        $effectifs = Effectif::all();

        $matches = Matche::all();

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        return view('voirClubCalendrier',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions,
            'effectifs'=>$effectifs,
            'matches'=>$matches,
            'equip'=>$equip,
            'statistiques'=>$statistiques
        ]);
    }

    public function clubStat($id_equipe){

        $equip = Equipe::find($id_equipe);

        $championnats = Championnat::all();

        $competitions = Competition::all();

        $effectifs = Effectif::all();

        $matches = Matche::all();

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $classements = Classement::all();

        return view('voirClubStat',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions,
            'effectifs'=>$effectifs,
            'matches'=>$matches,
            'equip'=>$equip,
            'statistiques'=>$statistiques,
            'classements'=>$classements
        ]);
    }

    public function matche(){

        $championnats = Championnat::all();

        $competitions = Competition::all();

        $effectifs = Effectif::all();

        $matches = Matche::all();

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $classements = Classement::all();

        return view('match',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions,
            'effectifs'=>$effectifs,
            'matches'=>$matches,
            'statistiques'=>$statistiques,
            'classements'=>$classements
        ]);
    }

    public function matcheInfo($id_match){

        $championnats = Championnat::all();

        $competitions = Competition::all();

        $effectifs = Effectif::all();

        $matches = Matche::find($id_match);

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $classements = Classement::all();

        return view('matchInfo',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions,
            'effectifs'=>$effectifs,
            'matches'=>$matches,
            'statistiques'=>$statistiques,
            'classements'=>$classements
        ]);
    }

    public function matcheInfoStat($id_match){

        $championnats = Championnat::all();

        $competitions = Competition::all();

        $effectifs = Effectif::all();

        $matches = Matche::find($id_match);

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $classements = Classement::all();

        $but = But::all();

        return view('matchInfoStat',[
            'equipes'=>$equipes,
            'championnats'=>$championnats,
            'competitions'=>$competitions,
            'effectifs'=>$effectifs,
            'matches'=>$matches,
            'statistiques'=>$statistiques,
            'classements'=>$classements,
            'but' => $but
        ]);
    }

    public function compoMatche($id_championnat, $id_match)
    {

        $championnat = Championnat::find($id_championnat);

        $equipes = Equipe::all();

        $competitions = Competition::all();

        $matches = Matche::find($id_match);

        $effectifs = Effectif::all();

        $statistiques = Statistique::all();

        $titulaires = Titulaire::all();

        $but = But::all();

        $formations = Formation::all();

        return view('matchCompo', [
            'competitions' => $competitions,
            'championnats' => $championnat,
            'equipes' => $equipes,
            'matches' => $matches,
            'effectifs' => $effectifs,
            'statistiques' => $statistiques,
            'but' => $but,
            'titulaires' => $titulaires,
            'formations' => $formations
        ]);
    }

    public function championnat(){

        $championnats = Championnat::all();

        return view('championnats',[
            'championnats'=>$championnats
        ]);
    }

    public function championnatVoir($id_championnat){

        $championnats = Championnat::find($id_championnat);

        $matches = Matche::all();

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $but = But::all();

        return view('championnatVoir',[
            'championnats'=>$championnats,
            'matches'=>$matches,
            'statistiques'=>$statistiques,
            'but' => $but,
            'equipes'=>$equipes
        ]);
    }

    public function championnatVoirClass($id_championnat){

        $championnats = Championnat::find($id_championnat);

        $matches = Matche::all();

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $but = But::all();

        $classements = Classement::all();

        return view('championnatVoirClassement',[
            'championnats'=>$championnats,
            'matches'=>$matches,
            'statistiques'=>$statistiques,
            'but' => $but,
            'equipes'=>$equipes,
            'classements'=>$classements
        ]);
    }

    public function championnatVoirEquip($id_championnat){

        $championnats = Championnat::find($id_championnat);

        $matches = Matche::all();

        $equipes = Equipe::all();

        $statistiques = Statistique::all();

        $but = But::all();

        $classements = Classement::all();

        $competitions = Competition::all();

        return view('championnatVoirEquipe',[
            'championnats'=>$championnats,
            'matches'=>$matches,
            'statistiques'=>$statistiques,
            'but' => $but,
            'equipes'=>$equipes,
            'classements'=>$classements,
            'competitions'=>$competitions
        ]);
    }

}
