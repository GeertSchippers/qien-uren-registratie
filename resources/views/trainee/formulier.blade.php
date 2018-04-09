<!DOCTYPE HTML>
<html>
    
<head>
  <meta charset="utf-8" />  
  <meta name="viewport" content="width=device-width, initial-scale=1"/>    
  <link href="{{ asset('css/tabs.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">  
  <script type="text/javascript" src="{{URL::asset('js/form.js')}}"> </script>
    <title>Formulier Trainee </title>
    
    
</head> 
 <header>
    <h1>Welkom Trainee</h1>
 </header>
    <body>
      <div class="container">
          <h2>Uren registratie</h2>
            <span>Hier komen de totale uren</span>
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
            
            <form id=hourform action=formulier method=POST>
            <tr>
              <button class="button button3" onclick="add_line()">+</button>
              <td><input name=amount id=hours type="number"></td>
              <select name=type id="type">
                <option id=workhours value="workhours">gewerkte uren</option>
                <option id=extrahours value="extrahours">overuren</option>
                <option id=abscense value="abscense">kort verlof</option>
                <option id=holiday value="holiday">vakantie</option>
                <option id=sick value="sick">ziek</option>
                <option id=extra value="extra">overige</option>
              </select>
                <td><input name=date id=date type="date"></td>
                <td><textarea name=statement id=textarea rows="2" cols="40"></textarea></td> 
                <td><input type="submit" value='voer in' id="submit"></td>
            </form>

        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Review</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Goedgekeurd</button>
          <button class="tablinks" onclick="openCity(event, 'Tokyo')">Betaald</button>
        </div>

        <div id="London" class="tabcontent">
          <h3>Review</h3>
          <p>hier komt de review tabel</p>
        </div>

        <div id="Paris" class="tabcontent">
          <h3>Goedgekeurd</h3>
          <p>hier komt de goedgekeurde tabel</p> 
        </div>

        <div id="Tokyo" class="tabcontent">
          <h3>Betaald</h3>
          <p>hier komt de betaalde tabel</p>
        </div>
      </div>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>

    </body>
    


</html>