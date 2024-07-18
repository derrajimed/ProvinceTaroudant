<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamationController ; 
Route::get('/', function () {
    return view('acceuil');
});
Route::post("/reclamer",[ReclamationController::class,'Reclame']);