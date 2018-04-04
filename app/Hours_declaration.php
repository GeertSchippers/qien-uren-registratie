<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uren_declaratie extends Model
{
    protected $fillable = [
        'user_id', 'date', 'amount', 'type', 'statement', 'paid'
    ];

}
