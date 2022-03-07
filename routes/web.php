<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\TypeController;

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
Route::get('/role',[RoleController::class,'index'])->name('role.liste');
Route::get('/categorie',[CategorieController::class,'index'])->name('categorie.liste');
Route::get('/type',[TypeController::class,'index'])->name('type.liste');
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**route relatives aux enregistrements */
Route::post('/client',[ClientController::class,'create'])->name('create.client');
Route::Post('/fournisseur',[FournisseurController::class,'insert'])->name('insert.fournisseur');
Route::post('type',[TypeController::class,'create'])->name('insert.create');
Route::post('categorie',[CategorieController::class,'create'])->name('categorie.create');
