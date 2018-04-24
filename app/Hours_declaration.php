<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours_declaration extends Model
{
    protected $fillable = [

        'user_id', 'date', 'amount', 'type', 'statement', 'status'

    ];

}
