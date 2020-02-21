<?php

namespace CapeAndBay\InTouch\Facades;

use Illuminate\Support\Facades\Facade;

class InTouch extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \CapeAndBay\InTouch\InTouch::class;
    }
}
