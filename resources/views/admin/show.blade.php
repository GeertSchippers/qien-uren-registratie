@extends('layouts.admin')
@section('users')
<style>
    th, td{
        border: 1px solid;
        padding: 5px;
    }
</style>
    <h1>Hallo Admin</h1>
    <h3>Overzicht trainees</h3>
    <table>
        <tr>
            <th>Voornaam </th>
            <th>Achternaam</th>
            <th>email </th>
            <th>Werknemers nr</th>
            <th>Bedrijf</th>
            <th>Bekijk</th>
            <th>Wijzig</th>
            
        </tr>
        @foreach($users as $user)
            @if($user->admin == 0)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->employee_number}}</td>
                            @foreach($companies as $company)
                                @if ($company->id == $user->company_id)
                                    <td>{{$company->name}}</td>
                                @endif
                            @endforeach
                           
                            <td><a href='/trainees/{{$user->id}}'class='btn btn-default'>Bekijk</a></td>

                            <td><a href='/trainees/{{$user->id}}/edit'class='btn btn-default'>Wijzig</a></td>
                               
                    
                    </tr>
            @endif
        @endforeach
    </table>
    <h2>Uren</h2>
@endsection
@section('review')
    
    <table>
        <h3>Review</h3>
            <tr>
                <th>Hoeveelheid</th>
                <th>Type</th>
                <th>Maand</th>
                <th>Persoon</th>
                <th>Bedrijf</th>
                <th>Laatste update</th>
                <th>Wijzigen</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->approved == 0)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->date}}</td>
                    <td>{{$hour->user_id}}</td>
                    <td>{{$hour->user_id}}</td>
                    <td>{{$hour->updated_at}}</td>
                    <td><a>wijzig</a></td>
                </tr>
                @endif
            @endforeach
    </table>
@endsection
@section('goedgekeurd')
    <table>
        <h3>Goedgekeurd</h3>
            <tr>
                <th>Hoeveelheid</th>
                <th>Type</th>
                <th>Maand</th>
                <th>Persoon</th>
                <th>Bedrijf</th>
                <th>Laatste update</th>
                <th>Wijzigen</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->approved == 1)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->date}}</td>
                    <td>{{$hour->user_id}}</td>
                    <td>{{$hour->user_id}}</td>
                    <td>{{$hour->updated_at}}</td>
                    <td><a>wijzig</a></td>
                </tr>
                @endif
            @endforeach
    </table>
@endsection
@section('betaald')
    <table>
        <h3>Betaald</h3>
            <tr>
                <th>Hoeveelheid</th>
                <th>Type</th>
                <th>Maand</th>
                <th>Persoon</th>
                <th>Bedrijf</th>
                <th>Laatste update</th>
                <th>Wijzigen</th>
            </tr>
            @foreach($hours as $hour)
                @if($hour->paid == 1)
                <tr>
                    <td>{{$hour->amount}}</td>
                    <td>{{$hour->type}}</td>
                    <td>{{$hour->date}}</td>
                    <td>{{$hour->user_id}}</td>
                    <td>{{$hour->user_id}}</td>
                    <td>{{$hour->updated_at}}</td>
                    <td><a>wijzig</a></td>
                </tr>
                @endif
            @endforeach
    </table>
@endsection
@section('declarations')
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
        <input type=button value="Select Maand" onclick="getMonth(<?php echo $admin->id; ?>)">
        <?php 
            if(isset($date)){
          echo($date);
           
           }
      echo "TEST";
        ?>
      
        <table>
        <tr>
            <th>date_receipt</th>
            <th>type</th>
            <th>total_receipt</th>
            <th>btw</th>
            <th>description</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>user_id</th>
        </tr>
        
        <?php 
        if(isset($_POST['obj'])){
        $date = json_decode($_POST['obj'], true);
        }
//        error_log($date);
        ?>
        @foreach($declarations as $declaration)
        
       
        
   
                    <tr>
                        <td>{{$declaration->date_receipt}}</td>
                        <td>{{$declaration->type}}</td>
                        <td>{{$declaration->total_receipt}}</td>
                        <td>{{$declaration->btw}}</td>
                        <td>{{$declaration->description}}</td>
                        <td>{{$declaration->created_at}}</td>
                        <td>{{$declaration->updated_at}}</td>
                            @foreach($users as $user)
                                @if ($declaration->user_id == $user->id)
                                    <td>{{$user->email}}</td>
                                @endif
                            @endforeach
                    </tr>
        @endforeach
    </table>
@endsection
