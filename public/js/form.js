
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
        object.amount = naamvakje.parentNode.children[1].value;
        object.type = naamvakje.parentNode.children[2].value;
        object.date = naamvakje.parentNode.children[3].value;
        object.statement = naamvakje.parentNode.children[4].value;

    var objectjson = JSON.stringify(object);

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
//                       document.getElementById("defaultOpen").click();



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
//                       document.getElementById("defaultOpen2").click();




function send2(){



    var row = document.getElementById('form_declarations');

    var naamvakje = row.firstChild;

    var object = {};

        object.date_receipt= naamvakje.parentNode.children[1].value;
        object.type = naamvakje.parentNode.children[2].value;
        object.total_receipt = naamvakje.parentNode.children[3].value;
        object.btw = naamvakje.parentNode.children[4].value
        object.description = naamvakje.parentNode.children[5].value
        console.log(naamvakje);

    var objectjson = JSON.stringify(object);


            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){

            };
            xhttp.open('POST', '/declarations', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(objectjson);

}



function getMonth(id){

    var selectMonth = document.getElementById('select_month');
    var selectYear = document.getElementById('select_year');

    var selectedMonth = selectMonth.selectedOptions[0].value;
    var selectedYear = selectYear.selectedOptions[0].value;

    var date = selectedYear+"-"+selectedMonth;

        $.get( `/trainees/${id}/declarations/date/`+date, function( data ) {

          $(".declarationtr:not(:contains("+date+"))").remove();
     
        });
       
}


function getAll(id){
      location.reload();  
}
    
function selectAllChecked(id){
    if ($('#selectAllChecked').is(":checked")){
    
            $('.checkbox').each(function(){

              $(this).prop('checked',true);        
                //alert($(this).attr('id'));
                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(11);
                var status = 1;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");

                });

            });
    }else{
    
            $('.checkbox').each(function(){
             
              $(this).removeAttr('checked');

                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(11);
                var status = 0;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");

                });

            });
    }
}
    
  
 
 
 

//
function selectAllPaid(id){
     if ($('#selectAllPaid').is(":checked") && $('#selectAllChecked').is(":checked")){
         console.log("ischecked");
    
            $('.checkbox_paid').each(function(){

              $(this).prop('checked',true);        
                //alert($(this).attr('id'));
                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(16);
                var status = 2;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");

                });

            });
    }else{
        var declaratie_id = $(this).attr('id'); 
        
        if($('#selectAllChecked').not(":checked") || declaratie_id.not(":checked")) {
                $('#selectAllPaid').removeAttr('checked');
                alert("Eerst goedkeuren a.u.b.");
            
        }
            $('.checkbox_paid').each(function(){
             
              $(this).removeAttr('checked');

              var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(16);
                var status = 1;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");

                });

            });
    }
}





