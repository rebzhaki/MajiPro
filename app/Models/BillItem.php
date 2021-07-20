<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    use HasFactory;

    protected $fillable = ['bill_id', 'narrative', 'quantity', 'unit', 'amount', 'status'];
    protected $table = 'bill_items';
}
