<?php

namespace App\Controllers\PayPal;

use App\Controllers\BaseController;
use Exception;

class PaymentPaypal extends BaseController
{
    //private $baseURL = 'https://api-m.paypal.com';
    private $baseURL = 'https://api-m.sandbox.paypal.com';

    private $clientId = "AUu2CpCBrva4gbNjqB5IvdV16V93hPLgumgyL7iJgQPs64Rdrp35EepAGDE8GtDlZIwg7i44FrGDY8Eq";
    private $secret = "EDuiWwKXnXOBtCyjYFmFiriQjvroIA8kiRdsC2iNnCqAwKwxLi_-hOsZDQlZo7YPsrHDkZCK4-Lnn0iI";
    // private $clientId = "ARYwUX89lCet9zZRP5U-px8Btet5wVYIuTv8LVLOSNwMdg3ofVn9uE4vTFTiXw0Cxti0jrRNS6eYQAV0";
    // private $secret = "EFZUcwzBNOcDP7XUeUNaR4yR7fA_pPM1K6s02LP8TogupuLGnU49c87lZNEc93fV45Hax7LdqTRN-LA0";

    // public function __construct()
    // {
    //     $this->clientId = env('PAYPAL_CLIENT_ID');
    //     $this->secret = env('PAYPAL_SECRET');
    // }

    public function process($orderId)
    {

        try {
            $accessToken = $this->getAccessToken();

            $client = \Config\Services::curlrequest();

            $response = $client->request('POST', "/v2/checkout/orders/$orderId/capture", [
                'headers' => [
                    'Content-Type'     => 'application/json',
                    'Accept'     => 'application/json'
                ],
                'body' => [
                    'application_context' => [
                        'return_url' => "https://www.desarrollolibre.net/academia",
                        'cancel_url' => "https://www.desarrollolibre.net/cancel"
                    ]
                ]
            ]);

            // $response = Http::acceptJson()->withToken($accessToken)->withHeaders([
            //     'Content-Type' => 'application/json'
            // ])
            //     // withHeaders([ //asForm()
            //     // 'Accept' => 'application/json',
            //     // 'Content-Type' => 'application/json',
            //     // 'Authorization' => "Bearer $accessToken"
            //     // 
            //     ->post($this->baseURL . "/v2/checkout/orders/$orderId/capture", [
            //         'application_context' => [
            //             'return_url' => "https://www.desarrollolibre.net/academia",
            //             'cancel_url' => "https://www.desarrollolibre.net/cancel"
            //         ]
            //     ])->json();

            if ($response['status'] == 'COMPLETED') {

                echo $response['status'];
                return;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return  $e->getMessage();
        }
        echo "Ha ocurrido un problema con su orden, el estatus es " . $response['status'] . " y el ID es " . $response['id'];
        return  "Ha ocurrido un problema con su orden, el estatus es " . $response['status'] . " y el ID es " . $response['id'];
    }

    public function getAccessToken()
    {

        // try {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseURL . "v1/oauth2/token");
        /*curl_setopt($ch, CURLOPT_URL, “https://api.paypal.com/v1/oauth2/token”);*/
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->clientId . ":" . $this->secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $result = curl_exec($ch);



        if (empty($result)) die("Error: No response...");
        else {
            $json = json_decode($result);
            /*print_r($json->access_token);*/
            $accessToken = $json->access_token;
        }

        return;

        // $client = \Config\Services::curlrequest();

        // $response = $client->request('POST', $this->baseURL . "/v1/oauth2/token", [
        //     'headers' => [
        //         'Content-Type'     => 'x-www-form-urlencoded',
        //         'Accept'     => 'application/json'
        //     ],
        //     'auth' => [$this->clientId, $this->secret],
        //     'body' => [
        //         'grant_type' => 'client_credentials',
        //     ]
        // ]);
        // } catch (Exception $e) {

        //     return  $e->getMessage();
        // }



        // function getDeviations(token) {
        //     return new Promise((resolve, reject) => {
        //       request({
        //         url: `https://www.deviantart.com/api/v1/oauth2/browse/newest?
        //           access_token=${token}`,
        //         headers: {
        //           'User-Agent': 'curl/7.44.0'
        //         }
        //       }, (error, response, body) => {
        //         if (error || response.statusCode >= 400) {
        //           reject({
        //             error,
        //             response
        //           });
        //         } else {
        //           // do things and resolve
        //         }
        //       });
        //     });
        //   }


        // $response = Http::asForm()->withHeaders([
        //     'Accept' => 'application/json',
        //     'Content-Type' => 'application/x-www-form-urlencoded',
        // ])
        //     ->withBasicAuth($this->clientId, $this->secret)

        //     ->post($this->baseURL . '/v1/oauth2/token', [
        //         'grant_type' => 'client_credentials'
        //     ])->json();

        // //dd($response);

        // return $response['access_token'];
    }
}
