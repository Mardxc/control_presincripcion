<?php
/* @var $this BasCarrerasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bas Carrerases',
);

$this->menu=array(
	array('label'=>'Create BasCarreras', 'url'=>array('create')),
	array('label'=>'Manage BasCarreras', 'url'=>array('admin')),
);
?>

<h1>Bas Carrerases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
