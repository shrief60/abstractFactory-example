<?php

namespace App\Services\OrderPayment;

interface PaymentMethod
{
    public function payOrder();
}
