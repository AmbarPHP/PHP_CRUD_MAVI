<?php 

require_once 'controllers/ClienteController.php';
$objeto = new ClienteController();

if (isset($_POST['btnInsertar'])) {
	$datos = array(
		'nombre'   => $_POST['nombre'],
		'email'    => $_POST['email'],
		'domicilio'   => $_POST['domicilio'],
		'apellido_paterno'    => $_POST['apellido_paterno'],
		'apellido_materno'    => $_POST['apellido_materno'],
	);
	//die(print_r(" esttoy tratando de checar que pasa>".$_POST['apellido_paterno'], true ));

	$objeto->insertarCliente($datos);
}

?>


