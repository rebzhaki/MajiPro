<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'date', 'time', 'message', 'customer_id'];
    protected $table = 'communications';
}
