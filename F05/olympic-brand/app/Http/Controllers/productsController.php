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


}
