<?php
/* @var $this SysProcesosController */
/* @var $model SysProcesos */

$this->breadcrumbs=array(
	'Sys Procesoses'=>array('index'),
	$model->id_proceso,
);

$this->menu=array(
	array('label'=>'List SysProcesos', 'url'=>array('index')),
	array('label'=>'Create SysProcesos', 'url'=>array('create')),
	array('label'=>'Update SysProcesos', 'url'=>array('update', 'id'=>$model->id_proceso)),
	array('label'=>'Delete SysProcesos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proceso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SysProcesos', 'url'=>array('admin')),
);
?>

<h1>View SysProcesos #<?php echo $model->id_proceso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_proceso',
		'tipo',
		'proceso',
		'etiqueta',
		'link',
		'id_modulo',
	),
)); ?>
