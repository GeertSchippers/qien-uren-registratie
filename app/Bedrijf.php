<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model
{
    protected $fillable = [
        'id','name','location', 'contact_person', 'email', 'phone_number'
    ];

}
