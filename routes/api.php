<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatastroController;

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

Route::get('/price-m2/zip-codes/{zip_code}/aggregate/{aggregate}', [CatastroController::class, 'show'])
    ->name('catastros.show')
    ->whereNumber('zip_code')
    ->whereIn('aggregate', ['max', 'min', 'avg']);
