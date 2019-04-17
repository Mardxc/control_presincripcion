<?php
/* @var $this GenLocalidadesController */
/* @var $model GenLocalidades */

$this->breadcrumbs=array(
	'Gen Localidades'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List GenLocalidades', 'url'=>array('index')),
	array('label'=>'Create GenLocalidades', 'url'=>array('create')),
	array('label'=>'View GenLocalidades', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage GenLocalidades', 'url'=>array('admin')),
);
?>

<h1>Update GenLocalidades <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>