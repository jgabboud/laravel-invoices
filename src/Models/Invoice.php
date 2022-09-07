<?php

namespace Jgabboud\Invoices\Models;

use Illuminate\Database\Eloquent\Model;
use Jgabboud\Invoices\Models\InvoiceItem;
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
        
        'vendor_type',
        'vendor_id',
        'vendor_name',
        'vendor_address',
        'vendor_city',
        'vendor_state',
        'vendor_country',
        'vendor_potal_code',
        'vendor_contact',
        
        'buyer_type',
        'buyer_id',
        'buyer_name',
        'buyer_address',
        'buyer_city',
        'buyer_state',
        'buyer_country',
        'buyer_potal_code',
        'buyer_contact',
        
        'shipper_type',
        'shipper_id',
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

    //-- define default deleting action
    public static function boot() {
        parent::boot();

        static::deleting(function($plan) { 
                $plan->items()->delete();
        });
    }
    
//

// == RELATIONS

    //-- invoice items
    public function items(){
        return $this->hasMany(InvoiceItem::class);
    }

    //-- vendor
    public function vendor()
    {
        return $this->morphTo('vendor', 'vendor_type', 'vendor_id', 'id');
    }

    //-- buyer
    public function buyer()
    {
        return $this->morphTo('buyer', 'buyer_type', 'buyer_id', 'id');
    }

    //-- shipper
    public function shipper()
    {
        return $this->morphTo('shipper', 'shipper_type', 'shipper_id', 'id');
    }

//


// == FUNCTIONS

//

}