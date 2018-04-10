
var i = 0;
function add_line(){
//    alert('Hij werkt');
    var original = document.getElementById('form');
    console.log(original);
    var clone = original.cloneNode(true); // "deep" clone
          clone.id = "form" + ++i;
              // or clone.id = ""; if the divs don't need an ID
                document.getElementById('extraform').appendChild(clone);
//    original.firstChild.appendChild(clone);
}


