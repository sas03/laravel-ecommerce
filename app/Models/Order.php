<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Initialise timestamps variable at false for created_at, updated_at feld to be null
    //public $timestamps = false;
}
