
var i = 0;
function add_line(){

    var original = document.getElementById('form');
    console.log(original);
    var clone = original.cloneNode(true); 
          clone.id = "form" + ++i;
             
                document.getElementById('extraform').appendChild(clone);

}

function send(){
//    alert("hij doet het");
   var row = document.getElementById('form');
   var naamvakje = row.firstChild;
  
   var object = {};
   object.amount = naamvakje.parentNode.children[0].value;
   object.type = naamvakje.parentNode.children[1].value;
   object.date = naamvakje.parentNode.children[2].value;
   object.statement = naamvakje.parentNode.children[3].value;
    var objectjson = JSON.stringify(object);
    console.log(object);
    console.log(objectjson);
    
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
//        document.getElementById('antwoord').innerHTML = this.responseText;
            
    };
    xhttp.open('POST', '/hours_declarations', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(objectjson);
//                
//                var kipjson = JSON.stringify(kip);
//                xhttp = new XMLHttpRequest();
//                xhttp.onreadystatechange = function(){
//                    document.getElementById('antwoord').innerHTML = this.responseText;
//                };
//                
//                xhttp.open("POST", "/voorbeeldpostman", true);
//                xhttp.send(kipjson);

   
}
