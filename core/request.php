<?php

require_once 'config.php';

$page = $_GET['page'];

if (!empty($page)) {
	#http://crud3/index.php?page=insertar
	
	$data = array(
		'inicio' => array('model' => 'ClienteModel', 'view' => 'inicio', 'controller' => 'ClienteController'),
		'insertar' => array('model' => 'ClienteModel', 'view' => 'insertar', 'controller' => 'ClienteController'), #Crear un cliente
		'editar' => array('model' => 'ClienteModel', 'view' => 'editar', 'controller' => 'ClienteController'), #Editar un cliente
		'eliminar' => array('model' => 'ClienteModel', 'view' => 'eliminar', 'controller' => 'ClienteController'), 
	);

	foreach($data as $key => $components) {
    
	
		if ($page == $key) {
				
			$model = $components['model'];
			$view = $components['view'];
			$controller = $components['controller'];
			//die(print_r(" esttoy tratando de checar que pasa".$controller."_>".$view, true ));
			break;
		}
	}

	if (isset($model)) {
	
		require_once 'controllers/'.$controller.'.php';
		$objeto = new $controller();
		$objeto->$view();
	}
} else {
	header('Location: index.php?page=inicio');
}