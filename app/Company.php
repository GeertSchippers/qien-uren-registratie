<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','location', 'contact_person', 'email', 'phone_number', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

}
