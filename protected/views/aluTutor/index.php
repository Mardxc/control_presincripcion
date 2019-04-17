<?php
/* @var $this AluTutorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alu Tutors',
);

$this->menu=array(
	array('label'=>'Create AluTutor', 'url'=>array('create')),
	array('label'=>'Manage AluTutor', 'url'=>array('admin')),
);
?>

<h1>Alu Tutors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
