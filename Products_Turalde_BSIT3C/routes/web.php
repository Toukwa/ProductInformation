<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController; 

Route::get('/', function () {
    return view('ProductInfo');
});


route::get('/masterlist', [productController::class, 'prodmasterlist'])->name('product.list');
route::post('/product/add', [productController::class, 'addProduct'])->name('product.add');
route::get('/product/edit/{index}', [productController::class, 'editProduct'])->name('product.edit');
route::post('/product/update/{index}', [productController::class, 'updateProduct'])->name('product.update');
route::delete('/product/delete/{index}', [productController::class, 'deleteProduct'])->name('product.delete'); 