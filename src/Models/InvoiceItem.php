<?php

namespace Jgabboud\Invoices\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceItem extends Model
{
    use HasFactory;
    use SoftDeletes;   

    protected $guarded = [];
    protected $table = 'invoice_items';

    protected $fillable = [
        'invoice_id',
        'item',
        'item_name',
        'item_description',
        'item_options',
        'quantity',
        'unit_price',
        'currency'
    ];
 
    
// == CONSTRUCT and DECLARATIONS

    //-- constructor
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

//

}