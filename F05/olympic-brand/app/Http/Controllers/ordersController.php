<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ordersModel;

class ordersController extends Controller
{
    public function addToCart(Request $req)
    {
        // Validate the request data as needed...
        $order = new ordersModel();
        $order->controlNumber = $req->input('controlNumber');
        $order->productID = $req->input('productID');
        $order->quantity = $req->input('quantity');
        $order->status = $req->input('status');


        $order->save();


        toast('Item Added','success');
        return redirect()->route('Index');
    }
}
