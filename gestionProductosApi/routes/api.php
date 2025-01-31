<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Ruta para agregar un producto
Route::post('/addProducts', [ProductsController::class, 'store']);

//Ruta para mostrar todos los productos
Route::get('/allProducts', [ProductsController::class, 'index']);

//Ruta para actualizar o editar un producto
Route::put('/updateProducts/{id}', [ProductsController::class, 'update']);

//Ruta para eliminar un producto
Route::delete('/deleteProducts/{id}', [ProductsController::class, 'destroy']);