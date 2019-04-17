<?php
/* @var $this GenMunicipiosController */
/* @var $model GenMunicipios */

$this->breadcrumbs=array(
	'Gen Municipioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GenMunicipios', 'url'=>array('index')),
	array('label'=>'Manage GenMunicipios', 'url'=>array('admin')),
);
?>

<h1>Create GenMunicipios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>