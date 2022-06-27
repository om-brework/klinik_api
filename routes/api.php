<?php

use App\Http\Controllers\LocationContrroller;
use App\Http\Controllers\MedController;
use App\Http\Controllers\medsCategoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class, 'login']);
Route::get('/locations',[LocationContrroller::class,'show']);



Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/logout',[UserController::class,'logout']);
    Route::get('/servicecategory',[ServiceCategoryController::class,'show']);
    Route::post('/servicecategorysave',[ServiceCategoryController::class,'save']);
    Route::get('/services',[ServiceController::class,'show']);
    Route::post('/servicesave',[ServiceController::class,'save']);
    Route::get('/medCategories',[medsCategoryController::class,'show']);
    Route::post('/medCategoriessave',[medsCategoryController::class,'save']);
    Route::post('/locationsave',[LocationContrroller::class,'save']);
    Route::post('/meds',[MedController::class,'show']);
    Route::post('/savemeds',[MedController::class,'save']);
    Route::get('/patients',[PatientController::class,'show']);
});
