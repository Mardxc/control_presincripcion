<?php
/* @var $this AluBachilleratoController */
/* @var $model AluBachillerato */

$this->breadcrumbs=array(
	'Alu Bachilleratos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluBachillerato', 'url'=>array('index')),
	array('label'=>'Manage AluBachillerato', 'url'=>array('admin')),
);
?>

<h1>Crear Bachillerato</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>