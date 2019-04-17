<script>
	function guardarAlumno(){
		var guarda=$('#guardar').val();
		var id_alumno=$('#id_alumno').val();
		var no_control=$('#no_control').val();
		var nombre=$('#nombre_a').val();
		var ape_pat=$('#ape_pat_a').val();
		var ape_mat=$('#ape_mat_a').val();
		var curp=$('#curp_a').val();
		var telefono=$('#telefono_a').val();
		var sexo=$('#sexo_a').val();
		var correo=$('#correo_a').val();
		var fecha_nac=$('#fecha_nac_a').val();
		var lugar_nac=$('#lugar_nac_a').val();
		var domicilio=$('#domicilio_a').val();
		var cp=$('#cp_a').val();
		var estado_civil=$('#estado_civil_a').val();
		var colonia=$('#colonia_a').val();
		var tiempo_residencia=$('#tiempo_residencia_a').val();

		var id_municipio=$('#ID_MUN').val();
		var id_localidad=$('#ID_LOC').val();

		<?php echo CHtml::ajax(array(
		   	'url'=>array('aluAlumno/guardar'),
		    'data'=> array(
		    	'id_alumno'=>'js:id_alumno',
		    	'no_control'=>"js:no_control",
		    	'nombre'=>"js:nombre",
		    	'ape_pat'=>"js:ape_pat",
		    	'ape_mat'=>"js:ape_mat",
		    	'curp'=>"js:curp",
		    	'telefono'=>"js:telefono",
		    	'sexo'=>"js:sexo",
		    	'correo'=>"js:correo",
		    	'fecha_nac'=>"js:fecha_nac",
		    	'lugar_nac'=>"js:lugar_nac",
		    	'domicilio'=>"js:domicilio",
		    	'cp'=>"js:cp",
		    	'estado_civil'=>"js:estado_civil",
		    	'colonia'=>"js:colonia",
		    	'tiempo_residencia'=>"js:tiempo_residencia",

		    	'id_municipio'=>"js:id_municipio",
		    	'id_localidad'=>"js:id_localidad",
		     	'guarda'=>"js:guarda"
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data){	

				alert('La información del alumno ha sido guardada');
				
					$('#id_alumno').val(data.id_alumno);

			    if(data.status=='guardar'){
					$('#guardar').html('actualizar');
					$('#guardar').val('actualizar');

					var id_alu=$('#id_alumno').val();
					window.location='index.php?r=aluAlumno/detalles&id='+id_alu;
			    }
			 } "
		))?>;
		return false; 
	}
</script>

<?php  
	if ($id_alumno!=0)  {
		$id_alumno=$model->id_alumno;
		$no_control=$model->no_control;
		$nombre=$model->nombre;
		$ape_pat=$model->ape_pat;
		$ape_mat=$model->ape_mat;
		$curp=$model->curp;
		$telefono=$model->telefono;
		$sexo=$model->sexo;
		$correo=$model->correo;
		$fecha_nac=$model->fecha_nac;
		$lugar_nac=$model->lugar_nac;
		$domicilio=$model->domicilio;
		$cp=$model->cp;
		$estado_civil=$model->estado_civil;
		$colonia=$model->colonia;
		$tiempo_residencia=$model->tiempo_residencia;

		$id_municipio=$model->ID_MUN;
		$id_localidad=$model->ID_LOC;
	} else{ 
		$no_control='';
		$nombre='';
		$ape_pat='';
		$ape_mat='';
		$curp='';
		$telefono='';
		$sexo='';
		$correo='';
		$fecha_nac='';
		$lugar_nac='';
		$domicilio='';
		$cp='';
		$estado_civil='';
		$colonia='';
		$tiempo_residencia='';

		$id_municipio='';
		$id_localidad='';
	}
?>

<input type="text" id="id_alumno" style="display:none;" value="<?php echo $id_alumno; ?>">

<style>
	#no_control,#nombre_a,#ape_pat_a,#ape_mat_a,#curp_a,#telefono_a,#correo_a,#fecha_nac_a,#lugar_nac_a,#domicilio_a,#cp_a,#estado_civil_a,#colonia_a,#tiempo_residencia_a,#municipio_a,#localidad_a{
		width: 80%;
	}
	#sexo_a{
		width: 80%;
	}
</style>

<table class="table table-condensed">
	<tr>
		<td>
			No Control:
		</td>
		<td>
			<?php 
				echo CHtml::textField(
					'no_control',
					$no_control,
					array('onblur'=>'vacios("no_control","Falta el Numero de Control")','onkeyup'=>'numeros("no_control")'),
					array('id'=>'no_control','maxlength'=>3)
				); 
			 ?>
		</td>
	</tr>
	<tr>
		<td>
			Nombre:
		</td>
		<td>
			<?php echo CHtml::textField(
				'nombre_a',
				$nombre,
				array('onblur'=>'vacios("nombre","Dato Obligatorio"")','onkeyup'=>'letras("nombre")'),
				array('id'=>'nombre','maxlength'=>45)
			) ?>
		</td>
	</tr>
	<tr>
		<td>
			Apellido Paterno:
		</td>
		<td>
			<?php echo CHtml::textField(
				'ape_pat_a',
				$ape_pat,
				array('onblur'=>'vacios("ape_pat","Dato Obligatorio")','onkeyup'=>'letras("ape_pat")'),
				array('id'=>'ape_pat','maxlength'=>45,'style'=>'width:0%')
			) ?>
		</td>
	</tr>
	<tr>
		<td>
			Apellido Materno:
		</td>
		<td>
			<?php echo CHtml::textField(
				'ape_mat_a',
				$ape_mat,
				array('onblur'=>'vacios("ape_mat","Dato Obligatorio")','onkeyup'=>'letras("ape_mat")'),
				array('id'=>'ape_mat','maxlength'=>45,'style'=>'width:0%')
			) ?>
		</td>
	</tr>
	<tr>
		<td>
			Curp:
		</td>
		<td>
			<?php echo CHtml::textField(
				'curp_a',
				$curp,
				array('onblur'=>'vacios("curp","Dato Obligatorio")'),
				array('id'=>'curp','maxlength'=>200,'style'=>'width:0%')
			) ?>
		</td>
		
	</tr>
	<tr>
		<td>
			Telefono:
		</td>
		<td>
			<?php echo CHtml::textField(
				'telefono_a',
				$telefono,
				array('onblur'=>'vacios("telefono","Dato Obligatorio")','onkeyup'=>'numeros("telefono")'),
				array('id'=>'telefono','maxlength'=>10,'style'=>'width:0%')
			) ?>
		</td>
		
	</tr>
	<tr>
		<td>
			Sexo:
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'sexo_a',
					$sexo,
					aluAlumno::getSexo(),
					array('empty' => ' ','style'=>'width:80%')
				); 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Email:
		</td>
		<td>
			<?php echo CHtml::textField(
				'correo_a',
				$correo,
				array('onblur'=>'letras("correo")'),
				array('id'=>'correo','maxlength'=>70,'style'=>'width:0%')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Fecha de Nacimiento
		</td>
		<td>
		<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'fecha_nac_a',
		 	'value'=>$fecha_nac,
		 	'language' => 'es',
		 	'htmlOptions'=> array('style'=>'width:80%'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$fecha_nac,
		 		//'dateFormat'=>'dd/mm/yy',
		 		'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.gif',
		 		'buttonImageOnly'=>true,
		 		'buttonText'=>'Fecha',
		 		'yearRange'=>'1970:2099',
		 		'selectOtherMonths'=>true,
		 		'showAnim'=>'slide',
		 		'showButtonPanel'=>true,
		 		'showOn'=>'button',
		 		'showOtherMonths'=>true,
		 		'changeMonth' => true,
		 		'changeYear' => true,
		 		),
		 	));
	 	?>
		</td>
	</tr>
	<tr>
		<td>
			Lugar de Nacimiento:
		</td>
		<td>
			<?php echo CHtml::textField(
				'lugar_nac_a',
				$lugar_nac,
				array('onblur'=>'vacios("lugar_nac","Dato Obligatorio")','onkeyup'=>'letras("lugar_nac")'),
				array('id'=>'lugar_nac','maxlength'=>70,'style'=>'width:0%')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Domicilio:
		</td>
		<td>
			<?php echo CHtml::textField(
				'domicilio_a',
				$domicilio,
				array('onblur'=>'vacios("domicilio","Dato Obligatorio")','onkeyup'=>'letras("domicilio")'),
				array('id'=>'domicilio','maxlength'=>70,'style'=>'width:0%')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Código Postal:
		</td>
		<td>
			<?php echo CHtml::textField(
				'cp_a',
				$cp,
				array('onblur'=>'vacios("cp","Dato Obligatorio")','onkeyup'=>'numeros("cp")'),
				array('id'=>'cp','maxlength'=>5,'style'=>'width:0%')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Estado Civil:
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'estado_civil_a',
					$estado_civil,
					aluAlumno::getEstado(),
					array('empty' => ' ','style'=>'width:80%')
				); 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Municipio de Nacimiento:
		</td>
		<td>
			<?php 
				if ($id_municipio!='') {
					$municipios=AluAlumno::getNameMunicipio($id_municipio);
					$municipio=$municipios;
				}else
				$municipio='';
			?>
			<?php echo CHtml::textField('ID_MUN',$id_municipio,array('style'=>'display:none;')); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'municipio_a',
					'value'=>$municipio,
					'htmlOptions'=> array('style'=>'width:80%'),
					'sourceUrl'=>$this->createUrl('ListarMunicipios'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#ID_MUN").val(ui.item["id"]);
						}',
					),
				));
			?>
		</td>
	</tr>
	<tr>
		<td>
			Localidad de Nacimiento:
		</td>
		<td>
			<?php 
				if ($id_localidad!='') {
					$localidades=AluAlumno::getNameLocalidad($id_localidad);
					$localidad=$localidades;
				}else
					$localidad='';
			?>
			<?php echo CHtml::textField('ID_LOC',$id_localidad,array('style'=>'display:none;')); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'localidad_a',
					'value'=>$localidad,
					'htmlOptions'=> array('style'=>'width:80%'),
					'sourceUrl'=>$this->createUrl('ListarLocalidades'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#ID_LOC").val(ui.item["id"]);
						}',
					),
				));
			?>
		</td>
	</tr>
	<tr>
		<td>
			Colonia:
		</td>
		<td>
			<?php echo CHtml::textField(
				'colonia_a',
				$colonia,
				array('onblur'=>'vacios("colonia","Dato Obligatorio")','onkeyup'=>'letras("colonia")'),
				array('id'=>'colonia','maxlength'=>5,'style'=>'width:0%')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td>
			Tiempo de Residencia en el lugar(AÑOS):
		</td>
		<td>
			<?php echo CHtml::textField(
				'tiempo_residencia_a',
				$tiempo_residencia,
				array('onblur'=>'vacios("tiempo_residencia","Dato Obligatorio")','onkeyup'=>'numeros("tiempo_residencia")'),
				array('id'=>'tiempo_residencia','maxlength'=>10,'style'=>'width:0%')
				) 
			?>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<?php if(!isset($model->id_alumno)) { ?>
				<button id="guardar" class="btn btn-success" value="guardar" onclick="guardarAlumno()">Guardar</button>
			<?php } else { ?>
				<button id="guardar" class="btn btn-success" value="actualizar" onclick="guardarAlumno()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>