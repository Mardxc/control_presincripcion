<?php
/* @var $this AluPreinscripcionController */
/* @var $model AluPreinscripcion */

$this->breadcrumbs=array(
	'Alu Preinscripcions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluPreinscripcion', 'url'=>array('index')),
	array('label'=>'Manage AluPreinscripcion', 'url'=>array('admin')),
);
?>

<h1>Create AluPreinscripcion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>