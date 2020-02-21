<?php

namespace CapeAndBay\InTouch\Library\Leads;

use CapeAndBay\InTouch\Library\Feature;

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

    public function getLeads($club_uuid)
    {
        $results = [];

        try
        {
            $header = ['clubuuid: '.$club_uuid];
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
