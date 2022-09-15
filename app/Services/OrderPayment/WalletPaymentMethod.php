<?php

namespace App\Services\OrderPayment;

use Illuminate\Support\Facades\Log;

class WalletPaymentMethod implements PaymentMethod
{
    public function payOrder()
    {
        Log::info(__CLASS__.__FUNCTION__."pay wallet order");
        return "WalletPaymentMethod";
    }

}
