<?php
/* @var $this AluDocumentacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Documentacions',
);

$this->menu=array(
	array('label'=>'Create AluDocumentacion', 'url'=>array('create')),
	array('label'=>'Manage AluDocumentacion', 'url'=>array('admin')),
);
?>

<h1>Alu Documentacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
