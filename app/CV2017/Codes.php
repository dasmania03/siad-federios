<?php

namespace Siad\CV2017;

use Illuminate\Database\Eloquent\Model;

class Codes extends Model
{
    protected $table = 'cv17_codes';

    protected $fillable = [
        'codes',
        'status',
        'image'
    ];
}
