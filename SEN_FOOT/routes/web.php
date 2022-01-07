<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostControllers;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'App\Http\Controllers\PostControllers@index')->name('Accueil');
Route::get('/', [MainController::class, 'index'])->name('Accueil');
Route::get('/clubs', [MainController::class, 'club'])->name('pageClub');
Route::get('/clubs/{id}', [MainController::class, 'voirClub'])->name('pageVoirClub');
Route::get('/clubs/calendrier/{id}', [MainController::class, 'clubCalendrier'])->name('clubCalendrier');
Route::get('/clubs/Statistique/{id}', [MainController::class, 'clubStat'])->name('clubStatistique');
Route::get('/matches', [MainController::class, 'matche'])->name('Match');
Route::get('/matches/infos/{id}', [MainController::class, 'matcheInfo'])->name('infoMatch');
Route::get('/matches/infos/statistiques/{id}', [MainController::class, 'matcheInfoStat'])->name('infoMatchStatistique');
Route::get('/matches/infos/compositions/{idc}/{idm}', [MainController::class, 'compoMatche'])->name('infoMatchCompo');
Route::get('/championnats', [MainController::class, 'championnat'])->name('pageChampionnat');
Route::get('/championnats/{id}', [MainController::class, 'championnatVoir'])->name('voirChampionnat');
Route::get('/championnats/classement/{id}', [MainController::class, 'championnatVoirClass'])->name('voirChampionnatClassement');
Route::get('/championnats/equipes/{id}', [MainController::class, 'championnatVoirEquip'])->name('voirChampionnatEquipe');
//Route::get('/equipe', [PostControllers::class, 'equipe'])->name('Equipe');    //signifie la mm chose que ce qui est en haut
//Route::get('/match', 'App\Http\Controllers\PostControllers@match')->name('Match');  //name('Match') c'est pour les nommages aprés je pourrai l'utiliser dans les hrefs pour les appeler directement

Route::post('/creeruncompte/save',[PostControllers::class, 'save'])->name('saveForm');
//Route::get('/senfoot/admin/equipe',[PostControllers::class, 'afficherEquipe'])->name('afficherequipe');
Route::post('/connexion/check',[PostControllers::class, 'check'])->name('checkConnexion');

                        /* ROUTE DEFINI POUR L'UTILISATEUR ADMIN */
Route::group(['middleware'=>['authcheck']], function () {
    Route::get('/admin/accueil/administrateur', [PostControllers::class, 'superAdmin'])->name('pageSuperAdmin');
    Route::post('/admin/accueil/competition/calendrier/matche/composition/formation/save1/{idm}/{ide}', [PostControllers::class, 'saveFormation_1'])->name('sauvegarderFormation1');
    Route::post('/admin/accueil/competition/calendrier/matche/composition/formation/save2/{idm}/{ide}', [PostControllers::class, 'saveFormation_2'])->name('sauvegarderFormation2');
    Route::get('/admin/accueil/competition/calendrier/matche/composition/delete/{idt}',[PostControllers::class, 'delTitulaire'])->name('deleteTitulaire');
    Route::post('/admin/accueil/competition/calendrier/matche/composition/{idm}/{ide}/save', [PostControllers::class, 'saveTitulaire'])->name('sauvegarderJoueurTitul');
    Route::get('/admin/test', [PostControllers::class, 'testAccAdmin'])->name('pageTest');
    Route::get('/admin/calendrier', [PostControllers::class, 'calendrier'])->name('pageCalendrier');
    Route::get('/admin/transfert', [PostControllers::class, 'transfert'])->name('pageTransfert');
    Route::get('/admin/transfert/joueur/{idj}', [PostControllers::class, 'transfererJoueur'])->name('pageTransfertJoueur');
    Route::post('/admin/transfert/joueur/{idj}', [PostControllers::class, 'validerTransfert'])->name('validerTransfert');
    Route::get('/admin/accueil', [PostControllers::class, 'accueilAdmin'])->name('pageAccueilAdmin');
    Route::get('/admin', 'App\Http\Controllers\PostControllers@seConnecter')->name('Connecter');
    Route::get('/creeruncompte', 'App\Http\Controllers\PostControllers@formulaire')->name('creerCompte');
    Route::get('/admin/accueil/competition/classement/{idc}', [PostControllers::class, 'classement'])->name('pageClassement');
    Route::post('/admin/accueil/competition/classement/{idc}', [PostControllers::class, 'saveEquipeClassement'])->name('ajoutEquipClassement');
    Route::get('/admin/accueil/competition/classement/delete/{ide_c}', [PostControllers::class, 'delEquipClassement'])->name('enleverEquipClassement');
    Route::get('/admin/accueil/competition/classement/modifier/{idc}/{ide_c}', [PostControllers::class, 'modifClassement'])->name('pageModifClassement');
    Route::post('/admin/accueil/competition/classement/modifier/{idc}', [PostControllers::class, 'updateClassement'])->name('updatClassement');
    Route::get('/admin/accueil/competition', [PostControllers::class, 'compet'])->name('pageCompet');
    Route::get('/admin/accueil/competition/{id}', [PostControllers::class, 'modifCompet'])->name('pageModifCompet');
    Route::get('/admin/accueil/competition/calendrier/{id}', [PostControllers::class, 'calendrierLigue'])->name('pageCalendCompet');
    Route::get('/admin/accueil/competition/calendrier/ajoutermatch/{id}', [PostControllers::class, 'ajouterMatch'])->name('pageAjoutMatch');
    Route::get('/admin/accueil/competition/calendrier/match/{idc}/{idm}', [PostControllers::class, 'matche'])->name('pageMatch');
    Route::get('/admin/accueil/competition/calendrier/match/statistique/{idc}/{idm}', [PostControllers::class, 'statMatche'])->name('pageStatMatch');
    Route::get('/admin/accueil/competition/calendrier/match/composition/{idc}/{idm}', [PostControllers::class, 'compoMatche'])->name('pageCompoMatch');
    Route::get('/admin/accueil/competition/calendrier/match/statistique/ajouter/{idc}/{idm}', [PostControllers::class, 'ajoutStatMatche'])->name('pageAjoutStatMatch');
    Route::get('/admin/accueil/competition/calendrier/match/statistique/modifier/{idc}/{idm}/{ids}', [PostControllers::class, 'modifStatMatche'])->name('pageModifStatMatch');
    Route::get('/admin/accueil/competition/calendrier/match/statistique/modifier/ajoutbuteur/{idc}/{idm}/{ids}', [PostControllers::class, 'ajoutButeur'])->name('pageAjoutButeur');
    Route::post('/admin/accueil/competition/calendrier/match/statistique/modifier/ajoutbuteur/save/{ids}', [PostControllers::class, 'saveButeur'])->name('sauvegarderButeur');
    Route::post('/admin/accueil/competition/calendrier/match/statistique/modifier/save/{idm}', [PostControllers::class, 'saveStatMatch'])->name('sauvegarderModifStatMatch');
    Route::post('/admin/accueil/competition/calendrier/match/statistique/update/{ids}', [PostControllers::class, 'updateStatMatch'])->name('updateModifStatMatch');
    Route::post('/admin/accueil/competition/calendrier/ajoutermatch/save/{id}', [PostControllers::class, 'saveMatch'])->name('sauvegarderMatch');
    Route::get('/admin/accueil/competition/calendrier/deletematch/{id}', [PostControllers::class, 'delMatch'])->name('deleteMatch');
    Route::get('/admin/accueil/competition/calendrier/modifiermatch/{idc}/{idm}', [PostControllers::class, 'modifMatch'])->name('PageModifMatch');
    Route::post('/admin/accueil/competition/calendrier/modifiermatch/{idmatch}',[PostControllers::class, 'updateMatch'])->name('majMatch');
    Route::post('/admin/accueil/competition/{id}/save', [PostControllers::class, 'saveEquipeCompet'])->name('sauvegarderEquipeCompet');
    Route::get('/admin/accueil/creerunchampionnat', [PostControllers::class, 'creerChampionnat'])->name('pageCreerChampionnat');
    Route::post('/admin/accueil/creerunchampionnat', [PostControllers::class, 'saveChamp'])->name('sauvegarderChampionnat');
    Route::get('/admin/accueil/competition/delete/{id}',[PostControllers::class, 'delEquipeCompet'])->name('deleteEquipeCompet');
    Route::get('/logout', [PostControllers::class, 'logout'])->name('deconnexion');
    //Route::get('/admin/equipe', [PostControllers::class, 'equipebyadmin'])->name('equipeForAdmin');
    Route::get('/admin/equipe', 'App\Http\Controllers\PostControllers@equipebyadmin')->name('equipeForAdmin');
    Route::get('/admin/equipe/ajouter', [PostControllers::class, 'pageAjouterEquipe'])->name('ajouterEquipeByAdmin');
    Route::post('/admin/equipe/ajouter',[PostControllers::class, 'saveEquipe'])->name('sauvegarderEquipe');
    Route::get('/admin/equipe/modifierequipe/{id}',[PostControllers::class, 'modifEquipe'])->name('pageModifEquipe');
    Route::get('/admin/equipe/modifierequipe/calendrier/{id}',[PostControllers::class, 'modifEquipeCalend'])->name('pageEquipeCalend');
    Route::get('/admin/equipe/modifierequipe/effectif/{id}',[PostControllers::class, 'modifEquipeEffect'])->name('pageEquipeEffectif');
    Route::get('/admin/equipe/modifierequipe/effectif/{id}/romprecontrat',[PostControllers::class, 'rompreEquipeJoueur'])->name('rompreContrat');
    Route::get('/admin/equipe/supprimerunequipe',[PostControllers::class, 'supprimEquipe'])->name('suppEquipeByAdmin');
    Route::delete('/admin/equipe/supprimerunequipe/{id}',[PostControllers::class, 'delEquipe'])->name('deleteEquipe');
    Route::get('/admin/effectif',[PostControllers::class, 'effectifAdmin'])->name('pageEffectifAdmin');
    Route::get('/admin/effectif/ajoutereffectif',[PostControllers::class, 'ajouterJoueur'])->name('pageAjouterJoueur');
    Route::post('/admin/effectif/ajoutereffectif',[PostControllers::class, 'saveJoueur'])->name('sauvegarderJoueur');
    Route::get('/admin/effectif/supprimereffectif/{id}',[PostControllers::class, 'delJoueur'])->name('deleteJoueur');
    Route::get('/admin/effectif/modifiereffectif/{id}',[PostControllers::class, 'modifEffectif'])->name('pageModifJoueur');
    Route::post('/admin/effectif/modifiereffectif/{id}',[PostControllers::class, 'updateEffectif'])->name('majJoueur');
});


