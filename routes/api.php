<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Register
Route::post("register", [ApiController::class, "register"]);

// Login
Route::post("login", [ApiController::class, "login"]);

Route::get('evenements', [ApiController::class, "evenements"]);
Route::get('realisations', [ApiController::class, "realisations"]);
Route::get('benevolas', [ApiController::class, "benevolas"]);
Route::get('alumnis', [ApiController::class, "alumnis"]);
Route::get('electronicrobotique', [ApiController::class, "electronicrobotique"]);
Route::get('referencedigital', [ApiController::class, "referencedigital"]);
Route::get('equipements', [ApiController::class, "equipements"]);
Route::get('developpements', [ApiController::class, "developpements"]);
Route::get('contacts', [ApiController::class, "contacts"]);
Route::get('reseauxsociaux', [ApiController::class, "reseauxsociaux"]);
Route::get('actualites', [ApiController::class, "actualites"]);
