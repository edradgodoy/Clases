function editarPuesto() {
	// $('#formulario-categoria')[0].reset();
	// $('#proceso-categoria').val('Registro');
	// $('#edi').hide();
	// $('#reg').show();
	$('#modalPuesto').modal({
		show:true,
	});
}

function eliminarPuesto(id){
  var url = 'methods/puestos/eliminar.php';
  var pregunta = confirm('¿Esta seguro de eliminar este puesto..?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      window.location='puestos';
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminarCategoria(id){
  var url = 'methods/categorias/eliminar.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta categoria..?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      window.location='categorias';
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}