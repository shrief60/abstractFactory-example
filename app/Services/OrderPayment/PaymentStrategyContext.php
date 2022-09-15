<?php

namespace App\Services\OrderPayment;

class PaymentStrategyContext
{
    public $paymentMethod;

    public function __construct()
    {
        //$this->paymentMethod = $paymentMethod;
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function execute(){
        return $this->paymentMethod->payOrder();
    }

}
