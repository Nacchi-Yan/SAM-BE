<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
class productsModel extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "productID";
    protected $fillable = ['name', 'description', 'price','stock' , 'category','img'];
    public $timestamps = false;

    public static function showProducts(){
        $sql = DB::select("SELECT * FROM products");

        return $sql;
      }

}
