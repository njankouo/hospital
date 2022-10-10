<?php

use App\Models\rayon;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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

Route::get('/fournisseur',[FournisseurController::class,'index'])->name('fournisseur.liste')->middleware('auth.admin');
Route::get('/role',[UserController::class,'liste'])->name('role.liste')->middleware('auth.admin');
Route::get('/categorie',[CategorieController::class,'index'])->name('categorie.liste')->middleware('auth.admin');
Route::get('/type',[TypeController::class,'index'])->name('type.liste')->middleware('auth.admin');
Route::get('/produits',[ProduitController::class,'create'])->name('product.create');
Route::get('/users',[UserController::class,'index'])->name('user.create')->middleware('auth.admin');
Route::get("client/create",[ClientController::class,'indes'])->name('client.create');
Route::get("/fournisseur/create",[FournisseurController::class,'inde'])->name('fournisseur.create')->middleware('auth.admin');
Route::get('/contrats',[ContratController::class,'index'])->name('contrat')->middleware('auth.admin');
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rayon',[RayonController::class,'index'])->name('rayon.index')->middleware('auth.admin');
Route::get('commade',[CommandeController::class,'index'])->name('commande')->middleware('auth.admin');


Route::get('/commandes/produits/{id}',[CommandeController::class,'commandeArticle'])->name('commande.article')
->middleware('auth.admin');

Route::get('/commande/produit',[CommandeController::class,'view2'])->name('liste.commande')->middleware('auth.admin');


Route::get('/bon/commande/{id}',[CommandeController::class,'bonCommande'])->name('bon.commande')
->middleware('auth.admin');

Route::get('/edit/commande/{id}',[CommandeController::class,'edition'])->name('edit.commande')
->Middleware('auth.admin');

Route::get('livraison',[CommandeController::class,'livraison'])->name('livraison')
->middleware('auth.admin');


Route::get('/ventes',[VenteController::class,'index'])->name('vente')->middleware('auth.admin');

Route::get('/famille',[FamilleController::class,'index'])->name('famille.home')->middleware('auth.admin');
Route::post('famille/create',[FamilleController::class,'creation'])->name('famille.create')->middleware('auth.admin');
Route::delete('famille/{id}',[FamilleController::class,'supprimer'])->name('famille.delete');

Route::get('/vente/produit/{id}',[VenteController::class,'edit'])->name('vente.produit');
Route::post('/vente/',[VenteController::class,'venteProduit'])->name('vent');
Route::get('/liste/vente',[VenteController::class,'listeVente'])->name('liste.vente');
Route::get('/pdf/inventaire',[ProduitController::class,'inventairePDF'])->name('inventaire.pdf');
Route::get('autocomplete', [VenteController::class, 'autocomplete'])->name('autocomplete');
/**route relatives aux enregistrements */
Route::post('/client',[ClientController::class,'create'])->name('create.client');
Route::Post('/fournisseur',[FournisseurController::class,'insertion'])->name('insert.fournisseur')->middleware('auth.admin');
Route::post('type',[TypeController::class,'create'])->name('insert.create');
Route::post('categorie',[CategorieController::class,'create'])->name('categorie.create');

Route::POST('/users',[UserController::class,'insertion'])->name('users.create')->middleware('auth.admin');

Route::get('fournisseur/pdf',[FournisseurController::class,'pdf'])->name('fournisseur.pdf')->middleware('auth.admin');
route::post('produits',[ProduitController::class,'save'])->name('produit.create');
Route::post('/commande',[CommandeController::class,'save'])->name('commande.produit');

Route::post('commande/produit/liste',[CommandeController::class,'command'])->name('command')->middleware('auth.admin');
Route::put('/com/{commande}',[CommandeController::class,'edit'])->name('commande.edition')->middleware('auth.admin');
Route::post('/vente/index',[VenteController::class,'create'])->name('vente.index');
Route::post('contrat/create',[ContratController::class,'store'])->name('contrat.create')->middleware('auth.admin');


Route::get('contrat/creation',[ContratController::class,'vue2'])->name('contrat.creation')->middleware('auth.admin');
route::get('contrat/edit/{id}',[ContratController::class,'update'])->name('edit')->middleware('auth.admin');
route::put('contrat/upgrade/{contrat}',[ContratController::class,'updat'])->name('update.contrat');
route::get('/facture/vente/{id}',[VenteController::class,'facture'])->name('facture');
Route::get('/statistics',[VenteController::class,'statistique'])->name('chart');
Route::get('edit/vente/{id}',[VenteController::class,'updateVente'])->name('edit.vente');
Route::get('/update/product/{id}',[ProduitController::class,'update'])->name('update.produit')->middleware('auth.admin');
Route::put('/update/produict/{produits}',[ProduitController::class,'updat'])->name('produit.updat')->middleware('auth.admin');
Route::put('/liste/vente/{vent}',[VenteController::class,'updateView'])->name('vente.update');

route::get('/role/users/{id}',[UserController::class,'vue'])->name('role.vue')->middleware('auth.admin');
route::put('/role/user/{user}',[UserController::class,'upgrade'])->name('user.upgrade')->middleware('auth.admin');

Route::delete('/liste/vente/{id}',[VenteController::class,'deleteVente'])->name('delete.vente')->middleware('auth.admin');
Route::get('bon/livraison/{id}',[CommandeController::class,'bonlivraison'])->name('bon.livraison')->middleware('auth.admin');
Route::get('search-from-db', [VenteController::class, 'searchDB']);
Route::get('/fournisseur/edit/{id}',[FournisseurController::class,'edit'])->name('fournisseur.edit')->middleware('auth.admin');
Route::delete('/contrats/delete/{id}',[ContratController::class,'archiver'])->name('contrat.delete')->middleware('auth.admin');
Route::put('/fournisseur/edition/{fournisseur}',[FournisseurController::class,'editer'])->name('fournisseur.edition')->middleware('auth.admin');
Route::get('/changePassword',[HomeController::class,'showChangePasswordForm']);
Route::post('/changePassword',[HomeController::class,'changePassword'])->name('changePassword');
// route::get('/liste/vente/',[VenteController::class,'search'])->name('search.vente');


Route::get('caisse',[CaisseController::class,'index'])->name('caisse.index')
->Middleware('auth.admin');

Route::get('/caisse/etat',[CaisseController::class,'etat'])->name('etat')
->middleware('auth.admin');

Route::post('/daterange/fetch_data', [CaisseController::class, 'fetch_data'])->name('daterange.fetch_data');

Route::get('/commande/produit/{id}', [CommandeController::class, 'addToCart'])->name('add.to.cart');
Route::get('cart', [CommandeController::class, 'cart'])->name('cart');
Route::delete('remove-from-cart', [CommandeController::class, 'remove'])->name('remove.from.cart');
Route::get('/bon/commandeGoup',[CommandeController::class,'factureGroup'])->name('facture.group');
Route::get('Livraison/group',[CommandeController::class,'LivraisonGroup'])->name('livraison.group');
Route::get('/addTo/{id}',[CommandeController::class,'ToCart'])->name('TOCART');
route::get('/livraison/group',[CommandeController::class,'GroupLivraison'])->name('group.livraison');
Route::get('facture/ventes/{id}',[VenteController::class,'addCart'])->name('cart.vente');
route::get('/vente/group',[VenteController::class,'Ventegroup'])->name('vente.group');
route::get('facture/group',[VenteController::class,'factureGroupe'])->name('group.facture');

route::get('/information',[HomeController::class,'info'])->name('infos');

route::post('rayon/create',[RayonController::class,'newCreate'])->name('rayon.create');
Route::patch('update-cart', [VenteController::class, 'updated'])->name('update.cart');
Route::delete('/enlever',[VenteController::class,'remov'])->name('retirer');


/**nouvele carte */
Route::post('clear', [VenteController::class, 'clearAllCart'])->name('cart.clear');
Route::post('cart', [VenteController::class, 'addToCart'])->name('cart.store');
Route::post('cart/add',[CommandeController::class,'addCart'])->name('cart.add');
Route::post('/cart/clean',[CommandeController::class,'clearAllCart'])->name('clear.commande');
Route::post('Group/livrable',[CartController::class,'addLivraison'])->name('cart.livraison');
Route::post('Group/livraison/delete',[CartController::class,'deleteL'])->name('clear.livraison');
Route::post('cart/service',[VenteController::class,'cartService'])->name('cart.service');
Route::post('clear/service',[VenteController::class,'clearService'])->name('clear.service');
/**remove one vente */

Route::post('cart/enlever',[VenteController::class,'deleteOne'])->name('cart.remove');
Route::post('/Group/livraison/Delete',[CartController::class,'SupprimeOne'])->name('supprimer.one');
/**route generation */

Route::get('/get-product-price',[VenteController::class,'getprice'])->name('get.price');

Route::get('/charger/price',[CommandeController::class,'generatePrice'])->name('charger.price');


Route::get('/service',[ServiceController::class,'index'])->name('service.index');
route::delete('service/{id}',[ServiceController::class,'supprimer'])->name('service.delete');
Route::post('/service',[ServiceController::class,'creation'])->name('service.create');
Route::get('changeStatus', [CommandeController::class,'changeStatus'])->name('toggle.find');

Route::get('sortie/service',[VenteController::class,'ShowService'])->name('show.service')->middleware('auth.admin');
Route::get('PDF/service',[VenteController::class,'SortiePDF'])->name('sortie.pdf');
Route::get('/service/annexe',[VenteController::class,'serviceAnexe'])->name('service.anexe');
Route::get('/Agora/pdf',[VenteController::class,'AGORAPDF'])->name('agora.pdf');
Route::get('cart/service',[VenteController::class,'FactureService'])->name('fact.service');
Route::get('/facture/service',[VenteController::class,'nouvelFacture'])->name('nouvel.facture');
route::post('service/dele/one',[VenteController::class,'retirerunservice'])->name('return.service');
Route::get('/profile',[ProfileController::class,'index'])->name('profil.index');
    Route::get('autocomplete',[VenteController::class,'autoc'])->name('Autocomplete');
