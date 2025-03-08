<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnonceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/handlogin', [AuthController::class, 'handlogin'])->name('handlogin');



Route::get('/', [ObjetController::class, 'index'])->name('vitrine.index');
Route::get('/declarerperte', [ObjetController::class, 'declarerperte'])->name('vitrine.perte.declarerperte');
Route::get('/listebienperdu', [ObjetController::class, 'listebienperdu'])->name('vitrine.perte.listebienperdu');
Route::get('/detailobjet/{id}', [ObjetController::class, 'detailobjet'])->name('vitrine.page.detailobjet');
Route::get('/declarertrouver', [ObjetController::class, 'declarertrouver'])->name('vitrine.retrouver.declarertrouver');
Route::get('/listebienretrouver', [ObjetController::class, 'listebienretrouver'])->name('vitrine.retrouver.listebienretrouver');
Route::get('/listebienparcategories', [ObjetController::class, 'listebienparcategories'])->name('vitrine.listebienparcategories');
Route::get('/apropos', [ObjetController::class, 'apropos'])->name('vitrine.apropos');
Route::get('/contact', [ObjetController::class, 'contact'])->name('vitrine.contact');
Route::get('/aide', [ObjetController::class, 'aide'])->name('vitrine.aide');
Route::get('/condition', [ObjetController::class, 'condition'])->name('vitrine.condition');
Route::get('/politiqueconf', [ObjetController::class, 'politiqueconf'])->name('vitrine.politiqueconf');

    Route::get('admin', [AdminController::class, 'admin'])->name('admin.index');

    Route::get('/listeutilisateur', [AdminController::class, 'listeutilisateur'])->name('admin.page.liteutilisateur');
    Route::put('/utilisateur/{id}', [AdminController::class, 'traitement'])->name('admin.page.traitement');
    Route::get('/corbeille', [AdminController::class, 'corbeille'])->name('admin.corbeille');
    Route::post('/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');
    Route::delete('/forceDelete/{id}', [AdminController::class, 'forceDelete'])->name('admin.forceDelete');
    Route::delete('/supprimeretudiants/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/listeanonce', [AdminController::class, 'listeanonce'])->name('admin.page.listeanonce');
    Route::get('/listeobjetperdu', [AdminController::class, 'listeobjetperdu'])->name('admin.page.listeobjetperdu');
    Route::get('/listeobjetrerouver', [AdminController::class, 'listeobjetretrouver'])->name('admin.page.listeobjetretrouver');
    Route::get('/ajouteradmin', [AdminController::class, 'ajouteradmin'])->name('admin.page.ajouteradmin');
    Route::get('/ajouteranonce', [AdminController::class, 'ajoutAnnonce'])->name('admin.page.ajoutanonce');
    Route::get('/admin/messagerecue', [AdminController::class, 'messagerecue'])->name('admin.page.messagerecue');
    Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.page.profil');
    Route::get('/admin/parametres', [AdminController::class, 'parametres'])->name('admin.page.parametres');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/listeadmin', [AdminController::class, 'listeadmin'])->name('admin.page.listeadmin');
    Route::post('/store1', [AdminController::class, 'store1'])->name('admin.store1');

    Route::delete('/supprimeradmin/{id}', [AdminController::class, 'supprimeradmin'])->name('admin.SupprimerAdmin');
    Route::put('/modifieradmin/{id}', [AdminController::class, 'modifieradmin'])->name('admin.ModifierAdmin');
    Route::post('/restoreadmin/{id}', [AdminController::class, 'restoreadmin'])->name('admin.restoreadmin');
    Route::delete('/forceDeleteadmin/{id}', [AdminController::class, 'forceDeleteadmin'])->name('admin.forceDeleteadmin');


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::get('/objets/create', [ObjetController::class, 'create'])->name('objets.create');
Route::post('/objets', [ObjetController::class, 'store'])->name('objets1.store');
Route::post('/objets1', [ObjetController::class, 'store1'])->name('objets.store');

Route::post('/contact/ajout', [ContactController::class, 'addContact'])->name('contact.addContact');
