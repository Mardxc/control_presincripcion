<?php
/* @var $this AluDocumentacionController */
/* @var $model AluDocumentacion */

$this->breadcrumbs=array(
	'Alu Documentacions'=>array('index'),
	'Create',
);

?>

<?php 
echo CHtml::link('','index.php?r=AluDocumentacion/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Documentacion',
		'style'=>'left:100%;
    		font-size: 2.0em;'
    )
);
?>

<h1>Crear Documentacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>