

<?php 
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use App\User;

?>

<html>
    
<head>
  <meta charset="utf-8" />  
  <meta name="viewport" content="width=device-width, initial-scale=1"/>    
  <!--<link href="{{ asset('css/tabs_hoursDeclarations.css') }}" rel="stylesheet">-->
  <link href="{{ asset('css/tabs_declarations.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet"> 
  <script type="text/javascript" src="{{URL::asset('js/form.js')}}"> </script>
  <title>Formulier Trainee </title>
</head> 
 
<header>
     <div class=container-nav>
      <nav> 
       <img id=logo src="/images/qienlogo2.png" alt="QienLogo" width="40" height="50">
       <ul class=navbar>   
        <li><a href="default.asp">Home</a></li>
        <li><a href="news.asp">News</a></li>
        <li><a href="contact.asp">Contact</a></li>
        <li><a href="about.asp">About</a></li>
       </nav>
      </ul>
     </div>
 </header>
    

<body>
<!-------------------Urenregistratie formulier------------------------------>

     <div class=container-hours>  
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
            
           <button class="button button3" onclick="add_line()">+</button>
           <div id=form>   
            
             <tr>
              <td><input name=amount id=hours type="number" placeholder='Totaal Uren'></td>
              <select name=type id="type">
                <option id=workhours value="workhours">gewerkte uren</option>
                <option id=extrahours value="extrahours">overuren</option>
                <option id=abscense value="abscense">kort verlof</option>
                <option id=holiday value="holiday">vakantie</option>
                <option id=sick value="sick">ziek</option>
                <option id=extra value="extra">overige</option>
              </select>
                <td><input name=date id=date type="date"></td>
                <td><textarea name=statement id="statement" rows="2" cols="40" placeholder='Vul hier een beschrijving in'></textarea></td> 
                
             </div>
                
            <div id=extraform></div>
                
            <td><input type="button" value='voer in' id="submit" onclick=send()></td>
           
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'review')" id="defaultOpen">Review</button>
          <button class="tablinks" onclick="openTab(event, 'aproved')">Goedgekeurd</button>
          <button class="tablinks" onclick="openTab(event, 'paid')">Betaald</button>
        </div>

        <div id="review" class="tabcontent">
          <h3>Review</h3>
          <p>hier komt de review tabel</p>
        </div>

        <div id="aproved" class="tabcontent">
          <h3>Goedgekeurd</h3>
          <p>hier komt de goedgekeurde tabel</p> 
        </div>

        <div id="paid" class="tabcontent">
          <h3>Betaald</h3>
          <p>hier komt de betaalde tabel</p>
        </div>
      </div>
    </div>
      
<!-------------------Declaratie formulier------------------------------>
 
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
                
            <div id=extraform></div>
                
            <td><input type="button" value='voer in' id="submit2" onclick=send2()></td>

            <div class="tab">
              <button class="tablinks2" onclick="openCity(event, 'London')" id="defaultOpen2">London</button>
              <button class="tablinks2" onclick="openCity(event, 'Paris')">Paris</button>
              <button class="tablinks2" onclick="openCity(event, 'Tokyo')">Tokyo</button>
            </div>

            <div id="London" class="tabcontent2">
              <h3>London</h3>
              <p>London is the capital city of England.</p>
            </div>

            <div id="Paris" class="tabcontent2">
              <h3>Paris</h3>
              <p>Paris is the capital of France.</p> 
            </div>

            <div id="Tokyo" class="tabcontent2">
              <h3>Tokyo</h3>
              <p>Tokyo is the capital of Japan.</p>
            </div>

        
    <script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
            }
            
            tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
    }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
    

    
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent2");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
            }
                tablinks = document.getElementsByClassName("tablinks2");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";

        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen2").click();
    </script>


    </body>
    


</html>