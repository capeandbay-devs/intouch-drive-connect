<?php

namespace CapeAndBay\InTouch\app\Library\OAuth;

use Illuminate\Support\Facades\Log;
use CapeAndBay\InTouch\app\Library\Feature;

class OAuthToken extends Feature
{
    protected $url = '/oauth/token';

    public function __construct()
    {
        parent::__construct();
    }

    public function oauth_token_url()
    {
        return $this->intouch_client->public_url().$this->url;
    }

    public function getNewToken()
    {
        $results = false;

        try
        {
            $client_id = config('intouch.deets.clientID');
            $client_secret = config('intouch.deets.secret');

            if((!is_null($client_id)) && (!is_null($client_secret)))
            {
                $request_url = $this->oauth_token_url().
                    "?grant_type=client_credentials&client_id={$client_id}&client_secret= {$client_secret}";

                $response = $this->intouch_client->get($request_url);

                Log::info($response);

                if($response)
                {
                    $results = $response;
                }
            }
        }
        catch(\Exception $e)
        {
            $results = $e->getMessage();
        }


        return $results;
    }
}
