@extends('layouts.app')
@section('content')
<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\User;

?>

<html>

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="{{ asset('css/tabs_hoursDeclarations.css') }}" rel="stylesheet">
  <link href="{{ asset('css/tabs_declarations.css') }}" rel="stylesheet">
   <!--<link href="{{ asset('css/style.css') }}" rel="stylesheet">-->
   <!--<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">-->

  <title>Formulier Trainee</title>
  <style>
  .tabcontent {
    background-color: whitesmoke;
  }

  </style>
</head>

<header>

</header>
<body>
<!-- ======================== Urenregistratie formulier ------------------------------>

     <div class=container-hours>
      <div class="container">
        <h2>Uren registratie</h2>

        <h3>Welkom {{ $user->first_name }}</h3>

            <div class="custom-select" style="width:200px;">
              <select id=dag>
                  <option value="0">Select dag:</option>
                  <option value="1">Maandag</option>
                  <option value="2">Dinsdag</option>
                  <option value="3">Woensdag</option>
                  <option value="4">Donderdag</option>
                  <option value="5">Vrijdag</option>
                  <option value="6">Zaterdag</option>
                  <option value="7">Zondag</option>
              </select>
            </div>
           <button class="button button3" onclick="add_line()">+</button>

            <div id="form">

              <input name=amount id=hours type="number" placeholder='Totaal Uren'>
              <select name=type id="type">
                <option id=workhours value="workhours">gewerkte uren</option>
                <option id=extrahours value="extrahours">overuren</option>
                <option id=abscense value="abscense">kort verlof</option>
                <option id=holiday value="holiday">vakantie</option>
                <option id=sick value="sick">ziek</option>
                <option id=extra value="extra">overige</option>
              </select>

                <input name=date id=date type="date">
                <textarea name=statement id="statement" rows="2" cols="40" placeholder='Vul hier een beschrijving in'></textarea></td>
            </div>

                <div id=extraLine></div>
                <td><input type="button" value="voer in" id="submit" onclick="send()"></td>


            <div class="tab">
              <button class="tablinks" onclick="openTab(event, 'review')" id="defaultOpen">Review</button>
              <button class="tablinks" onclick="openTab(event, 'approved')">Goedgekeurd</button>
              <button class="tablinks" onclick="openTab(event, 'paid')">Betaald</button>
            </div>

       </div>
         <div id="review" class="tabcontent">
          <h3>Review</h3>
          <table>
                  <tr>
                      <th>Hoeveelheid</th>
                      <th>Type</th>
                      <th>Maand</th>
                      <th>Bedrijf</th>
                      <th>Laatste update</th>
                      <th>Wijzigen</th>
                  </tr>
                  @foreach($hours as $hour)
                      @if($hour->status == 0)
                      <tr>
                          <td>{{$hour->amount}}</td>
                          <td>{{$hour->type}}</td>
                          <td>{{$hour->date}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$hour->updated_at}}</td>
                          <td><a>wijzig</a></td>
                      </tr>
                      @endif
                  @endforeach
          </table>
        </div>


        <div id="approved" class="tabcontent">
          <h3>Goedgekeurd</h3>

            <table>
                  <tr>
                      <th>Hoeveelheid</th>
                      <th>Type</th>
                      <th>Maand</th>
                      <th>Bedrijf</th>
                      <th>Laatste update</th>
                      <th>Wijzigen</th>
                  </tr>
                  @foreach($hours as $hour)
                      @if($hour->status == 1)
                      <tr>
                          <td>{{$hour->amount}}</td>
                          <td>{{$hour->type}}</td>
                          <td>{{$hour->date}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$hour->updated_at}}</td>
                          <td><a>wijzig</a></td>
                      </tr>
                      @endif
                  @endforeach
            </table>

        </div>

         <div id="paid" class="tabcontent">
          <h3>Betaald</h3>
          <table>
                  <tr>
                      <th>Hoeveelheid</th>
                      <th>Type</th>
                      <th>Maand</th>
                      <th>Bedrijf</th>
                      <th>Laatste update</th>
                      <th>Wijzigen</th>
                  </tr>
                  @foreach($hours as $hour)
                      @if($hour->status == 2)
                      <tr>
                          <td>{{$hour->amount}}</td>
                          <td>{{$hour->type}}</td>
                          <td>{{$hour->date}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$hour->updated_at}}</td>
                          <td><a>wijzig</a></td>
                      </tr>
                      @endif
                  @endforeach
          </table>
        </div>
      </div>


<!------------------------------Declaratie formulier------------------------------>

    <div class=container-declarations>
      <div class="container">
          <h2>Uren declaraties</h2>

            <div class="custom-select" style="width:200px;">
              <select id=dag>
                  <option value="0">Select dag:</option>
                  <option value="1">Maandag</option>
                  <option value="2">Dinsdag</option>
                  <option value="3">Woensdag</option>
                  <option value="4">Donderdag</option>
                  <option value="5">Vrijdag</option>
                  <option value="6">Zaterdag</option>
                  <option value="7">Zondag</option>
              </select>
            </div>

           <button class="button button3" onclick="add_lineDeclarations()">+</button>
           <div id=form>

             <tr>
              <td><input id=date_receipt type="date"></td>
              <select  id=type>
                <option id=workhours2 value="workhours">gewerkte uren</option>
                <option id=extrahours2 value="extrahours">overuren</option>
                <option id=abscense2 value="abscense">kort verlof</option>
                <option id=holiday2 value="holiday">vakantie</option>
                <option id=sick2 value="sick">ziek</option>
                <option id=extra2 value="extra">overige</option>
              </select>
             <td><input id=total_receipt type="number" placeholder='Totaal Bon'></td>
              <td><input id=btw type="number" placeholder='BTW'></td>
              <td><textarea id="statement_dec" rows="2" cols="40" placeholder='Vul hier een beschrijving in'></textarea></td>
             </div>

              <div id=extraLine2></div>

            <td><input type="button" value='voer in' id="submit2" onclick=send2()></td>

            <div class="tab">
              <button class="tablinks2" onclick="openTab2(event, 'review2')" id="defaultOpen2">Review</button>
              <button class="tablinks2" onclick="openTab2(event, 'aproved2')">Goedgekeurd</button>
              <button class="tablinks2" onclick="openTab2(event, 'paid2')">Betaald</button>
            </div>

            <div id="review2" class="tabcontent2">
              <h3>Review</h3>
              <table>
              <tr>
                  <th>date_receipt</th>
                  <th>type</th>
                  <th>total_receipt</th>
                  <th>btw</th>
                  <th>description</th>
                  <th>created_at</th>
                  <th>updated_at</th>
              </tr>
              @foreach($declarations as $declaration)
                @if($declaration->status == 0)
                          <tr>
                              <td>{{$declaration->date_receipt}}</td>
                              <td>{{$declaration->type}}</td>
                              <td>{{$declaration->total_receipt}}</td>
                              <td>{{$declaration->btw}}</td>
                              <td>{{$declaration->description}}</td>
                              <td>{{$declaration->created_at}}</td>
                              <td>{{$declaration->updated_at}}</td>
                          </tr>
                @endif
              @endforeach
            </table>
            </div>

            <div id="aproved2" class="tabcontent2">
              <h3>Goedgekeurd</h3>
              <table>
              <tr>
                  <th>date_receipt</th>
                  <th>type</th>
                  <th>total_receipt</th>
                  <th>btw</th>
                  <th>description</th>
                  <th>created_at</th>
                  <th>updated_at</th>
              </tr>
              @foreach($declarations as $declaration)
                @if($declaration->status == 1)
                          <tr>
                              <td>{{$declaration->date_receipt}}</td>
                              <td>{{$declaration->type}}</td>
                              <td>{{$declaration->total_receipt}}</td>
                              <td>{{$declaration->btw}}</td>
                              <td>{{$declaration->description}}</td>
                              <td>{{$declaration->created_at}}</td>
                              <td>{{$declaration->updated_at}}</td>
                          </tr>
                @endif
              @endforeach
            </table>
            </div>

             <div id="paid2" class="tabcontent2">
              <h3>Betaald</h3>
              <table>
              <tr>
                  <th>date_receipt</th>
                  <th>type</th>
                  <th>total_receipt</th>
                  <th>btw</th>
                  <th>description</th>
                  <th>created_at</th>
                  <th>updated_at</th>
              </tr>
              @foreach($declarations as $declaration)
                @if($declaration->status == 2)
                          <tr>
                              <td>{{$declaration->date_receipt}}</td>
                              <td>{{$declaration->type}}</td>
                              <td>{{$declaration->total_receipt}}</td>
                              <td>{{$declaration->btw}}</td>
                              <td>{{$declaration->description}}</td>
                              <td>{{$declaration->created_at}}</td>
                              <td>{{$declaration->updated_at}}</td>
                          </tr>
                @endif
              @endforeach
            </table>
            </div>
          </div>
      </div>
    <script type="text/javascript" src="{{URL::asset('js/form.js')}}"> </script>
    </body>

@endsection
