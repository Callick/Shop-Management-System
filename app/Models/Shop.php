<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'id',
        'shop_name',
	    'shop_proprietor_name',
        'shop_email',
        'shop_phone',
        'shop_address'
    ];
}
