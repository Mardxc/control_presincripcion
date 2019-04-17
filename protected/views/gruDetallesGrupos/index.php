<?php
/* @var $this GruDetallesGruposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gru Detalles Gruposes',
);

$this->menu=array(
	array('label'=>'Create GruDetallesGrupos', 'url'=>array('create')),
	array('label'=>'Manage GruDetallesGrupos', 'url'=>array('admin')),
);
?>

<h1>Gru Detalles Gruposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
