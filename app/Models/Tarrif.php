<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarrif extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'description', 'price'];
    protected $table = 'tarrifs';

    public function tarrifItems(){
        return $this->hasMany('App\Models\TarrifItem','tarrif_id','id');
    }

     public function getTarrifAttribute($value){
        $tarrif_name=$this->tarrif()->name ?? '';
        return $tarrif_name;
    }
}
