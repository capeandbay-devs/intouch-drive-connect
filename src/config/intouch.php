<?php

return [
    'deets' => [
        'clientID' => env('INTOUCH_CLIENT_ID',''),
        'secret' => env('INTOUCH_SECRET_KEY',''),
        'token' => env('INTOUCH_AUTH_TOKEN',''),
    ],
    'class_maps' => [
        'appointments' => \CapeAndBay\InTouch\app\Library\Appointments\Appointment::class,
        'leads' => \CapeAndBay\InTouch\app\Library\Leads\Leads::class,
        'leadsources' => \CapeAndBay\InTouch\app\Library\Leads\LeadSources::class,
        'staff' => \CapeAndBay\InTouch\app\Library\People\Staff::class,
    ]
];
