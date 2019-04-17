<?php
/* @var $this BasCarrerasController */
/* @var $model BasCarreras */

$this->breadcrumbs=array(
	'Bas Carrerases'=>array('index'),
	$model->id_carrera,
);

$this->menu=array(
	array('label'=>'List BasCarreras', 'url'=>array('index')),
	array('label'=>'Create BasCarreras', 'url'=>array('create')),
	array('label'=>'Update BasCarreras', 'url'=>array('update', 'id'=>$model->id_carrera)),
	array('label'=>'Delete BasCarreras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_carrera),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasCarreras', 'url'=>array('admin')),
);
?>

<h1>View BasCarreras #<?php echo $model->id_carrera; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_carrera',
		'nombre',
		'nombre_corto',
		'fecha_ingreso',
		'fecha_egreso',
		'id_plan',
	),
)); ?>
