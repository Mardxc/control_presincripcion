<?php
/* @var $this InsInscripcionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ins Inscripcions',
);

$this->menu=array(
	array('label'=>'Create InsInscripcion', 'url'=>array('create')),
	array('label'=>'Manage InsInscripcion', 'url'=>array('admin')),
);
?>

<h1>Ins Inscripcions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
