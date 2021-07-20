<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'date', 'user_id', 'consumption'];
    protected $table = 'consumptions';
}
