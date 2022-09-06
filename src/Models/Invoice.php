<?php

namespace Jgabboud\Invoices\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{    
    use HasFactory;
    use SoftDeletes;   

    protected $guarded = [];
    protected $table = 'invoices';

    protected $fillable = [
        'payment_method', 
        'is_draft',
        'invoice_number',
        'notes',
        'issuer',
        'issuer_name',
        'issuer_address',
        'issuer_city',
        'issuer_state',
        'issuer_country',
        'issuer_potal_code',
        'issuer_contact',
        'buyer',
        'buyer_name',
        'buyer_address',
        'buyer_city',
        'buyer_state',
        'buyer_country',
        'buyer_potal_code',
        'buyer_contact',
        'shipper',
        'shipping_name',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'shipping_potal_code',
        'sub_total',
        'discount',
        'tax',
        'shipping_cost',
        'total',
        'currency',
        'issue_date',
        'due_date',
        'is_paid'
    ];

// == CONSTRUCT and DECLARATIONS

    //-- constructor
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

//

}