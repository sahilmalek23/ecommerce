<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{    
    protected $table = 'promo_codes';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = [ 'code', 'type', 'value', 'status'];
}
