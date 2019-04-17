<?php
/* @var $this AluTutorController */
/* @var $model AluTutor */

$this->breadcrumbs=array(
	'Alu Tutors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AluTutor', 'url'=>array('index')),
	array('label'=>'Manage AluTutor', 'url'=>array('admin')),
);
?>

<?php 
echo CHtml::link('','index.php?r=AluTutor/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Tutores',
		'style'=>'left:100%;
    		font-size: 2.0em;'
    )
);
?>
<h1>Crear Tutor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>