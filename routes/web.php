<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

Route::get('/cities', [CityController::class, 'index']);
Route::get('cities/{city}/companies', [CityController::class, 'getCompanies'])->name('cities.companies');



