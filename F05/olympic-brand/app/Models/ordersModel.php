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

}
