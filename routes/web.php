<?php

use App\Http\Controllers\CaisseController;
use App\Models\rayon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;

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

Route::get('/produit',[ProduitController::class,'index'])->name('produit.list');
Route::get('/client',[ClientController::class,'index'])->name('client.liste');
Route::get('/fournisseur',[FournisseurController::class,'index'])->name('fournisseur.liste');
Route::get('/role',[UserController::class,'liste'])->name('role.liste');
Route::get('/categorie',[CategorieController::class,'index'])->name('categorie.liste');
Route::get('/type',[TypeController::class,'index'])->name('type.liste');
Route::get('/produits',[ProduitController::class,'create'])->name('product.create');
Route::get('/users',[UserController::class,'index'])->name('user.create');
Route::get("client/create",[ClientController::class,'indes'])->name('client.create');
Route::get("/fournisseur/create",[FournisseurController::class,'inde'])->name('fournisseur.create');
Route::get('/contrats',[ContratController::class,'index'])->name('contrat');
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rayon',[RayonController::class,'index'])->name('rayon.index');
Route::get('commade',[CommandeController::class,'index'])->name('commande');
Route::get('/commandes/produits/{id}',[CommandeController::class,'commandeArticle'])->name('commande.article');
Route::get('/commande/produit',[CommandeController::class,'view2'])->name('liste.commande');
Route::get('/bon/commande/{id}',[CommandeController::class,'bonCommande'])->name('bon.commande');
Route::get('/edit/commande/{id}',[CommandeController::class,'edition'])->name('edit.commande');
Route::get('livraison',[CommandeController::class,'livraison'])->name('livraison');
Route::get('/ventes',[VenteController::class,'index'])->name('vente');
Route::get('/vente/produit/{id}',[VenteController::class,'edit'])->name('vente.produit');
Route::post('/vente/',[VenteController::class,'venteProduit'])->name('vent');
Route::get('/liste/vente',[VenteController::class,'listeVente'])->name('liste.vente');
Route::get('/pdf/inventaire',[ProduitController::class,'inventairePDF'])->name('inventaire.pdf');
Route::get('autocomplete', [VenteController::class, 'autocomplete'])->name('autocomplete');
/**route relatives aux enregistrements */
Route::post('/client',[ClientController::class,'create'])->name('create.client');
Route::Post('/fournisseur',[FournisseurController::class,'insertion'])->name('insert.fournisseur');
Route::post('type',[TypeController::class,'create'])->name('insert.create');
Route::post('categorie',[CategorieController::class,'create'])->name('categorie.create');

Route::POST('/users',[UserController::class,'insertion'])->name('users.create');

Route::get('fournisseur/pdf',[FournisseurController::class,'pdf'])->name('fournisseur.pdf');
route::post('produits',[ProduitController::class,'save'])->name('produit.create');
Route::post('/commande',[CommandeController::class,'save'])->name('commande.produit');
Route::post('commande/produit/liste',[CommandeController::class,'command'])->name('command');
Route::put('/com/{commande}',[CommandeController::class,'edit'])->name('commande.edition');
Route::post('/vente/index',[VenteController::class,'create'])->name('vente.index');
Route::post('contrat/create',[ContratController::class,'store'])->name('contrat.create');
Route::get('contrat/creation',[ContratController::class,'vue2'])->name('contrat.creation');
route::get('contrat/edit/{id}',[ContratController::class,'update'])->name('edit');
route::put('contrat/upgrade/{contrat}',[ContratController::class,'updat'])->name('update.contrat');
route::get('/facture/vente/{id}',[VenteController::class,'facture'])->name('facture');
Route::get('/statistics',[VenteController::class,'statistique'])->name('chart');
Route::get('edit/vente/{id}',[VenteController::class,'updateVente'])->name('edit.vente');
Route::get('/update/product/{id}',[ProduitController::class,'update'])->name('update.produit');
Route::put('/update/produict/{produits}',[ProduitController::class,'updat'])->name('produit.updat');
Route::put('/liste/vente/{vent}',[VenteController::class,'updateView'])->name('vente.update');

route::get('/role/users/{id}',[UserController::class,'vue'])->name('role.vue');
route::put('/role/user/{user}',[UserController::class,'upgrade'])->name('user.upgrade');

Route::delete('/liste/vente/{id}',[VenteController::class,'deleteVente'])->name('delete.vente');
Route::get('bon/livraison/{id}',[CommandeController::class,'bonlivraison'])->name('bon.livraison');
Route::get('search-from-db', [VenteController::class, 'searchDB']);
Route::get('/fournisseur/edit/{id}',[FournisseurController::class,'edit'])->name('fournisseur.edit');
Route::delete('/contrats/delete/{id}',[ContratController::class,'archiver'])->name('contrat.delete');
Route::put('/fournisseur/edition/{fournisseur}',[FournisseurController::class,'editer'])->name('fournisseur.edition');
Route::get('/changePassword',[HomeController::class,'showChangePasswordForm']);
Route::post('/changePassword',[HomeController::class,'changePassword'])->name('changePassword');
// route::get('/liste/vente/',[VenteController::class,'search'])->name('search.vente');


Route::get('caisse',[CaisseController::class,'index'])->name('caisse.index');
Route::get('/caisse/etat',[CaisseController::class,'etat'])->name('etat');
Route::post('/daterange/fetch_data', [CaisseController::class, 'fetch_data'])->name('daterange.fetch_data');

Route::get('/commande/produit/{id}', [CommandeController::class, 'addToCart'])->name('add.to.cart');
Route::get('cart', [CommandeController::class, 'cart'])->name('cart');
Route::delete('remove-from-cart', [CommandeController::class, 'remove'])->name('remove.from.cart');
Route::get('/bon/commandeGoup',[CommandeController::class,'factureGroup'])->name('facture.group');
Route::get('Livraison/group',[CommandeController::class,'LivraisonGroup'])->name('livraison.group');
Route::get('/addTo/{id}',[CommandeController::class,'ToCart'])->name('TOCART');
route::get('/livraison/group',[CommandeController::class,'GroupLivraison'])->name('group.livraison');

