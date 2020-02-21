<?php

namespace CapeAndBay\InTouch\Library;

use CapeAndBay\InTouch\Services\InTouchService;

class Feature
{
    public $intouch_client;

    public function __construct()
    {
        $this->intouch_client = new InTouchService();
    }

    /**
     * Returns all whatever from the InTouch API
     * @return array
     */
    public function get()
    {
        $results = [];
        // Leave it for a child to use, right?
        return $results;
    }

    public function setIfExists($key, $arr = [])
    {
        $results = '';

        if(array_key_exists($key, $arr))
        {
            $results = $arr[$key];
        }

        return $results;
    }
}
