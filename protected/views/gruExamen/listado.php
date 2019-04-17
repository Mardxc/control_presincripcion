<script>
	$(document).ready(function(){
		$('#oportunidades').prop('disabled',true);
		$('#carreras').prop('disabled',true);
	});
	function crearReporte(){
		/* O para actualizar */
		var id_periodo=$('#periodo').val();
		var id_examen=$('#oportunidades').val();
		var id_carrera=$('#carreras').val();
		var id_escuela=$('#escuela_procedencia').val();
		var id_municipio_alumno=$('#ID_MUN').val();
		var id_localidad_alumno=$('#ID_LOC').val();
		var sexo=$('#sexo').val();
		var id_municipio_escuela=$('#ID_MUN_ESC').val();
		var fecha_inicio=$('#fecha_inicio').val();
		var fecha_fin=$('#fecha_fin').val();


			
		if (id_periodo=='' || id_examen=='') {
			alert('Selecciona el periodo y la oportunidad ')
		}else{
			$.fn.yiiGridView.update('alumnosListadoTotal',
				{
					data:{
						"id_periodo":id_periodo,
						"id_examen":id_examen,
						"id_carrera":id_carrera,
						"id_escuela":id_escuela,
						"id_municipio_alumno":id_municipio_alumno,
						"id_localidad_alumno":id_localidad_alumno,
						"sexo":sexo,
						"id_municipio_escuela":id_municipio_escuela,
						"fecha_inicio":fecha_inicio,
						"fecha_fin":fecha_fin
					}	
				}
			);	
		}

		
	}

    function imprimeListado(){
		var id_periodo=$('#periodo').val();
		var id_examen=$('#oportunidades').val();
		var id_carrera=$('#carreras').val();
		var id_escuela=$('#escuela_procedencia').val();
		var id_municipio_alumno=$('#ID_MUN').val();
		var id_localidad_alumno=$('#ID_LOC').val();
		var sexo=$('#sexo').val();
		var id_municipio_escuela=$('#ID_MUN_ESC').val();
		var fecha_inicio=$('#fecha_inicio').val();
		var fecha_fin=$('#fecha_fin').val();
        
        if(id_periodo!='' && id_examen!=''){
            window.location="index.php?r=gruExamen/imprimeListado&id_periodo="+id_periodo+
            "&id_examen="+id_examen+"&id_carrera="+id_carrera+"&id_escuela="+id_escuela+
            "&id_municipio_alumno="+id_municipio_alumno+"&id_municipio_escuela="+id_municipio_escuela+
            "&fecha_inicio="+fecha_inicio+"&fecha_fin="+fecha_fin;
        }else{
        	alert('Selecciona el periodo y la oportunidad');
        }
    }
</script>
<div align="center">
	<h1>
		Listado de Alumnos
	</h1>
	
</div>
<table class="table table-condensend" align="center">
	<tr>
		<td>
			Periodo
		</td>
		<td>
			<div class="row">
				<?php echo CHtml::dropDownList('periodo', 'periodo', GruExamen::getListPeriodosActivo(),
				    array(
				        'ajax' => array(
				        'type' => 'POST',
				        'url' => CController::createUrl('gruExamen/dynamicOportunidades'),
				            'update' => '#oportunidades',
				            'data'=>array('periodo'=>'js:this.value'), 
				            'beforeSend' => 'function(){
				                $("#oportunidades").prop("disabled",false);
				                $("#oportunidades").find("option").remove();
				            }',   
				     	),'prompt' => ' '
				    )
				); ?>
			</div>
		</td>
		<td>
			Oportunidad
		</td>
		<td>
			<div class="row">
				<?php echo CHtml::dropDownList('oportunidades', 'oportunidades', GruExamen::getListPeriodosActivo(),
				    array(
				        'ajax' => array(
				        'type' => 'POST',
				        'url' => CController::createUrl('gruExamen/dynamicCarreras'),
				            'update' => '#carreras',
				            'data'=>array('oportunidades'=>'js:this.value'), 
				            'beforeSend' => 'function(){
				                $("#carreras").prop("disabled",false);
				                //$("#carreras").find("option").remove();
				            }',   
				     	),'prompt' => ' '
				    )
				); ?>
			</div>
		</td>
		<td>
			Carrera
		</td>
		<td>
			<div class="row">
				<?php echo CHtml::dropDownList('carreras', 'carreras', GruExamen::getListPeriodosActivo(),
				    array(
				        'ajax' => array(
				        'type' => 'POST',

				        //'url' => CController::createUrl('gruExamen/dynamicCarreras'),
				            //'update' => '#carreras',
				            'data'=>array('carreras'=>'js:this.value'), 
				            'beforeSend' => 'function(){
								
				            }',   
				     	),'prompt' => ' '
				    )
				); ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			Escuela de Procedencia
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList(
					'escuela_procedencia', 
					'escuela_procedencia', 
					GruExamen::getListEscuelas(),array('prompt'=>'','style'=>'width:100%'))
			?>
		</td>
		<td>
			Municipio del Alumno
		</td>
		<td>
			<?php echo CHtml::textField('ID_MUN','',array('style'=>'display:none;')); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'Municipio',
					'value'=>'',
					'htmlOptions'=> array('style'=>'width:100%'),
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
		<td>
			Localidad del Alumno
		</td>
		<td>
			<?php echo CHtml::textField('ID_LOC','',array('style'=>'display:none;')); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'Localidad',
					'value'=>'',
					'htmlOptions'=> array('style'=>'width:100%'),
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
			Sexo
		</td>
		<td>
			<?php 
				echo CHtml::dropDownList('sexo', 'sexo', GruExamen::getSexo(),array('style'=>'width:100%'))
			?>
		</td>
		<td>
			Fecha inicio
		</td>
		<td>
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'name'=>'fecha_inicio',
				    'value'=>'',    
				    'options'=>array(
				        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				        'showButtonPanel'=>true,
				    ),
				    'htmlOptions'=>array(
				        'style'=>''
				    ),
				));
			?>
		</td>
		<td>
			Fecha Fin
		</td>
		<td>
			<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				    'name'=>'fecha_fin',
				    'value'=>'',    
				    'options'=>array(
				        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
				        'showButtonPanel'=>true,
				    ),
				    'htmlOptions'=>array(
				        'style'=>''
				    ),
				));
			?>	
		</td>
	</tr>
	<tr>
		<td>
			Municipio de la Escuela
		</td>
		<td>
			<?php echo CHtml::textField('ID_MUN_ESC','',array('style'=>'display:none;')); ?>
			<?php 
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'name'=>'MunicipioEscuela',
					'value'=>'',
					'htmlOptions'=> array('style'=>'width:100%'),
					'sourceUrl'=>$this->createUrl('ListarMunicipios'),
					'options'=>array(
						'minLength'=>'1',
						'showAmin'=>'fold',
						'select'=>'js:function(event,ui){
							$("#ID_MUN_ESC").val(ui.item["id"]);
						}',
					),
				));
			?>
		</td>
		<td colspan="4" align="right">
			<a onclick="crearReporte()" class="btn btn-success btn-large"><i class="fa fa-check"></i> Ejecutar Reporte</a>
			<a onclick="imprimeListado()" class="btn btn-success btn-large" ><i class="fa fa-print"></i>Imprimir Listado</a>
		</td>
	</tr>
</table>
	
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'alumnosListadoTotal',
    'dataProvider'=>$dataAlumnosFiltrado,
    'selectableRows'=>1,
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen alumnos registrados para el listado seleccionado',
	'summaryText'=> '',
    'columns'=>array(
            array(
                'id'=>'id_alumnos_listado',
                'class'=>'CCheckBoxColumn',
                 'selectableRows' => '1',  
            ),
            'CONSECUTIVO',
            'NOMBRE',
            'CARRERA',
            'ESCUELA_PROCEDENCIA',
            'MUNICIPIO',
            'LOCALIDAD',
            'SEXO',
            'MES',
            'OPORTUNIDAD',
        ),
    ));
?>
<div class="alert alert-danger" style="margin:auto;text-align:center;font-weight:bold;">
	PARA IMPRIMIR EL LISTADO SELECCIONAR POR LO MENOS EL PERIODO Y LA OPORTUNIDAD
	<br>
	PARA REINICIAR LA BUSQUEDA FILTRADA AL VIZUALIZAR E IMPRIMIR ACTUALIZE EL NAVEGADOR
</div>
