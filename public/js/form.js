
var i = 0;
function add_line(){

    var original = document.getElementById('form');
    var clone = original.cloneNode(true);
          clone.id = "form" + ++i;

                document.getElementById('extraLine').appendChild(clone);

}


function send(){


    var row = document.getElementById('form');

    var naamvakje = row.firstChild;

    var object = {};
        object.amount = $('#hours').val();
        object.type = $('#type').val();
        object.date = $('#date').val();
        object.statement = $('#statement').val();

    var objectjson = JSON.stringify(object);

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){

            };
            xhttp.open('POST', '/hours_declarations', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(objectjson);
            window.location.reload();
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
            window.location.reload();
}



function getMonthDeclarations(id){

    var selectMonth = $( "#select_month_declarations option:selected" ).val();
    var selectYear = $( "#select_year_declarations option:selected" ).val();


    var date = selectYear+"-"+selectMonth;
        console.log(date);
          $(".declarationtr:not(:contains("+date+"))").remove();
          $( "#select_button_declarations" ).hide();
}

function getMonthHourDeclarations(id){

    var selectMonth = $( "#select_month_hour_declarations option:selected" ).val();
    var selectYear = $( "#select_year_hour_declarations option:selected" ).val();


    var date = selectYear+"-"+selectMonth;
        console.log(date);
          $(".hour_declarationtr:not(:contains("+date+"))").remove();
          $( "#select_button_hour_declarations" ).hide();
}


function getAll(id){
      location.reload();
}

function selectAllCheckedDeclarations(){

    if ($('#selectAllChecked').is(":checked")){

            $('.checkbox_declarations').each(function(){

              $(this).prop('checked',true);
                //alert($(this).attr('id'));
                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(11);
                var status = 1;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {



                });

            });
            ;
    }else{

            $('.checkbox_declarations').each(function(){

              $(this).removeAttr('checked');

                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(11);
                var status = 0;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");
                          window.location.reload();

                });

            });

    }
}


function selectAllPaidDeclarations(){
     if ($('#selectAllPaidDeclarations').is(":checked") && $('#selectAllCheckedDeclarations').is(":checked")){
         console.log("ischecked");

            $('.checkbox_paid_declarations').each(function(){

              $(this).prop('checked',true);
                //alert($(this).attr('id'));
                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(16);
                var status = 2;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");
                          window.location.reload();
                });

            });
    }else{
        var declaratie_id = $(this).attr('id');

        if($('#selectAllCheckedDeclarations').not(":checked") || declaratie_id.not(":checked")) {
                $('#selectAllPaidDeclarations').removeAttr('checked');
                alert("Eerst goedkeuren a.u.b.");

        }
            $('.checkbox_paid_declarations').each(function(){

              $(this).removeAttr('checked');

              var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(16);
                var status = 1;

                $.get( "/bulkdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");
                          window.location.reload();

                });

            });
    }
}

function selectAllCheckedHourDeclarations(){

    if ($('#selectAllCheckedHourDeclarations').is(":checked")){

            $('.checkbox_hour_declarations').each(function(){

              $(this).prop('checked',true);
                //alert($(this).attr('id'));
                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(17);
                var status = 1;
                console.log(last2);
                $.get( "/bulkhourdeclarations/"+last2+"/"+status, function( data ) {



                });

            });
            ;
    }else{

            $('.checkbox_hour_declarations').each(function(){

              $(this).removeAttr('checked');

                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(17);
                var status = 0;

                $.get( "/bulkhourdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");
                          window.location.reload();

                });

            });

    }
}


function selectAllPaidHourDeclarations(){
     if ($('#selectAllPaidHourDeclarations').is(":checked") && $('#selectAllCheckedHourDeclarations').is(":checked")){
         console.log("ischecked");

            $('.checkbox_paid_hour_declarations').each(function(){

              $(this).prop('checked',true);
                //alert($(this).attr('id'));
                var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(22);
                var status = 2;

                $.get( "/bulkhourdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");
                          window.location.reload();
                });

            });
    }else{
        var declaratie_id = $(this).attr('id');

        if($('#selectAllCheckedHourDeclarations').not(":checked") || declaratie_id.not(":checked")) {
                $('#selectAllPaidHourDeclarations').removeAttr('checked');
                alert("Eerst goedkeuren a.u.b.");

        }
            $('.checkbox_paid_hour_declarations').each(function(){

              $(this).removeAttr('checked');

              var declaratie_id = $(this).attr('id');
                var last2 = declaratie_id.slice(22);
                var status = 1;

                $.get( "/bulkhourdeclarations/"+last2+"/"+status, function( data ) {

                          console.log("All succesfully updated");
                          window.location.reload();

                });

            });
    }
}
