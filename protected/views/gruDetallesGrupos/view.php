<?php
/* @var $this GruDetallesGruposController */
/* @var $model GruDetallesGrupos */

$this->breadcrumbs=array(
	'Gru Detalles Gruposes'=>array('index'),
	$model->id_detalles_grupos,
);

$this->menu=array(
	array('label'=>'List GruDetallesGrupos', 'url'=>array('index')),
	array('label'=>'Create GruDetallesGrupos', 'url'=>array('create')),
	array('label'=>'Update GruDetallesGrupos', 'url'=>array('update', 'id'=>$model->id_detalles_grupos)),
	array('label'=>'Delete GruDetallesGrupos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_detalles_grupos),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GruDetallesGrupos', 'url'=>array('admin')),
);
?>

<h1>View GruDetallesGrupos #<?php echo $model->id_detalles_grupos; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_detalles_grupos',
		'id_alumno',
		'id_grupo',
	),
)); ?>
