<?php
/* @var $this BasPeriodoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bas Periodos',
);

$this->menu=array(
	array('label'=>'Create BasPeriodo', 'url'=>array('create')),
	array('label'=>'Manage BasPeriodo', 'url'=>array('admin')),
);
?>

<h1>Bas Periodos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
