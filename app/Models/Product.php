<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_sub_master';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = ['entrydate','product_id', 'price', 'dp', 'size', 'status', 'addedby', 'statusby', 'statusdate'];

}
