<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\ProducersController;
use App\Http\Controllers\RatingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResources([
    "Goods" => GoodsController::class,
    "Producers" => ProducersController::class,
    "Ratings" => RatingsController::class,
    "Categories" => CategoriesController::class,
]);
Route::get("Goods/search/{name}", [GoodsController::class, "search"])->name("goods.search");
Route::get("Producers/search/{name}", [ProducersController::class, "search"])->name("producers.search");
    
