<?php
/* @var $this GruGruposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gru Gruposes',
);

$this->menu=array(
	array('label'=>'Create GruGrupos', 'url'=>array('create')),
	array('label'=>'Manage GruGrupos', 'url'=>array('admin')),
);
?>

<h1>Gru Gruposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
