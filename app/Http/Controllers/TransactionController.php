<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;   // (Formerly Book)
use App\PaymentMethod; // (Formerly Genre)

class TransactionController extends Controller
{
    /**
     * Store a new financial transaction in the ledger.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createTransaction(Request $request) {
        $transaction = new Transaction();
        // Mapping form inputs to financial attributes
        $transaction->reference = $request->input('reference'); // Was title
        $transaction->merchant  = $request->input('merchant');  // Was author
        $transaction->payment_method_id = $request->input('payment_method'); // Was genre
        $transaction->notes     = $request->input('notes');     // Was resume
        $transaction->save();

        // Attach currencies (e.g. EUR, USD) involved in this transaction
        if ($request->has('currencies')) {
            foreach ($request->input('currencies') as $currencyId) {
                $transaction->currencies()->attach($currencyId);
            }
        }
        
        return redirect('/');
    }

    /**
     * Void (delete) a transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTransaction(Request $request) {
        Transaction::destroy($request->input('id'));
        return redirect('/');
    }

    /**
     * Update an existing transaction record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTransaction(Request $request) {
        $transaction = Transaction::find($request->input('id'));
        
        $transaction->reference = $request->input('reference');
        $transaction->merchant  = $request->input('merchant');
        $transaction->payment_method_id = $request->input('payment_method');
        $transaction->notes     = $request->input('notes');
        $transaction->save();

        // Sync currencies association
        $transaction->currencies()->detach();
        if ($request->has('currencies')) {
            foreach ($request->input('currencies') as $currencyId) {
                $transaction->currencies()->attach($currencyId);
            }
        }
        
        return redirect('/');
    }

    /**
     * Add a new supported Payment Method (e.g. SEPA, SWIFT).
     */
    public function createPaymentMethod(Request $request) {
        $method = new PaymentMethod();
        $method->name = $request->input('name');
        $method->save();
        return redirect('/');
    }

    /**
     * Remove a Payment Method support.
     */
    public function deletePaymentMethod(Request $request) {
        PaymentMethod::destroy($request->input('id'));
        return redirect('/');
    }
}
