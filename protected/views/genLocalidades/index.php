<?php
/* @var $this GenLocalidadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gen Localidades',
);

$this->menu=array(
	array('label'=>'Create GenLocalidades', 'url'=>array('create')),
	array('label'=>'Manage GenLocalidades', 'url'=>array('admin')),
);
?>

<h1>Gen Localidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
