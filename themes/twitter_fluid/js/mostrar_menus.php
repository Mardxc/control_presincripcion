<?php 
	
	$modulo_s		= $_GET['mod'];
	$tipo_s			= $_GET['tipo'];
	$id_usuario_s	= $_GET['id_usuario'];


	//echo $id_usuario_s;

	//include('mysql');
	
	include("../../../protected/custom_conn.php");
	include('valida_proceso.php');
	//echo $tipo;
	//$vista=new Servidor_Base_Datos();

	/*
	if ($tipo=='modulo') {
		echo "modulo";
		echo $id_usuario;
		
		$sql="select m.modulo,p.proceso,p.link from tbl_procesos p
		inner join tbl_modulos m on p.id_modulo=m.id_modulo where 
		m.modulo='" . $modulo ."'";
		echo $sql;
	}else
	*/
	
	if($tipo_s=='proceso'){
		$sql="select m.modulo 
				from SYS_PROCESOS p 
					inner join SYS_MODULOS m on p.id_modulo=m.id_modulo  
				where p.proceso='$modulo_s'";
		//echo $sql;	
		$proceso_s=$modulo_s;
		
		$resul_consulta = mysql_query($sql) or die(mysql_error());;
		//$fila = mysql_fetch_array($resul_consulta);

		while ($fila = mysql_fetch_array($resul_consulta)) $modulo_s=$fila['modulo'];

		
		
	}

	$sql2="select 	p.tipo,
						p.proceso,
						p.link,
						p.etiqueta 
				from SYS_PROCESOS p 
					inner join SYS_MODULOS m on p.id_modulo=m.id_modulo 
				where m.modulo='$modulo_s';";

	$resul_consulta2 = mysql_query($sql2) or die(mysql_error());
		//$fila2 = mysql_fetch_array($resul_consulta2);
		
	
	$i=1;
	while($filas = mysql_fetch_array($resul_consulta2)) {

		if ($i==1) {
			
			?>
			<li class="nav-header" style="margin-left:1px;padding:3px;border-bottom:0px;">
            	<?php  echo $filas['tipo'];?>
	        </li>
			<?php
		}
		if ($tipo_s=='proceso') {
			if (valida(null,$filas['proceso'],$id_usuario_s)) {
				$link_mostrar = "index.php?r=".$filas['proceso']. "/admin";
				echo "<li>";
						echo "<a style='margin-left:0.4em;font-size:1em;' href='" .$link_mostrar.  "'>";
							echo ucfirst($filas['etiqueta']);
						echo "</a>";
				echo "</li>";
			}
		}
		$i++;
	}

 ?>