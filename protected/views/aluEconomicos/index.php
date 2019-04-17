<?php
/* @var $this AluEconomicosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Economicoses',
);

$this->menu=array(
	array('label'=>'Create AluEconomicos', 'url'=>array('create')),
	array('label'=>'Manage AluEconomicos', 'url'=>array('admin')),
);
?>

<h1>Alu Economicoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
