<?php

return [
    'deets' => [
        'clientID' => env('INTOUCH_CLIENT_ID',''),
        'secret' => env('INTOUCH_SECRET_KEY',''),
        'token' => env('INTOUCH_AUTH_TOKEN',''),
    ],
    'class_maps' => [
        'appointments' => \CapeAndBay\InTouch\Library\Appointments\Appointment::class,
        'leads' => \CapeAndBay\InTouch\Library\Leads\Leads::class,
        'leadsources' => \CapeAndBay\InTouch\Library\Leads\LeadSources::class,
        'staff' => \CapeAndBay\InTouch\Library\People\Staff::class,
    ]
];
