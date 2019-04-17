<?php
/* @var $this AluAlumnoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Alumnos',
);

$this->menu=array(
	array('label'=>'Create AluAlumno', 'url'=>array('create')),
	array('label'=>'Manage AluAlumno', 'url'=>array('admin')),
);
?>

<h1>Alu Alumnos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
