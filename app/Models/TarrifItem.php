<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarrifItem extends Model
{
    use HasFactory;
    protected $fillable = ['tarrif_id', 'name', 'type', 'amount'];
    protected $table ='tarrif_items';

     public function tarrif(){
        return $this->hasOne('App\Models\tarrif', 'id','tarrif_id');
    }
}
