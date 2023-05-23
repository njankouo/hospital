<?php

use App\Http\Controllers\CaisseController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ConditionnementController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\FormeGalleliqueController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\HospitalisationController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


    // Routes qui nécessitent une authentification

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dasboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('patients',[PatientController::class,'index'])->name('patient');
Route::get('users',[UserController::class,'index'])->name('users');
Route::get("Profiles",[ProfileController::class,"index"])->name("profile");
Route::get('produits',[ProduitController::class,'index'])->name('produits');
Route::get('formes',[FormeGalleliqueController::class,'index'])->name('formes');
Route::get('familles',[FamilleController::class,'index'])->name('familles');
Route::get('conditionnements',[ConditionnementController::class,'index'])->name('conditionnements');
Route::get('fournisseurs',[FournisseurController::class,'index'])->name('fournisseurs');
Route::get('commandes',[CommandeController::class,'index'])->name('commandes');
Route::get('user/{id}',[UserController::class,'editUser'])->name('users.edit');
//Route::get('patient',[PatientController::class,'index'])->name('patient');
Route::get('commandes/{id}',[CommandeController::class,'valide'])->name('valide.commande');
Route::get('commande',[CommandeController::class,'generatePrice'])->name('charger.price');
//Route::get('patients',[PatientController::class,'index'])->name('patient');
Route::get('rendez-vous',[RdvController::class,'generateTelephone'])->name('charger.telephone');

Route::get('produit/edit/{id}',[ProduitController::class,'edit'])->name('edit.produit');
Route::get('update/{id}',[PatientController::class,'updatePatient'])->name('update.patient');
Route::get('ajouter/produit',[CommandeController::class,'saveProduit'])->name('save.commande');
Route::get('livraison',[LivraisonController::class,'index'])->name('add.livraisons');
Route::get('chambres',[ChambreController::class,'index'])->name('chambres');
Route::get('consultations',[ConsultationController::class,'index'])->name('consultations');
Route::get('consult',[ConsultationController::class,'new'])->name('save.consultation');
//Route::get('add/prescription/{id}',[PrescriptionController::class,'index'])->name('add.prescription');
Route::get('ordonance',[PrescriptionController::class,'ordonance'])->name('ordonance.view');
Route::get('ordonance/pdf/{id}',[PrescriptionController::class,'ordonancePdf'])->name('ordonance.pdf');

Route::get('rendez/vous',[RdvController::class,'index'])->name('rdv.view');

Route::get('hospitalisation',[HospitalisationController::class,'index'])->name('hospitalisation');
Route::get('produit/pdf',[ProduitController::class,'pdf'])->name('produit.pdf');
Route::get('ventes/create/{id}',[VenteController::class,'save'])->name('add.vente');
Route::get('dossier/patient/{id}',[PatientController::class,'dossier'])->name('dossier.patient');

Route::get('examen/vue/',[ExamenController::class,'index'])->name('examen.index');

Route::get('examen/{id}',[ExamenController::class,'option'])->name('examen.info');
Route::get('caisses',[CaisseController::class,'index'])->name('caisse');
Route::get('ventes',[VenteController::class,'index'])->name('ventes');
Route::get('produits/ventes',[VenteController::class,'listeVente'])->name('ventes.produits');
Route::get('fichier/consultation/{id}',[ConsultationController::class,'fichierConsultation'])->name('fichier.consultation');
Route::get('add-to-cart/{id}', [VenteController::class, 'addToCart'])->name('add.to.cart');
Route::get('set/chambre/{id}',[ChambreController::class,'mask'])->name('soft.chambre');
Route::get('soft/produit/{id}',[ProduitController::class,'softProduct'])->name('soft.produit');
Route::get('soft/user/{id}',[UserController::class,'softUser'])->name('soft.user');
Route::get('soft/vente/{id}',[VenteController::class,'softVente'])->name('soft.vente');
Route::get('hospitalisation/soft/{id}',[HospitalisationController::class,'softHospit'])->name('soft.hospitalisation');
Route::get('rdvs/rev/{id}',[RdvController::class,'softrdv'])->name('soft.rdv');
Route::get('rdv/annule',[RdvController::class,'RdvAnule'])->name('rdv.annule');
Route::get('rdv/restore/{id}',[RdvController::class,'restoration'])->name('restore.rdv');
Route::get('hospitalisation/finish',[HospitalisationController::class,'hospitFinish'])->name('hospit.finish');
Route::get('soft/commande/{id}',[CommandeController::class,'softcommande'])->name('soft.commande');
Route::get('commande/delete',[CommandeController::class,'restored'])->name('commande.restored');
Route::get('facture/commande/{id}',[CommandeController::class,'facture'])->name('facture.commande');
Route::get('add/prescription/{id}',[ConsultationController::class,'addPrescription'])->name('addprescription');
Route::get('delete/ordonance/{id}',[PrescriptionController::class,'deleteOrdonanace'])->name('delete.ordonance');
Route::get('/dosseir',[DossierController::class,'index'])->name('dossier');
Route::get('dossier/medical/{id}',[DossierController::class,'dossier'])->name('dossier.medical');
Route::get('dossier/download/{id}',[DossierController::class,'download_pdf'])->name('download');
Route::get('aptitude/{id}',[CertificatController::class,'index'])->name('aptitude');
Route::get('/vaccination{id}',[CertificatController::class,'index2'])->name('vaccination');
Route::get('/travail{id}',[CertificatController::class,'index3'])->name('travail');
Route::get('examen/pdf/{id}',[ExamenController::class,'viewPdf'])->name('examen.pdf');

Route::get('/generate/exam',[ExamenController::class,'generation'])->name('generate');
Route::get('consultation/',[ConsultationController::class,'gen'])->name('generate.consultation');


Route::POST('send/message',[RdvController::class,'saveMessage'])->name('send.message');
Route::Post('forme',[FormeGalleliqueController::class,'addForme'])->name('add.forme');
Route::POST('uses',[UserController::class,'addUsers'])->name('add.users');
Route::post('familles',[FamilleController::class,'addFamille'])->name('add.famille');
Route::post('conditionnements',[ConditionnementController::class,'addCondition'])->name('add.conditionnement');
Route::Post('produits',[ProduitController::class,'addProduct'])->name('add.product');
Route::POST('commandes',[CommandeController::class,'addCommande'])->name('add.commande');

Route::Post('patients/add',[PatientController::class,'addPatient'])->name('add.patients');

Route::post('valide/commande',[CommandeController::class,'ValidCommande'])->name('add.commandes');
Route::POST('add/rdv/consultation',[ConsultationController::class,'addRdv'])->name('rdv.consultation');

Route::POST('chambre',[ChambreController::class,'save'])->name('add.chambre');
Route::POST('add/consultation',[ConsultationController::class,'addConsultation'])->name('add.consultations');

Route::POST('add/prescription/',[PrescriptionController::class,'savePrescription'])->name('add.presciption');

Route::POST('add/rdv',[RdvController::class,'save'])->name('add.rdv');

Route::get('add/rdvs',[RdvController::class,'sendCustomMessage']);
Route::POST('add/hospitalisation',[HospitalisationController::class,'save'])->name('add.hospitalisation');
Route::POST('ventes/save',[VenteController::class,'save_vente'])->name('save.vente');
Route::POST('addVente',[VenteController::class,'addvente'])->name('addvente.produit');
Route::POST('add/prescription/examen',[ExamenController::class,'addPprescription'])->name('prescrition.examen');
ROUTE::POST('new/examen',[ExamenController::class,'addExams'])->name('new.examen');


Route::PUT('add/examen/{patient}',[ExamenController::class,'save'])->name('add.examen');

Route::post('send-sms', [ RdvController::class, 'sendMessage' ])->name('send.sms');

Route::put('produit/edi/{produit}',[ProduitController::class,'editProduit'])->name('edition.produit');
Route::put('edit/patient/{patient}',[PatientController::class,'Editpatient'])->name('edit.patient');
Route::put('hospit/{hospitalisation}',[HospitalisationController::class,'edit'])->name('edition.hospitalisation');
Route::PUT('edit/{user}',[UserController::class,'edition'])->name('updat.user');
Route::PUT('ajouter/produits/{commande}',[CommandeController::class,'addLivraison'])->name('add.livraison');
Route::get('consultations/{id}',[ConsultationController::class,'update_consultation'])->name('update.consultation');
Route::put('caisses/{consultation}',[CaisseController::class,'update_caisse'])->name('update.consultations');
Route::PUT('update/rdv/{rdv}',[RdvController::class,'updat_rdv'])->name('update.rdv');

Route::PUT('rdvs/updat/{rdvs}',[RdvController::class,'updating'])->name('edit.rdv');

