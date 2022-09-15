<?php

namespace App\Http\Controllers;

use Konsulting\JsonDiff;
use Illuminate\Http\Request;
use App\Services\OrderPayment\CashPaymentMethod;
use App\Services\OrderPayment\AmazonPaymentMethod;
use App\Services\OrderPayment\WalletPaymentMethod;
use App\Services\OrderPayment\PaymentStrategyContext;

class PaymentController extends Controller
{
    //
    public function getPaymentType($type)
    {
        $paymentStrategy = new PaymentStrategyContext();
        $class = "App\Services\OrderPayment\\".$type;
        $paymentStrategy->setPaymentMethod(new $class());
        $response  = $paymentStrategy->execute();
        return response(['data' => $response], 200);
    }

    public function  test(){
        $originalJson = [
            "id"=> "1351313513153",
            "delivery_status"=> "enabled",
            "Modifier_groups"=> [
                "id" => "546845646854864848",
                "name" => "size",
                "modifiers" => [
                    ["id"=>"1121321212123132", "name"=>"modifier1"],
                    ["id"=>"536254254515454", "name"=>"modifier2"]
                ]
            ]
        ];
        $newJson = [
            "id"=> "1351313513153",
            "delivery_status"=> "disabled",
            "pickup_status"=> "enabled",
            "Modifier_groups"=> [
                "id" => "546845646854864848",
                "name" => "size",
                "modifiers" => [
                    ["id"=>"2138541354", "name"=>"modifier2"],
                    ["id"=>"536254254515454", "name"=>"modifier3"]
                ]
            ]
        ];
        //$diff = new JsonDiff($originalJson, $newJson, JsonDiff::REARRANGE_ARRAYS);
        //$this->assertEquals($r->getRearranged(), $originalJson);
        $diff =  JsonDiff::original(json_encode($originalJson))->exclude(['key'])->compareTo(json_encode($newJson));

        return response()->json(['result'=>$diff->toArray()], 200);
    }
}
