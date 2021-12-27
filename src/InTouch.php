<?php

namespace CapeAndBay\InTouch;

use CapeAndBay\InTouch\app\Services\LibraryService;

class InTouch
{
    protected $library;

    public function __construct(LibraryService $lib)
    {
        $this->library = $lib;
    }

    public function get($feature = '')
    {
        $results = false;

        $asset = $this->library->retrieve($feature);

        if($asset)
        {
            $results = $asset;
        }

        return $results;
    }
}
