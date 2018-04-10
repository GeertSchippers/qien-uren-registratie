// ----------------------- DECLARATIONS -----------------------------

function approveDeclaration(id){
  var checked = document.getElementById('declaration'+id).checked;

  if(checked){
    var obj = { approved: 1 };
  } else {
    var obj = { approved: 0 };
  }

    obj = JSON.stringify(obj);

  $.ajax({
    url: "/declarations/"+id,
    method: "PUT",
    data: obj
  })
  .done(function(data, status){
      console.log('successfully updated');
  });
}

// -------------------------- HOURS DECLARATIONS -------------------------------

function approveHoursDeclaration(id){
  var checked = document.getElementById('hours_declaration'+id).checked;

  if(checked){
    var obj = { approved: 1 };
  } else {
    var obj = { approved: 0 };
  }

    obj = JSON.stringify(obj);

  $.ajax({
    url: "/hours_declarations/"+id,
    method: "PUT",
    data: obj
  })
  .done(function(data, status){
      console.log('successfully updated');
  });
}
