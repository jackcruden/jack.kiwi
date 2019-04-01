<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];
}
