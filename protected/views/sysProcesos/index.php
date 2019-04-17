<?php
/* @var $this SysProcesosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sys Procesoses',
);

?>

<h1>Sys Procesoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
