<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'date', 'user_id', 'consumption', 'previous_reading', 'current_reading'];
    protected $table = 'consumptions';

     public function customer(){
        return $this->hasOne('App\Models\Customer', 'id','customer_id');
    }
}
