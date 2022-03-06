<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tables extends Eloquent
{
    use HasFactory;
    protected $primaryKey = '_id';
}
