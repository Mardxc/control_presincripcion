<?php
/* @var $this AluTipoBachilleratoController */
/* @var $model AluTipoBachillerato */

$this->breadcrumbs=array(
	'Alu Tipo Bachilleratos'=>array('index'),
	$model->id_tipo_bachillerato,
);

$this->menu=array(
	array('label'=>'List AluTipoBachillerato', 'url'=>array('index')),
	array('label'=>'Create AluTipoBachillerato', 'url'=>array('create')),
	array('label'=>'Update AluTipoBachillerato', 'url'=>array('update', 'id'=>$model->id_tipo_bachillerato)),
	array('label'=>'Delete AluTipoBachillerato', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_bachillerato),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AluTipoBachillerato', 'url'=>array('admin')),
);
?>

<h1>View AluTipoBachillerato #<?php echo $model->id_tipo_bachillerato; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_bachillerato',
		'tipo_bachillerato',
	),
)); ?>
