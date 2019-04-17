<?php
/* @var $this AluMedicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Medicos',
);

$this->menu=array(
	array('label'=>'Create AluMedico', 'url'=>array('create')),
	array('label'=>'Manage AluMedico', 'url'=>array('admin')),
);
?>

<h1>Alu Medicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
