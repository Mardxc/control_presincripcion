<?php
/* @var $this AluTipoBachilleratoController */
/* @var $model AluTipoBachillerato */

$this->breadcrumbs=array(
	'Alu Tipo Bachilleratos'=>array('index'),
	$model->id_tipo_bachillerato=>array('view','id'=>$model->id_tipo_bachillerato),
	'Update',
);

$this->menu=array(
	array('label'=>'List AluTipoBachillerato', 'url'=>array('index')),
	array('label'=>'Create AluTipoBachillerato', 'url'=>array('create')),
	array('label'=>'View AluTipoBachillerato', 'url'=>array('view', 'id'=>$model->id_tipo_bachillerato)),
	array('label'=>'Manage AluTipoBachillerato', 'url'=>array('admin')),
);
?>

<h1>Update AluTipoBachillerato <?php echo $model->id_tipo_bachillerato; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>