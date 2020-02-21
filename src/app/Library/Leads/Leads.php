<?php

namespace CapeAndBay\InTouch\Library\Leads;

use CapeAndBay\InTouch\Library\Feature;

class Leads extends Feature
{
    protected $url = '/leads';

    public function __construct()
    {
        parent::__construct();
    }

    public function leads_url()
    {
        return $this->intouch_client->public_url().$this->url;
    }

    public function postLead($club_uuid, $data = [])
    {
        $results = false;

        try
        {
            $args = [
                "contact" => [
                    'firstName'   => $data['lead']['first_name'],
                    'lastName'    => $data['lead']['last_name'],
                    'email'       => $data['lead']['email'],
                    'mobilePhone' => $data['lead']['mobile']
                ],
                "owner" => [
                    'uuid' => $data['owner']
                ],
                "product" => [
                    'id' => $data['product']
                ],
                "leadSource" => [
                    'id' => $data['leadSource']
                ],
                "contactMethod" => [
                    'id' => $data['contact']
                ]
            ];

            $header = ['clubuuid: '.$club_uuid];
            $response = $this->intouch_client->post($this->leads_url(), $args, $header);

            if($response)
            {
                $results = $response;
            }
        }
        catch(\Exception $e)
        {
            $results = $e->getMessage();
        }

        return $results;
    }

}
