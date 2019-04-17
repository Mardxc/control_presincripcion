<script>
	$(document).ready(function(){
		$('#examenes').prop('disabled',true);
		$('#grupos').prop('disabled',true);

		$('#addAlumno').mouseover(function(){
			$('#mensajeAlumnos').css('display','block');
			$('#mensajeAlumnos').html('PRESIONE SOBRE ESTE BOTON SI DESEA AGREGAR EL ALUMNO AL GRUPO SELECCIONADO');
		});

		$('#deleteAlumno').mouseover(function(){
			$('#mensajeAlumnos').css('display','block');
			$('#mensajeAlumnos').html('ELIMINAR AL ALUMNO AL GRUPO PARA HABILITARLO EN OTRO');
		});
	});


	function agregarAlumno(){

		var id_grupo=$('#grupos').val();
		var id_alumno=$('#id_alumno').val();

		<?php echo CHtml::ajax(array(
			'url'=>array('aluAlumno/AgregaAlumno'),
			'data'=> array(
				'id_alumno'=>'js:id_alumno',
				'id_grupo'=>'js:id_grupo'
			 ),
			'type'=>'post',
			'dataType'=>'json',
			'success'=>"function(data)
			{	
				if(data.status==0){
					$('#addAlumno').css('display','none');
					$.fn.yiiGridView.update('alumnosGrupoFiltrado');
					location.reload();
				}else{
					alert('El grupo está en el cupo maximo');
				}
			}"
			))
		?>;
		return false; 		

	}
	function borrarAlumno(){

		var id_detalles_grupos=  $.fn.yiiGridView.getChecked('alumnosGrupoFiltrado', 'id_alumnos');

		if(id_detalles_grupos==''){
			alert('Seleccione al alumno!!!')
		}else{
			<?php echo CHtml::ajax(array(
				'url'=>array('aluAlumno/borrarAlumno'),
				'data'=> array(
					'id_detalles_grupos'=>'js:id_detalles_grupos'
				 ),
				'type'=>'post',
				'dataType'=>'json',
				'success'=>"function(data)
				{	
					
					$.fn.yiiGridView.update('alumnosGrupoFiltrado','id_detalles_grupos');
					$('#addAlumno').css('display','block');
					$('#addAlumno').css('display','block');
					location.reload();
				}"
				))
			?>;
			return false; 
		}
	}
	function buscaAlumno(){

		var nombreAlumno=  $('#nombreBusqueda').val();

		if(nombreAlumno==''){
			alert('Introduzca el nombre del alumno!!!')
		}else{			
			$.fn.yiiGridView.update('alumnosGrupoFiltrado',{data:{"nombreAlumno":nombreAlumno,"alumno":0}});
		}
	}
	function actualizaGridAlumnos(){
		var id_grupo=$('#grupos').val();

		$.fn.yiiGridView.update('alumnosGrupoFiltrado',{data:{"id_grupo":id_grupo,"alumno":1}});

		$('#datosConfirmar').css('display','block');
		$('#busquedaAlumno').css('display','block');
		
		<?php echo CHtml::ajax(array(
			'url'=>array('aluAlumno/cupoMaximo'),
			'data'=> array(
				'id_grupo'=>'js:id_grupo'
			 ),
			'type'=>'post',
			'dataType'=>'json',
			'success'=>"function(data)
			{	

				$('#cupoMaximo').html('Cupo Máximo: ' + data.cupo);	
			}"
			))
		?>;
			return false; 
	}
</script>

<table class="table table-condensed" style="width:90%;">
	<tr>
		<td>
			Periodo:
		</td>
		<td>
			<div class="row">
				<?php echo CHtml::dropDownList('periodo', 'periodo', GruExamen::getListPeriodosActivo(),
					array(
						'ajax' => array(
							'type' => 'POST',
							'url' => CController::createUrl('aluAlumno/DynamicExamenes'),
							'update' => '#examenes',
							'data'=>array('id_periodo'=>'js:this.value'), 
							'beforeSend' => 'function(){
								$("#examenes").prop("disabled",false);
								$("#examenes").find("option").remove();

								$("#grupos").find("option").remove();
								$("#grupos").append($("<option>", {
									value: 1,
								text: "Seleccione un grupo"
							}));
							$("#datosConfirmar").css("display","none");
							$("#busquedaAlumno").css("display","none");
							$("#grupos").prop("disabled",true);
							$.fn.yiiGridView.update("alumnosGrupoFiltrado",{data:{"id_grupo":0}});
						}',   
						),'prompt' => 'Seleccione un periodo...'
					)
				); ?>
			</div>	
		</td>
		<td>
			Examen:
		</td>
		<td>
			<div class="row">
					<?php echo CHtml::dropDownList('examenes', 'examenes',GruExamen::getListPeriodos(),
								array(
									'ajax' => array(
									'type' => 'POST',
									'url' => CController::createUrl('aluAlumno/DynamicGrupos'),
									'update' => '#grupos',
									'data'=>array('id_examen'=>'js:this.value'), 
										'beforeSend' => 'function(){
											$("#grupos").prop("disabled",false);
											$("#grupos").find("option").remove();
											$("#datosConfirmar").css("display","none");
											$("#busquedaAlumno").css("display","none");
											$.fn.yiiGridView.update("alumnosGrupoFiltrado",{data:{"id_grupo":0}});
										}',   
									),'prompt' => 'Seleccione un examen...'
								)
					); ?>
			</div>	
		</td>
		<td>
			Grupo:
		</td>
		<td>
			<div class="row">
				<?php
					echo CHtml::dropDownList('grupos', 
					'grupos', 		
					array('opcion'=>'Selecciona un grupo'),
					array('onchange'=>'actualizaGridAlumnos()'));
				?>
			 </div>	
		</td>
	</tr>
	<tr>
		<td colspan="6" align="left">
			<div id="busquedaAlumno" style="display:none;">
				Introduce el nombre del alumno:
				<input type="text" id="nombreBusqueda">
				<a onclick="buscaAlumno()" class="btn btn-success">Buscar</a>	
			</div>
			<div id="cupoMaximo" align="right"></div>
		</td>
	</tr>
	<tr>
		<td colspan="6" align="right">
			<div id="datosConfirmar" style="display:none;">
				<?php 
					if (AluAlumno::checarExistente($id_alumno)==0) { ?>
						<a onclick="agregarAlumno()" id="addAlumno" 
						style="color:rgba(40, 204, 99, 0.89);font-size:2.9em;cursor:hand;float:right;">
							<i class="fa fa-plus"></i>
						</a>
					<?php }
				?>
					<a onclick="borrarAlumno()" id="deleteAlumno" 
					style="color:rgba(40, 204, 99, 0.89);font-size:2.9em;font-weigth:bold;cursor:hand;float:right;">
						<i class="fa fa-trash-o"></i>
					</a>
			</div>
		</td>
	</tr>
</table>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alumnosGrupoFiltrado',
	'dataProvider'=>$dataAlumnosGrupoFiltrado,
	'selectableRows'=>1,
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen alumnos registrados en el grupo',
	'summaryText'=> '',
	'columns'=>array(
			array(
				'id'=>'id_alumnos',
				'class'=>'CCheckBoxColumn',
				 'selectableRows' => '1',  
			),
			'CONSECUTIVO',
			'ALUMNO',
		),
	));
?>
<div id="mensajeAlumnos" class="alert alert-danger" style="display:none;text-align:center;font-weight:bold;"></div>