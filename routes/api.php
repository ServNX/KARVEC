<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CollectionGroupCollectionsController;
use App\Http\Controllers\Api\CollectionGroupsController;
use App\Http\Controllers\Api\CollectionProductsController;
use App\Http\Controllers\Api\CollectionsController;
use App\Http\Controllers\Api\ProductCollectionsController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Support\Facades\Route;

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
Route::post('/login', [AuthController::class, 'login']);
