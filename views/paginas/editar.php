<?php

    require_once 'controllers/ClienteController.php';
    $objeto = new ClienteController();

    /*obtener el valor 'id' de la url para buscar en la bd
    y posteriormente llenar el formulario*/
    
    if (isset($_GET['id'])) {
	    $idCliente = $_GET['id'];
    	$cliente = $objeto->obtenerCliente($idCliente);
    }

    if (isset($_POST['editar'])) {
    	$id = $_POST['id'];
    	$datos = array(
			'nombre'   	=> $_POST['nombre'],
			'email'    	=> $_POST['email'],
			'domicilio'   => $_POST['domicilio'],
			'apellido_paterno'    => $_POST['apellido_paterno'],
			'apellido_materno'    => $_POST['apellido_materno'],
		);
		$objeto->editarCliente($id, $datos);
    }

?>
	<main role="main" class="container">

		<div class="starter-template">
			<h1>Editar registro</h1>
			<hr>
			<div class="col-md-6 offset-3">
				<form action="index.php?page=editar" method="POST" name="editarForm" id="editarForm" class="text-left">
					<?php
						if (!empty($cliente)) {
							foreach ($cliente as $r) { 
					?>
						<input type="hidden" name="id" value="<?= $r['id']; ?>">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" id="nombre" name="nombre" class="form-control" aria-describedby="nombreHelp" value="<?= $r['nombre']; ?>">
							<small id="nombreHelp" class="form-text text-muted">Ingrese el nombre completo del cliente.</small>
						</div>
						<div class="form-group">
						<label for="email">Apellido paterno</label>
						<input type="text" id="paterno" name="paterno" class="form-control" aria-describedby="paternoHelp"
						value="<?= $r['apellido_paterno']; ?>">
						<small id="domicilioHelp" class="form-text text-muted">Ingrese apellido paterno </small>
						</div>
						<div class="form-group">
						<label for="email">Apellido materno</label>
						<input type="text" id="materno" name="materno" class="form-control" aria-describedby="maternoHelp"
						value="<?= $r['apellido_materno']; ?>">
						<small id="domicilioHelp" class="form-text text-muted">Ingrese apellido materno </small>
						</div>

						<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" value="<?= $r['email']; ?>">
						<small id="emailHelp" class="form-text text-muted">Ingrese el correo electronico del cliente.</small>
						</div>
					<div class="form-group">
						<label for="email">Domicilio</label>
						<input type="text" id="domicilio" name="domicilio" class="form-control" aria-describedby="domicilioHelp"
						value="<?= $r['domicilio']; ?>">
						<small id="domicilioHelp" class="form-text text-muted">Ingrese el domicilio </small>
					</div>
						<button type="submit" name="editar" class="btn btn-info">Editar registro</button>
					<?php } } ?>
				</form>
			</div>
		</div>

	</main><!-- /.container -->
	