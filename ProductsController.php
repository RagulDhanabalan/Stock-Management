<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
class ProductsController extends Controller
{
    // for create product routing
    public function create_products()
    {
        return view('Stock_Management.create-products-form');
    }
    // for inserting create products form details
    public function insert_products(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|alpha|regex:/^[A-Z]/|unique:products,name|max:30',
                'stock' => 'required|integer',
                'status' => 'required|string',
                'price' => 'required|integer',
                's_k_u' => 'required|string',
            ],
        );
        $validatedData = $request->all();
        Product::create($validatedData);
        session::flash('message', 'New Product Created Successfully !');

        return redirect('/products');
    }
     // for all products list table
     public function all_products()
     {
         $products = Product::paginate(6);
         return view('Stock_Management.all-products-table', ['products' => $products]);
     }
      // for edit each product ( form page )
      public function edit_product($id)
      {
          $product = Product::find($id);
          return view('Stock_Management.edit-product-form', ['product' => $product]);
      }
      // for update product value
      public function update_product(Request $request, $id)
      {
          $update_product = Product::find($id);
          $update_product->name = $request->input('name');
          $update_product->stock = $request->input('stock');
          $update_product->status = $request->input('status');
          $update_product->price = $request->input('price');
          $update_product->s_k_u = $request->input('s_k_u');

          $update_product->save();
          session::flash('update', 'Product Updated Successfully !');
          return redirect('/products');
      }
      // for view page of each product's all entries
      public function view_product_entries($id)
      {
          $entries = Entry::with('product')->find($id);
        //   $entries->paginate(4);
          return view('Stock_Management.view-product-entries', compact('entries'));
      }
}
