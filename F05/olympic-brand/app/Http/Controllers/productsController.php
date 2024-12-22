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

}
