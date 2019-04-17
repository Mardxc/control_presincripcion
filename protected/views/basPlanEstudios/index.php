<?php
/* @var $this BasPlanEstudiosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bas Plan Estudioses',
);

$this->menu=array(
	array('label'=>'Create BasPlanEstudios', 'url'=>array('create')),
	array('label'=>'Manage BasPlanEstudios', 'url'=>array('admin')),
);
?>

<h1>Bas Plan Estudioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
