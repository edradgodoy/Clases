<html>
<head>
	<script src="public/js/actividad.js"></script>
	<script>
		
	</script>
</head>
<body>

<form id="actividad" role="form" method="#" action="#">
		<h3>Buscar Actividad</h3>
		<div class="form-group">
			<select name="tipo" id="tipo" class="form-control" required>
				<option value="">Seleccione Actividad</option>
				<option value="aniversarios">Aniversario</option>
				<option value="cultos">Cultos Unidos</option>
				<option value="campaña">Campaña Masiva</option>	
				<option value="congresos">Congresos</option>
				<option value="todas">Todas Las Actividades</option>
			</select>
		</div>
		<div class="form-group">
		<select name="buscar" id="buscar" class="form-control" required>
			<option>Buscar Por</option>
			<option value="fecha" id="fecha">Fecha</option>
			<option value="todos" id="todos">Todos</option>
		</select>
		</div>
		<div class="form-group">
			<input type="text" placeholder="fecha AAAA/MM/DD" id="entradafecha" class="form-control">
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-ok-sign"></span> Elegir</button>
		<button type="reset" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-remove-sign"></span> Limpiar</button>
		</div>
</form><br><br>
<div id="sectionactividad"></div>
</body>
</html>