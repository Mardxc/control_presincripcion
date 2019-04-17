<?php
/* @var $this AluEscolaresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Escolares',
);

$this->menu=array(
	array('label'=>'Create AluEscolares', 'url'=>array('create')),
	array('label'=>'Manage AluEscolares', 'url'=>array('admin')),
);
?>

<h1>Alu Escolares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
