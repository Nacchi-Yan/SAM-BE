<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productsModel;

class productsController extends Controller
{
    public function viewProducts(Request $request){
        $products= productsModel::showProducts($request);

        return view('welcome', ['products' => $products]);
    }

    public function view(Request $request){
        $products= productsModel::showProducts($request);

        return view('admin', ['products' => $products]);
    }

    public function delete($id)
    {
        // Find the prod with the given ID and delete it
        productsModel::find($id)->delete();

        // Redirect back to the admin page with a success message
        return redirect()->route('admin')->with('success', 'Item deleted successfully');
    }

    public function edit($id)
    {
        // Fetch the cone with the given ID from the database
        $products = productsModel::find($id);

        // Return the edit view with the cone data
        return view('edit.products', compact('products'));
    }

    public function update(Request $req, $id)
    {
        // Validate the form data
        $req->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',

        ]);

        // Find the prod with the given ID
        $products = productsModel::find($id);

        $products->update($req->all());

        return redirect()->route('admin')->with('success', 'Item updated successfully');
    }


}
