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
   <div class=container-hours>
    <div class="container">
     Voornaam: {{$user->first_name}} <br>
     Achternaam: {{$user->last_name}} <br>
     Email: {{$user->email}} <br>
     Werknemers Nummer: {{$user->employee_number}} <br>
     Bedrijf: {{$company->name}} <br>

         <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'review')" id="defaultOpentrainees">Gemaakte uren</button>
          <button class="tablinks" onclick="openTab(event, 'approved')">Declaraties</button>
         
        </div>


        <div id="review" class="tabcontent">
              <h2>Gemaakte uren</h2>
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
                $obj->status = $hour->status;
                $obj->created_at = $hour->created_at;
           ?>
                     <tr>
                         <td>{{$hour->amount}}</td>
                         <td>{{$hour->type}}</td>
                         <td>{{$hour->statement}}</td>
                         <td>{{$hour->created_at}}</td>
                         <td>{{$hour->updated_at}}</td>
                         <td><input type='checkbox' id="hours_declaration{{ $hour->id }}" onchange="approveHoursDeclaration({{ $hour->id }}, {{ $obj }})" <?php if($hour->status == 1){echo 'checked';} ?> ></td>
                         <td><input type='checkbox' id="hours_declaration_paid{{ $hour->id }}" onchange="payHoursDeclaration({{ $hour->id }}, {{ $obj }})" <?php if($hour->status == 2){echo 'checked';} ?> ></td>
                     </tr>
         @endforeach
         
     </table>
    </div>
   </div>
 </div>



  <div class=container-hours>
    <div class="container">
     <div id="approved" class="tabcontent">
        <h2> Gemaakte declaraties</h2>
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
        <input type=button id="select_button" value="Select Maand" onclick="getMonth(<?php echo $user->id; ?>)">
        <input type=button value="Select All" onclick="getAll(<?php echo $user->id; ?>)">
        
        <?php 
          if(isset($date)){
          echo($date);
          }
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
             <th>Goedgekeurd<input type='checkbox' id="selectAllChecked" onchange="selectAllChecked()" <?php if($hour->status == 0){echo 'checked';} ?> ></th>
             
             <th>Betaald<input type='checkbox' id="selectAllPaid" onchange="selectAllPaid()" <?php if($hour->status == 2){echo 'checked';} ?> ></th>
         </tr>
         @foreach($declarations as $declaration)
         <?php 
                 $obj = new Declaration();
               $obj->date_receipt = $declaration->date_receipt;
               $obj->total_receipt = $declaration->total_receipt;
               $obj->type = $declaration->type;
               $obj->btw = $declaration->btw;
               $obj->description = $declaration->description;
               $obj->status = $declaration->status;
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
                         <td class="checked"><input class="checkbox" type='checkbox' id="declaration{{ $declaration->id }}" onchange="approveDeclaration({{ $declaration->id }}, {{ $obj }})" <?php if($declaration->status == 1){echo 'checked';} ?>></td>
                         <td class="paid"><input class="checkbox_paid" type='checkbox' id="declaration_paid{{ $declaration->id }}" onchange="payDeclaration({{ $declaration->id }}, {{ $obj }})" <?php if($declaration->status == 2){echo 'checked';} ?>></td>
                         
                     </tr>
         @endforeach
     </table>
    </div>
   </div>
  </div>    
        <hr>
<!--        <table>
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
                $obj->status = $hour->status;
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
    </table>-->
        <br><br><br><br><br><br>
        
 <script>
     document.getElementById("defaultOpentrainees").click();
    
 </script>
 @endsection
