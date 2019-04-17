<?php
/* @var $this AluMedicoController */
/* @var $model AluMedico */

$this->breadcrumbs=array(
	'Alu Medicos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AluMedico', 'url'=>array('index')),
	array('label'=>'Create AluMedico', 'url'=>array('create')),
);

?>

<h1>Administrar Datos Medicos</h1>

<?php 
	echo CHtml::link('Nuevo','index.php?r=AluMedico/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nueva Alumno',
			'style'=>'left:90%;
	    		font-size: 3.0em;'	    )
	);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alu-medico-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count}',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tipo_sangre',
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
