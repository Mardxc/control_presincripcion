<?php
/* @var $this GenLocalidadesController */
/* @var $model GenLocalidades */

$this->breadcrumbs=array(
	'Gen Localidades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GenLocalidades', 'url'=>array('index')),
	array('label'=>'Manage GenLocalidades', 'url'=>array('admin')),
);
?>

<h1>Create GenLocalidades</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>