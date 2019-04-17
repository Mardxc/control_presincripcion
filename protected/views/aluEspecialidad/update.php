<?php
/* @var $this AluEspecialidadController */
/* @var $model AluEspecialidad */

$this->breadcrumbs=array(
	'Alu Especialidads'=>array('index'),
	$model->id_especialidad=>array('view','id'=>$model->id_especialidad),
	'Update',
);

$this->menu=array(
	array('label'=>'List AluEspecialidad', 'url'=>array('index')),
	array('label'=>'Create AluEspecialidad', 'url'=>array('create')),
	array('label'=>'View AluEspecialidad', 'url'=>array('view', 'id'=>$model->id_especialidad)),
	array('label'=>'Manage AluEspecialidad', 'url'=>array('admin')),
);
?>

<h1>Update AluEspecialidad <?php echo $model->id_especialidad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>