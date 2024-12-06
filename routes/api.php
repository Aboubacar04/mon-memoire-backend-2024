<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('ListUser',[\App\Http\Controllers\UtilisateurCONTROLLER::class,'index'])->name('user');
Route::post('ajouterutilisateur',[\App\Http\Controllers\UtilisateurCONTROLLER::class,'store'])->name('ajout');
Route::delete('supprimerUser/{id}', [\App\Http\Controllers\UtilisateurCONTROLLER::class, 'supprimerUser'])->name('supprimerUser');

Route::put('modifierUser/{id}', [\App\Http\Controllers\UtilisateurCONTROLLER::class, 'modifierUser'])->name('modifierUser')->middleware('auth:sanctum');

Route::get('ListUserOne/{user}',[\App\Http\Controllers\UtilisateurCONTROLLER::class,'listuserone'])->name('listuserone');
Route::get('ListProduits',[\App\Http\Controllers\produitsController::class,'listProduits'])->name('listProduits');
Route::post('ajouterProduit',[\App\Http\Controllers\produitsController::class,'ajouterProduit1'])->name('ajouterProduit');
Route::delete('supprimerProduit/{id}', [\App\Http\Controllers\produitsController::class, 'supprimerProduit'])->name('supprimerProduit');

Route::get('listCategorie',[\App\Http\Controllers\CategorieCONTROLLER::class,'listcategorie'])->name('listcategorie');

Route::get('listCategorieFruit',[\App\Http\Controllers\CategorieCONTROLLER::class,'listcategorieF'])->name('listcategorieF');
Route::post('auth',[\App\Http\Controllers\AuthController::class,'auth'])->name('auth');
Route::get('listLegume',[\App\Http\Controllers\CategorieCONTROLLER::class,'legume'])->name('legume');
Route::get('DetailProduit/{produit}',[\App\Http\Controllers\produitsController::class,'detailProduit'])->name('DetailProduit');
