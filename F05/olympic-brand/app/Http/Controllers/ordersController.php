<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ordersModel;
use Illuminate\Support\Facades\Session;

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

    public function viewOrders(Request $request){
        $controlNumber = session('controlNumber');
        $orders = ordersModel::showOrders($controlNumber);

         // Pass the orders and grand total to the view
        return view('orders',  [
            'orders' => $orders['orders'],
            'grandTotal' => $orders['grandTotal']
        ]);

    }

    public function viewReceipt(Request $request){
        $controlNumber = session('controlNumber');
        $receipt = ordersModel::showReceipts($controlNumber);
        Session::forget('controlNumber');
        return view('receipt', ['receipt' => $receipt]);
    }







}
