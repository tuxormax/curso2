<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class Ajaxusuarios{

/*EDITAR*/
	public $id;

	public function ajaxeditar(){
		$item ="id";
		$valor = $this->id;
		$respuesta = controladorusuarios::mostrarusuarios($item, $valor);
		echo json_encode($respuesta);
	}

	/*existe usuario*/
	public $validarusuario;
	public function ajaxvalidarusuario(){
		$item = "usuario";
		$valor = $this->validarusuario;
		$respuesta = controladorusuarios::mostrarusuarios($item, $valor);
		echo json_encode($respuesta);
	}
}

/*funcion editar*/
if(isset($_POST["id"])){
	$editar = new ajaxusuarios();
	$editar -> id = $_POST["id"];
	$editar -> ajaxEditar();	
}


/*existe usuario*/
if(isset($_POST["validarusuario"])){
	$valusuario = new ajaxusuarios();
	$valusuario -> validarusuario =$_POST["validarusuario"];
	$valusuario -> ajaxvalidarusuario();
}
