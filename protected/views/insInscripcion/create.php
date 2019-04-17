<?php
/* @var $this InsInscripcionController */
/* @var $model InsInscripcion */

$this->breadcrumbs=array(
	'Ins Inscripcions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InsInscripcion', 'url'=>array('index')),
	array('label'=>'Manage InsInscripcion', 'url'=>array('admin')),
);
?>

<h1>Create InsInscripcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>