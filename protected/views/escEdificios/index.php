<?php
/* @var $this EscEdificiosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Esc Edificioses',
);

$this->menu=array(
	array('label'=>'Create EscEdificios', 'url'=>array('create')),
	array('label'=>'Manage EscEdificios', 'url'=>array('admin')),
);
?>

<h1>Esc Edificioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
