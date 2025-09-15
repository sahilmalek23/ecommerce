<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'productimage';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = [ 'entrydate', 'image', 'product_id','status', 'statusby', 'statusdate'];
}
