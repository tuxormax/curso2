<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=dentista","dentista","dentista");
		$link->exec("set names utf8");
		return $link;
	}//function
}//class