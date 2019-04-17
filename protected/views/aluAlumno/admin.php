<script>
	$(document).ready(function(){
		$("#ver").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('INFORMACION PERSONAL DEL ALUMNO');
		});
		$("#actualizar").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('ACTUALIZAR  LA INFORMACION PERSONAL DEL ALUMNO');
		});
		$("#eliminar").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('ELIMINACION DEL ALUMNO');
		});
		$("#informacion").mouseover(function(){
			$('#mensaje').css('display','block');
			$('#mensaje').html('DOCUMENTACION, DATOS ESCOLARES, MEDICOS, ECONOMICOS Y TUTORES');
		});

	});
	function addStudent(){
		window.location="index.php?r=AluAlumno/detalles&id=0";
	}
</script>

<h1>Alumnos</h1>

<?php 
	/*echo CHtml::link('','index.php?r=AluAlumno/detalles',

		array(
			'class'=>'glyphicon glyphicon-plus',
			'title'=>'Crear Alumno',
			'style'=>'left:95%;
	    		font-size: 3.0em;'
	    )
	);*/
?>

<a id="addStudent"   onclick="addStudent()" style="text-align:rigth;cursor:hand;left:0%;" class="btn btn-success bt-large">
	<i class="fa fa-plus">Nuevo Alumno</i>
</a>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alu-alumno-grid',
	'itemsCssClass'=>"table table-hover table-bordered",
	'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
	'emptyText'=>'No existen resultados en esta busqueda',
	'summaryText'=>'{start}-{end} de {count} Alumnos',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_alumno',
		'nombre',
		'ape_pat',
		'ape_mat',
		'curp',
		array(
			'class'=>'CButtonColumn',
			'header'=>'ACCIONES',
			//'htmlOptions' => array('style'=>'color:green;'),
			'template'=>'{detalles}',
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
					'detalles' => array( //botón para los detalles
						'options' => array('rel' => 'tooltip', 
							'data-toggle' => 'tooltip', 
							'title' => Yii::t('app', 'Detalles'),
							'id'=>'informacion'
						),
	                	'label' => '<i class="fa fa-list-alt fa-2x"></i>',
	                	'imageUrl' => false,
						'url'=>'Yii::app()->createUrl("aluAlumno/detalles", array("id"=>$data->id_alumno))',
					),
				),
		),
	),
)); ?>
<div id="mensaje" align="center" style="display:none;font-weight:bold;" class="alert alert-danger"></div>
