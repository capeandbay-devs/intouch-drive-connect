<?php

namespace CapeAndBay\InTouch\app\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntouchDetails extends Model
{
    use  SoftDeletes, Uuid;

    protected $primaryKey  = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $table = 'intouch_datatype_details';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_uuid','club_id', 'detail_name', 'intouch_detail_uuid', 'detail_value', 'misc', 'active'];
    //protected $guarded = [];

    protected $casts = [
        'misc' => 'array',
    ];
}
