<?php
/* @var $this InsInscripcionController */
/* @var $model InsInscripcion */

$this->breadcrumbs=array(
	'Ins Inscripcions'=>array('index'),
	$model->id_inscripcion=>array('view','id'=>$model->id_inscripcion),
	'Update',
);

$this->menu=array(
	array('label'=>'List InsInscripcion', 'url'=>array('index')),
	array('label'=>'Create InsInscripcion', 'url'=>array('create')),
	array('label'=>'View InsInscripcion', 'url'=>array('view', 'id'=>$model->id_inscripcion)),
	array('label'=>'Manage InsInscripcion', 'url'=>array('admin')),
);
?>

<h1>Update InsInscripcion <?php echo $model->id_inscripcion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>