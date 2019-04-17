<?php
/* @var $this GenMunicipiosController */
/* @var $model GenMunicipios */

$this->breadcrumbs=array(
	'Gen Municipioses'=>array('index'),
	$model->ID_MUN=>array('view','id'=>$model->ID_MUN),
	'Update',
);

$this->menu=array(
	array('label'=>'List GenMunicipios', 'url'=>array('index')),
	array('label'=>'Create GenMunicipios', 'url'=>array('create')),
	array('label'=>'View GenMunicipios', 'url'=>array('view', 'id'=>$model->ID_MUN)),
	array('label'=>'Manage GenMunicipios', 'url'=>array('admin')),
);
?>

<h1>Update GenMunicipios <?php echo $model->ID_MUN; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>