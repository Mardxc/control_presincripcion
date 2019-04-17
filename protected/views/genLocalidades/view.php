<?php
/* @var $this GenLocalidadesController */
/* @var $model GenLocalidades */

$this->breadcrumbs=array(
	'Gen Localidades'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List GenLocalidades', 'url'=>array('index')),
	array('label'=>'Create GenLocalidades', 'url'=>array('create')),
	array('label'=>'Update GenLocalidades', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete GenLocalidades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GenLocalidades', 'url'=>array('admin')),
);
?>

<h1>View GenLocalidades #<?php echo $model->ID; ?></h1>

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
