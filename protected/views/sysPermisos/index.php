<?php
/* @var $this SysPermisosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sys Permisoses',
);

$this->menu=array(
	array('label'=>'Create SysPermisos', 'url'=>array('create')),
	array('label'=>'Manage SysPermisos', 'url'=>array('admin')),
);
?>

<h1>Sys Permisoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
