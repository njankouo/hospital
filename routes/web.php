<?php

use App\Http\Controllers\ChambreController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ConditionnementController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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
Route::get('add/prescription/{id}',[PrescriptionController::class,'index'])->name('add.prescription');
Route::get('ordonance',[PrescriptionController::class,'ordonance'])->name('ordonance.view');
Route::get('ordonance/pdf/{id}',[PrescriptionController::class,'ordonancePdf'])->name('ordonance.pdf');
Route::get('rendez/vous',[RdvController::class,'index'])->name('rdv.view');
Route::get('hospitalisation',[HospitalisationController::class,'index'])->name('hospitalisation');
Route::get('produit/pdf',[ProduitController::class,'pdf'])->name('produit.pdf');

Route::get('dossier/patient/{id}',[PatientController::class,'dossier'])->name('dossier.patient');

Route::Post('forme',[FormeGalleliqueController::class,'addForme'])->name('add.forme');
Route::POST('uses',[UserController::class,'addUsers'])->name('add.users');
Route::post('familles',[FamilleController::class,'addFamille'])->name('add.famille');
Route::post('conditionnements',[ConditionnementController::class,'addCondition'])->name('add.conditionnement');
Route::Post('produits',[ProduitController::class,'addProduct'])->name('add.product');
Route::POST('commandes',[CommandeController::class,'addCommande'])->name('add.commande');
Route::Post('patients/add',[PatientController::class,'addPatient'])->name('add.patients');
Route::post('valide/commande',[CommandeController::class,'ValidCommande'])->name('add.commandes');
Route::PUT('ajouter/produits/{commande}',[CommandeController::class,'addLivraison'])->name('add.livraison');
Route::POST('chambre',[ChambreController::class,'save'])->name('add.chambre');
Route::POST('add/consultation',[ConsultationController::class,'addConsultation'])->name('add.consultations');
Route::POST('add/prescription/',[PrescriptionController::class,'savePrescription'])->name('add.presciption');
Route::POST('add/rdv',[RdvController::class,'save'])->name('add.rdv');
Route::get('add/rdvs',[RdvController::class,'sendCustomMessage']);
Route::POST('add/hospitalisation',[HospitalisationController::class,'save'])->name('add.hospitalisation');


Route::put('produit/edi/{produit}',[ProduitController::class,'editProduit'])->name('edition.produit');
Route::put('edit/patient/{patient}',[PatientController::class,'Editpatient'])->name('edit.patient');
Route::put('hospit/{hospitalisation}',[HospitalisationController::class,'edit'])->name('edition.hospitalisation');
Route::PUT('edit/{user}',[UserController::class,'edition'])->name('updat.user');
