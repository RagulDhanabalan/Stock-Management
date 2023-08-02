<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;
use Session;
use Illuminate\Support\Facades\Validator;

class Stock_Management extends Controller
{
    // for index routing
    public function index()
    {
        return view('Stock_Management/index');
    }
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
    public function insert_entries(Request $request)
    {
        // $create = $request->all();
        // Entry::create($create);
        // return redirect('/entries')->with('success', 'New Product Created Successfully !');

        $validatedData = $request->validate(
            [
                'product_id' => 'required',
                'type' => 'required',
                'quantity' => 'required',
                'value' => 'required',
                'description' => 'required',
                'date' => 'required',
            ],
        );
        $validatedData = $request->all();
        Entry::create($validatedData);

        return redirect('/entries')->with('message', 'New Entry Created Successfully !');
    }
    // for all products list table
    public function all_products()
    {
        $products = Product::paginate(6);
        return view('Stock_Management.all-products-table', ['products' => $products]);
    }
    // for create entry routing
    public function create_entries()
    {
        $products = Product::get();
        return view('Stock_Management.create-entries-form',['products' => $products]);
    }
    // for all entries list table
    public function all_entries()
    {
        $entries = Entry::with('product')->get();
        $entries = Entry::paginate(6);
        // dd($entries->toArray());

        return view('Stock_Management.all-entries-table', compact('entries'));
    }
    // for view page of each product's all entries
    public function view_product_entries($id)
    {
        $products = Product::find($id);
        $products->paginate(4);
        return view('Stock_Management.view-product-entries', ['products' => $products]);
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
        return 'Great !!! ' . $update_product->name . ' Updated Successfully...';
    }
}
