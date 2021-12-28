<?php

namespace CapeAndBay\InTouch\app\Traits;

use CapeAndBay\InTouch\app\Models\IntouchDetails;

trait InTouchClub
{
    public function intouch_details()
    {
        return $this->hasMany(IntouchDetails::class, 'club_id', $this->clubIdKey);
    }

    public function intouch_detail()
    {
        return $this->hasOne(IntouchDetails::class, 'club_id', $this->clubIdKey);
    }

    public function intouch_lead_owners()
    {
        return $this->intouch_details()->where('detail_name', '=', config('intouch.detail_names.staff'));
    }

    public function intouch_lead_sources()
    {
        return $this->intouch_details()->where('detail_name', '=', config('intouch.detail_names.leadsources'));
    }

    public function intouch_club_uuid()
    {
        return $this->intouch_detail()->where('detail_name', '=', config('intouch.detail_names.clubs'));
    }


}
