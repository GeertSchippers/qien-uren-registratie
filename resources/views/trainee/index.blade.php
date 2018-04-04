
<!DOCTYPE HMTL>
<html>
    
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
  function save_hours(){    
      alert("Saved!!");
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
 </head>
 <body>
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
            <option value="workhours">gewerkte uren</option>
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
 </body>
</html>