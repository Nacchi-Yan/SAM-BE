<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class ordersModel extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $primaryKey = "orderID";
    protected $fillable = ['controlNumber', 'productID', 'quantity', 'status'];
    public $timestamps = false;

    public static function showOrders($controlNumber){

        $sql = DB::select("SELECT o.controlNumber, p.name, p.img, SUM(o.quantity) AS Quantity, SUM(p.price * o.quantity) AS Total
        FROM `orders` AS o INNER JOIN products AS p ON p.productID = o.productID
        WHERE o.controlNumber = ? GROUP BY o.controlNumber, o.productID, p.name, p.img;" , [$controlNumber]);

$grandTotal = 0;
foreach ($sql as $order) {
    $grandTotal += $order->Total;
}

// Return both orders and grand total
return [
    'orders' => $sql,
    'grandTotal' => $grandTotal
];


    }

    public static function showReceipts($controlNumber){

        $sql = DB::select("SELECT DISTINCT controlNumber
        FROM orders
        INNER JOIN products USING (productID)
        WHERE controlNumber = ?", [$controlNumber]);


        return $sql;
    }
}
