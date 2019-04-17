<?php
/* @var $this BasPlanEstudiosController */
/* @var $model BasPlanEstudios */

$this->breadcrumbs=array(
	'Bas Plan Estudioses'=>array('index'),
	$model->id_plan,
);

$this->menu=array(
	array('label'=>'List BasPlanEstudios', 'url'=>array('index')),
	array('label'=>'Create BasPlanEstudios', 'url'=>array('create')),
	array('label'=>'Update BasPlanEstudios', 'url'=>array('update', 'id'=>$model->id_plan)),
	array('label'=>'Delete BasPlanEstudios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_plan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BasPlanEstudios', 'url'=>array('admin')),
);
?>

<h1>View BasPlanEstudios #<?php echo $model->id_plan; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_plan',
		'plan_estudios',
		'doc_autorizacion',
		'creditos_optativos',
		'creditos_totales',
		'estado',
		'reticula',
		'fecha_alta',
		'carga_max_creditos',
		'carga_min_creditos',
	),
)); ?>
