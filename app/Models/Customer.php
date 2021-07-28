<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'ID_type', 'ID_number', 'LR_number', 'address', 'location', 'place_id', 'latitude', 'longitude', 'tarrif_id'];

    protected $table='customers';

    public function payments(){
    	return $this->hasMany('App\Models\Payment','customer_id','id');
    }
     public function bills(){
        return $this->hasMany('App\Models\Bill','customer_id','id');
    }
     public function consumptions(){
        return $this->hasMany('App\Models\Consumption','customer_id','id');
    }
    public function tarrif(){
      return $this->hasOne('App\Models\Tarrif','id','tarrif_id');
    }
    public function getNameAttribute($value){
      return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }
    public function getPreviousReadingAttribute($value){
        $previous_reading=$this->consumptions()->orderBy('created_at','desc')->first()->current_reading ?? 0.00;
        return $previous_reading;
    }
}
