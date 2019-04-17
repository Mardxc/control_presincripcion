<?php 
$dataProvider= new CActiveDataProvider('aluTutor');
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'alu-tutor-grid',
		'itemsCssClass'=>"table table-hover table-bordered",
		'pager'=>array("htmlOptions"=>array("class"=>"pagination")),
		'emptyText'=>'No existen resultados en esta busqueda',
		'summaryText'=>'{start}-{end} de {count} Tutores',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
				'id_alumno',
				'nombre',
				'ape_pat',
				'ape_mat',
				'domicilio',
				'telefono',
				array(
					'name'=>'id_parentesco',
					'header'=>'PARENTESCO',
					'value'=>'aluTutor::getNameParentesco($data->id_parentesco)',
					'filter'=>aluTutor::getListParentescos(),
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{Actualizar}',
						'buttons'=>array(
							'Actualizar' => array( //botón para la acción nueva
								'options' => array('rel' => 'tooltip', 
									'data-toggle' => 'tooltip', 
									'title' => Yii::t('app', 'Actualizar')
								),
			                	'label' => '<i class="fa fa-refresh fa-2x"></i>',
			                	'imageUrl' => false,
						    	//'click'=>'js:actualizarTutor',
			                	//'onclick'=>'$("#actualizarTutor").dialog("open"); return false;',
								//'updateButtonUrl'=>'Yii::app()->controller->createUrl("actualizarTutor")',
							),
						),
				),
			
		),
	)); ?>
<?php 
	$criteria = new CDbCriteria;
	if (isset($model->id_alumno)) {
		$id_alumno			 =	$model->id_alumno;
		$criteria->condition = "id_alumno=".$id_alumno;
		$modelTutor 		 =	aluTutor::model()->find($criteria);
	}else{
		$id_alumno=$id;
		$criteria->condition = "id_alumno=".$id_alumno;
		$modelTutor 		 =	aluTutor::model()->find($criteria);
	}/*
		$id_alumno			 =	$model->id_alumno
		$criteria->condition = "id_alumno=".$id_alumno;
		$modelTutor 		 =	aluTutor::model()->find($criteria);
*/
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	    'id'=>'actualizarTutor',
	    // additional javascript options for the dialog plugin
	    'options'=>array(
	        'title'=>'Actualizar',
	        'autoOpen'=>false,
	        'show'=>'blind',
	        'display'=>'relative',
	        'position'=> 'center',
	        'width'=>'auto',
	        'height'=>'1000px',
	    ),
	));
	  	echo  $this->renderPartial(
	        '/aluTutor/view',
	        array(
	        	'model'=>$modelTutor
	        )
	    );
	$this->endWidget('zii.widgets.jui.CJuiDialog');

	// the link that may open the dialog
	echo CHtml::link('Actualizar', '#', array(
	   'onclick'=>'$("#actualizarTutor").dialog("open"); return false;',
	))
?>