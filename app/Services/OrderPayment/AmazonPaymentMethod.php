<?php

namespace App\Services\OrderPayment;

use Illuminate\Support\Facades\Log;

class AmazonPaymentMethod implements PaymentMethod
{
    public function payOrder()
    {
        Log::info(__CLASS__.__FUNCTION__."pay amazon order");
        return "AmazonPaymentMethod";
    }

}
