<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceMaster extends Model
{
    protected $table = 'invoice_master';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = ['entrydate','userid', 'invoiceno', 'autoinvoiceno', 'qty', 'price', 'dp', 'discount', 'deliveryfee', 'subtotal', 'finaltotal', 'status', 'promocode', 'promoperc', 'payment_method', 'payment_status', 'payment_id', 'order_id','firstname', 'lastname', 'address', 'apartment', 'city', 'state', 'pincode', 'phone', 'same_ship', 'bill_country', 'bill_firstname', 'bill_lastname', 'bill_address', 'bill_apartment', 'bill_city', 'bill_state', 'bill_pincode', 'bill_phone', 'statusby', 'statusdate'];
    
}
