<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $primaryKey = '_id';

    protected $tableId;
    protected $startTime;
    protected $endTime;
    protected $orderId;
}
