<?php

namespace App\Http\Controllers\Client;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function addPurchase(){
        return view('resident.payment.purchase');
    }

    public function purchase(Request $request){

    }

    public function viewPurchases(){
        $transactions=Transaction::all();
        return view('resident.payment.view_transactions',compact('transactions'));
    }
}
