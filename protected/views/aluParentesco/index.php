<?php
/* @var $this AluParentescoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Parentescos',
);

$this->menu=array(
	array('label'=>'Create AluParentesco', 'url'=>array('create')),
	array('label'=>'Manage AluParentesco', 'url'=>array('admin')),
);
?>

<h1>Alu Parentescos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
