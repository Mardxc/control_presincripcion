<?php
/* @var $this EscAulasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Esc Aulases',
);

$this->menu=array(
	array('label'=>'Create EscAulas', 'url'=>array('create')),
	array('label'=>'Manage EscAulas', 'url'=>array('admin')),
);
?>

<h1>Esc Aulases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
