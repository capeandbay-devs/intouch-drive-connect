<?php

namespace CapeAndBay\InTouch\app\Library\People;

use CapeAndBay\InTouch\app\Library\Feature;

class Staff extends Feature
{
    protected $url = '/staff';

    public function __construct()
    {
        parent::__construct();
    }

    public function staff_url()
    {
        return $this->intouch_client->public_url().$this->url;
    }

    public function getStaff($club_uuid, $token)
    {
        $results = [];

        try
        {
            $header = ["Authorization:Bearer $token", "clubuuid:$club_uuid"];
            $response = $this->intouch_client->get($this->staff_url(), $header);

            if($response)
            {
                if(array_key_exists('_embedded', $response))
                {
                    if(array_key_exists('staff', $response['_embedded']))
                    {
                        $results = $response['_embedded']['staff'];
                    }
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
