<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    protected $table = 'product_master';
    const CREATED_AT = 'entrydate';
    const UPDATED_AT = 'statusdate';
    protected $fillable = ['name', 'category_id', 'description', 'remarks', 'image','status', 'addedby', 'statusby', 'statusdate'];

}
