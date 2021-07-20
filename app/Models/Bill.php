<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'start_date', 'end_date', 'date', 'status', 'balance', 'amount'];
    protected $table= 'bills';
}
