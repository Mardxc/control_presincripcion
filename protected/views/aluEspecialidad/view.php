<?php
/* @var $this AluEspecialidadController */
/* @var $model AluEspecialidad */

$this->breadcrumbs=array(
	'Alu Especialidads'=>array('index'),
	$model->id_especialidad,
);

$this->menu=array(
	array('label'=>'List AluEspecialidad', 'url'=>array('index')),
	array('label'=>'Create AluEspecialidad', 'url'=>array('create')),
	array('label'=>'Update AluEspecialidad', 'url'=>array('update', 'id'=>$model->id_especialidad)),
	array('label'=>'Delete AluEspecialidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_especialidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AluEspecialidad', 'url'=>array('admin')),
);
?>

<h1>View AluEspecialidad #<?php echo $model->id_especialidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_especialidad',
		'especialidad',
	),
)); ?>
