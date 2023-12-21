<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller
{
    //
    public function index(){
        $invoices = Invoice::all();
        return view('invoice_overview')->with(compact('invoices'));
    }
}
