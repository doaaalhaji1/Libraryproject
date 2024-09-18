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
//login  http://127.0.0.1:8000/api/login
Route::post('/login',[AuthController::class,'login']);
//register  http://127.0.0.1:8000/api/register
Route::post('/register',[AuthController::class,'register']);
//logout  http://127.0.0.1:8000/api/logout
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
//get books with categories  http://127.0.0.1:8000/api/getBooksCategories
Route::get('/getBooksCategories',[BookController::class,'bookAndCategory'])->middleware('auth:sanctum');
//available books  http://127.0.0.1:8000/api/availableBooks
Route::get('/availableBooks',[BookController::class,'availableBooks'])->middleware('auth:sanctum');
//--------------------------------------------------------------------------------------------
Route::middleware(['ApiCheckRole:admin'])->group(function (){
    //get users  http://127.0.0.1:8000/api/allUser
    Route::get('/allUser',[UserController::class,'index'])->middleware('auth:sanctum');
    //insert user  http://127.0.0.1:8000/api/insertUser
    Route::post('/insertUser',[UserController::class,'insert'])->middleware('auth:sanctum');
    //update user using user_id  http://127.0.0.1:8000/api/updateUser/4
    Route::put('/updateUser/{user}',[UserController::class,'update'])->middleware('auth:sanctum');
    //delete user using user_id  http://127.0.0.1:8000/api/deleteUser/8
    Route::delete('/deleteUser/{user}',[UserController::class,'delete'])->middleware('auth:sanctum');
    //change role using user_id  http://127.0.0.1:8000/api/changeValidity/16
    Route::patch('/changeValidity/{user}',[UserController::class,'changeValidity'])->middleware('auth:sanctum');
});
//--------------------------------------------------------------------------------------------
Route::middleware(['ApiCheckRole:admin,employee'])->group(function ()
{
    //insert book  http://127.0.0.1:8000/api/insertBook
    Route::post('/insertBook',[BookController::class,'insert'])->middleware('auth:sanctum');
    //update book using id_book  http://127.0.0.1:8000/api/updateBook/8
    Route::put('/updateBook/{book}',[BookController::class,'update'])->middleware('auth:sanctum');
    //delete book using id_book  http://127.0.0.1:8000/api/deleteBook/6
    Route::delete('/deleteBook/{book}',[BookController::class,'delete'])->middleware('auth:sanctum');
});

