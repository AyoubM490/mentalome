<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\MentalomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Mentalome;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', MentalomeController::class);
Route::post('/api', [ApiController::class, 'store']);

