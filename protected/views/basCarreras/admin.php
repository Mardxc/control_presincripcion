

<h1>Carreras</h1>

<a href="index.php?r=BasCarreras/create" style="text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-plus">Nueva carrera</i>
</a>

<?php 
/*	echo CHtml::link('','index.php?r=BasCarreras/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nueva Carrera',
			'style'=>'left:95%;
	    		font-size: 3.0em;'
	    )
	);*/
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bas-carreras-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Carreras',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'nombre_corto',
		'fecha_ingreso',
		array(
			'name'=>'id_plan',
			'header'=>'PLAN',
			'value'=>'BasCarreras::getNamePlan($data->id_plan)',
			'filter'=>BasCarreras::getListPlanes(),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'header'=>'ACCIONES',
			'deleteConfirmation'=>('Desear borrar el registro?'),
				'buttons'=>array(
			    	 	
					'update' => array( //botón para la acción nueva
						'options' => array('rel' => 'tooltip', 
							'data-toggle' => 'tooltip', 
							'title' => Yii::t('app', 'Actualizar')
						),
	                	'label' => '<i class="fa fa-refresh fa-2x"></i>',
	                	'imageUrl' => false,
						'updateButtonUrl'=>'Yii::app()->controller->createUrl("update")',
					),


					'delete' => array( //botón para la acción nueva
						'options' => array('rel' => 'tooltip', 
							'data-toggle' => 'tooltip', 
							'title' => Yii::t('app', 'Eliminar')
						),
	                	'label' => '<i class="fa fa-times fa-2x"></i>',
	                	'imageUrl' => false,								    								    
						'deleteConfirmation'=>'Esta seguro que desea borrar el registro?',
									    
					),
				),
		),
	),
)); ?>
