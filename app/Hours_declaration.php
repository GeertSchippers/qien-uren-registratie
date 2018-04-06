<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours_declaration extends Model
{
    protected $fillable = [
        'user_id', 'date', 'amount', 'type', 'statement', 'paid'
    ];

}

// function create($request){
//    $request_data = $request->all();
//    $data = $request_data[$data];
//    $data = json_encode($data);
//    $new = new App\Hours_declaration($data);
//}