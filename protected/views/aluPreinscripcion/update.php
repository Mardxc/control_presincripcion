<?php
/* @var $this AluPreinscripcionController */
/* @var $model AluPreinscripcion */

$this->breadcrumbs=array(
	'Alu Preinscripcions'=>array('index'),
	$model->id_aspirante=>array('view','id'=>$model->id_aspirante),
	'Update',
);

$this->menu=array(
	array('label'=>'List AluPreinscripcion', 'url'=>array('index')),
	array('label'=>'Create AluPreinscripcion', 'url'=>array('create')),
	array('label'=>'View AluPreinscripcion', 'url'=>array('view', 'id'=>$model->id_aspirante)),
	array('label'=>'Manage AluPreinscripcion', 'url'=>array('admin')),
);
?>

<h1>Update AluPreinscripcion <?php echo $model->id_aspirante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>