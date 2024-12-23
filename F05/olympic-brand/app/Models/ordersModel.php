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
        $sql = DB::select("SELECT *
        FROM orders
        INNER JOIN products USING (productID)
        WHERE controlNumber = ?", [$controlNumber]);

        return $sql;
    }

    public static function showReceipts($controlNumber){
        $sql = DB::select("SELECT *
        FROM orders
        INNER JOIN products USING (productID)
        WHERE controlNumber = ?", [$controlNumber]);

        $sql = DB::select("SELECT DISTINCT controlNumber
        FROM orders
        INNER JOIN products USING (productID)
        WHERE controlNumber = ?", [$controlNumber]);




        return $sql;
    }
}
