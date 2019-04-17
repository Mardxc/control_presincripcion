<?php
/* @var $this AluTutorController */
/* @var $model AluTutor */

$this->breadcrumbs=array(
	'Alu Tutors'=>array('index'),
	$model->id_tutor=>array('view','id'=>$model->id_tutor),
	'Update',
);


?>

<?php 
echo CHtml::link('','index.php?r=AluParentesco/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Medicoss',
		'style'=>'left:100%;
    		font-size: 2.0em;'
    )
);
?>

<h1>Actualizar <?php echo $model->nombre . ' ' . $model->ape_pat . ' ' . $model->ape_mat ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>