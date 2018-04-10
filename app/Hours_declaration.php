<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours_declaration extends Model
{
    protected $fillable = [
        'id','user_id', 'date', 'amount', 'type', 'statement', 'paid'
    ];
    
//    public function __construct($user_id, $date, $amount, $type, $statement, $paid){
//        $this->user_id = $user_id;
//        $this->date = $date;
//        $this->amount = $amount;
//        $this->type = $type;
//        $this->statement = $statement;
//        $this->paid = $paid;
//        
//}
 
}
