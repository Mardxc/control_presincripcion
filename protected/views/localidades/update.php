<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Localidades', 'url'=>array('index')),
	array('label'=>'Create Localidades', 'url'=>array('create')),
	array('label'=>'View Localidades', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Localidades', 'url'=>array('admin')),
);
?>

<h1>Update Localidades <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>