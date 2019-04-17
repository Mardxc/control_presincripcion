<button class="btn btn-success bt-large" id="create"><li class="fa fa-plus"></li> Inscribir Alumno</button>

<?php if (isset($model->id_inscripcion)) { ?>
		
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'inscripcion_grid',
		'itemsCssClass'=>"table table-hover table-condensed table-bordered table-stripped",
		'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
		'emptyText'=>'No existen resultados en esta busqueda',
		'dataProvider'=>$model->listarPeriodos($id),
		//'filter'=>$model,
		'columns'=>array(
			/*array(
				'name'=>'id_inscripcio',
				'header'=>'CONSECUTIVO',
				'value'=>$model->id_inscripcion,
				),*/
			//'id_inscripcion',
			'semestre',
			//'status',getNameCiclo
			//'id_alumno',
			
			//'id_carrera',
			array(
				'name'=>'id_carrera',
				'header'=>'Carrera',
				'value'=>'insInscripcion::getNameCarrera($data->id_carrera)',
			),
			'fecha_inicial',
			'fecha_final',
			array(
			'header'=>'Ciclo',
			'value'=>'insInscripcion::getFechaCiclo($data->id_ciclo)',
			//'value'=>'$data->id_ciclo ?\'VIGENTE\':\'LIQUIDADO\' ',
			),
			array(
			'name'=>'id_ciclo',
			'header'=>'Validez',
			'value'=>'insInscripcion::getNameCiclo($data->id_ciclo) ?\'VIGENTE\':\'LIQUIDADO\' ',
			//'value'=>'$data->id_ciclo ?\'VIGENTE\':\'LIQUIDADO\' ',
			),
			//'id_periodo',
			array(
				'name'=>'id_periodo',
				'header'=>'Periodo',
				'value'=>'insInscripcion::getNamePeriodo($data->id_periodo)',
			),
			array(
				'class'=>'CButtonColumn',
				'header'=>'ACCIONES',
				//'htmlOptions' => array('style'=>'color:green;'),
				'template'=>'{delete}',
				'deleteConfirmation'=>('Desear borrar el registro?'),
					'buttons'=>array(
						/*'delete' => array( //botón para la acción nueva
							'options' => array('rel' => 'tooltip', 
								'data-toggle' => 'tooltip', 
								'title' => Yii::t('app', 'Eliminar'),
								'id'=>'eliminar'
							),
		                	'label' => '<i class="fa fa-times fa-2x"></i>',
		                	'imageUrl' => false,								    								    
							'deleteConfirmation'=>'Esta seguro que desea borrar el registro?',

						),*/
						'delete' => array( //botón para la acción nueva
								'options' => array('rel' => 'tooltip', 
									'data-toggle' => 'tooltip', 
									'title' => Yii::t('app', 'Eliminar'),
									'id'=>'eliminar'
								),
			                	'label' => '<i class="fa fa-times fa-2x"></i>',
			                	'url'=>'Yii::app()->createUrl("insInscripcion/delete", array("id_inscripcion"=>$data->id_inscripcion))',
			                	'imageUrl' => false,
								'deleteConfirmation'=>'Esta seguro que desea borrar el registro?',
			                	'afterDelete'=>'$.fn.yiiGridView.update("inscripcion_grid");',		    								    

							),
						/*
						'update' => array( //botón para los update
							'options' => array('rel' => 'tooltip', 
								'data-toggle' => 'tooltip', 
								'title' => Yii::t('app', 'update'),
								'id'=>'informacion'
							),
		                	'label' => '<i class="fa fa-list-alt fa-2x"></i>',
		                	'imageUrl' => false,
							//'url'=>'Yii::app()->createUrl("aluAlumno/update", array("id"=>$data->id_alumno))',
						),*/
					),
			),
		),
	)); ?>
	
<?php }; ?>
	
 
<!-- Inscribir Periodo -->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( 
    'id'=>'crearPeriodo',
    'options'=>array(
        'title'=>'Inscribir Alumno',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>650,
        'height'=>'auto',
        'resizable'=>false,
        'position' => '{my:"bottom", at: "center", of:button}',
       // 'buttons'=>array('Cancelar'=>'js:function(){$(this).dialog("close");}',),
    ),
));?>
<div class="divForForm">
	<?php 
		$this->renderPartial(
	        '/insInscripcion/view',
	        array(
	        	'model'=>$model,
	        	'id'=>$id,
	        	'id_inscripcion'=>''
	        ));
	 ?>
</div>

<?php $this->endWidget();?>
 <script>
	$(document).ready(function(){
		$('#create').click(function(){
			$('#crearPeriodo').dialog("open");
		})
	});
 </script>

<!-- Inscribir Periodo -->