<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaratie extends Model
{
     protected $fillable = [
        'id','datum_bon','type', 'totaal_bon', 'btw', 'omschrijving'
    ];

}
