<?php
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

     <h2> gemaakte uren</h2>
         <table>
         <tr>
             <th>amount</th>
             <th>type</th>
             <th>statement</th>
             <th>paid</th>
             <th>created_at</th>
             <th>approved</th>
         </tr>
         @foreach($hours as $hour)
                     <tr>
                         <td>{{$hour->amount}}</td>
                         <td>{{$hour->type}}</td>
                         <td>{{$hour->statement}}</td>
                         <td>{{$hour->paid}}</td>
                         <td>{{$hour->created_at}}</td>
                         <td><input type='checkbox' id="hours_declaration{{ $hour->id }}" onchange="approveHoursDeclaration({{ $hour->id }})" <?php if($hour->approved == 1){echo 'checked';} ?> ></td>
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
             <th>created_at</th>
             <th>updated_at</th>
             <th>approved</th>
         </tr>
         @foreach($declarations as $declaration)
                     <tr>
                         <td>{{$declaration->date_receipt}}</td>
                         <td>{{$declaration->type}}</td>
                         <td>{{$declaration->total_receipt}}</td>
                         <td>{{$declaration->btw}}</td>
                         <td>{{$declaration->description}}</td>
                         <td>{{$declaration->created_at}}</td>
                         <td>{{$declaration->updated_at}}</td>
                         <td><input type='checkbox' id="declaration{{ $declaration->id }}" onchange="approveDeclaration({{ $declaration->id }})" <?php if($declaration->approved == 1){echo 'checked';} ?>></td>
                     </tr>
         @endforeach
     </table>
 @endsection
