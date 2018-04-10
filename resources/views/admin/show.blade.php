<?php
use App\Hours_declaration;
use App\Declaration;
$user = $user[0];
 ?>

 @extends('welcome')
 @section('content')
 <style>
     th, td{
         border: 1px solid;
         padding: 5px;
     }
 </style>
     First Name: {{$user->first_name}} <br>
     Last Name: {{$user->last_name}} <br>
     Email: {{$user->email}} <br>
     Employee Number: {{$user->employee_number}} <br>
     Company: {{$company->name}} <br>

     <h2>gemaakte uren</h2>
         <table>
         <tr>
             <th>amount</th>
             <th>type</th>
             <th>statement</th>
             <th>created at</th>
             <th>updated at</th>
             <th>approved</th>
             <th>paid</th>
         </tr>
         @foreach($hours as $hour)
          <?php $obj = new Hours_declaration();
                $obj->amount = $hour->amount;
                $obj->date = $hour->date;
                $obj->type = $hour->type;
                $obj->statement = $hour->statement;
                $obj->paid = $hour->paid;
                $obj->approved = $hour->approved;
                $obj->created_at = $hour->created_at;
           ?>
                     <tr>
                         <td>{{$hour->amount}}</td>
                         <td>{{$hour->type}}</td>
                         <td>{{$hour->statement}}</td>
                         <td>{{$hour->created_at}}</td>
                         <td>{{$hour->updated_at}}</td>
                         <td><input type='checkbox' id="hours_declaration{{ $hour->id }}" onchange="approveHoursDeclaration({{ $hour->id }}, {{ $obj }})" <?php if($hour->approved == 1){echo 'checked';} ?> ></td>
                         <td><input type='checkbox' id="hours_declaration_paid{{ $hour->id }}" onchange="payHoursDeclaration({{ $hour->id }}, {{ $obj }})" <?php if($hour->paid == 1){echo 'checked';} ?> ></td>
                     </tr>
         @endforeach
     </table>
        <h2> gemaakte declaraties</h2>
         <table>
         <tr>
             <th>date_receipt</th>
             <th>type</th>
             <th>total_receipt</th>
             <th>btw</th>
             <th>description</th>
             <th>created at</th>
             <th>updated at</th>
             <th>approved</th>
             <th>paid</th>
         </tr>
         @foreach($declarations as $declaration)
         <?php $obj = new Declaration();
               $obj->date_receipt = $declaration->date_receipt;
               $obj->total_receipt = $declaration->total_receipt;
               $obj->type = $declaration->type;
               $obj->btw = $declaration->btw;
               $obj->description = $declaration->description;
               $obj->paid = $declaration->paid;
               $obj->approved = $declaration->approved;
               $obj->created_at = $declaration->created_at;
          ?>
                     <tr>
                         <td>{{$declaration->date_receipt}}</td>
                         <td>{{$declaration->type}}</td>
                         <td>{{$declaration->total_receipt}}</td>
                         <td>{{$declaration->btw}}</td>
                         <td>{{$declaration->description}}</td>
                         <td>{{$declaration->created_at}}</td>
                         <td>{{$declaration->updated_at}}</td>
                         <td><input type='checkbox' id="declaration{{ $declaration->id }}" onchange="approveDeclaration({{ $declaration->id }}, {{ $obj }})" <?php if($declaration->approved == 1){echo 'checked';} ?>></td>
                         <td><input type='checkbox' id="declaration_paid{{ $declaration->id }}" onchange="payDeclaration({{ $declaration->id }}, {{ $obj }})" <?php if($declaration->paid == 1){echo 'checked';} ?>></td>
                     </tr>
         @endforeach
     </table>
 @endsection
