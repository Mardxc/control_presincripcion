<?php
/* @var $this BasCicloController */
/* @var $model BasCiclo */

$this->breadcrumbs=array(
	'Bas Ciclos'=>array('index'),
	$model->id_ciclo,
);

$this->menu=array(
	array('label'=>'List BasCiclo', 'url'=>array('index')),
	array('label'=>'Create BasCiclo', 'url'=>array('create')),
	array('label'=>'Update BasCiclo', 'url'=>array('update', 'id'=>$model->id_ciclo)),
	array('label'=>'Delete BasCiclo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ciclo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasCiclo', 'url'=>array('admin')),
);
?>

<h1>View BasCiclo #<?php echo $model->id_ciclo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ciclo',
		'ciclo',
		'fecha_inicio',
		'fecha_fin',
	),
)); ?>
