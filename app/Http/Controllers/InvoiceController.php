<?php

namespace App\Http\Controllers;

use App\Mail\Invoice as MailInvoice;
use App\Models\Invoice;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    //
    public function index(){
        $invoices = Invoice::all();
        return view('invoice_overview')->with(compact('invoices'));
    }

    public function sendMail(Request $request){
        $invoice = Invoice::where('id', $request->id)->first();
        $user = User::where('id', $invoice->user_id)->first();
        if($invoice != null){
            //finnvc99@gmail.com is going to be replaced with: $user->email
            Mail::to('finnvc99@gmail.com')->send(new MailInvoice($invoice, $user->name));
        }
        else{
            //something went wrong
        }
        return redirect()->intended('dashboard');
    }

    public function download(Request $request){
        $invoice = Invoice::where('id', $request->id)->first();
        $user = User::where('id', $invoice->user_id)->first();
        $name = $user->name;
        $pdf = FacadePdf::loadView('pdf.invoice_pdf', compact('invoice', 'name'));
        return $pdf->download('invoice.pdf');
    }
}
