<?php

namespace App\Services\OrderPayment;
use Illuminate\Support\Facades\Log;

class CashPaymentMethod implements PaymentMethod
{
    public function payOrder()
    {
        Log::info(__CLASS__.__FUNCTION__."pay Cash order");
        return "CashPaymentMethod";
    }

}
