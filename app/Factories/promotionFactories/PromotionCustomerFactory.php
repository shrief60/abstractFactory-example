<?php

namespace App\Factories\promotionFactories;

use App\Services\PromotionTypes\UniversalPromotion;
use App\Services\PromotionTypes\TargettedPromotion;
use App\Services\PromotionTypes\CompensationPromotion;
use Exception;

class PromotionCustomerFactory
{
    
    public static $promoTypes = [
        'universal'  => UniversalPromotion::class,
        'compensation'  => CompensationPromotion::class,
        'targetted'  => TargettedPromotion::class
    ];

    public function CreatePromotion($type)
    {
        if(isset(self::$promoTypes[$type]))
            return $this->promotionInstance(self::$promoTypes[$type]);
        throw new Exception("error don't have this promo type");
    }

    public function  promotionInstance($promo){
        return  new $promo();
    }
}
