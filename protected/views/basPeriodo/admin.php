
<h1>Periodos</h1>

<?php 
	/*echo CHtml::link('','index.php?r=BasPeriodo/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nuevo Periodo',
			'style'=>'left:95%;
	    		font-size: 3.0em;'
	    )
	);*/
?>
<a href="index.php?r=BasPeriodo/create" style="text-align:rigth;cursor:hand;left:0%;" class="btn btn-success bt-large"><i class="fa fa-plus fa-2x">Nuevo Periodo</i></a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bas-periodo-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Periodos',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'periodo',
		'fecha_inicio',
		'fecha_fin',
		array(
			'name'=>'id_ciclo',
			'header'=>'CICLO',
			'value'=>'BasPeriodo::getNameCiclo($data->id_ciclo)',
			'filter'=>BasPeriodo::getListCiclos(),
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
