<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class usersModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $fillable = ['username','email', 'password'];
    public $timestamps = false;

}
