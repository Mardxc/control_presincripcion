<?php
/* @var $this EscEdificiosController */
/* @var $model EscEdificios */

$this->breadcrumbs=array(
	'Esc Edificioses'=>array('index'),
	$model->id_edificio,
);

$this->menu=array(
	array('label'=>'List EscEdificios', 'url'=>array('index')),
	array('label'=>'Create EscEdificios', 'url'=>array('create')),
	array('label'=>'Update EscEdificios', 'url'=>array('update', 'id'=>$model->id_edificio)),
	array('label'=>'Delete EscEdificios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_edificio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscEdificios', 'url'=>array('admin')),
);
?>

<h1>View EscEdificios #<?php echo $model->id_edificio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_edificio',
		'nombre',
		'area',
		'id_institucion',
	),
)); ?>
