@extends('layouts.app')

@section('content')


<!DOCTYPE HMTL>
<html>
    
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
  function save_hours(){    


    var data = {};
    data.date = document.getElementById("date").value;
    data.hours = document.getElementById("hours").value;
    data.type = document.getElementById("type").value;
    type.options[type.selectedIndex].text;
    data.textarea = document.getElementById('textarea').value;

    console.log(data);
//    var xml = new XMLHttpRequest();
     
//    xml.onreadystatechange = function (){
//        if(xml.readyState === 4 && xml.status === 200){
//           
//            console.log(this.responseText);
//        }
//    };

//    var hourdata = JSON.stringify(data);
//    xml.open("POST", "send.blade.php", true);
//    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//    xml.send("data="+hourdata);
    
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
      <a href="http://www.google.nl">send</a>
      </tbody>
  </table>
@endsection