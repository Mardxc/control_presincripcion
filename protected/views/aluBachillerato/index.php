<?php
/* @var $this AluBachilleratoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Bachilleratos',
);

$this->menu=array(
	array('label'=>'Create AluBachillerato', 'url'=>array('create')),
	array('label'=>'Manage AluBachillerato', 'url'=>array('admin')),
);
?>

<h1>Alu Bachilleratos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
