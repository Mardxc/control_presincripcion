<?php
/* @var $this BasCicloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bas Ciclos',
);

$this->menu=array(
	array('label'=>'Create BasCiclo', 'url'=>array('create')),
	array('label'=>'Manage BasCiclo', 'url'=>array('admin')),
);
?>

<h1>Bas Ciclos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
