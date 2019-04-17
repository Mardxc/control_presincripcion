<?php
/* @var $this SysModulosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sys Moduloses',
);

$this->menu=array(
	array('label'=>'Create SysModulos', 'url'=>array('create')),
	array('label'=>'Manage SysModulos', 'url'=>array('admin')),
);
?>

<h1>Sys Moduloses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
