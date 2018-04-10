// ----------------------- DECLARATIONS -----------------------------

function approveDeclaration(id, obj){
  var checked = document.getElementById('declaration'+id).checked;

    if(checked){
      obj.approved = 1;
    } else {
      obj.approved = 0;
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

function payDeclaration(id){
  var checked = document.getElementById('declaration_paid'+id).checked;

  if(checked){
    var obj = { paid: 1 };
  } else {
    var obj = { paid: 0 };
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

function approveHoursDeclaration(id, obj){
  var checked = document.getElementById('hours_declaration'+id).checked;

  if(checked){
    obj.approved = 1;
  } else {
    obj.approved = 0;
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

function payHoursDeclaration(id){
  var checked = document.getElementById('hours_declaration_paid'+id).checked;

  if(checked){
    var obj = { paid: 1 };
  } else {
    var obj = { paid: 0 };
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
