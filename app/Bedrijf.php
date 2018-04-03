<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model
{
    protected $fillable = [
        'id','naam','locatie', 'contact_persoon', 'email', 'telefoon_nummer'
    ];

}
