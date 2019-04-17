<?php

	/*$Usuario="root";  /*root*/
	//$Password="amoladeras";
	//$Servidor="localhost"; /*localhost*/
	//$BaseDeDatos="cmr_2";
	$Ip_Servidor= "localhost";
	
	//mysql_connect($Servidor,$Usuario,$Password);
	//mysql_select_db($BaseDeDatos);

	
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "tec_rio"; 
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
	mysql_select_db($bd_base, $con);
	//mysql_query("SET NAMES 'utf8';");

?>
