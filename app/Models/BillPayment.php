<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    use HasFactory;
     protected $fillable = ['bill_id', 'payment_id', 'amount'];
    protected $table = 'bill_payments';
}
