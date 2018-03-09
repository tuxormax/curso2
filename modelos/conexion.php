<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=curso2","curso2","curso2");
		$link->exec("set names utf8");
		return $link;
	}//function
}//class