<?php
/* @var $this AluBachilleratoController */
/* @var $model AluBachillerato */

$this->breadcrumbs=array(
	'Alu Bachilleratos'=>array('index'),
	$model->id_bachillerato=>array('view','id'=>$model->id_bachillerato),
	'Update',
);

$this->menu=array(
	array('label'=>'List AluBachillerato', 'url'=>array('index')),
	array('label'=>'Create AluBachillerato', 'url'=>array('create')),
	array('label'=>'View AluBachillerato', 'url'=>array('view', 'id'=>$model->id_bachillerato)),
	array('label'=>'Manage AluBachillerato', 'url'=>array('admin')),
);
?>

<h1>Update AluBachillerato <?php echo $model->id_bachillerato; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>