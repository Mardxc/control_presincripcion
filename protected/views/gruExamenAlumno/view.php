<script>
	function guardarExamenAlumnos(){
		var guarda=$('#save_examen').val();
		var id_alumno=$('#id_alumno').val();
		var folio_ceneval=$('#folio_ceneval').val();
		var version=$('#version').val();
		

		if(folio_ceneval!='' || version!=''){
			<?php echo CHtml::ajax(array(
				'url'=>array('gruExamenAlumno/guardar'),
				    'data'=> array(
				        'id_alumno'=>"js:id_alumno",
				        'folio_ceneval'=>"js:folio_ceneval",
				        'version'=>"js:version",
				        'guarda'=>"js:guarda"
				    ),
				    'type'=>'post',
				    'dataType'=>'json',
				        'success'=>"function(data)
				        {	
				        	$.each(data.datos,function(key,value){
								$('#key').val(value) ;
				            });
									
							alert('Los datos  del examen han sido guardados');

				            if(data.status=='guardar' && data.id_gru_examen_alumno==0){
								$('#save_examen').html('Actualizar');
								$('#save_examen').val('actualizar');
				            }
				      	} "
			))?>;
			return false; 					
		}else{
			alert("Tanto como el folio del ceneval y version son obligatorios");
		}
	} 
</script>
<?php  
	if (isset($model->id_alumno))  {
		$id_alumno=$model->id_alumno;
		$folio_ceneval=$model->folio_ceneval;
		$version=$model->version;
	} else{ 
		$id_alumno=$id;
		$folio_ceneval='';
		$version='';
	}
?>

<?php echo CHtml::textField('id_alumno',$id_alumno,array('style'=>'display:none;')); ?>

<table class="table table-condensed">
	<tr>
		<td>
			Folio Ceneval
		</td>
		<td>
			<?php echo CHtml::textField('folio_ceneval',
				$folio_ceneval,
				array('onkeypress'=>'numeros("folio_ceneval")'),
				array('id'=>'folio_ceneval','width'=>'200px','maxlength'=>5)); ?>
		</td>
	</tr>
	<tr>
		<td>
			Versión del Examen
		</td>
		<td>
			<?php echo CHtml::textField('version',
				$version,
				array('onkeypress'=>'numeros("version")'),
				array('id'=>'version','width'=>'200px','maxlength'=>5)); ?>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<div class="alert alert-danger">
				Presione guardar para crear los datos del examen del alumno y actualizar para realizar cambios
			</div>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<?php if(!isset($model->id_gru_examen_alumno)) { ?>
				<button id="save_examen" class="btn btn-success" value="guardar" onclick="guardarExamenAlumnos()">Guardar</button>
			<?php } else { ?>
				<button id="save_examen" class="btn btn-success" value="actualizar" onclick="guardarExamenAlumnos()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>
