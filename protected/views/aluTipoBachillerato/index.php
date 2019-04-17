<?php
/* @var $this AluTipoBachilleratoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Tipo Bachilleratos',
);

$this->menu=array(
	array('label'=>'Create AluTipoBachillerato', 'url'=>array('create')),
	array('label'=>'Manage AluTipoBachillerato', 'url'=>array('admin')),
);
?>

<h1>Alu Tipo Bachilleratos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
