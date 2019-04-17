<?php
/* @var $this EscAulasController */
/* @var $model EscAulas */

$this->breadcrumbs=array(
	'Esc Aulases'=>array('index'),
	$model->id_aula,
);

$this->menu=array(
	array('label'=>'List EscAulas', 'url'=>array('index')),
	array('label'=>'Create EscAulas', 'url'=>array('create')),
	array('label'=>'Update EscAulas', 'url'=>array('update', 'id'=>$model->id_aula)),
	array('label'=>'Delete EscAulas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_aula),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscAulas', 'url'=>array('admin')),
);
?>

<h1>View EscAulas #<?php echo $model->id_aula; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_aula',
		'aula',
		'id_edificio',
	),
)); ?>
