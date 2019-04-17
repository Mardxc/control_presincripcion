<?php 
	echo CHtml::link('','index.php?r=AluAlumno/admin',
		array(
			'class'=>'fa fa-cog',
			'title'=>'Administrar Alumnos',
			'style'=>'left:100%;float:right;
	    		font-size: 3.0em;'
	    )
	);
 ?>

<h1><?php echo $model->nombre . ' ' . $model->ape_pat . ' ' . $model->ape_mat; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>