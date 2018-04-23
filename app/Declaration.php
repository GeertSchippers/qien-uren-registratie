<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
     protected $fillable = [
        'date_receipt', 'type', 'total_receipt', 'btw', 'description', 'status'
    ];

}
