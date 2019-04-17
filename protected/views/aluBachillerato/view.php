<?php
/* @var $this AluBachilleratoController */
/* @var $model AluBachillerato */

$this->breadcrumbs=array(
	'Alu Bachilleratos'=>array('index'),
	$model->id_bachillerato,
);

$this->menu=array(
	array('label'=>'List AluBachillerato', 'url'=>array('index')),
	array('label'=>'Create AluBachillerato', 'url'=>array('create')),
	array('label'=>'Update AluBachillerato', 'url'=>array('update', 'id'=>$model->id_bachillerato)),
	array('label'=>'Delete AluBachillerato', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bachillerato),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AluBachillerato', 'url'=>array('admin')),
);
?>

<h1>View AluBachillerato #<?php echo $model->id_bachillerato; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bachillerato',
		'bachillerato',
	),
)); ?>
