<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Localidades', 'url'=>array('index')),
	array('label'=>'Create Localidades', 'url'=>array('create')),
	array('label'=>'Update Localidades', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Localidades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Localidades', 'url'=>array('admin')),
);
?>

<h1>View Localidades #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'CVE_ENT',
		'CVE_MUN',
		'CVE_LOC',
		'NOM_LOC',
		'AMBITO',
	),
)); ?>
