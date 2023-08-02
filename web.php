<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stock_Management;
use App\Models\Product;
use App\Models\Entry;
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

Route::get('/', function () {
    return view('welcome');
});

// route for the index page
Route::get('/index',[Stock_Management::class,'index']);
//route for all-products list table
Route::get('/products',[Stock_Management::class, 'all_products']);
//route for all-entries list table
Route::get('/entries',[Stock_Management::class, 'all_entries']);
//route for create products form
Route::get('/products/create',[Stock_Management::class, 'create_products']);
//route for inserting data to database using create products form
Route::post('/insert-products',[Stock_Management::class, 'insert_products']);
//route for create entries form
Route::get('/entries/create',[Stock_Management::class, 'create_entries']);
//route for inserting data to database using create entries form
Route::post('/insert-entries',[Stock_Management::class, 'insert_entries']);
//route for view page of all unique product entries
Route::get('products/{id}/view-entries/',[Stock_Management::class, 'view_product_entries']);
// for edit product ( form )
Route::get('products/{id}/edit/',[Stock_Management::class,'edit_product']);
// for updating product details
Route::post('products/{id}/update',[Stock_Management::class,'update_product']);
