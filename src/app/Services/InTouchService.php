<?php

namespace CapeAndBay\InTouch\Services;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Log;

class InTouchService
{
    protected $root_url = 'https://api.intouchfollowup.com';
    protected $public_url = '/v1';
    protected $token;

    public function __construct()
    {
        $this->token = config('intouch.deets.token');
    }

    public function public_url()
    {
        return $this->root_url.$this->public_url;
    }

    public function get($endpoint, $headers = [])
    {
        $results = false;

        $url = $endpoint;
        $header = ['Authorization: Bearer '.$this->token];
        if(!empty($headers))
        {
            foreach($headers as $h)
            {
                $header[] = $h;
            }
        }

        $response = Curl::to($url)
            ->withHeaders($header)
            ->asJson(true)
            ->get();

        if($response)
        {
            Log::info('InTouch Response from '.$url, $response);
            $results = $response;
        }
        else
        {
            Log::info('InTouch Null Response from '.$url);
        }

        return $results;
    }

    public function post($endpoint, $args = [], $headers = [])
    {
        $results = false;

        $url = $endpoint;

        if(!empty($args))
        {
            if(!empty($headers))
            {
                $response = Curl::to($url)
                    ->withHeaders($headers)
                    ->withData($args)
                    ->asJson(true)
                    ->post();
            }
            else
            {
                $response = Curl::to($url)
                    ->withData($args)
                    ->asJson(true)
                    ->post();
            }
        }
        elseif(!empty($headers))
        {
            $response = Curl::to($url)
                ->withHeaders($headers)
                ->asJson(true)
                ->post();
        }
        else
        {
            $response = Curl::to($url)
                ->asJson(true)
                ->post();
        }

        if($response)
        {
            Log::info('InTouch Response from '.$url, $response);
            $results = $response;
        }
        else
        {
            Log::info('InTouch Null Response from '.$url);
        }

        return $results;
    }
}
