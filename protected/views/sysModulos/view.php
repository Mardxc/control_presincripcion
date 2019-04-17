<?php
/* @var $this SysModulosController */
/* @var $model SysModulos */

$this->breadcrumbs=array(
	'Sys Moduloses'=>array('index'),
	$model->id_modulo,
);

$this->menu=array(
	array('label'=>'List SysModulos', 'url'=>array('index')),
	array('label'=>'Create SysModulos', 'url'=>array('create')),
	array('label'=>'Update SysModulos', 'url'=>array('update', 'id'=>$model->id_modulo)),
	array('label'=>'Delete SysModulos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_modulo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SysModulos', 'url'=>array('admin')),
);
?>

<h1>View SysModulos #<?php echo $model->id_modulo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_modulo',
		'modulo',
	),
)); ?>
