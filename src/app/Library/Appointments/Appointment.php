<?php

namespace CapeAndBay\InTouch\app\Library\Appointments;

use Illuminate\Support\Facades\Log;
use CapeAndBay\InTouch\Library\Feature;

class Appointment extends Feature
{
    protected $url = '/appointments';

    public function __construct()
    {
        parent::__construct();
    }

    public function appointments_url()
    {
        return $this->intouch_client->public_url().$this->url;
    }

    public function postAppointment($club_uuid, $data = [])
    {
        $results = false;

        try
        {
            $args = [
                'owner' => $data['owner'],
                'lead' => $data['lead'],
                'startDate' => $data['startDate'],
                'endDate' => $data['endDate'],
                'type' => $data['type'],
                //'description' => '',
                //'attendees' => ''
            ];

            $header = ['clubuuid: '.$club_uuid];
            $response = $this->intouch_client->post($this->appointments_url(), $args, $header);

            Log::info($response);

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
