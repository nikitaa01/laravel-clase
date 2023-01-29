<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\LangsController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Route::apiResource('/users', UserController::class);

/* Route::get('/calculadora/suma/{num1}/{num2}', [CalculadoraController::class, 'suma']);
Route::get('/calculadora/resta/{num1}/{num2}', [CalculadoraController::class, 'resta']);
Route::get('/calculadora/multiplicacion/{num1}/{num2}', [CalculadoraController::class, 'multiplicacion']);
Route::get('/calculadora/division/{num1}/{num2}', [CalculadoraController::class, 'division']);
Route::get('/calculadora/potencia/{num1}/{num2}', [CalculadoraController::class, 'potencia']); */
Route::get('/country/by-continent/{Continent}', [CountriesController::class, 'getByContinent']);
Route::get('/country/order-by-size', [CountriesController::class, 'orderBySize']);
Route::get('/country/with-zero-cities', [CountriesController::class, 'withZeroCities']);
Route::get('/country/independence-null', [CountriesController::class, 'independenceNull']);
Route::get('/country/independence/{year1}/{year2}', [CountriesController::class, 'independenceBetween']);
Route::get('/country/letter/{letter}', [CountriesController::class, 'startsWith']);
Route::apiResource('/country', CountriesController::class);

Route::apiResource('/city', CitiesController::class);

Route::apiResource('/lang', LangsController::class);
