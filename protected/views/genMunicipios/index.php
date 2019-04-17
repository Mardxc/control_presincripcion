<?php
/* @var $this GenMunicipiosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gen Municipioses',
);

$this->menu=array(
	array('label'=>'Create GenMunicipios', 'url'=>array('create')),
	array('label'=>'Manage GenMunicipios', 'url'=>array('admin')),
);
?>

<h1>Gen Municipioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
