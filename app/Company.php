<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model
{
    protected $fillable = [
        'name','location', 'contact_person', 'email', 'phone_number'
    ];

}
