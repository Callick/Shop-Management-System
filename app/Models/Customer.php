<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    //
    use HasFactory;

    protected $table = 'customers';
    protected $primary = 'id';

    protected $fillable = [
        'customer_name',
        'customer_id',
        'customer_phone',
        'product_name',
        'product_issue',
        'shop_id'
    ];
    public $timestamps = true;
}
