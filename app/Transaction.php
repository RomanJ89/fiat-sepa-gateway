<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Get the payment method used for this transaction.
     * (e.g. SEPA, SWIFT, Credit Card)
     */
    public function paymentMethod() {
        return $this->belongsTo('App\PaymentMethod');
    }

    /**
     * The currencies involved in this transaction.
     * Used for FX swaps or multi-currency routing.
     */
    public function currencies() {
        return $this->belongsToMany('App\Currency');
    }
}
