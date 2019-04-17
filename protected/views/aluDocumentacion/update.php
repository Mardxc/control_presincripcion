<?php
/* @var $this AluDocumentacionController */
/* @var $model AluDocumentacion */

$this->breadcrumbs=array(
	'Alu Documentacions'=>array('index'),
	$model->id_documentacion=>array('view','id'=>$model->id_documentacion),
	'Update',
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
<h1>Actualizar Documentacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>