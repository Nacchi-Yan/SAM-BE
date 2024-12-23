<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productsModel;

class productsController extends Controller
{
    public function upload(Request $req)
    {
        // Validate the request data as needed...
        $products = new productsModel();
        $products->name = $req->input('name');
        $products->stock = $req->input('stock');
        $products->description = $req->input('description');
        $products->price = $req->input('price');
        $products->category = $req->input('category');
        $image= $req->file('file');
        $products->img = base64_encode($image->get());


        $products->save();


        toast('Item Created','success');
        return redirect()->route('admin');
    }
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
            'category' => 'required|string|max:255',
            'file' => 'nullable|image|max:51200',
        ]);

        // Find the product with the given ID
        $products = productsModel::find($id);

        if (!$products) {
            return redirect()->route('admin')->with('error', 'Product not found');
        }

        // Update fields from the request
        $products->name = $req->input('name');
        $products->stock = $req->input('stock');
        $products->description = $req->input('description');
        $products->price = $req->input('price');
        $products->category = $req->input('category');

        // Handle image update if a new file is uploaded
        if ($req->hasFile('file')) {
            $image = $req->file('file');
            $products->img = base64_encode(file_get_contents($image->getRealPath()));
        }

        // Save the updated product
        $products->save();

        return redirect()->route('admin')->with('success', 'Item updated successfully');
    }


}
