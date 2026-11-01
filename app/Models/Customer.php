<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Optional persistence model. The required listing uses its controller's array.
class Customer extends Model
{
    protected $fillable = ['account_code', 'name', 'email', 'phone', 'address', 'status'];
}
