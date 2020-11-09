<?php
class Conectar{

	var $conexion;

	public static function conexion(){
		$conexion=new mysqli("localhost:3308","root","javi1234", "pizzeria");
		$conexion->query("SET MAMES 'utf8'");
		return $conexion;
	}
}
?>