<?php 

	//include("../../../protected/custom_conn.php");

	function valida($modulo ,$proceso,$id_usuario){
		
		//$link=mysql_connect('localhost','root','amoladeras');
		//mysql_select_db('cmr_2');
 // echo $modulo;
  //echo $proceso;
		if (isset($modulo)) {
			$sql="select count(p.id_proceso) as total 
				from SYS_PROCESOS p 
					inner join SYS_MODULOS m on p.id_modulo=m.id_modulo 
					inner join SYS_PERMISOS_USUARIOS pu on pu.id_proceso=p.id_proceso 
				where 
				m.modulo='$modulo' 
				and pu.id_usuario='$id_usuario'";
				//echo $sql;
		}
		if (isset($proceso)) {
			$sql="select count(p.id_proceso) as total 
				from SYS_PROCESOS p 
					inner join SYS_PERMISOS_USUARIOS pu on p.id_proceso=pu.id_proceso 
				where p.proceso='$proceso' 
					and pu.id_usuario='$id_usuario'";
					//echo $sql;
		}

		$resultado=mysql_query($sql);
		

		while ($fila=mysql_fetch_array($resultado)) {
			$total=$fila['total'];
		}

		if ($total==0) {
			return false;
		}else{
			return true;
		}

	}
 ?>
