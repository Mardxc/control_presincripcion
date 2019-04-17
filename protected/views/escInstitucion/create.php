<?php 
	echo CHtml::link('Administrar','index.php?r=escInstitucion/admin',
		array(
			'class'=>'fa fa-cog',
			'title'=>'Administrar Institucion',
			'style'=>'left:100%;float:right;
	    		font-size: 3.0em;'
	    )
	);
?>


<h1>Crear Institucion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>