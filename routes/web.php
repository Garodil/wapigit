<?php

use App\Models\Categories;
use App\Models\Producers;
use App\Models\Ratings;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Goods;



Route::get('/', function () {
    
    $goods = Goods::all();
    $ratings = Ratings::all();
    $producers = Producers::all();
    $categories = Categories::all();
    dump($goods);
    dump($ratings);
    dump($producers);
    dump($categories);
});
