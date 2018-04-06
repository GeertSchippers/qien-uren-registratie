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
             })
          }
      };
      xhttp.open("GET", "/hours_declarations/<?php echo Auth::id(); ?>", true);
      xhttp.send();
    }
    getHoursDeclarations();
 
        function save_hours(){    


          var data = {};
          data.date = document.getElementById("date").value;
          data.hours = document.getElementById("hours").value;
          data.type = document.getElementById("type").value;
          type.options[type.selectedIndex].text;
          data.textarea = document.getElementById('textarea').value;
          
          data.type = "POST";
          data.dataType = "JSON";
          data.data = JSON.stringify(data);
          data.contentType = "application/json";
          data.succes = function(response){
              alert("succes");
           };   
          data.error = function(response){
              alert("Failed");
          };
          
          $.ajax(data);
          console.log(data);
//          var xml = new XMLHttpRequest();
//
//          xml.onreadystatechange = function (){
//              if(xml.readyState === 4 && xml.status === 200){
//                 
//                  console.log(this.responseText);
//              }
//          };
//
//          var hourdata = JSON.stringify(data);
//          xml.open("POST", "/trainee/send.blade.php", true);
//          xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//          xml.send("data="+hourdata);

          }
          
          
        function save_declaration(){
            var data = {};
            data.date_receipt = document.getElementById('date_receipt').value;
            data.type_dec = document.getElementById('type_dec').value;
            type.options[type.selectedIndex].text;
            data.total_receipt = document.getElementById('total_receipt').value;
            data.btw = document.getElementById('btw').value;
            data.description = document.getElementById('description').value;
            
            data.type = "POST";
            data.dataType = "JSON";
            data.data = JSON.stringify(data);
            data.contentType = "application/json";
            data.succes = function(response){
                 alert("succes");
            };   
            data.error = function(response){
                 alert("Failed");
            };

            $.ajax(data);
            console.log(data);
            
        }
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
       <form id=form>  
        <tr>
          <td><input id=date type="date"></td>
          <td><input id=hours type="number"></td>   
          <td>
           <select id="type"> 
            <option id=workhours value="workhours">gewerkte uren</option>
            <option id=extrahours value="extrahours">overuren</option>
            <option id=abscense value="abscense">kort verlof</option>
            <option id=holiday value="holiday">vakantie</option>
            <option id=sick value="sick">ziek</option>
            <option id=extra value="extra">overige</option>
           </select>
          </td>
          <td><textarea id=textarea rows="2" cols="40"></textarea></td>  
          <td><input type="button" value='voer in' id="submit" onclick='save_hours()'></td>
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
       <form id=form>  
        <tr>
          <td><input id=date_receipt type="date"></td>   
          <td>
           <select id="type_dec"> 
            <option id=education value="education">opleiding</option>
            <option id=travel value="travel">reis</option>
            <option id=residence value="residence">verblijf</option>
            <option id=parking value="parking">parkeren</option>
            <option id=phone value="phone">telefoon</option>
            <option id=lunch_diner value="lunch_diner">lunch/diner</option>
            <option id=trips value="trips">uitjes</option>
            <option id=remaining value="remaining">overig</option>
           </select>
          </td>
          <td><input id=total_receipt type="number"></td> 
          <td><input id=btw type="number"></td> 
          <td><textarea id=description rows="2" cols="40"></textarea></td>  
          <td><input type="button" value='voer in' id="submit" onclick='save_declaration()'></td>
        </tr>
       </form>
      </tbody>
  </table>
 
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