<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoicedetail';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = ['entrydate', 'orderid', 'invoiceno', 'userid', 'randomsession', 'productid', 'qty', 'price', 'dp', 'totalamount', 'status', 'statusdate', 'statusby'];   
}
