<?php
/* @var $this EscInstitucionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Esc Institucions',
);

$this->menu=array(
	array('label'=>'Create EscInstitucion', 'url'=>array('create')),
	array('label'=>'Manage EscInstitucion', 'url'=>array('admin')),
);
?>

<h1>Esc Institucions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
