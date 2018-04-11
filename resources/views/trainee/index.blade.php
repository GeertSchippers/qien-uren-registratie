@extends('layouts.app')

@section('content')
  <script>
    function getHoursDeclarations(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             // Typical action to be performed when the document is ready:
             var response = JSON.parse(xhttp.responseText);
             response.forEach(function(item){
                 var tr = document.createElement('tr');
                 var datum = document.createElement('td');
                 datum.innerHTML = item.date;
                 var aantal = document.createElement('td');
                 aantal.innerHTML = item.amount;
                 var type = document.createElement('td');
                 type.innerHTML = item.type;
                 var opmerking = document.createElement('td');
                 opmerking.innerHTML = item.statement;
                 var betaald = document.createElement('td');
                 betaald.innerHTML = item.paid;

                 var table = document.getElementById('table');
                 table.appendChild(tr);

                 tr.appendChild(datum);
                 tr.appendChild(aantal);
                 tr.appendChild(type);
                 tr.appendChild(opmerking);
                 tr.appendChild(betaald);
             });
          }
      };
      xhttp.open("GET", "/hours_declarations/<?php echo Auth::id(); ?>", true);
      xhttp.send();
    }
    getHoursDeclarations();


  </script>

  <style>
     table, th, td {
        border: 1px solid black;
                border-collapse: collapse;
     }

     td{
        width: 120px;
     }
  </style>

 <h2 align="center">Uren declaraties</h2>
    <table border="1" align=center>
      <thead>
        <tr>
          <th>Datum</th>
          <th>Aantal</th>
          <th>Type</th>
          <th>Verklaring</th>
        </tr>
      </thead>
      <tbody>
       <form id=form name=form action=verify method=POST >
        <tr>
          <td><input name=date id=date type="date"></td>
          <td><input name=amount id=hours type="number"></td>
          <td>
           <select name=type id="type">
            <option id=workhours value="workhours">gewerkte uren</option>
            <option id=extrahours value="extrahours">overuren</option>
            <option id=abscense value="abscense">kort verlof</option>
            <option id=holiday value="holiday">vakantie</option>
            <option id=sick value="sick">ziek</option>
            <option id=extra value="extra">overige</option>
           </select>
          </td>

          <td><textarea name=statement id=textarea rows="2" cols="40"></textarea></td>
          <td><input type="submit" value='voer in' id="submit"></td>
          <!--<td><input type="button" value='voer in' id="submit" onclick='save_hours()'></td>-->
        </tr>
       </form>
      </tbody>
  </table>
 <br>
 <br>
 <hr>

 <h2 align="center">Declaraties</h2>
 <table border="1" align="center">
      <thead>
        <tr>
          <th>Datum bon</th>
          <th>Type</th>
          <th>Totaal bon</th>
          <th>btw</th>
          <th>Verklaring</th>
        </tr>
      </thead>
      <tbody>
       <!--'date_receipt', 'type', 'total_receipt', 'btw', 'description'-->
       <form id=form method=POST>
        <tr>
          <td><input id=date_receipt type="date"></td>
          <td>
           <select id="type_dec" name=type_dec>
            <option name=opleiding id=education value="education">opleiding</option>
            <option name=reis id=travel value="travel">reis</option>
            <option name=verblijf id=residence value="residence">verblijf</option>
            <option name=parkeren id=parking value="parking">parkeren</option>
            <option name=telefoon id=phone value="phone">telefoon</option>
            <option name=lunch_diner id=lunch_diner value="lunch_diner">lunch/diner</option>
            <option name=uitjes id=trips value="trips">uitjes</option>
            <option name=overig id=remaining value="remaining">overig</option>
           </select>
          </td>
          <td><input name=totaal_bon id=total_receipt type="number"></td>
          <td><input name=btw id=btw type="number"></td>
          <td><textarea name=beschrijving id=description rows="2" cols="40"></textarea></td>
          <td><input type="button" value='voer in' id="submit" onclick='save_declaration()'></td>
        </tr>
       </form>
      </tbody>

  </table>

  <div id='items'></div>


  <table id='table'>
      <tr>
          <th>Datum</th>
          <th>Aantal</th>
          <th>Type</th>
          <th>Verklaring</th>
          <th>Betaald</th>
      </tr>

  </table>

@endsection
