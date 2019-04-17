<?php
/* @var $this EscInstitucionController */
/* @var $model EscInstitucion */

$this->breadcrumbs=array(
	'Esc Institucions'=>array('index'),
	'Manage',
);

?>

<h1>Institucion</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'esc-institucion-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count}',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'direccion',
		'telefono',
		'fax',
		'director',
		array(
			'class'=>'CButtonColumn',
			'header'=>'ACCIONES',
			'template'=>'{update}',
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


				)
		),
	),
)); ?>
