<?php

 	include("../im/protected/custom_conn.php");		
	class Servidor_Base_Datos
	{
		private $usuario;
		private $password;
		private $servidor;
		private $base_datos;
		private $conexion;
		private $resultado;

		function __construct()
		{

			/*$this->usuario		= '$Usuario';
			$this->password		= '$Password';
			$this->servidor		= '$Servidor';
			$this->base_datos	= '$BaseDeDatos';
			$this->conectar_base_datos();*/
		}

		function conectar_base_datos(){
			$this->conexion=mysql_connect($this->servidor,$this->usuario,
				$this->password);
			mysql_select_db($this->base_datos,$this->conexion);
		}

		function consultas($consulta){
			$this->resultado=mysql_query($consulta);
		}

		function extraer_registro(){
			if ($fila=mysql_fetch_array($this->resultado)) 
				return $fila;
			else
				return false;
		}

	 	function numero_filas()
		{
			return mysql_num_rows($this->resultado);
		}

		function filas_afectadas()
		{
			return mysql_affected_rows();
		}
		
		function ultima_fila()
		{
		return mysql_insert_id($this->resultado);
		}
	}

?>
