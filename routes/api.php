<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::get('/getBooksCategories',[BookController::class,'bookAndCategory'])->middleware('auth:sanctum');
Route::post('/insertBook',[BookController::class,'insert'])->middleware('auth:sanctum');
Route::put('/updateBook/{book}',[BookController::class,'update'])->middleware('auth:sanctum');
Route::get('/show/{book}',[BookController::class,'show'])->middleware('auth:sanctum');
Route::delete('/deleteBook/{book}',[BookController::class,'delete'])->middleware('auth:sanctum');
Route::get('/availableBooks',[BookController::class,'availableBooks'])->middleware('auth:sanctum');
