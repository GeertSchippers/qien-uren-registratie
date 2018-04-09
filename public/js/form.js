
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
  
   
   console.log(naamvakje);
   console.log(naamvakje.parentNode.children[0].value);
   
}
