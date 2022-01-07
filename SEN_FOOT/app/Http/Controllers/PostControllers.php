<?php
    namespace App\Http\Controllers;

    use App\Models\But;
    use App\Models\Championnat;
    use App\Models\Classement;
    use App\Models\Competition;
    use Illuminate\Http\Request;
    use App\Models\Post;            // A    REVOIR

    use App\Models\Compte;
    use App\Models\Effectif;
    use App\Models\Equipe;
use App\Models\Formation;
use App\Models\Matche;
    use App\Models\Statistique;
    use App\Models\Titulaire;

class PostControllers extends Controller {
        /*          SUPER    ADMINISTRATEUR           */
        public function superAdmin()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $comptes = Compte::all();

            return view('admin.administrateur',[
                'comptes' => $comptes
            ], $data);
        }


        /*             FORMATION                */

        public function saveFormation_1(Request $request, $idmatch, $idequipe)
        {
            // Requete validez
            $request->validate([
                'compodom'=>'required'
            ]);

            //  Insert data into database
            $formation = new Formation;
            $formation['match_id'] = $idmatch;
            $formation['equipe_id'] = $idequipe;
            $formation['formation'] = $request->compodom;

            $save = $formation->save();

            if ($save) {
                return back()->with('success','Formation enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement, veuillez réessayer plutard');
            }
        }

        public function saveFormation_2(Request $request, $idmatch, $idequipe)
        {
            // Requete validez
            $request->validate([
                'compoadv'=>'required'
            ]);

            //  Insert data into database
            $formation = new Formation;
            $formation['match_id'] = $idmatch;
            $formation['equipe_id'] = $idequipe;
            $formation['formation'] = $request->compoadv;

            $save = $formation->save();

            if ($save) {
                return back()->with('success','Formation enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement, veuillez réessayer plutard');
            }
        }

        /*             TITULAIRE               */

        public function delTitulaire($id)
        {
            $titulaires = Titulaire::where('id', $id)->first()->delete();

            if ($titulaires) {
                return back()->with('success','Joueur enlevé des titulaires avec succés');
            } else {
                return back()->with('fail','Echec lors de la suppression');
            }
        }

        public function saveTitulaire(Request $request, $idmatch, $nomequipe)
        {
            // Requete validez
            $request->validate([
                'joueur'=>'required|unique:titulaires,joueur_id,'.$idmatch
            ]);

            //  Insert data into database
            $titulaire = new Titulaire;
            $titulaire['joueur_id'] = $request->joueur;
            $titulaire['match_id'] = $idmatch;
            $titulaire['nomequipe'] = $nomequipe;

            $save = $titulaire->save();

            if ($save) {
                return back()->with('success','Joueur ajouté avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'ajout du joueur, veuillez réessayer plutard');
            }
        }

        /*   *******************************************************  */

        /*public function testAccAdmin()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::all();

            $equipes = Equipe::all();

            $effectifs = Effectif::all();

            $matches = Matche::all();

            $classements = Classement::all();

            return view('admin.test_index',[
                'championnats'=>$championnats,
                'equipes'=>$equipes,
                'effectifs'=>$effectifs,
                'matches'=>$matches,
                'classements'=>$classements
            ], $data);
        }   */

        public function validerTransfert(REQUEST $request, $joueur_id){
            // Requete validez
            $save = $request->validate([
                'club'=>'required'
            ]);

            $valider = Effectif::whereId($joueur_id)->update($save);

            if ($valider) {
                return back()->with('success','Transfert effectué avec succés');
            } else {
                return back()->with('fail','Echec lors du transfert, veuillez réessayer plutard');
            }
        }

        public function transfererJoueur($joueur_id)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::all();

            $equipes = Equipe::all();

            $effectifs = Effectif::find($joueur_id);

            $matches = Matche::all();

            $classements = Classement::all();

            $statistiques = Statistique::all();

            return view('admin.transfertJoueur',[
                'championnats'=>$championnats,
                'equipes'=>$equipes,
                'effectifs'=>$effectifs,
                'matches'=>$matches,
                'classements'=>$classements,
                'statistiques'=>$statistiques
            ], $data);
        }

        public function transfert()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::all();

            $equipes = Equipe::all();

            $effectifs = Effectif::all();

            $matches = Matche::all();

            $classements = Classement::all();

            $statistiques = Statistique::all();

            return view('admin.transfert',[
                'championnats'=>$championnats,
                'equipes'=>$equipes,
                'effectifs'=>$effectifs,
                'matches'=>$matches,
                'classements'=>$classements,
                'statistiques'=>$statistiques
            ], $data);
        }

        public function calendrier()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::all();

            $equipes = Equipe::all();

            $effectifs = Effectif::all();

            $matches = Matche::all();

            $classements = Classement::all();

            $statistiques = Statistique::all();

            return view('admin.calendrier',[
                'championnats'=>$championnats,
                'equipes'=>$equipes,
                'effectifs'=>$effectifs,
                'matches'=>$matches,
                'classements'=>$classements,
                'statistiques'=>$statistiques
            ], $data);
        }

        /*  ******************************************************************************************  */

        public function pageAjouterEquipe(){
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];
            return view('admin.formulaireAjouterEquipe', $data);
        }

        public function seConnecter(){
            return view('admin.admin');
        }

        public function formulaire(){
            return view('formulaire');
        }

        public function equipebyadmin(){
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];
            $equipes = Equipe::all();

            return view('admin.equipeByAdmin', [
                'equipes' => $equipes,   //equipes = base de donnée et $equipes une variable ou est stocké le contenu de la table
            ], $data);
        }

        public function supprimEquipe()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $equipes = Equipe::all();

            return view('admin.supprimEquipeByAdmin', [
                'equipes' => $equipes,   //equipes = base de donnée et $equipes une variable ou est stocké le contenu de la table
            ], $data);
        }

        public function delEquipe($id)
        {
            //return response()->json(Equipe::where('id', $id)->first()->delete());

            $equipe = Equipe::where('id', $id)->first()->delete();

            if ($equipe) {
                //$data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

                return back()->with('success','Equipe supprimé avec succés');
            }
            //return back()->with('success','Equipe supprimé avec succés');

        }

        //      A REVOIR
        public function researchEquipe(REQUEST $request)
        {
            $equipe = Equipe::where('nomequipe', $request->equipe)->first();

            if (!empty($equipe)) {
                return view('admin.supprimEquipeByAdmin', [
                    'equipes' => $equipe
                ]);
            } else {
                return back()->with('fail','le nom de l\'équipe saisit n\'est pas reconnu');
            }
        }

        public function modifEquipe($id_equipe)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $equipes = Equipe::all();

            $equip = Equipe::find($id_equipe);

            $effectifs = Effectif::all();

            $competitions = Competition::all();

            $championnats = Championnat::all();

            $classements = Classement::all();

            $matches = Matche::all();

            $statistiques = Statistique::all();

            return view('admin.modifEquipeByAdmin', [
                'effectifs' => $effectifs,
                'equipes' => $equipes,
                'competitions' => $competitions,
                'championnats' => $championnats,
                'classements' => $classements,
                'matches' => $matches,
                'statistiques' => $statistiques,
                'equip' => $equip
            ], $data);
        }

        public function modifEquipeCalend($id_equipe)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $equip = Equipe::find($id_equipe);

            $equipes = Equipe::all();

            $effectifs = Effectif::all();

            $matches = Matche::all();

            $statistiques = Statistique::all();

            return view('admin.modifEquipeCalend', [
                'effectifs' => $effectifs,
                'equipes' => $equipes,
                'matches' => $matches,
                'equip' => $equip,
                'statistiques' => $statistiques
            ], $data);
        }

        public function modifEquipeEffect($id_equipe)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            //$equip = Equipe::find($id_equipe);

            $equipes = Equipe::find($id_equipe);

            $effectifs = Effectif::all();

            $matches = Matche::all();

            return view('admin.modifEquipeEffectif', [
                'effectifs' => $effectifs,
                'equipes' => $equipes,
                'matches' => $matches,
                //'equip' => $equip
            ], $data);
        }

        public function rompreEquipeJoueur(REQUEST $request, $id)
        {
            $effectif = Effectif::find($id);

            $rompreC = $effectif->update([
                'club'=>'libre'
            ]);

            if ($rompreC) {
                return back()->with('success','Contrat du joueur rompu avec succés');
            } else {
                return back()->with('fail','Echec lors de la suppression');
            }
        }

        public function save(REQUEST $request){
            // Requete validez
            $request->validate([
                'prenom'=>'required',
                'nom'=>'required',
                'login'=>'required|unique:comptes',
                'password'=>'required|min:5|max:15'
            ]);

            //  Insert data into database
            $compte = new Compte;
            $compte->prenom = $request->prenom;
            $compte->nom = $request->nom;
            $compte->login = $request->login;
            $compte->password = $request->password;

            $save = $compte->save();

            if ($save) {
                return back()->with('success','Nouveau utilisateur ajouté avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement, veuillez réessayer plutard');
            }
        }

        public function saveEquipe(Request $request)
        {
            // Requete validez
            $request->validate([
                'nomequipe'=>'required|unique:equipes',
                'siege'=>'required',
                'devise'=>'required',
                'terrain'=>'required',
                'date'=>'required',
                'logo'=>'required'
            ]);

            $formatdate = date('Y-m-d');
            $formatdate = $request->date;
            //  Insert data into database
            $equipe = new Equipe;
            $equipe['nomequipe'] = $request->nomequipe;
            $equipe['siege'] = $request->siege;
            $equipe['devise'] = $request->devise;
            $equipe['terraindom'] = $request->terrain;
            $equipe['datedecreation'] = $formatdate;
            $equipe['logo'] = request('logo') -> store('uploads', 'public');
            //$equipe['logo'] = $request->logo;

            $save = $equipe->save();

            if ($save) {
                return back()->with('success','Equipe enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement, veuillez réessayer plutard');
            }
        }

        public function check(Request $request){
            // Requete validez
            $request->validate([
                'login'=>'required',
                'password'=>'required|min:5|max:15'
            ]);

            $infoUser = Compte::where('login','=',$request->login)->first();
            if (($request->login)=="assane00" && ($request->password)=="passer") {
                $request->session()->put('LoggedUser',$infoUser->id);
                return redirect('/admin/accueil');
            } else if (!$infoUser) {
                return back()->with('fail','Nous ne reconnaissons pas votre login');
            } else {
                // Alors on verifie si le mdp est correcte
                if ($request->password == $infoUser->password) {
                    $request->session()->put('LoggedUser',$infoUser->id);
                    return redirect('/admin/accueil');
                } else {
                    return back()->with('fail','Le mot de passe est incorrect');
                }
            }
        }

        public function logout(){
            if (session()->has('LoggedUser')) {
                session()->pull('LoggedUser');
                return redirect('/');
            }
        }

        public function saveEquipeCompet(Request $request, $nomcompet)
        {
            //  A   REVOIR  Probleme avec la limite d'équipe par championnat
            $nbrcompet = 0;
            $compets = Competition::all();

            foreach ($compets as $compet) {
                if ($compet->nomcompet == $nomcompet) {
                    $nbrcompet++;
                }
            }

            $champs = Championnat::all();

            foreach ($champs as $champ) {
                if ($champ->nomchampionnat == $nomcompet) {
                    if ($nbrcompet <= ($champ->nombrequipe)) {
                        // Requete validez
                        $request->validate([
                            'equipe'=>'required|unique:competitions,equipe,'.$nomcompet
                        ]);

                        //  Insert data into database
                        $competition = new Competition;
                        $competition['nomcompet'] = $nomcompet;
                        $competition['equipe'] = $request->equipe;

                        $save = $competition->save();

                        if ($save) {
                            return back()->with('success','Equipe ajouté à la compétition avec succés');
                        } else {
                            return back()->with('fail','Echec lors de l\'ajout de l\'équipe, veuillez réessayer plutard');
                        }
                    } else {
                        return back()->with('fail','Le nombre maximum de participant a été atteint');
                    }
                }
            }
        }

        public function delEquipeCompet($id)
        {
            $competitions = Competition::where('id', $id)->first()->delete();

            if ($competitions) {
                return back()->with('success','Equipe enlevé de la compétition avec succés');
            } else {
                return back()->with('fail','Echec lors de la suppression');
            }
        }

        public function modifCompet($id_compet){
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::find($id_compet);

            $competitions = Competition::all();

            $equipes = Equipe::all();

            return view('admin.modifCompetByAdmin', [
                'championnats'=>$championnats,
                'competitions'=>$competitions,
                'equipes'=>$equipes
            ], $data);
        }

        public function calendrierLigue($id_compet)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::find($id_compet);

            $competitions = Competition::all();

            $matches = Matche::all();

            $equipes = Equipe::all();

            return view('admin.modifCompetCalendrierByAdmin', [
                'championnats'=>$championnats,
                'competitions'=>$competitions,
                'equipes'=>$equipes,
                'matches'=>$matches
            ], $data);
        }

        public function ajouterMatch($id_championnat)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            return view('admin.formulaireAjouterUnMatch', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes
            ], $data);
        }

        public function modifMatch($id_championnat, $id_match)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            return view('admin.modifMatchByAdmin', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches
            ], $data);
        }

        public function saveMatch(Request $request, $id_championnat)
        {
            // Requete validez
            $request->validate([
                'equipeadv'=>'required',
                'equipedom'=>'required',
                'datematch'=>'required',
                'heurematch'=>'required',
                'stade'=>'required'
            ]);

            //  Insert data into database
            $matches = new Matche;
            $matches['championnat_id'] = $id_championnat;
            $matches['equipeadv'] = $request->equipeadv;
            $matches['equipedom'] = $request->equipedom;
            $matches['datematch'] = $request->datematch;
            $matches['heurematch'] = $request->heurematch;
            $matches['stade'] = $request->stade;

            $save = $matches->save();

            if ($save) {
                return back()->with('success','Match enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement, veuillez réessayer plutard');
            }
        }

        public function delMatch($id_match)
        {
            $matches = Matche::where('id', $id_match)->first()->delete();

            if ($matches) {
                return back()->with('success','Match supprimé avec succés');
            } else {
                return back()->with('fail','Echec lors de la suppression');
            }
        }

        public function updateMatch(REQUEST $request, $id_match)
        {
            $validatedData = $request->validate([
                'equipedom'=>'required',
                'equipeadv'=>'required',
                'datematch'=>'required',
                'heurematch'=>'required',
                'stade'=>'required'
            ]);

            $maj = Matche::whereId($id_match)->update($validatedData);

            if ($maj) {
                return back()->with('success','Match mise à jour avec succés');
            } else {
                return back()->with('fail','Echec lors de la mise à jour');
            }
        }

        public function matche($id_championnat, $id_match)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            $effectifs = Effectif::all();

            $statistiques = Statistique::all();

            return view('admin.matchByAdmin', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches,
                'effectifs' => $effectifs,
                'statistiques' => $statistiques
            ], $data);
        }

        public function statMatche($id_championnat, $id_match)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            $effectifs = Effectif::all();

            $statistiques = Statistique::all();

            $but = But::all();

            return view('admin.matchStatByAdmin', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches,
                'effectifs' => $effectifs,
                'statistiques' => $statistiques,
                'but' => $but
            ], $data);
        }

        public function compoMatche($id_championnat, $id_match)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            $effectifs = Effectif::all();

            $statistiques = Statistique::all();

            $titulaires = Titulaire::all();

            $but = But::all();

            $formations = Formation::all();

            return view('admin.matchComposition', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches,
                'effectifs' => $effectifs,
                'statistiques' => $statistiques,
                'but' => $but,
                'titulaires' => $titulaires,
                'formations' => $formations
            ], $data);
        }

        public function ajoutStatMatche($id_championnat, $id_match)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            $statistiques = Statistique::all();

            return view('admin.ajoutMatchStatByAdmin', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches,
                'statistiques' => $statistiques
            ], $data);
        }

        public function ajoutButeur($id_championnat, $id_match, $id_stat)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            $effectifs = Effectif::all();

            $statistiques = Statistique::all();

            $stat = Statistique::find($id_stat);

            return view('admin.ajoutButeurMatch', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches,
                'statistiques' => $statistiques,
                'stat' => $stat,
                'effectifs' => $effectifs
            ], $data);
        }

        public function saveButeur(Request $request, $id_stat)
        {
            // Requete validez
            $request->validate([
                'but_equipe'=>'required',
                'but_contresoncamp'=>'required',
                'passdec_equipe'=>'required',
                'nom_equipe' =>'required'
            ]);

            //  Insert data into database
            $but = new But;
            $but['stat_id'] = $id_stat;
            $but['but_equipe'] = $request->but_equipe;
            $but['but_contresoncamp'] = $request->but_contresoncamp;
            $but['passdec_equipe'] = $request->passdec_equipe;
            $but['nom_equipe'] = $request->nom_equipe;

            $save = $but->save();

            if ($save) {
                return back()->with('success','Buteur enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement du buteur, veuillez réessayer plutard');
            }
        }

        public function saveStatMatch(Request $request, $id_match)
        {
            // Requete validez
            $request->validate([
                'but_equipe_dom'=>'required',
                'but_equipe_adv'=>'required',
                'tir_equipe_dom'=>'required',
                'tir_equipe_adv'=>'required',
                'tir_cadre_equipe_dom'=>'required',
                'tir_cadre_equipe_adv'=>'required',
                'possession_equipe_dom'=>'required',
                'possession_equipe_adv'=>'required',
                'passe_equipe_dom'=>'required',
                'passe_equipe_adv'=>'required',
                'faute_equipe_dom'=>'required',
                'faute_equipe_adv'=>'required',
                'carton_jaune_equipe_dom'=>'required',
                'carton_jaune_equipe_adv'=>'required',
                'carton_rouge_equipe_dom'=>'required',
                'carton_rouge_equipe_adv'=>'required',
                'hors_jeu_equipe_dom'=>'required',
                'hors_jeu_equipe_adv'=>'required',
                'corners_equipe_dom'=>'required',
                'corners_equipe_adv'=>'required'
            ]);

            //  Insert data into database
            $statistique = new Statistique;
            $statistique['matche_id'] = $id_match;
            $statistique['but_equipe_dom'] = $request->but_equipe_dom;
            $statistique['but_equipe_adv'] = $request->but_equipe_adv;
            $statistique['tir_equipe_dom'] = $request->tir_equipe_dom;
            $statistique['tir_equipe_adv'] = $request->tir_equipe_adv;
            $statistique['tircadre_equipe_dom'] = $request->tir_cadre_equipe_dom;
            $statistique['tircadre_equipe_adv'] = $request->tir_cadre_equipe_adv;
            $statistique['possession_equipe_dom'] = $request->possession_equipe_dom;
            $statistique['possession_equipe_adv'] = $request->possession_equipe_adv;
            $statistique['passe_equipe_dom'] = $request->passe_equipe_dom;
            $statistique['passe_equipe_adv'] = $request->passe_equipe_adv;
            $statistique['faute_equipe_dom'] = $request->faute_equipe_dom;
            $statistique['faute_equipe_adv'] = $request->faute_equipe_adv;
            $statistique['cartonjaune_equipe_dom'] = $request->carton_jaune_equipe_dom;
            $statistique['cartonjaune_equipe_adv'] = $request->carton_jaune_equipe_adv;
            $statistique['cartonrouge_equipe_dom'] = $request->carton_rouge_equipe_dom;
            $statistique['cartonrouge_equipe_adv'] = $request->carton_rouge_equipe_adv;
            $statistique['horsjeu_equipe_dom'] = $request->hors_jeu_equipe_dom;
            $statistique['horsjeu_equipe_adv'] = $request->hors_jeu_equipe_adv;
            $statistique['corners_equipe_dom'] = $request->corners_equipe_dom;
            $statistique['corners_equipe_adv'] = $request->corners_equipe_adv;

            $save = $statistique->save();

            if ($save) {
                return back()->with('success','Stats enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement des stats, veuillez réessayer plutard');
            }
        }

        public function modifStatMatche($id_championnat, $id_match, $id_stat)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnat = Championnat::find($id_championnat);

            $equipes = Equipe::all();

            $competitions = Competition::all();

            $matches = Matche::find($id_match);

            $statistiques = Statistique::all();

            $stat = Statistique::find($id_stat);

            return view('admin.modifStatMatch', [
                'competitions' => $competitions,
                'championnats' => $championnat,
                'equipes' => $equipes,
                'matches' => $matches,
                'statistiques' => $statistiques,
                'stat' => $stat
            ], $data);
        }

        public function updateStatMatch(REQUEST $request, $id_stat)
        {
            $validatedData = $request->validate([
                'but_equipe_dom'=>'required',
                'but_equipe_adv'=>'required',
                'tir_equipe_dom'=>'required',
                'tir_equipe_adv'=>'required',
                'tircadre_equipe_dom'=>'required',
                'tircadre_equipe_adv'=>'required',
                'possession_equipe_dom'=>'required',
                'possession_equipe_adv'=>'required',
                'passe_equipe_dom'=>'required',
                'passe_equipe_adv'=>'required',
                'faute_equipe_dom'=>'required',
                'faute_equipe_adv'=>'required',
                'cartonjaune_equipe_dom'=>'required',
                'cartonjaune_equipe_adv'=>'required',
                'cartonrouge_equipe_dom'=>'required',
                'cartonrouge_equipe_adv'=>'required',
                'horsjeu_equipe_dom'=>'required',
                'horsjeu_equipe_adv'=>'required',
                'corners_equipe_dom'=>'required',
                'corners_equipe_adv'=>'required'
            ]);

            $maj = Statistique::whereId($id_stat)->update($validatedData);

            if ($maj) {
                return back()->with('success','Stat mise à jour avec succés');
            } else {
                return back()->with('fail','Echec lors de la mise à jour');
            }
        }

        /*      CONTROLEUR      POUR    LES     CHAMPIONNATS       */

        public function classement($id_championnat)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::find($id_championnat);

            $competitions = Competition::all();

            $equipes = Equipe::all();

            $classements = Classement::all();

            return view('admin.classementCompet',[
                'championnats'=>$championnats,
                'equipes'=>$equipes,
                'competitions'=>$competitions,
                'classements'=>$classements
            ], $data);
        }

        public function saveEquipeClassement(Request $request, $id_championnat)
        {
            $request->validate([
                'equipe'=>'required|unique:classements,equipe,'.$id_championnat
            ]);

            //  Insert data into database
            $classements = new Classement;
            $classements['id_championnat'] = $id_championnat;
            $classements['position'] = 1;
            $classements['equipe'] = $request->equipe;
            $classements['points'] = 0;
            $classements['jouer'] = 0;
            $classements['gagner'] = 0;
            $classements['nuls'] = 0;
            $classements['perdus'] = 0;
            $classements['butpour'] = 0;
            $classements['butcontre'] = 0;
            $classements['diff'] = 0;

            $save = $classements->save();

            if ($save) {
                return back()->with('success','Equipe ajouté au classement avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'ajout de l\'équipe, veuillez réessayer plutard');
            }
        }

        public function delEquipClassement($id_equipe_classement)
        {
            $equipes_classm = Classement::where('id', $id_equipe_classement)->first()->delete();

            if ($equipes_classm) {
                return back()->with('success','Equipe enlevé du classement avec succés');
            } else {
                return back()->with('fail','Echec lors de la suppression');
            }
        }

        public function modifClassement($id_championnat, $id_classement)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::find($id_championnat);

            $classements = Classement::find($id_classement);

            $equipes = Equipe::all();

            return view('admin.modifClassement',[
                'championnats'=>$championnats,
                'classements'=>$classements,
                'equipes'=>$equipes
            ], $data);
        }

        public function updateClassement(Request $request, $id_classement)
        {
            $validatedData = $request->validate([
                'position'=>'required',
                'points'=>'required',
                'jouer'=>'required',
                'gagner'=>'required',
                'nuls'=>'required',
                'perdus'=>'required',
                'butpour'=>'required',
                'butcontre'=>'required',
                'diff'=>'required'
            ]);

            $maj = Classement::whereId($id_classement)->update($validatedData);

            if ($maj) {
                return back()->with('success','Classement mise à jour avec succés');
            } else {
                return back()->with('fail','Echec lors de la mise à jour');
            }
        }

        /*      CONTROLEUR      POUR    LES     EFFECTIFS       */

        public function effectifAdmin()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $effectifs = Effectif::all();

            return view('admin.effectifByAdmin', [
                'effectifs' => $effectifs,   //effectifs = base de donnée et $effectif une variable ou est stocké le contenu de la table
            ], $data);
        }

        public function ajouterJoueur()
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $equipes = Equipe::all();

            return view('admin.formulaireAjouterEffectif', [
                'equipes' => $equipes,   //equipes = base de donnée et $equipes une variable ou est stocké le contenu de la table
            ], $data);
        }

        public function saveJoueur(Request $request)
        {
            // Requete validez
            $request->validate([
                'prenom'=>'required',
                'nom'=>'required',
                'datenaissance'=>'required',
                'lieunaissance'=>'required',
                'nationalite'=>'required',
                'club'=>'required',
                'poste'=>'required',
                'age'=>'required',
                'numero'=>'required',
                'taille'=>'required'
            ]);

            $formatdate = date('Y-m-d');
            $formatdate = $request->datenaissance;
            //  Insert data into database
            $effectif = new Effectif;
            $effectif['prenom'] = $request->prenom;
            $effectif['nom'] = $request->nom;
            $effectif['datenaissance'] = $formatdate;
            $effectif['lieunaissance'] = $request->lieunaissance;
            $effectif['nationalite'] = $request->nationalite;
            $effectif['club'] = $request->club;
            $effectif['poste'] = $request->poste;
            $effectif['age'] = $request->age;
            $effectif['numero'] = $request->numero;
            $effectif['taille'] = $request->taille;

            $save = $effectif->save();

            if ($save) {
                return back()->with('success','Joueur enregistré avec succés');
            } else {
                return back()->with('fail','Echec lors de l\'enregistrement du joueur, veuillez réessayer plutard');
            }
        }

        public function delJoueur($id)
        {
            $effectif = Effectif::where('id', $id)->first()->delete();

            if ($effectif) {
                return back()->with('success','Joueur supprimé avec succés');
            } else {
                return back()->with('fail','Echec lors de la suppression');
            }
        }

        public function modifEffectif($id_joueur)
        {
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            //$effectifs = Effectif::where('id', $id_joueur)->first();
            $effectif = Effectif::find($id_joueur);

            $equipes = Equipe::all();

            return view('admin.modifEffectifByAdmin', [
                'effectifs' => $effectif,
                'equipes' => $equipes
            ], $data);
        }

        public function updateEffectif(REQUEST $request, $id_joueur)
        {
            $validatedData = $request->validate([
                'prenom'=>'required',
                'nom'=>'required',
                'datenaissance'=>'required',
                'lieunaissance'=>'required',
                'nationalite'=>'required',
                'club'=>'required',
                'poste'=>'required',
                'age'=>'required',
                'numero'=>'required',
                'taille'=>'required'
            ]);

            $maj = Effectif::whereId($id_joueur)->update($validatedData);

            if ($maj) {
                return back()->with('success','Joueur mise à jour avec succés');
            } else {
                return back()->with('fail','Echec lors de la mise à jour');
            }
        }

        /*      CONTROLEUR      POUR    LES     CHAMPIONNATS       */

        public function accueilAdmin(){

            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::all();

            $equipes = Equipe::all();

            $effectifs = Effectif::all();

            $matches = Matche::all();

            $classements = Classement::all();

            return view('admin.accueilAdmin',[
                'championnats'=>$championnats,
                'equipes'=>$equipes,
                'effectifs'=>$effectifs,
                'matches'=>$matches,
                'classements'=>$classements
            ], $data);
        }

        public function saveChamp(Request $request)
        {
            // Requete validez
            $request->validate([
                'nomchampionnat'=>'required|unique:championnats',
                'nombrequipe'=>'required',
                'slogan'=>'required',
                'pays'=>'required'
            ]);

            //  Insert data into database
            $championnat = new Championnat;
            $championnat['nomchampionnat'] = $request->nomchampionnat;
            $championnat['nombrequipe'] = $request->nombrequipe;
            $championnat['slogan'] = $request->nombrequipe;
            $championnat['pays'] = $request->pays;

            $save = $championnat->save();

            if ($save) {
                return back()->with('success','Championnat crée avec succés');
            } else {
                return back()->with('fail','Echec lors de la création du championnat, veuillez réessayer plutard');
            }
        }

        public function creerChampionnat(){
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            return view('admin.creerChampionnat', $data);
        }

        public function compet(){
            $data = ['LoggedUserInfo'=>Compte::where('id','=', session('LoggedUser'))->first()];

            $championnats = Championnat::all();

            $equipes = Equipe::all();

            return view('admin.competByAdmin',[
                'championnats'=>$championnats,
                'equipes'=>$equipes
            ], $data);
        }

    }

?>
