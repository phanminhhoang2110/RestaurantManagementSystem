<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = '_id';

    protected $id;
    protected $sessionIid;
    protected $orderTime;
    protected $table_id;
    protected $staffName;
    protected $staffIid;
    protected $totalBill;
    protected $discount;
    protected $totalAmount;
    protected $cash;
    protected $excessCash;
}
