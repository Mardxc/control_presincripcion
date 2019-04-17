<script>
	function guardarDocumentacion(){
		//obtiene los valores de los objetos y los guarda en variables JS
		var guarda=$('#guardarDocumentacion').val();
		var id_alumno=$('#id_alumno').val();
		var constancia_estudios=$('#constancia_estudios').prop('checked') ;
		var constancia_bachillerato=$('#constancia_bachillerato').prop('checked');
		var acta_nacimiento=$('#acta_nacimiento').prop('checked');
		var fotografias=$('#fotografias').prop('checked');
		var carta_aceptado=$('#carta_aceptado').prop('checked');

		var certificado_secundaria=$('#certificado_secundaria').prop('checked') ;
		var curpp=$('#curpp').prop('checked');
		var certificado_medico=$('#certificado_medico').prop('checked');
		var carta_compromiso=$('#carta_compromiso').prop('checked');
		var solicitud_inscripcion=$('#solicitud_inscripcion').prop('checked');

// es el guardar en AJAX
		<?php echo CHtml::ajax(array(
		   	'url'=>array('aluDocumentacion/guardar'),
		    'data'=> array(// las variables JS las convierte a PHP para mandarlas por AJAX
		    	'id_alumno'=>"js:id_alumno",
		    	'constancia_estudios'=>"js:constancia_estudios",
		    	'constancia_bachillerato'=>"js:constancia_bachillerato",
		    	'acta_nacimiento'=>"js:acta_nacimiento",
		    	'fotografias'=>"js:fotografias",
		    	'carta_aceptado'=>"js:carta_aceptado",

		    	'certificado_secundaria'=>"js:certificado_secundaria",
		    	'certificado_medico'=>"js:certificado_medico",
		    	'carta_compromiso'=>"js:carta_compromiso",
		    	'solicitud_inscripcion'=>"js:solicitud_inscripcion",
		    	'curpp'=>"js:curpp",

		     	'guarda'=>"js:guarda",
		    ),
		    // Hace el paso de valores y con success prepara para la proxima operacion
		    'type'=>'POST',
		    'dataType'=>'json',
		    'success'=>"function(data){	
			    $.each(data.datos,function(key,value){
					if(value==1){
						$('#key').prop('checked','checked') ;
					}else{
						$('#key').removeAttr('checked');
					}
			    });
			    				
				alert('La documentación del alumno ha sido guardada');

			    if(data.status=='guardar' && data.id_documentacion==0){
					$('#guardar').html('actualizar');
					$('#guardar').val('actualizar');
			    }
			 } "
		))?>;
		return false; 
	}
</script>
<?php  
//asigna en variables los valores que estan en el modelo
	if (isset($model->id_alumno))  {
		$id_alumno=$model->id_alumno;
		$constancia_estudios=checados($model->constancia_estudios);
		$constancia_bachillerato=checados($model->constancia_bachillerato);
		$acta_nacimiento=checados($model->acta_nacimiento);
		$fotografias=checados($model->fotografias);
		$carta_aceptado=checados($model->carta_aceptado);

		$certificado_secundaria=checados($model->certificado_secundaria);
		$curpp=checados($model->curpp);
		$certificado_medico=checados($model->certificado_medico);
		$carta_compromiso=checados($model->carta_compromiso);
		$solicitud_inscripcion=checados($model->solicitud_inscripcion);
	} else{ 
// si no esxiste un id_alumno en el modelo, pone vacios todos los campos
		$id_alumno=$id;// $id viene de aluAlumno/detalles, siempre se pasa ese valor junto al modelo
		$constancia_estudios=false;
		$constancia_bachillerato=false;
		$acta_nacimiento=false;
		$fotografias=false;
		$carta_aceptado=false;

		$certificado_secundaria=false;
		$curpp=false;
		$certificado_medico=false;
		$carta_compromiso=false;
		$solicitud_inscripcion=false;
	}
	
	function checados($check=null){
		if($check==1) return true; else false;// Revisa si los checks estan marcados
	}
?>

<?php echo CHtml::textField('id_alumno',$id_alumno,array('style'=>'display:none;')); //Guarda el id_alumno en una caja para actualziar y guardar?>
<!--<input type="text" value="<?php echo $id_alumno; ?>" id="id_alumno">-->

<table id="documento"class="table table-condensed">
	<tr>
		<td>
			Constancia de Estudios
		</td>
		<td>
			<?php echo CHtml::checkBox('constancia_estudios',$constancia_estudios); ?>
		</td>
	</tr>
	<tr>
		<td>
			Constancia de Bachillerato
		</td>
		<td>
			<?php echo CHtml::checkBox('constancia_bachillerato',$constancia_bachillerato); ?>
		</td>
	</tr>
	<tr>
		<td>
			Acta de Nacimiento
		</td>
		<td>
			<?php echo CHtml::checkBox('acta_nacimiento',$acta_nacimiento); ?>
		</td>
	</tr>
	<tr>
		<td>
			Fotografías
		</td>
		<td>
			<?php echo CHtml::checkBox('fotografias',$fotografias); ?>
		</td>
	</tr>
	<tr>
		<td>
			Carta de Aceptacion
		</td>
		<td>
			<?php echo CHtml::checkBox('carta_aceptado',$carta_aceptado); ?>
		</td>
	</tr>
	<tr>
		<td>
			Certificado de Secundaria
		</td>
		<td>
			<?php echo CHtml::checkBox('certificado_secundaria',$certificado_secundaria); ?>
		</td>
	</tr>
	<tr>
		<td>
			CURP
		</td>
		<td>
			<?php echo CHtml::checkBox('curpp',$curpp); ?>
		</td>
	</tr>
	<tr>
		<td>
			Certificado Medico
		</td>
		<td>
			<?php echo CHtml::checkBox('certificado_medico',$certificado_medico); ?>
		</td>
	</tr>
	<tr>
		<td>
			Carta Compromiso
		</td>
		<td>
			<?php echo CHtml::checkBox('carta_compromiso',$carta_compromiso); ?>
		</td>
	</tr>
	<tr>
		<tr>
		<td>
			Solicitud de Inscripcion
		</td>
		<td>
			<?php echo CHtml::checkBox('solicitud_inscripcion',$solicitud_inscripcion); ?>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<div class="alert alert-danger">
				Presione guardar para crear la documentación del alumno y actualizar para realizar cambios
			</div>
		</td>
	</tr>
	<tr>
		<td align="center">
			<?php if(!isset($model->id_documentacion)) { ?>
				<button id="guardarDocumentacion" class="btn btn-success" value="guardar" onclick="guardarDocumentacion()">Guardar</button>
			<?php } else { ?>
				<button id="guardarDocumentacion" class="btn btn-success" value="actualizar" onclick="guardarDocumentacion()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>