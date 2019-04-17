<?php
/* @var $this EscAulasController */
/* @var $model EscAulas */

$this->breadcrumbs=array(
	'Esc Aulases'=>array('index'),
	'Manage',
);

?>

<h1>Aulas</h1>

<?php 
/*	echo CHtml::link('','index.php?r=escAulas/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nueva Aula',
			'style'=>'left:95%;
	    		font-size: 3.0em;'
	    )
	);*/
?>

<a href="index.php?r=escAulas/create" style="text-align:rigth;cursor:hand;left:0%;" class="btn btn-success bt-large">
	<i class="fa fa-plus">Nuevo Periodo</i>
</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'esc-aulas-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Aulas',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'aula',
		array(
			'name'=>'id_edificio',
			'header'=>'EDIFICIO',
			'value'=>'escAulas::getNameEdificio($data->id_edificio)',
			'filter'=>escAulas::getListEdificios(),
		),
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
