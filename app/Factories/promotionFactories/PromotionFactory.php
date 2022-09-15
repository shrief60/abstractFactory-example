<?php

namespace App\Factories\promotionFactories;

use App\Factories\promotionFactories\PromotionCustomerFactory;
use App\Factories\promotionFactories\PromotionTypeFactory;
use Exception;

class PromotionFactory
{
    public $promotionType ; 
    public static $promoTypes = [
        'promotion-customer'  => PromotionCustomerFactory::class,
        'promotion-type'  => PromotionTypeFactory::class
    ];

    public function getPromotionFamily($type)
    {
        if(isset(self::$promoTypes[$type]))
            return $this->promotionInstance(self::$promoTypes[$type]);
        throw new Exception("error don't have this promo type");
    }

    public function  promotionInstance($promo){
        return  new $promo();
    }
}
