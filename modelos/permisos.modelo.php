<?php
require_once "conexion.php";

class Modelopermisos{

	static public function listarpermisos(){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM permisos");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt -> close();
		$stmt = null;

	}

}//clase