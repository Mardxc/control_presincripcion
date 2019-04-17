
<?php 
	echo CHtml::link('','index.php?r=gruExamen/admin',
		array(
			'class'=>'fa fa-cog',
			'title'=>'Administrar Examenes',
			'style'=>'left:100%;
	    		font-size: 3.0em;float:right;'
	    )
	);
?>


<h1><?php echo $model->nombre;  ?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>