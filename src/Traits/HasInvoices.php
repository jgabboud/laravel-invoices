<?php

namespace Jgabboud\Invoices\Traits;

use stdClass;
use Carbon\Carbon;
use Jgabboud\Invoices\Models\Invoice;

trait HasInvoices
{

// ==  DECLARATION

    //-- morph vendor 
    public function vendorInvoices()
    {
        return $this->morphMany(Invoice::class, 'vendor', 'vendor_type', 'vendor_id');
    }

    //-- morph buyer 
    public function buyerInvoices()
    {
        return $this->morphMany(Invoice::class, 'buyer', 'buyer_type', 'buyer_id');
    }

    //-- morph shipper 
    public function shipperInvoices()
    {
        return $this->morphMany(Invoice::class, 'shipper', 'shipper_type', 'shipper_id');
    }

//

// == FUNCTIONS

    //-- get vendor invoices by invoice number
    public function vendorInvoice(string $invoice_number): ?Invoice
    {
        return $this->vendorInvoices()->where('invoice_number', $invoice_number)->first();
    }
    
    //-- get buyer invoices by invoice number
    public function buyerInvoice(string $invoice_number): ?Invoice
    {
        return $this->buyerInvoices()->where('invoice_number', $invoice_number)->first();
    }

    //-- get shipper invoices by invoice number
    public function shipperInvoice(string $invoice_number): ?Invoice
    {
        return $this->shipperInvoices()->where('invoice_number', $invoice_number)->first();
    }

//

}