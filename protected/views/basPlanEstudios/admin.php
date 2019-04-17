<?php
/* @var $this BasPlanEstudiosController */
/* @var $model BasPlanEstudios */

$this->breadcrumbs=array(
	'Bas Plan Estudioses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BasPlanEstudios', 'url'=>array('index')),
	array('label'=>'Create BasPlanEstudios', 'url'=>array('create')),
);


?>

<h1>Plan de Estudios</h1>

<?php 
	/*echo CHtml::link('','index.php?r=BasPlanEstudios/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nuevo Plan',
			'style'=>'left:95%;
	    		font-size: 3.0em;'
	    )
	);*/
?>

<a href="index.php?r=BasPlanEstudios/create" style="text-align:rigth;cursor:hand;left:0%;" class="btn btn-success bt-large">
	<i class="fa fa-plus">Nuevo Periodo</i>
</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bas-plan-estudios-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Planes de Estudio',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'plan_estudios',
		'doc_autorizacion',
		'creditos_optativos',
		'creditos_totales',
		'estado',
		/*
		'reticula',
		'fecha_alta',
		'carga_max_creditos',
		'carga_min_creditos',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'ACCIONES',
			'template'=>'{update}{delete}',
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
