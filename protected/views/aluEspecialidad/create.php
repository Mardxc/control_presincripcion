<?php
/* @var $this AluEspecialidadController */
/* @var $model AluEspecialidad */

$this->breadcrumbs=array(
	'Alu Especialidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluEspecialidad', 'url'=>array('index')),
	array('label'=>'Manage AluEspecialidad', 'url'=>array('admin')),
);
?>

<h1>Create AluEspecialidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>