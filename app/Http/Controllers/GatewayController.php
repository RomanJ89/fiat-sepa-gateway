<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\PaymentMethod;
use App\Currency;

class GatewayController extends Controller
{
    /**
     * Display the financial dashboard with latest transactions.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        // Retrieve all transaction records and available payment methods
        $transactions = Transaction::all();
        $paymentMethods = PaymentMethod::all();

        // Pass data to the main dashboard view
        return view('welcome', [
            'transactions' => $transactions, 
            'paymentMethods' => $paymentMethods
        ]);
    }

    /**
     * Show the form to initialize a new transaction manually.
     *
     * @return \Illuminate\View\View
     */
    public function insert() {
        $paymentMethods = PaymentMethod::all();
        $currencies = Currency::all();

        return view('insert', [
            'paymentMethods' => $paymentMethods, 
            'currencies' => $currencies
        ]);
    }

    /**
     * Process a transaction update request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function update(Request $request) {
        // Validate and retrieve the transaction entity
        $transaction = Transaction::findOrFail($request->input('id'));
        $paymentMethods = PaymentMethod::all();
        $currencies = Currency::all();
        
        return view('update', [
            'transaction' => $transaction, 
            'paymentMethods' => $paymentMethods,
            'currencies' => $currencies
        ]);
    }
}
