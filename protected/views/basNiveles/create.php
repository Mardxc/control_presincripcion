<?php
/* @var $this BasNivelesController */
/* @var $model BasNiveles */

$this->breadcrumbs=array(
	'Bas Niveles'=>array('index'),
	'Create',
);


?>

<?php 
echo CHtml::link('Administrar','index.php?r=BasNiveles/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Nivel',
		'style'=>'left:100%;float:right;
    		font-size: 3.0em;'
    )
);
 ?>
<h1>Crear Nivel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>