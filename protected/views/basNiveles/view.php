<?php
/* @var $this BasNivelesController */
/* @var $model BasNiveles */

$this->breadcrumbs=array(
	'Bas Niveles'=>array('index'),
	$model->id_nivel,
);

$this->menu=array(
	array('label'=>'List BasNiveles', 'url'=>array('index')),
	array('label'=>'Create BasNiveles', 'url'=>array('create')),
	array('label'=>'Update BasNiveles', 'url'=>array('update', 'id'=>$model->id_nivel)),
	array('label'=>'Delete BasNiveles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_nivel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasNiveles', 'url'=>array('admin')),
);
?>

<h1>View BasNiveles #<?php echo $model->id_nivel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_nivel',
		'fecha_inicial',
		'fecha_final',
		'status',
		'grados',
		'grupos',
		'id_periodo',
		'id_carrera',
	),
)); ?>
