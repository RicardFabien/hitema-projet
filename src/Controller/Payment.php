<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\BarsQuery;
use App\Query\BNQuery;
use App\Query\UserQuery;

use Stripe\Stripe;

class Payment extends AbstractController
{
    const BAR_INDICATOR = 'bar';
    

    public function index(array $data = []):void
    {
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

        $locationData = false;

        $id = $data["id"];

        if(str_starts_with ( $id , BarsQuery::BAR_INDICATOR )){
            $locationData = Container::getInstance(BarsQuery::class)->findOneBy([ 'id' => ltrim($id,BarsQuery::BAR_INDICATOR )]);
        }
        else if(str_starts_with ( $id , BNQuery::BN_INDICATOR )){
            $locationData = Container::getInstance(BNQuery::class)->findOneBy([ 'id' => ltrim($id,BNQuery::BN_INDICATOR)]);
        } 
       $userLevel =  Container::getInstance(UserQuery::class)->getStoredUserLevel();

    
        $this->render('payment/index',["level" => $userLevel,"locationData" => $locationData]);
    }

    public function process(): void{

        $email = $_POST["email"];
        $name = $_POST["name"];

        $number = $_POST["number"];
        $exp_month = $_POST["exp_month"];
        $exp_year = $_POST["exp_year"];
        $cvc = $_POST["cvc"];

        $cardData = [
            "card" => [
            "number" => $number,
            "exp_month" => $exp_month,
            "exp_year" => $exp_year,
            "cvc" => $cvc]
        ];

        $error = false;
        $userError = false;

        if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name)){
            $ch = curl_init();
            curl_setopt_array($ch,[
                CURLOPT_URL => 'https://api.stripe.com/v1/tokens',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => "sk_test_51IkaG8LfbP9HLlhMgp3q9HltPpxaukNg5sRE8NKVZblPK4sAf19I3Dq3bKHpeHJgt72vNa4Mk9AAkUuDeZpecRiy0041gCE6Gg",
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_POSTFIELDS => http_build_query($cardData)
            ]);

            $response = json_decode(curl_exec($ch));

        }
        else{
            $userError = "L'email ou le nom est invalide";
        }


        if(isset($response->error)) 
            $userError = $response->error->message;
        else{
            $chargeData = [ 
                "amount"=> 2000,
                "currency" => "eur",
                "source"=>$response->id,
                "description"=>"My First" 
            ];
        }


        

        if(!$userError){
            $ch = curl_init();
            curl_setopt_array($ch,[
                CURLOPT_URL => 'https://api.stripe.com//v1/charges',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => "sk_test_51IkaG8LfbP9HLlhMgp3q9HltPpxaukNg5sRE8NKVZblPK4sAf19I3Dq3bKHpeHJgt72vNa4Mk9AAkUuDeZpecRiy0041gCE6Gg",
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_POSTFIELDS => http_build_query($chargeData)
            ]);

            $response2 = json_decode(curl_exec($ch));

        }

        if(isset($response2->error)) 
            $isValid = false;
        else{
            $isValid = true;
        }

        $this->render('payment/process',["isValid" => $isValid]);
    }
        
}