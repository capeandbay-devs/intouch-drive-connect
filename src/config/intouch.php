<?php

return [
    'deets' => [
        'clientID' => env('INTOUCH_CLIENT_ID',''),
        'secret' => env('INTOUCH_SECRET_KEY',''),
        'token' => env('INTOUCH_AUTH_TOKEN',''),
    ],
    'class_maps' => [
        'leadsources' => \CapeAndBay\InTouch\Library\Leads\LeadSources::class,
        'staff' => \CapeAndBay\InTouch\Library\People\Staff::class,

    ]
];
