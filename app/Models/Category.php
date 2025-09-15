<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    const CREATED_AT = 'entrydate';
    const UPDATED_AT = 'statusdate';
    protected $fillable = ['title', 'image', 'status', 'addedby', 'statusby'];
}
