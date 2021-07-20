<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'mode', 'date', 'code', 'narrative', 'amount'];
    protected $table = 'payments';
}
