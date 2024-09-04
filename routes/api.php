<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//--------------------------------------------------------------------------------------------
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get('/getBooksCategories',[BookController::class,'bookAndCategory'])->middleware('auth:sanctum');
Route::get('/show/{book}',[BookController::class,'show'])->middleware('auth:sanctum');
Route::get('/availableBooks',[BookController::class,'availableBooks'])->middleware('auth:sanctum');
//--------------------------------------------------------------------------------------------
Route::middleware(['ApiCheckRole:admin'])->group(function (){
    Route::get('/allUser',[UserController::class,'index'])->middleware('auth:sanctum');
    Route::post('/insertUser',[UserController::class,'insert'])->middleware('auth:sanctum');
    Route::put('/updateUser/{user}',[UserController::class,'update'])->middleware('auth:sanctum');
    Route::delete('/deleteUser/{user}',[UserController::class,'delete'])->middleware('auth:sanctum');
    Route::patch('/changeValidity/{user}',[UserController::class,'changeValidity'])->middleware('auth:sanctum');
});
//--------------------------------------------------------------------------------------------
Route::middleware(['ApiCheckRole:admin,employee'])->group(function ()
{
    Route::post('/insertBook',[BookController::class,'insert'])->middleware('auth:sanctum');
    Route::put('/updateBook/{book}',[BookController::class,'update'])->middleware('auth:sanctum');
    Route::delete('/deleteBook/{book}',[BookController::class,'delete'])->middleware('auth:sanctum');
});

