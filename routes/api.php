<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HidenController;





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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
}) */;

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/add-annonce', [OfferController::class, 'store']);
    Route::post('/edit-annonce', [OfferController::class, 'edit']);
    Route::get('/personnal-ads', [OfferController::class, 'ads']);
    Route::post('/images', [ImageController::class, 'destroy']);
    Route::post('/annonce/{id}',[OfferController::class, 'destroy']);
    Route::post('/add-favoris' ,[FavoriteController::class, 'store']);
    Route::post('/remove-favoris' ,[FavoriteController::class, 'destroy']);
    Route::post('/add-hidens' ,[HidenController::class, 'store']);
    Route::post('/remove-hidens' ,[HidenController::class, 'destroy']);
    Route::get('/favoris', [FavoriteController::class, 'index']);

 //   Route::get('/offers/{city}', [OfferController::class, 'index']);

});


Route::get('/offers/{city}', [OfferController::class, 'index']);

Route::post('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/cities', [CityController::class, 'index']);
Route::get('/cities/{slug}', [CityController::class, 'show']);
Route::get('/annonce/{id}', [OfferController::class, 'show']);
Route::post('/search', [OfferController::class, 'search']);
Route::get('/city/{cit}/category/{cat}', [CategoryController::class, 'show']);
Route::get('/categories/{slug}', [CategoryController::class, 'getCategory']);
Route::get('/city/{city}/categories/{cat}/subcategories/{slug}', [SubCategoryController::class, 'show']);

