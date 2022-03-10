<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $orderId;
    protected $itemId;
    protected $price;
    protected $quantity;
    protected $description;
    protected $amount;
}
