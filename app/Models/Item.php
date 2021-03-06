<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $id;
    protected $name;
    protected $code;
    protected $image;
    protected $originPrice;
    protected $price;
    protected $discount;
    protected $status;
}
