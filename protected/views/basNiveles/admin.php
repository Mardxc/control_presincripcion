<?php
/* @var $this BasNivelesController */
/* @var $model BasNiveles */

$this->breadcrumbs=array(
	'Bas Niveles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BasNiveles', 'url'=>array('index')),
	array('label'=>'Create BasNiveles', 'url'=>array('create')),
);


?>

<h1>Administración de Niveles</h1>

<?php 
	echo CHtml::link('Nuevo','index.php?r=BasNiveles/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nuevo Nivel',
			'style'=>'left:100%;
	    		font-size: 1.7em;'
	    )
	);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bas-niveles-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count}',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fecha_inicial',
		'fecha_final',
		'status',
		array(
			'name'=>'id_periodo',
			'header'=>'PERIODO',
			'value'=>'BasNiveles::getNamePeriodo($data->id_periodo)',
			'filter'=>BasNiveles::getListPeriodos(),
		),
		array(
			'name'=>'id_carrera',
			'header'=>'CARRERA',
			'value'=>'BasNiveles::getNameCarrera($data->id_carrera)',
			'filter'=>BasNiveles::getListCarreras(),
		),
		array(
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>('Desear borrar el registro?'),
				'buttons'=>array(
					'view' => array( //botón para la acción nueva
						'options' => array('rel' => 'tooltip', 
							'data-toggle' => 'tooltip', 
							'title' => Yii::t('app', 'Ver')
						),
	                	'label' => '<i class="fa fa-search fa-2x"></i>',
	                	'imageUrl' => false,
					),
									    	 	
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
