<?php
/* @var $this BasPeriodoController */
/* @var $model BasPeriodo */

$this->breadcrumbs=array(
	'Bas Periodos'=>array('index'),
	$model->id_periodo,
);

$this->menu=array(
	array('label'=>'List BasPeriodo', 'url'=>array('index')),
	array('label'=>'Create BasPeriodo', 'url'=>array('create')),
	array('label'=>'Update BasPeriodo', 'url'=>array('update', 'id'=>$model->id_periodo)),
	array('label'=>'Delete BasPeriodo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_periodo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasPeriodo', 'url'=>array('admin')),
);
?>

<h1>View BasPeriodo #<?php echo $model->id_periodo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_periodo',
		'periodo',
		'fecha_inicio',
		'fecha_fin',
		'id_ciclo',
	),
)); ?>
