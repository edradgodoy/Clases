$(function(){
	$('#btnAddPuesto').on('click', function() {
		$('#editPuesto').hide();
		$('#addPuesto').show();
		$('#myModalPuesto').modal({
			show:true,
		});
	});

});

function editarPuesto(dato){
	$('#formPuesto')[0].reset();
	var url = 'methods/Puestos/datos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(valores){
				var datos = eval(valores);
				$('#addPuesto').hide();
				$('#editPuesto').show();
				$('#idpuesto').val(dato);
				$('#nombrePuesto').val(datos[0]);
				$('#myModalPuesto').modal({
					show:true,
				});
			return false;
		}
	});
	return false;
}