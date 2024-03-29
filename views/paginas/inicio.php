<?php
    require_once './controllers/ClienteController.php';
    $objeto = new ClienteController();
    $clientes = $objeto->obtenerClientes();

?>

	<main role="main" class="container">
		<div class="starter-template">
			<h1>Registro de Clientes</h1>
			<div class="row">
				<div class="col-md-6 offset-3">
					<?php
						if (isset($_GET['mensaje'])) {
							echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
									".$_GET['mensaje']."
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    							<span aria-hidden='true'>&times;</span>
									</button>
								</div>";
						}
					?>
				</div>
			</div>
			<hr>
			<table class="table table-bordered" id="tablaCliente">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#id</th>
						<th scope="col">nombre</th>
						<th scope="col">e-mail</th>
						<th scope="col">domicilio</th>
						<th scope="col">acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if (!empty($clientes)) {
							foreach ($clientes as $r) { 
					?>
					<tr>
						<th scope="row"><?=$r['id'];?></th>
						<td><?=$r['nombre']." ".$r['apellido_paterno']." ".$r['apellido_materno'];?>
						</td>
						<td><?=$r['email'];?></td>
						<td><?=$r['domicilio'];?></td>
						<td>
							<a href="?page=editar&id=<?= $r['id']; ?>" type="a" class="btn btn-info">Editar</a>
							<a href="?page=eliminar&id=<?= $r['id']; ?>" type="a" class="btn btn-danger">Eliminar</a>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
			<div class="text-left">
				<button class="btn btn-primary text-left" data-toggle="modal" data-target="#insertarRegistroModal">Insertar registro</button>				
			</div>
		</div>

	</main><!-- /.container -->


<!-- Modal Agregar -->
<div class="modal fade" id="insertarRegistroModal" tabindex="-1" role="dialog" aria-labelledby="agregarDatosModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="agregarDatosModalLabel">Insertar nuevos registros</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="index.php?page=insertar" method="POST" name="registroForm" id="registroForm" class="text-left">
				<div class="modal-body">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" id="nombre" name="nombre" class="form-control" aria-describedby="nombreHelp">
						<small id="nombreHelp" class="form-text text-muted">Ingrese el nombre completo del cliente.</small>
					</div>
					<div class="form-group">
						<label for="email">Apellido paterno</label>
						<input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" aria-describedby="paternoHelp">
						<small id="domicilioHelp" class="form-text text-muted">Ingrese apellido paterno </small>
					</div>
					<div class="form-group">
						<label for="email">Apellido materno</label>
						<input type="text" id="apellido_materno" name="apellido_materno" class="form-control" aria-describedby="maternoHelp">
						<small id="domicilioHelp" class="form-text text-muted">Ingrese apellido materno </small>
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp">
						<small id="emailHelp" class="form-text text-muted">Ingrese el correo electronico del cliente.</small>
					</div>
					<div class="form-group">
						<label for="email">Domicilio</label>
						<input type="text" id="domicilio" name="domicilio" class="form-control" aria-describedby="domicilioHelp">
						<small id="domicilioHelp" class="form-text text-muted">Ingrese el domicilio </small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" id="btnInsertar" name="btnInsertar" class="btn btn-primary">Insertar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCliente').load();
	})


	$(document).ready(function(){
		$('#btnInsertar').click(function(){
			datos=$('#registroForm').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url:  "insertar.php",
				success: function(mensage){
					alert(mensage);
				}
			});
		});
	});
</script>