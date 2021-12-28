<?php

namespace CapeAndBay\InTouch\app\Library\Leads;

use CapeAndBay\InTouch\app\Library\Feature;

class LeadSources extends Feature
{
    protected $url = '/leadsources';

    public function __construct()
    {
        parent::__construct();
    }

    public function leadsources_url()
    {
        return $this->intouch_client->public_url().$this->url;
    }

    public function getLeadSources($club_uuid, $token)
    {
        $results = [];

        try
        {
            $header = ["Authorization:Bearer $token", "clubuuid:$club_uuid"];
            $response = $this->intouch_client->get($this->leadsources_url(), $header);

            if($response)
            {
                if(array_key_exists('_embedded', $response))
                {
                    if(array_key_exists('leadsources', $response['_embedded']))
                    {
                        $results = $response['_embedded']['leadsources'];
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
