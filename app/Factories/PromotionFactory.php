<?php

namespace App\Factories;

use App\Services\discountPercentagePromotion;
use App\Services\discountValuePromotion;
use App\Services\PointMultiplierPromotion;
use Exception;

class PromotionFactory
{
    public static $promoTypes = [
        'discount_value'  => discountValuePromotion::class,
        'discount_percentage'  => discountPercentagePromotion::class,
        'point_multiplier'  => PointMultiplierPromotion::class
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
