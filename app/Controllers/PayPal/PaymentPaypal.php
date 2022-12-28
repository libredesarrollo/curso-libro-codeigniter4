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

    public function index()
    {
        echo view('shopping/paypal');
    }

    public function process($orderId = null)
    {
        try {

            $accessToken = $this->getAccessToken();


            $curl = curl_init($this->baseURL . "/v2/checkout/orders/$orderId/capture");

            curl_setopt_array($curl, array(
                //   CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $accessToken,
                    'Content-Type: application/json'
                )
            ));

             curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);

            $resp = json_decode(curl_exec($curl));

            curl_close($curl);
            if ($resp) {
            
                if ($resp->status == 'COMPLETED') {
                    return $this->response->setJSON(array('msj' => 'Pago exitoso'));
                }
                return json_encode(array('msj' => 'Pago no exitoso'));

                // echo "OK!";
                var_dump($resp);
                // var_dump($resp->status);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAccessToken()
    {

        try {
            $client = \Config\Services::curlrequest();

            $response = $client->request('POST', $this->baseURL . "/v1/oauth2/token", [
                'headers' => [
                    // 'Content-Type'     => 'x-www-form-urlencoded',
                    // 'Accept'     => 'application/json'
                ],
                'auth' => [$this->clientId, $this->secret],

                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);

            $resJson = json_decode($response->getBody());
            //var_dump($resJson->access_token);
            return $resJson->access_token;
        } catch (Exception $e) {
            echo "TOKEN";
            return  $e->getMessage();
        }



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
