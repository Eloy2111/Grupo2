<?php   

/*Soto Borja Treysi*/ 
    require_once "controladores/UsuarioController.php";

    $uc = new UsuarioController();
    $resultado = $uc->mostrar();

        ?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		
		<div class="container">
			<div class="usuario">
				<h2 style="text-align:center">EMPRESA B2B</h2>
			</div>
			
			<div class="usuario">
				<a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>
				
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<b>Nombre: </b><input type="text" id="campo" name="campo" />
					<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				</form>
			</div>
			
			<br>
			
			<div class="usuario table-responsive">
				<table class="table table-striped">
					<thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Ruc</th> 
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        <tr>
					</thead>
					
					<tbody>
						<?php  foreach($resultado as $usuario) { ?>
							<tr>
								<td><?php echo $usuario['id']; ?></td>
								<td><?php echo $usuario['usuario']; ?></td>
								<td><?php echo $usuario['ruc']; ?></td>
                                <td><?php echo $usuario['nombre']; ?></td>
                                <td><?php echo $usuario['direccion']; ?></td>
								<td><?php echo $usuario['telefono']; ?></td>
                                <td><a href='actualizar.php?id=".$usuario["id"]."'><span class="glyphicon glyphicon-pencil"></span>Actualizar</a></td>
                                <td><a href='eliminar.php?id=".$usuario["id"]."' data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
								

							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
	</body>
</html>