<?php
/* @var $this AluParentescoController */
/* @var $model AluParentesco */

$this->breadcrumbs=array(
	'Alu Parentescos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AluParentesco', 'url'=>array('index')),
	array('label'=>'Create AluParentesco', 'url'=>array('create')),
);


?>

<h1>Parentescos</h1>

<a id="addStudent" href="index.php?r=aluParentesco/create" style="text-align:rigth;cursor:hand;left:0%;" class="btn btn-success bt-large"><i class="fa fa-plus">Nuevo Parentesco</i></a>
<?php 
	/*echo CHtml::link('Nuevo Parentesco','index.php?r=AluMedico/create',
		array(
			'class'=>'glyphicon glyphicon-plus fa-2x',
			'title'=>'Crear Nuevo parentesco',
			'style'=>'left:95%;
	    		font-size: 3.0em;'
	    )
	);*/
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alu-parentesco-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Parentescos',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'parentesco',
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
