<?php
use App\Hours_declaration;
use App\Declaration;
use App\User;
use App\Company;
 ?>

 @extends('layouts.admin')
 @section('content')

 <style>
     th, td{
         border: 1px solid;
         padding: 5px;
     }
 </style>
     Voornaam: {{$user->first_name}} <br>
     Achternaam: {{$user->last_name}} <br>
     Email: {{$user->email}} <br>
     Werknemers Nummer: {{$user->employee_number}} <br>
     Bedrijf: {{$company->name}} <br>

     <h2>gemaakte uren</h2>
         <table>
         <tr>
             <th>Aantal</th>
             <th>Type</th>
             <th>Verklaring</th>
             <th>Aangemaakt</th>
             <th>Gewijzigd</th>
             <th>Goedgekeurd</th>
             <th>Betaald</th>
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
       <select id="select_month">
           <option>01</option>
           <option>02</option>
           <option>03</option>
           <option>04</option>
           <option>05</option>
           <option>06</option>
           <option>07</option>
           <option>08</option>
           <option>09</option>
           <option>10</option>
           <option>11</option>
           <option>12</option>    
       </select>
       
       <select id="select_year">    
        <?php
           $currentYear = date('Y');          
           echo '<option>'.$currentYear.'</option>';
           
       

        ?>
        </select>
        <input type=button value="Select Maand" onclick="getMonth(<?php echo $user->id; ?>)">
        <input type=button value="Select All" onclick="getAll(<?php echo $user->id; ?>)">
        
        <?php 
            if(isset($date)){
          echo($date);
           
           }
      echo "TEST";
        ?>        
         <table>
         <tr>
             <th>Datum bon</th>
             <th>Type</th>
             <th>Totaal bon</th>
             <th>Btw</th>
             <th>Beschrijving</th>
             <th>Aangemaakt</th>
             <th>Gewijzigd</th>
             <th>Goedgekeurd</th>
             <th>Betaald</th>
         </tr>
         @foreach($declarations as $declaration)
         <?php 
                 $obj = new Declaration();
               $obj->date_receipt = $declaration->date_receipt;
               $obj->total_receipt = $declaration->total_receipt;
               $obj->type = $declaration->type;
               $obj->btw = $declaration->btw;
               $obj->description = $declaration->description;
               $obj->paid = $declaration->paid;
               $obj->approved = $declaration->approved;
               $obj->created_at = $declaration->created_at;
          ?>
                     <tr class="declarationtr">
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
        <hr>
        <table>
            <tr>
                <th>Datum</th>
                <th>Opdracht</th>
                <th>Overuren</th>
                <th>Kort verlof</th>
                <th>vakantie</th>
                <th>Ziek</th>
                <th>Overig</th>
                <th>Verklaring</th>
            </tr>
            <tr>
            @foreach($hours as $hour)
            <?php 
                $obj = new Hours_declaration();
                $obj->amount = $hour->amount;
                $obj->date = $hour->date;
                $obj->type = $hour->type;
                $obj->statement = $hour->statement;
                $obj->paid = $hour->paid;
                $obj->approved = $hour->approved;
                $obj->created_at = $hour->created_at;
           ?>
            <td>{{$hour->date}}</td>
            <td>@if($hour->type == 'workhours'){{$hour->amount}}@endif</td>
            <td>@if($hour->type == 'extrahours'){{$hour->amount}}@endif</td>
            <td>@if($hour->type == 'abscense'){{$hour->amount}}@endif</td>
            <td>@if($hour->type == 'holiday'){{$hour->amount}}@endif</td>
            <td>@if($hour->type == 'sick'){{$hour->amount}}@endif</td>
            <td>@if($hour->type == 'extra'){{$hour->amount}}@endif</td>
            <td>{{$hour->statement}}</td>           
        </tr>
        @endforeach
    <table>
        <br><br><br><br><br><br>
 @endsection
