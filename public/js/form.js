
var i = 0;
function add_line(){

    var original = document.getElementById('form');
//    console.log(original);
    var clone = original.cloneNode(true); 
          clone.id = "form" + ++i;
             
                document.getElementById('extraLine').appendChild(clone);

}


function send(){

    
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

            };
            xhttp.open('POST', '/hours_declarations', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(objectjson);
  
}


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
    

    
    function openTab2(evt2, tabName2) {
        var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent2");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks2");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
                       document.getElementById(tabName2).style.display = "block";
                       evt2.currentTarget.className += " active";

        }
                       // Get the element with id="defaultOpen" and click on it
                       document.getElementById("defaultOpen2").click();




function send2(){
    alert('Declaratie formulier verstuurd');
}