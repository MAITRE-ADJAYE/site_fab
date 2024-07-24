<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\BenevolaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ElectronicRobotiqueController;
use App\Http\Controllers\ReferenceDigitalController;
use App\Http\Controllers\DeveloppementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReseauxSociauxController;
use App\Http\Controllers\ActualitesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function () {
    Route::resource('evenements', EvenementController::class); // Routes RESTful pour EvenementController
    Route::resource('realisations', RealisationController::class);
    Route::resource('benevolas', BenevolaController::class);
    Route::resource('alumnis', AlumniController::class);
    Route::resource('electronicrobotique', ElectronicRobotiqueController::class);
    Route::resource('referencedigital', ReferenceDigitalController::class);
    Route::resource('equipements', EquipementController::class);
    Route::resource('developpements', DeveloppementController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('reseauxsociaux', ReseauxSociauxController::class);
    Route::resource('actualites', ActualitesController::class);
    
});

require __DIR__.'/auth.php';
