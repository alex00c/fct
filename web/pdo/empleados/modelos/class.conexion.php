<?php
	class Conexion{
		public function conectar(){
			$base="proyecto";
			$sitio="localhost";
			$dsn="mysql:dbname=$base;host=$sitio";
			
			$usuario="root";
			$clave="";

			$conexion=new PDO($dsn,$usuario,$clave);
			return $conexion;
		}
	}
 ?>