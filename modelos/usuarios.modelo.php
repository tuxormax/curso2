<?php
require_once "conexion.php";

class Modelousuarios
{
	/*MOSTRAR USUARIOS*/
	static public function mostrarusuarios($tabla,$item,$valor)
	{
		if($item != null)
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		

		$stmt -> close();

		$stmt = null;
	}//mostrar usuarios

	/*CREAR USUARIO*/
	static public function ingresarusuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, clave, perfil) VALUES (:nombre, :usuario, :clave, :perfil)");
		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario",$datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":clave",$datos["clave"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil",$datos["perfil"], PDO::PARAM_STR);
		if($stmt->execute())
		{
			return "ok";
		}
		else
		{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}//crear usuario
}//class