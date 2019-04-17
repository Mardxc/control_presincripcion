<?php
/* @var $this BasNivelesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bas Niveles',
);

$this->menu=array(
	array('label'=>'Create BasNiveles', 'url'=>array('create')),
	array('label'=>'Manage BasNiveles', 'url'=>array('admin')),
);
?>

<h1>Bas Niveles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
