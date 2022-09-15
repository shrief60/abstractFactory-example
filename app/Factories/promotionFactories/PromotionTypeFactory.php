<?php

namespace App\Factories\promotionFactories;

use App\Services\PromotionTypes\discountPercentagePromotion;
use App\Services\PromotionTypes\discountValuePromotion;
use App\Services\PromotionTypes\PointMultiplierPromotion;
use Exception;

class PromotionTypeFactory
{

    public $promotionType ; 
    public static $promoTypes = [
        'discount-value'  => discountValuePromotion::class,
        'discount-percentage'  => discountPercentagePromotion::class,
        'point-multiplier'  => PointMultiplierPromotion::class
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
