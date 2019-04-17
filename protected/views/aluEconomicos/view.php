<script>
	$(document).ready(function(){
		$('#dependes').change(function(){
			$('#depende').val($("#dependes option:selected").text());
		});
	});
</script>
<script>
	function fijarDatos() {
		var depende=$('#depende').val();

		$('#dependes option').each(function(){
			if ($(this).text() == depende)
				$(this).attr('selected','selected');
		});

	}

	function guardarEconomicos(){
		var guarda=$('#guardarEconomicos').val();
		var depende=$('#dependes').val();
		var sueldo_mensual=$('#sueldo_mensual').val();
		var numero_dependientes=$('#numero_dependientes').val();
		var empresa_trabajo=$('#empresa_trabajo').val();
		var telefono=$('#telefono').val();
		var domicilio=$('#domicilio').val();
		var turno_trabajo=$('#turno_trabajo').val();
		var puesto_trabajo=$('#puesto_trabajo').val();
		var antigüedad=$('#antigüedad').val();
		var nombre_jefe_inmediato=$('#nombre_jefe_inmediato').val();
		var turno_escuela=$('#turno_escuela').val();
		var id_alumno=$('#id_alumno').val();

		<?php echo CHtml::ajax(array(
		   	'url'=>array('aluEconomicos/guardar'),
		    'data'=> array(
		    	'depende'=>"js:depende",
		    	'sueldo_mensual'=>"js:sueldo_mensual",
		    	'numero_dependientes'=>"js:numero_dependientes",
		    	'empresa_trabajo'=>"js:empresa_trabajo",
		    	'telefono'=>"js:telefono",
		    	'domicilio'=>"js:domicilio",
		    	'turno_trabajo'=>"js:turno_trabajo",
		    	'puesto_trabajo'=>"js:puesto_trabajo",
		    	'antigüedad'=>"js:antigüedad",
		    	'nombre_jefe_inmediato'=>"js:nombre_jefe_inmediato",
		    	'turno_escuela'=>"js:turno_escuela",
		    	'id_alumno'=>'js:id_alumno',
		     	'guarda'=>"js:guarda"
		    ),
		   'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {	
            	$.each(data.datos,function(key,value){
					$('#key').val(value) ;
            	});

				alert('La información economica del alumno ha sido guardada');

            	if(data.status=='guardar' && data.id_economico==0){
            		$('#save_tutor').val('actualizar');
					$('#save_tutor').html('Actualizar');
            	}
            } "
            ))
    	?>;

			
		return false; 
	}
</script>

<?php  
	if (isset($model->id_alumno))  {
		
		$depende=aluTutor::getNameParentesco($model->id_parentesco);
		//$depende=$model->depende;
		$sueldo_mensual=$model->sueldo_mensual;
		$numero_dependientes=$model->numero_dependientes;
		$empresa_trabajo=$model->empresa_trabajo;
		$telefono=$model->telefono;
		$domicilio=$model->domicilio;
		$turno_trabajo=$model->turno_trabajo;
		$puesto_trabajo=$model->puesto_trabajo;
		$antigüedad=$model->antigüedad;
		$nombre_jefe_inmediato=$model->nombre_jefe_inmediato;
		$turno_escuela=$model->turno_escuela;
		$id_alumno=$model->id_alumno;
	} else{
		$depende='';
		$sueldo_mensual='';
		$numero_dependientes='';
		$empresa_trabajo='';
		$telefono='';
		$domicilio='';
		$turno_trabajo='';
		$puesto_trabajo='';
		$antigüedad='';
		$nombre_jefe_inmediato='';
		$turno_escuela='';
		$id_alumno=$id_alumno; 
	}
?>


<?php echo CHtml::textField('id_alumno',$id_alumno,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('depende',$depende,array('style'=>'display:none;')); ?>

<table class="table table-condensed">
	<tr>
		<td>
			Depende economicamente de:
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'dependes',
					'',
	              	aluTutor::getListParentescos(),
	              	array('empty' => 'Selecciona de quien depende')
	             );
			?>
		</td>
	</tr>
	<tr>
		<td>
			Sueldo Mensual:
		</td>
		<td>
			<?php echo CHtml::textField(
				'sueldo_mensual',
				$sueldo_mensual,
				array('onblur'=>'vacios("sueldo_mensual","Dato Obligatorio"")'),
				array('id'=>'sueldo_mensual','maxlength'=>10,'style'=>'width:200px')
			) ?>
		</td>
	</tr>
	<tr>
		<td>
			Numero de Dependientes
		</td>
		<td>
			<?php echo CHtml::textField(
				'numero_dependientes',
				$numero_dependientes,
				array('onblur'=>'vacios("numero_dependientes","Dato Obligatorio")','onkeyup'=>'numeros("numero_dependientes")'),
				array('id'=>'numero_dependientes','maxlength'=>11,'style'=>'width:200px')
			) ?>
		</td>
	</tr>
	<tr>
		<td>
			Empresa donde trabaja
		</td>
		<td>
			<?php echo CHtml::textField(
				'empresa_trabajo',
				$empresa_trabajo,
				array('onblur'=>'vacios("empresa_trabajo","Dato Obligatorio")','onkeyup'=>'letras("empresa_trabajo")'),
				array('id'=>'empresa_trabajo','maxlength'=>45,'style'=>'width:200px')
			) ?>
		</td>
	</tr>
	<tr>
		<td>
			Domicilio
		</td>
		<td "style: 200px;">
			<?php echo CHtml::textField(
				'domicilio',
				$domicilio,
				array('onblur'=>'vacios("domicilio","Dato Obligatorio")'),
				array('id'=>'domicilio','maxlength'=>45,'style'=>'width:200px')
			) ?>
		</td>
		
	</tr>
	<tr>
		<td>
			Telefono:
		</td>
		<td>
			<?php echo CHtml::textField(
				'telefono',
				$telefono,
				array('onkeyup'=>'numeros("telefono")'),
				array('id'=>'telefono','maxlength'=>10,'style'=>'width:200px')
			) ?>
		</td>
		
	</tr>
	<tr>
		<td>
			Turno de Trabajo:
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
				'turno_trabajo',
				$turno_trabajo,
	              	//aluEconomicos::getTurno(),
	              	array('empty' => 'Selecciona el turno de escuela',
	              			'MATUTINO'=>'MATUTINO',
	              			'VESPERTINO'=>'VESPERTINO',
	              			'MIXTO'=>'MIXTO',
	              		)
	             );
			?>
		</td>
	</tr>
	<tr>
		<td>
			Puesto:
		</td>
		<td>
			<?php echo CHtml::textField(
				'puesto_trabajo',
				$puesto_trabajo,
				array('onblur'=>'letras("puesto_trabajo")'),
				array('id'=>'puesto_trabajo','maxlength'=>30,'style'=>'width:200px')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Antigüedad (AÑOS)
		</td>
		<td>
		<?php echo CHtml::textField(
				'antigüedad',
				$antigüedad,
				array('onblur'=>'numeros("antigüedad")'),
				array('id'=>'antigüedad','maxlength'=>10,'style'=>'width:200px')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Jefe Inmediato
		</td>
		<td>
			<?php echo CHtml::textField(
				'nombre_jefe_inmediato',
				$nombre_jefe_inmediato,
				array('onblur'=>'vacios("nombre_jefe_inmediato","Dato Obligatorio")','onkeyup'=>'letras("nombre_jefe_inmediato")'),
				array('id'=>'nombre_jefe_inmediato','maxlength'=>25,'style'=>'width:200px')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Turno en Escuela
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
				'turno_escuela',
				$turno_escuela,
	              	//aluEconomicos::getTurno(),
	              	array('empty' => 'Selecciona el turno de escuela',
	              			'MATUTINO'=>'MATUTINO',
	              			'VESPERTINO'=>'VESPERTINO',
	              		)
	             );
			?>
		</td>
	</tr>
		<tr>
		<td align="center" colspan="2">
			<div class="alert alert-danger">
				Presione guardar para crear los datos economicos del alumno y actualizar para realizar cambios
			</div>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<?php if(!isset($model->id_economico)) { ?>
				<button id="guardarEconomicos" class="btn btn-success" value="guardar" onclick="guardarEconomicos()">Guardar</button>
			<?php } else { ?>
				<button id="guardarEconomicos" class="btn btn-success" value="actualizar" onclick="guardarEconomicos()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>
<script> fijarDatos();</script>