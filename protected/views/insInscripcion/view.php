<script>
	$(document).ready(function(){
		$('#periodos').change(function(){
			$('#id_periodo').val($("#periodos option:selected").text());
		});
		$('#carrera').change(function(){
			$('#id_carrera').val($("#carrera option:selected").text());
		});

		$('#semestre').change(function(){
			$('#semestreSeleccionado').val($("#semestre option:selected").text());
		});

		$("#ciclo").attr("disabled","disabled")
		
	});
</script>
<script>
	function fijarDatos() {
		var id_periodo=$('#id_periodo').val();
		var id_carrera=$('#id_carrera').val();

		$('#periodos option').each(function(){
			if ($(this).text() == id_periodo)
				$(this).attr('selected','selected');
		});
		$('#carrera option').each(function(){
			if ($(this).text() == id_carrera)
				$(this).attr('selected','selected');
		});

	}


	function inscribirAlumno(){
				
		var guarda=$('#guardarInscripcion').val();
		var id_inscripcion=$('#id_inscripcion').val();	
		var id_alumno=$('#id_alumno').val();

		var fecha_inicial=$('#fecha_inicial').val() ;
		var fecha_final=$('#fecha_final').val() ;
		var semestre=$('#semestre').val() ;
		var id_ciclo=$('#id_ciclo').val() ;
		var id_carrera=$('#carrera').val() ;
		var id_periodo=$('#periodos').val() ;

		if(id_alumno=='' || fecha_inicial=='' || fecha_final=='' || semestre=='' || id_ciclo=='' || id_carrera=='' || id_periodo==''){
			alert("VERIFIQUE QUE LOS DATOS SE RELLENARAN CORRECTAMENTE");
		} else{

			<?php echo CHtml::ajax(array(
			    'url'=>array('insInscripcion/guardar'),
			    'data'=> array(
			    	'id_inscripcion'=>'js:id_inscripcion',
			        'id_alumno'=>'js:id_alumno',
			        'fecha_inicial'=>"js:fecha_inicial",
			        'fecha_final'=>"js:fecha_final",
			        'semestre'=>"js:semestre",
			        'id_ciclo'=>"js:id_ciclo",
			        'id_carrera'=>"js:id_carrera",
			        'id_periodo'=>"js:id_periodo",
			        'guarda'=>"js:guarda"
			    ),
			    'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	
			        $.each(data.datos,function(key,value){
						$('#key').val(value) ;
			    	});
					
					alert('El alumno ha sido inscrito');
					$('#crearPeriodo').dialog('close');
					$.fn.yiiGridView.update('inscripcion_grid');
			    	
			    	if(data.status=='guardar' && data.id_inscripcion==0){
						$('#id_inscripcion').html('');
						$('#id_inscripcion').val('');
						$('#fecha_inicial').html('');
						$('#fecha_inicial').val('');
						$('#fecha_final').html('');
						$('#fecha_final').val('');

						$('#guardarInscripcion').css('display','none');
						$('#mensaje_fechas').html('Deben existir periodos para el ciclo vigente');
						$('#valida').css('display','block');
					}
			    } "
			    ))
			?>;
		};
			window.location="index.php?r=aluAlumno/detalles&id="+id_alumno;
			return false; 			
	};
</script>

<?php  
	if ($id_inscripcion!='')  {
		$id_inscripcion=$model->id_inscripcion;
		$id_alumno=$model->id_alumno;
		$fecha_inicial=$model->fecha_inicial;
		$fecha_final=$model->fecha_final;
		$semestre=$model->semestre;
		$id_ciclo=$model->id_ciclo;
		$id_carrera=insInscripcion::getNameCarrera($model->id_carrera);
		$id_periodo=insInscripcion::getNamePeriodo($model->id_periodo);
	} else{ 
		$id_alumno=$id;
		$id_inscripcion=$id_inscripcion;
		$fecha_inicial='';
		$fecha_final='';
		$semestreSeleccionado=0;//InsInscripcion::getSemestre($id_alumno)+1;
		$id_ciclo=InsInscripcion::getCicloValido();
		$ciclo=InsInscripcion::getNameCiclo($id_ciclo);
		$id_carrera='';
		//$carrera=InsInscripcion::getCarreraInscrita($id_alumno);
		$id_periodo='';
	}
	
?>

<?php echo CHtml::textField('semestreSeleccionado',$semestreSeleccionado,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('id_inscripcion',$id_inscripcion,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('id_periodo',$id_periodo,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('id_carrera',$id_carrera,array('style'=>'display:none;')); ?>
<?php echo CHtml::textField('id_ciclo',$id_ciclo,array('style'=>'display:none;')); ?>

<style>
	#fecha_inicial,#fecha_final,#semestre,#ciclo,#carrera,#periodos{
		width: 90%;
	}
</style>
<table class="table table-condensed">
	<tr>
		<td>
			Fecha Inicial
		</td>
		<td>
			<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'fecha_inicial',
			'attribute'=>'fecha_inicial',
		 	'value'=>CTimestamp::formatDate('yyyy/mm/dd',$fecha_inicial),
		 	'language' => 'es',
		 	//'htmlOptions'=> array('style'=>'width:100%'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$fecha_inicial,
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
			Fecha Final
		</td>
		<td>
			<?php 
		 	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'fecha_final',
			'value'=>CTimestamp::formatDate('yyyy/mm/dd',$fecha_final),
		 	//'value'=>$fecha_final,
		 	'language' => 'es',
		 	//'htmlOptions'=> array('style'=>'width:100%'),
		 	'options'=>array(
		 		'autoSize'=>false,
		 		'defaultDate'=>$fecha_final,
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
			Semestre
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
				'semestre',
				'',
	              	//aluEconomicos::getTurno(),
	              	array('empty' => 'Selecciona el semestre',
	              			'1'=>'1',
	              			'2'=>'2',
	              			'3'=>'3',
	              			'4'=>'4',
	              			'5'=>'5',
	              			'6'=>'6',
	              			'7'=>'7',
	              			'8'=>'8',
	              			'9'=>'9',
	              			'10'=>'10',
	              			'11'=>'11',
	              			'12'=>'12',
	              		)
	             );
			?>
		</td>
		<td>
			<!--<?php //echo CHtml::checkBox('constancia_bachillerato',''); ?>  ¿Cambio de carrera?-->
		</td>
	</tr>
	<tr>
		<td>
			Estado
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
				'ciclo',
				$ciclo,
	              	//aluEconomicos::getTurno(),
	              	array('empty' => 'Selecciona el Estado',
	              			'1'=>'VIGENTE',
	              			'0'=>'LIQUIDADO',
	              		)
	             );
			?>
		</td>
	</tr>
		<tr>
		<td>
			Carrera
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'carrera',
					'', 
	              	insInscripcion::getListCarreras(),
	              	array('empty' => 'Selecciona una Carrera')
	             );
			?>

			<?php 
				/*echo CHtml::dropDownList(
					'carrera',
					'', 
	              	insInscripcion::getListCarreras(),
	              	array('empty' => 'Selecciona una Carrera')
	             );*/
			?>
		</td>
	</tr>
	<tr>
		<td>
			Periodo
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'periodos',
					'', 
	              	AluAlumno::getListPeriodos(),
	              	array('empty' => 'Selecciona un Periodo Activo')
	             );
			?>
		</td>
	</tr>
		<tr>
			<td id="mensaje_fechas" align="center" align="center" colspan="2" class="alert alert-danger" >
				Deben existir periodos para el ciclo vigente
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<button class="btn btn-success" id="valida" onclick="validaFechas()">Validar Fechas</button>
				<button class="btn btn-success" id="validaSemestre" onclick="validaSemestre()">Validar Semestre</button>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
			<?php if($id_inscripcion=='') { ?>
				<button id="guardarInscripcion" class="btn btn-success" value="guardar" onclick="inscribirAlumno()">Guardar</button>
			<?php } else { ?>
				<button id="guardarInscripcion" class="btn btn-success" value="actualizar" onclick="inscribirAlumno()">Actualizar</button>
			<?php } ?>
		</td>
	</tr>
</table>

<script>
	function validaSemestre(){
		
		var id_alumno=$('#id_alumno').val();
		var semestre=$('#semestre').val();
	
		if(semestre=='' || id_alumno==''){
			alert('Para realizar la validacion del  semestre seleccionelo!!!')
		}else{
			<?php echo CHtml::ajax(array(
			    'url'=>array('InsInscripcion/ValidaSemestre'),
			    'data'=> array(
			        'id_alumno'=>'js:id_alumno',
			        'semestre'=>"js:semestre"
			    ),
			  	'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	
			    	$('#mensaje_fechas').css('display','block');
			    	$('#mensaje_fechas').css('font-weight','bold');				
				    if(data.status==1){
				    	$('#validaSemestre').css('display','none');
						$('#mensaje_fechas').html('EL SEMESTRE SE SELECCIONO CORRECTAMENTE');
						$('#semestre').attr('disabled','disabled');
						$('#guardarInscripcion').css('display','block');
				    }else{
						$('#mensaje_fechas').html('VERIFIQUE QUE EL SEMESTRE SEA EL CONSECUTIVO');
				    }
			    } "
			))
			?>;
			return false; 		
		}
	}


	function validaFechas(){
		
		var fecha_inicio=$('#fecha_inicial').val();
		var fecha_fin=$('#fecha_final').val();

	
		if(fecha_inicio=='' || fecha_fin==''){
			alert('Para realizar la validacion de las fechas seleccionelas!!!')
		}else{
			<?php echo CHtml::ajax(array(
			    'url'=>array('basCiclo/ValidaFechas'),
			    'data'=> array(
			        'fecha_inicio'=>'js:fecha_inicio',
			        'fecha_fin'=>"js:fecha_fin"
			    ),
			  	'type'=>'post',
			    'dataType'=>'json',
			    'success'=>"function(data)
			    {	
			    	$('#mensaje_fechas').css('display','block');
			    	$('#mensaje_fechas').css('font-weight','bold');				
				    if(data.status==1){
						$('#mensaje_fechas').html('LAS FECHAS SE SELECCIONARON CORRECTAMENTE');
						$('#valida').css('display','none');

						$('#fecha_inicial').attr('disabled','disabled');
						$('#fecha_final').attr('disabled','disabled');

						$('#validaSemestre').css('display','block');
				    }else{
						$('#mensaje_fechas').html('VERIFIQUE QUE LA FECHA DE FIN SE MAYOR A LA DE INICIO');
						$('#mensaje_fechas').css('class','alert alert-info');
				    }
			    } "
			))
			?>;
			return false; 		
		}
	}
	$(document).ready(function(){
		$('#guardarInscripcion').css('display','none');
		$('#validaSemestre').css('display','none');
	});
</script>