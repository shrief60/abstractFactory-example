<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\promotionFactories\PromotionFactory;
use Exception;

class PromotionController extends Controller
{
    //
    public function getPromoType(Request $request, $type, $customerType)
    {
        try {
            $factory = new PromotionFactory();
            $promotionCustomer = ($factory->getPromotionFamily('promotion-customer'))->CreatePromotion($type);
            $promotionType = ($factory->getPromotionFamily('promotion-type'))->CreatePromotion($customerType);
            $result = $promotionCustomer->getName() . $promotionType->getName();

            // validation
            $promotionCustomer = ($factory->getPromotionFamily('promotion-customer'))->getRules($type);
            $promotionType = ($factory->getPromotionFamily('promotion-type'))->getRules($customerType);
            //  prepare data
            DAO
            // save promotion table

            //  save promotion_store table

            return $result;
        }catch(Exception $e){
            return  $e->getMessage();
        }

    }
}
