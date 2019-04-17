<?php
/* @var $this SysPermisosController */
/* @var $model SysPermisos */

$this->breadcrumbs=array(
	'Sys Permisoses'=>array('index'),
	$model->id_permiso,
);

$this->menu=array(
	array('label'=>'List SysPermisos', 'url'=>array('index')),
	array('label'=>'Create SysPermisos', 'url'=>array('create')),
	array('label'=>'Update SysPermisos', 'url'=>array('update', 'id'=>$model->id_permiso)),
	array('label'=>'Delete SysPermisos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_permiso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SysPermisos', 'url'=>array('admin')),
);
?>

<h1>View SysPermisos #<?php echo $model->id_permiso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'id_proceso',
		'id_permiso',
	),
)); ?>
