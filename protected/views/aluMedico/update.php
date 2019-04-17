<?php
/* @var $this AluMedicoController */
/* @var $model AluMedico */

$this->breadcrumbs=array(
	'Alu Medicos'=>array('index'),
	$model->id_medico=>array('view','id'=>$model->id_medico),
	'Update',
);

?>

<?php 
echo CHtml::link('','index.php?r=AluMedico/admin',
	array(
		'class'=>'fa fa-cog',
		'title'=>'Administrar Medicoss',
		'style'=>'left:100%;
    		font-size: 2.0em;'
    )
);
?>

<h1>Actualizar Medicos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>