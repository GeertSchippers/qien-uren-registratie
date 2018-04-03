<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uren_declaratie extends Model
{
    protected $fillable = [
        'id','datum','aantal', 'type', 'verklaring'
    ];

}
