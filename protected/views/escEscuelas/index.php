<?php
/* @var $this EscEscuelasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Esc Escuelases',
);

$this->menu=array(
	array('label'=>'Create EscEscuelas', 'url'=>array('create')),
	array('label'=>'Manage EscEscuelas', 'url'=>array('admin')),
);
?>

<h1>Esc Escuelases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
