<script>
	function cambiarEstado(){
		var id_ciclos = $.fn.yiiGridView.getChecked('bas-ciclo-grid','id_ciclos');

		<?php echo CHtml::ajax(array(
		   	'url'=>array('basCiclo/cambiarEstado'),
		    'data'=> array(
		        'id_ciclos'	=>'js:id_ciclos'
		    ),
		    'type'=>'post',
		    'dataType'=>'json',
		    'success'=>"function(data)
		    {	
				$.fn.yiiGridView.update('bas-ciclo-grid');	 
		    }"
		))
		?>;
		return false; 
	}
</script>

<h1>Ciclos</h1>
<a href="index.php?r=basCiclo/create" style="text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-plus">Nuevo Ciclo</i>
</a>
<a onclick="cambiarEstado()" style="text-align:rigth;cursor:hand;left:100%;" class="btn btn-success bt-large">
	<i class="fa fa-check-square">Cambiar Estado Ciclo</i>
</a>
<?php 
	/*echo CHtml::link('','index.php?r=basCiclo/create',
		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Nuevo Ciclo',
			'style'=>'
	    		font-size: 3.0em;'
	    )
	);*/
?>

<!--<a onclick="cambiarEstado()" style="font-size:3.0em;cursor:hand;"><i class="fa fa-check-square"></i></a>-->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bas-ciclo-grid',
	'itemsCssClass'=>"table table-hover table-bordered ",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Ciclos',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'id'=>'id_ciclos',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '1',  
        ),
		'ciclo',
		'fecha_inicio',
		'fecha_fin',
		array(
			'name'=>'estado',
			'header'=>'ESTADO',
			'value'=>'$data->estado ?\'VIGENTE\':\'LIQUIDADO\' ',
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
