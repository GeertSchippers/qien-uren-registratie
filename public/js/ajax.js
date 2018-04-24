// ----------------------- DECLARATIONS -----------------------------

function approveDeclaration(id, obj){
  var checked = document.getElementById('declaration'+id).checked;

    if(checked){
      obj.status = 1;
    } else {
      obj.status = 0;
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

function payDeclaration(id, obj){
  var checked = document.getElementById('declaration_paid'+id).checked;

  if(obj.status == 0){
    document.getElementById('declaration_paid'+id).checked = false;
    return alert('Declaratie moet eerst goedgekeurd worden.');
  }

  if(checked){
    obj.status = 2;
  } else {
    obj.status = 1;
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
    obj.status = 1;
  } else {
    obj.status = 0;
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

function payHoursDeclaration(id, obj){
  var checked = document.getElementById('hours_declaration_paid'+id).checked;

  if(obj.status == 0){
    document.getElementById('hours_declaration_paid'+id).checked = false;
    return alert('Uren declaratie moet eerst goedgekeurd worden.');
  }

  if(checked){
    obj.status = 2;
  } else {
    obj.status = 1;
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
