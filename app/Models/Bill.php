<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'start_date', 'end_date', 'date', 'status', 'balance', 'amount','consumption'];
    protected $table= 'bills';

     public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }
    public function billItems(){
      return $this->hasMany('App\Models\BillItem','bill_id','id');
    }
 }
