<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $table = 'stock_transaction';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = ['entrydate','type', 'stock', 'product_sub_id', 'addedby'];
}
