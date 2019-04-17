<?php
/* @var $this AluEspecialidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Especialidads',
);

$this->menu=array(
	array('label'=>'Create AluEspecialidad', 'url'=>array('create')),
	array('label'=>'Manage AluEspecialidad', 'url'=>array('admin')),
);
?>

<h1>Alu Especialidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
