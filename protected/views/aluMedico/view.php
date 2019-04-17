<script>
	function guardarMedicos(){
		var guarda=$('#save_medico').val();
		var id_alumno=$('#id_alumno').val();

		var tipo_sangre=$('#tipo_sangre').val() ;
		var discapacidad=$('#discapacidad').val() ;

		var nss=$('#nss').val() ;
		var esquema_vacunacion=$('#esquema_vacunacion').val() ;
		var alergia_medicamento=$('#alergia_medicamento').val() ;
		var enfermedades_importantes=$('#enfermedades_importantes').val() ;

    	<?php echo CHtml::ajax(array(
                'url'=>array('aluMedico/guardar'),
                'data'=> array(
                	'id_alumno'=>'js:id_alumno',
                	'tipo_sangre'=>"js:tipo_sangre",
                	'discapacidad'=>"js:discapacidad",

                	'nss'=>"js:nss",
                	'esquema_vacunacion'=>"js:esquema_vacunacion",
                	'alergia_medicamento'=>"js:alergia_medicamento",
                	'enfermedades_importantes'=>"js:enfermedades_importantes",
                	'guarda'=>"js:guarda"
                ),
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {	
                	$.each(data.datos,function(key,value){
						$('#key').val(value) ;
                	});

					alert('Los datos médicos del alumno han sido guardados');

                	if(data.status=='guardar' && data.id_medico==0){
						$('#save_medico').html('Actualizar');
						$('#save_medico').val('actualizar');
                	}
                } "
                ))
        ?>;
        return false; 		
	}
	function cambia(){
		alert('cambio');
	}
</script>
<?php  
	if (isset($model->id_alumno))  {
		$id_alumno=$model->id_alumno;
		$tipo_sangre=$model->tipo_sangre;
		$discapacidad=$model->discapacidad;

		$nss=$model->nss;
		$esquema_vacunacion=$model->esquema_vacunacion;
		$alergia_medicamento=$model->alergia_medicamento;
		$enfermedades_importantes=$model->enfermedades_importantes;
	} else{ 
		$id_alumno=$id;
		$tipo_sangre='';
		$discapacidad='';
		$nss='';
		$esquema_vacunacion='';
		$alergia_medicamento='';
		$enfermedades_importantes='';
	}
	function checks($check=null){
		if($check==1) return true; else false;
	}
?>



<?php echo CHtml::textField('id_alumno',$id_alumno,array('style'=>'display:none;')); ?>

<style>
	#tipo_sangre,#discapacidad,#nss,#esquema_vacunacion,#alergia_medicamento,#enfermedades_importantes{
		width: 70%;
	}
</style>

<table class="table table-condensed">
	<tr>
		<td>
			Tipo de Sangre
		</td>
		<td>
			<?php echo CHtml::textField('tipo_sangre',
				$tipo_sangre,
				//array('onkeypress'=>'letras("tipo_sangre")'),
				array('id'=>'tipo_sangre','width'=>'200px','maxlength'=>5)); ?>
				<a  onclick="mensajeAdvertencia('mensajeSangre',
				'Ingresar el tipo de sangre, no es un tipo de dato obligatorio')"
				 id="mensajeSangre" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;
				 cursor:hand;"></a>
		</td>
	</tr>
	<tr>
		<td>
			Discapacidad
		</td>
		<td>
			<?php echo CHtml::textField('discapacidad',
				$discapacidad,
				array('onkeypress'=>'letras("discapacidad")'),
				array('id'=>'discapacidad','width'=>'200px','maxlength'=>500,'style'=>'width:45%')); ?>
				<a  onclick="mensajeAdvertencia('mensajeDiscapacidad',
				'Este dato no es obligatorio')"
				 id="mensajeDiscapacidad" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;
				 cursor:hand;"></a>
		</td>
	</tr>
	<tr>
		<td>
			Numero de Seguro Social
		</td>
		<td>
			<?php echo CHtml::textField('nss',
				$nss,
				array('id'=>'nss','width'=>'200px','maxlength'=>15)); ?>
				<a  onclick="mensajeAdvertencia('mensajeNss',
				'Ingresar el numero de seguro social, no es un tipo de dato obligatorio')"
				 id="mensajeNss" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;
				 cursor:hand;"></a>
		</td>
	</tr>
	<tr>
		<td>
			Esquema Vacunacion
		</td>
		<td><?php 
				echo CHtml::dropDownList(
				'esquema_vacunacion',
				$esquema_vacunacion,
	              	//aluEconomicos::getTurno(),
	              	array('empty' => 'Selecciona el estado',
	              			'1'=>'COMPLETO',
	              			'0'=>'INCOMPLETO',
	              		)
	             );
			?>
		</td>
	</tr>

	<tr>
		<td>
			Alergias a medicamentos
		</td>
		<td>
			<?php echo CHtml::textField('alergia_medicamento',
				$alergia_medicamento,
				
				array('id'=>'alergia_medicamento','width'=>'200px','maxlength'=>500)); ?>
				<a  onclick="mensajeAdvertencia('mensajeAlergia',
				'Ingresar las alergias a medicamentos, no es un tipo de dato obligatorio')"
				 id="mensajeAlergia" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;
				 cursor:hand;"></a>
		</td>
	</tr>
	<tr>
		<td>
			Enfermedades Importantes
		</td>
		<td>
			<?php echo CHtml::textField('enfermedades_importantes',
				$enfermedades_importantes,
				
				array('id'=>'enfermedades_importantes','width'=>'200px','maxlength'=>500)); ?>
				<a  onclick="mensajeAdvertencia('mensajeEnfermedades',
				'Ingresar las enfermedades importantes, no es un tipo de dato obligatorio')"
				 id="mensajeAlergia" class="glyphicon glyphicon-info-sign" style="font-size: 1.2em;
				 cursor:hand;"></a>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<div class="alert alert-danger">
				Presione guardar para crear los datos medicos del alumno y actualizar para realizar cambios
			</div>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<?php if(!isset($model->id_medico)) { ?>
				<button id="save_medico" class="btn btn-success" value="guardar" onclick="guardarMedicos()">Guardar</button>
			<?php } else { ?>
				<button id="save_medico" class="btn btn-success" value="actualizar" onclick="guardarMedicos()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>
