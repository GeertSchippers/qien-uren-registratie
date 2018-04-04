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
                 var div = document.createElement('div');
                 div.innerHTML = item.amount;
                 document.getElementById('items').appendChild(div);
             })
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
    <table border="1">
      <thead>
        <tr>  
          <th>Datum</th>
          <th>Aantal</th>
          <th>Type</th>
          <th>Verklaring</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="date" id="datepickerr"></td>
          <td><input type="number" id="hours"></td>   
          <td>
           <select> 
            <option value="workedhours">gewerkte uren</option>
            <option value="extrahours">overuren</option>
            <option value="abscense">kort verlof</option>
            <option value="holiday">vakantie</option>
            <option value="sick">ziek</option>
            <option value="extra">overige</option>
           </select>
          </td>
          <td><textarea rows="2" cols="40"></textarea></td>  
          <td><input type="button" value='voer in' id="submit" onclick='save_hours()'></td>
        </tr>     
      </tbody>
  </table>
  <div id='items'></div>
@endsection