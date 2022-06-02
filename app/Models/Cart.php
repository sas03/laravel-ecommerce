<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    // to specify the tablename in case our table name is incorrectly defined like in Laravel convention
    // public $table = "cart";
}
