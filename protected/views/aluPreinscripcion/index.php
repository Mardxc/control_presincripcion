<?php
/* @var $this AluPreinscripcionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Preinscripcions',
);

$this->menu=array(
	array('label'=>'Create AluPreinscripcion', 'url'=>array('create')),
	array('label'=>'Manage AluPreinscripcion', 'url'=>array('admin')),
);
?>

<h1>Alu Preinscripcions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
