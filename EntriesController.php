<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;

class EntriesController extends Controller
{
     // for create entry routing
     public function create_entries()
     {
         $products = Product::get();
         return view('Stock_Management.create-entries-form',['products' => $products]);
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


      // for all entries list table
      public function all_entries()
      {
          $entries = Entry::with('product')->get();
          $entries = Entry::paginate(6);
          // dd($entries->toArray());

          return view('Stock_Management.all-entries-table', compact('entries'));
      }

}
