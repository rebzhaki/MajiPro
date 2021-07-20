<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'ID_type', 'ID_number', 'LR_number', 'address', 'location', 'place_id', 'latitude', 'longitude', 'tarrif_id'];

    protected $table='customers';
}
