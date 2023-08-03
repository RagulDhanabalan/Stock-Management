<?php


use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stock_Management;
use App\Http\Controllers\EntriesController;



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

// -----------------------------------------------------------------------

// route for the index page
Route::get('/index', function () {
    return view('Stock_Management.index');
});

// ------------------------------------------------------------------------

//route for all-products list table
Route::get('/products',[ProductsController::class, 'all_products']);
//route for all-entries list table
Route::get('/entries',[EntriesController::class, 'all_entries']);
//route for create products form
Route::get('/products/create',[ProductsController::class, 'create_products']);
//route for inserting data to database using create products form
Route::post('/insert-products',[ProductsController::class, 'insert_products']);
//route for create entries form
Route::get('/entries/create',[EntriesController::class, 'create_entries']);
//route for inserting data to database using create entries form
Route::post('/insert-entries',[EntriesController::class, 'insert_entries']);
//route for view page of all unique product entries
Route::get('products/{id}/view-entries/',[ProductsController::class, 'view_product_entries']);
// for edit product ( form )
Route::get('products/{id}/edit/',[ProductsController::class,'edit_product']);
// for updating product details
Route::post('products/{id}/update',[ProductsController::class,'update_product']);
